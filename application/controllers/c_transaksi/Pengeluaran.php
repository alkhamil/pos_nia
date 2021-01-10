<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi/Pengeluaran_model');
    }

	public function index()
	{
        $data['title'] = 'Pengeluaran';
        $data['isi'] = 'v_transaksi/pengeluaran/index';
        $data['userdata'] = $this->userdata;
        $data['simpan'] = base_url('c_transaksi/pengeluaran/simpan');
        $data['data'] = base_url('c_transaksi/pengeluaran/data');
        $data['get'] = base_url('c_transaksi/pengeluaran/get_data');
        $data['cetak'] = base_url('c_transaksi/pengeluaran/cetak');
        $data['get_tahun_ajaran'] = base_url('c_transaksi/pembayaran/get_tahun_ajaran');
        $data['get_kebutuhan'] = base_url('c_transaksi/pengeluaran/get_kebutuhan');
        $data['select_tahun_ajaran'] = base_url('c_transaksi/pembayaran/select_tahun_ajaran');
        $data['select_siswa'] = base_url('c_transaksi/pembayaran/select_siswa');
        $data['select_kelas'] = base_url('c_transaksi/pembayaran/select_kelas');
        $data['select_lembaga'] = base_url('c_transaksi/pengeluaran/select_lembaga');
        $this->load->view('layout/wrapper', $data);
    }

    public function data()
    {
        $temp_data = [];
        $where = [];
        if ($this->input->post('filter_lembaga_id', TRUE)) {
            $where['t_pengeluaran.lembaga_id'] = $this->input->post('filter_lembaga_id', TRUE);
        }
        if($this->input->post('filter_start_date', TRUE) && $this->input->post('filter_end_date', TRUE)) {
            if($this->input->post('filter_start_date', TRUE) == $this->input->post('filter_end_date', TRUE)) {
                $where["DATE_FORMAT(t_pengeluaran.created_at, '%d/%m/%Y') = "] = $this->input->post('filter_start_date', TRUE);
            } else {
                $where["DATE_FORMAT(t_pengeluaran.created_at, '%d/%m/%Y')  >= "] = $this->input->post('filter_start_date', TRUE);
                $where["DATE_FORMAT(t_pengeluaran.created_at, '%d/%m/%Y') <= "] = $this->input->post('filter_end_date', TRUE);
            }
        } else {
            $where["DATE_FORMAT(t_pengeluaran.created_at, '%d/%m/%Y') = "] = date('d/m/Y');
        }

        $no = $this->input->post('start');
        $list = $this->Pengeluaran_model->lists(
            '*',
            $where, 
            $this->input->post('length'), 
            $this->input->post('start') 
        );
		if($list) {
			foreach ($list as $ls) {
				$no++;
				$row = array();
                $row['no'] = $no;
				$row['code'] = $ls['code'];
				$row['approval_name'] = $ls['approval_name'];
				$row['receive_name'] = $ls['receive_name'];
				$row['amount'] = $ls['amount'];
				$row['created_at'] = date('d-M-Y H:i:s', strtotime($ls['created_at']));
				$row['id'] = $ls['id'];
				$temp_data[] = (object)$row;
			}
		}
		
		$data['draw'] = $this->input->post('draw');
		$data['recordsTotal'] = $this->Pengeluaran_model->list_count($where, true);
		$data['recordsFiltered'] = $this->Pengeluaran_model->list_count($where, true);
        $data['data'] = $temp_data;
        echo json_encode($data);
    }

    public function simpan()
    {
        $savedata['tahun_ajaran_id'] = $this->input->post('tahun_ajaran_id', TRUE);
        $savedata['lembaga_id'] = $this->input->post('lembaga_id', TRUE);
        $savedata['code'] = $this->check_code($this->get_lembaga($this->input->post('lembaga_id', TRUE)));
        $savedata['approval_name'] = $this->userdata->username;
        $savedata['receive_name'] = $this->input->post('receive_name',TRUE);
        
        $savedata['created_at'] = date('Y-m-d H:i:s');
        $savedata['created_by'] = $this->userdata->id;
        $list_anggaran_temp = json_decode($this->input->post('list-anggaran-temp'));
        $amount = 0;
        foreach ($list_anggaran_temp as $key => $item) {
            if (isset($item->is_checkout)) {
                if ($item->is_checkout == 1) {
                    $amount+=$item->amount;
                }
            }
        }
        $savedata['amount'] = $amount;

        $this->db->trans_begin();
        if($this->input->post('id')) { 
            // edit
            die('edit');exit;
			$this->Pengeluaran_modal->update($savedata, array('id' => $this->input->post('id', TRUE)));
        } else { 
            //create
            $pengeluaran_id = $this->Pengeluaran_model->insert($savedata, true);
            if ($pengeluaran_id) {  
                $this->update_master_kebutuhan($list_anggaran_temp);
                $this->save_detail($list_anggaran_temp, $pengeluaran_id);
                // update lembaga amount
                $this->update_amount($savedata['lembaga_id'], $amount);
            }
        }
        
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $msg = array(
                'type' => 'error',
                'msg' => 'Data tidak berhasil disimpan',
            );
        }else {
            $this->db->trans_commit();
            $msg = array(
                'type' => 'success',
                'msg' => 'Data Berhasil disimpan',
            );
        }
        $this->session->set_flashdata('msg', $msg);
        
        redirect(base_url('c_transaksi/pengeluaran'), 'refresh');
    }

    public function update_master_kebutuhan($data)
    {
        $this->Pengeluaran_model->table = 'm_kebutuhan';
        foreach ($data as $key => $item) {
            $where['id'] = $item->id;
            $updatedate_detail['amount'] = $item->amount;
            $updatedate_detail['desc'] = $item->desc;
            $this->Pengeluaran_model->update($updatedate_detail, $where);
        }
    }

    public function save_detail($data, $pengeluaran_id)
    {
        $this->Pengeluaran_model->table = 't_pengeluaran_detail';
        foreach ($data as $key => $item) {
            if (isset($item->is_checkout)) {
                if ((int)$item->is_checkout == 1) {
                    $savedata['pengeluaran_id'] = $pengeluaran_id;
                    $savedata['kebutuhan_id'] = $item->id;
                    $savedata['amount'] = $item->amount;
                    $savedata['desc'] = $item->desc;
                    $this->Pengeluaran_model->insert($savedata);
                }
            }
        }
    }

    public function update_amount($lembaga_id, $amount)
    {
        $where['id'] = $lembaga_id;
        $this->Pengeluaran_model->table = 'm_lembaga';
        $lembaga = $this->Pengeluaran_model->get($where);
        if ($lembaga) {
            $updatedata['saldo'] = $lembaga->saldo - $amount;
            $this->Pengeluaran_model->update($updatedata, $where);
        }
    }

    public function get_lembaga($id)
    {
        $where['id'] = $id;
        $select = "*";
        $this->Pengeluaran_model->table = "m_lembaga";
        $this->Pengeluaran_model->order_by = "id";
        $lembaga = $this->Pengeluaran_model->get($where, $select);
        $this->Pengeluaran_model->table = "t_pengeluaran";
        return $lembaga->name;
    }

    public function select_lembaga()
    {
        $q = $this->input->get('q');
        $where = [];
        $this->Pengeluaran_model->order_by = "id";
        $this->Pengeluaran_model->order_type = "ASC";
        $this->Pengeluaran_model->search_field = "name";
        $this->Pengeluaran_model->column_search = "name";
        $this->Pengeluaran_model->table = "m_lembaga";
        $data = $this->Pengeluaran_model->list_select($q, $where);
        echo json_encode($data);
    }

    public function check_code($lembaga)
    {
        $tahun = $this->db->order_by('id', 'desc')->limit(1)->get('t_pengeluaran')->row_array();
        if ($tahun) {
            $tahun = date('Y', strtotime($tahun['created_at']));
            if ($tahun != date('Y')) {
                $code = 0;
            }else{
                $code = count($this->db->get('t_pengeluaran')->result_array());
            }
        }else{
            $code = count($this->db->get('t_pengeluaran')->result_array());
        }
        $result = 'OUT/'.$lembaga.'/'.date('Ymd').'/'.str_pad($code + 1, 4, "0", STR_PAD_LEFT);
        return $result;
    }

    public function get_tahun_ajaran()
    {
        $where['is_active'] = 1;
        $select = "*";
        $this->Pengeluaran_model->table = "m_tahun_ajaran";
        $this->Pengeluaran_model->order_by = "id";
        $tahun_ajaran = $this->Pengeluaran_model->get($where, $select);
        echo json_encode($tahun_ajaran->id);
    }

    public function get_kebutuhan()
    {       
        $this->Pengeluaran_model->table = "m_kebutuhan";
        $this->Pengeluaran_model->order_by = "id";
        $where = [];
        $data = $this->Pengeluaran_model->get_all($where, "*");
        echo json_encode($data);
    }

    public function cetak()
    {
        $where['t_pengeluaran.id'] = $this->input->get('id', TRUE);
        
        $select = "
                    t_pengeluaran.*,
                    m_tahun_ajaran.name as tahun_ajaran_name,
                    m_lembaga.name as lembaga_name
                  ";
        $join = [
            [
                'table'     => 'm_tahun_ajaran',
                'on'        => 'm_tahun_ajaran.id = t_pengeluaran.tahun_ajaran_id'
            ],
            [
                'table'     => 'm_lembaga',
                'on'        => 'm_lembaga.id = t_pengeluaran.lembaga_id'
            ]
        ];
        $pengeluaran = $this->Pengeluaran_model->get($where, $select, $join);
        $data['tahun_ajaran_name'] = isset($pengeluaran->tahun_ajaran_name) ? $pengeluaran->tahun_ajaran_name : null;
        $data['lembaga_name'] = isset($pengeluaran->lembaga_name) ? $pengeluaran->lembaga_name : null;
        $data['approval_name'] = isset($pengeluaran->approval_name) ? $pengeluaran->approval_name : null;
        $data['receive_name'] = isset($pengeluaran->receive_name) ? $pengeluaran->receive_name : null;
        $data['code'] = isset($pengeluaran->code) ? $pengeluaran->code : null;
        $data['amount'] = isset($pengeluaran->amount) ? $pengeluaran->amount : null;
        $data['created_at'] = isset($pengeluaran->created_at) ? date('d M Y H:i:s', strtotime($pengeluaran->created_at)) : null;
        $data['list_anggaran'] = isset($pengeluaran->id) ? $this->get_list_anggaran($pengeluaran->id) : [];
        $data['title'] = 'Lampiran Pengeluaran';

        // echo json_encode($data);exit;

        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->filename = $data['title'];
        $this->pdf->load_view('v_transaksi/pengeluaran/cetak', $data);
    }

    public function get_list_anggaran($pengeluaran_id)
    {
        $where['pengeluaran_id'] = $pengeluaran_id;
        $this->Pengeluaran_model->table = 't_pengeluaran_detail';
        $this->Pengeluaran_model->order_by = 'id';
        $data = $this->Pengeluaran_model->get_all($where);
        return $data;
    }
}