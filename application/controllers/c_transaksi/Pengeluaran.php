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
        $data['get_biaya_kebutuhan'] = base_url('c_transaksi/pengeluaran/get_biaya_kebutuhan');
        $data['get_kebutuhan_detail'] = base_url('c_transaksi/pengeluaran/get_kebutuhan_detail');
        $data['select_lembaga'] = base_url('c_transaksi/pengeluaran/select_lembaga');
        $this->load->view('layout/wrapper', $data);
    }

    public function data()
    {
        $temp_data = [];
        $where = [];
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
        $kebutuhanDetail = $this->input->post('kebutuhan_detail_id',TRUE);
        $savedataDetail['lembaga_id'] = $this->input->post('lembaga_id', TRUE);
        $savedataDetail['kebutuhan_lembaga_id'] = $this->input->post('t_biaya_kebutuhan_id',TRUE);
        $savedataDetail['tahun_ajaran_id'] = $this->input->post('tahun_ajaran_id', TRUE);
        $savedataDetail['biaya_kebutuhan_detail_id'] = $this->input->post('kebutuhan_detail_id',TRUE);
        $savedata['code'] = $this->check_code($this->get_lembaga($savedataDetail['lembaga_id']));
        $savedata['approval_name'] = $this->userdata->username;
        $savedata['receive_name'] = $this->input->post('penerima',TRUE);
        $savedata['amount'] = $this->input->post('nominal',TRUE);
        $savedata['created_at'] = date('Y-m-d H:i:s');
        $savedata['created_by'] = $this->userdata->id;

        $this->db->trans_begin();
        if($this->input->post('id')) { 
            // edit
			$this->Pengeluaran_modal->update($savedata, array('id' => $this->input->post('id', TRUE)));
        } else { 
            //create
            $pengeluaran_id = $this->Pengeluaran_model->insert($savedata, true);
            if ($pengeluaran_id) {  
                $this->update_kebutuhan_detail($kebutuhanDetail);
                $this->save_detail($savedataDetail,$pengeluaran_id);
                // update lembaga amount
                $this->update_amount($savedataDetail['lembaga_id'],$savedata['amount']);
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

    public function update_kebutuhan_detail($id)
    {
        $where['id'] = $id;
        $this->Pengeluaran_model->table = 't_biaya_kebutuhan_detail';
        $this->Pengeluaran_model->order_by = 'id';
        $detail = $this->Pengeluaran_model->get($where);
        $savedata['biaya_kebutuhan_id'] = $detail->biaya_kebutuhan_id;
        $savedata['kebutuhan_id']       = $detail->kebutuhan_id;
        $savedata['amount']             = $detail->amount;
        $savedata['is_checked']         = 1;
        $this->Pengeluaran_model->update($savedata,$where);
    }

    public function save_detail($savedata,$id)
    {
        $save['pengeluaran_id']     = $id;
        $save['tahun_ajaran_id']    = (int)$savedata['tahun_ajaran_id'];
        $save['lembaga_id']         = (int)$savedata['lembaga_id'];
        $save['kebutuhan_lembaga_id'] = (int)$savedata['kebutuhan_lembaga_id'];
        $save['biaya_kebutuhan_detail_id'] = (int)$savedata['biaya_kebutuhan_detail_id'];
        $this->Pengeluaran_model->table = 't_pengeluaran_detail';
        $this->Pengeluaran_model->insert($save);
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

    public function update_amount($data,$amount)
    {
        $where['id'] = $data;
        $this->Pengeluaran_model->table = "m_lembaga";
        $this->Pengeluaran_model->order_by = "id";
        $lembaga = $this->Pengeluaran_model->get($where);
        if ($lembaga) {
            $update['saldo'] = $lembaga->saldo - $amount;
            $this->Pengeluaran_model->update($update, $where);
        }
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

    public function get_biaya_kebutuhan()
    {       
        $this->Pengeluaran_model->table = "m_tahun_ajaran";
        $this->Pengeluaran_model->order_by = "id";
        $tahun = $this->Pengeluaran_model->get(['is_active' => 1]);
        $where['t_biaya_kebutuhan.tahun_ajaran_id'] = $tahun->id;
        $where['t_biaya_kebutuhan.lembaga_id'] = $this->input->get('lembaga_id',TRUE);
        $this->Pengeluaran_model->table = "t_biaya_kebutuhan";
        $this->Pengeluaran_model->order_by = "id";
        $data = $this->Pengeluaran_model->get($where);
        echo json_encode($data);
    }

    public function get_kebutuhan_detail()
    {
        $where['t_biaya_kebutuhan_detail.biaya_kebutuhan_id'] = $this->input->get('biaya_id',TRUE);
        $where['t_biaya_kebutuhan_detail.is_checked'] = 0;
        $where['m_kebutuhan.type'] = $this->input->get('tipe',TRUE);
        
        $select =   "t_biaya_kebutuhan_detail.*,
                     m_kebutuhan.type as tipe_kebutuhan,
                     m_kebutuhan.name as name,
                     m_kebutuhan.desc as desc
                     ";
        $join = [
                    [
                        'type'      => 'LEFT JOIN',
                        'table'     => 'm_kebutuhan',
                        'on'        => 'm_kebutuhan.id = t_biaya_kebutuhan_detail.kebutuhan_id'
                    ]
                ];
        $this->Pengeluaran_model->table = 't_biaya_kebutuhan_detail';
        $this->Pengeluaran_model->order_by = 'id';
        $data = $this->Pengeluaran_model->get_all($where,$select,$join);
        echo json_encode($data);
    }

    public function cetak()
    {
        $where['t_pengeluaran.id'] = $this->input->get('id', TRUE);
        
        $select = "
                    t_pengeluaran.*,
                    m_kebutuhan.name as kebutuhan_name,
                    m_kebutuhan.type as kebutuhan_type,
                    m_kebutuhan.desc as desc,
                    m_tahun_ajaran.name as tahun_name,
                    m_lembaga.name as lembaga_name";
        $join = [
            [
                'table'     => 't_pengeluaran_detail',
                'on'        => 't_pengeluaran_detail.pengeluaran_id = t_pengeluaran.id'
            ],
            [
                'table'     => 'm_tahun_ajaran',
                'on'        => 'm_tahun_ajaran.id = t_pengeluaran_detail.tahun_ajaran_id'
            ],
            [
                'table'     => 'm_lembaga',
                'on'        => 'm_lembaga.id = t_pengeluaran_detail.lembaga_id'
            ],
            [
                'table'     => 't_biaya_kebutuhan_detail',
                'on'        => 't_biaya_kebutuhan_detail.id = t_pengeluaran_detail.biaya_kebutuhan_detail_id'
            ],
            [
                'table'     => 'm_kebutuhan',
                'on'        => 'm_kebutuhan.id = t_biaya_kebutuhan_detail.kebutuhan_id'
            ]
        ];
        $pengeluaran = $this->Pengeluaran_model->get($where, $select, $join);
        $data['tahun_name'] = isset($pengeluaran->tahun_name) ? $pengeluaran->tahun_name : null;
        $data['lembaga_name'] = isset($pengeluaran->lembaga_name) ? $pengeluaran->lembaga_name : null;
        $data['approval_name'] = isset($pengeluaran->approval_name) ? $pengeluaran->approval_name : null;
        $data['receive_name'] = isset($pengeluaran->receive_name) ? $pengeluaran->receive_name : null;
        $data['code'] = isset($pengeluaran->code) ? $pengeluaran->code : null;
        $data['desc'] = isset($pengeluaran->desc) ? $pengeluaran->desc : null;
        $data['amount'] = isset($pengeluaran->amount) ? $pengeluaran->amount : null;
        $data['kebutuhan_name'] = isset($pengeluaran->kebutuhan_name) ? $pengeluaran->kebutuhan_name : null;
        $data['kebutuhan_type'] = isset($pengeluaran->kebutuhan_type) ? $pengeluaran->kebutuhan_type : null;
        $data['tanggal'] = isset($pengeluaran->created_at) ? date('d M Y H:i:s', strtotime($pengeluaran->created_at)) : null;
        $data['title'] = 'Lampiran Pengeluaran';

        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->filename = $data['title'];
        $this->pdf->load_view('v_transaksi/pengeluaran/cetak', $data);
    }
}