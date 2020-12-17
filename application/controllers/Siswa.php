<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
    }

    public function check_nis()
    {
        $tahun = $this->db->order_by('id', 'desc')->limit(1)->get('m_siswa')->row_array();
        if ($tahun) {
            $tahun = date('Y', strtotime($tahun['created_at']));
            if ($tahun != date('Y')) {
                $nis = 0;
            }else{
                $nis = count($this->db->get('m_siswa')->result_array());
            }
        }else{
            $nis = count($this->db->get('m_siswa')->result_array());
        }
        $result = 'S'.date('Ym').str_pad($nis + 1, 4, "0", STR_PAD_LEFT);
        echo json_encode($result);
    }

	public function index()
	{
        $data['title'] = 'Siswa';
        $data['isi'] = 'siswa/index';
        $data['nis'] = base_url('siswa/check_nis');
        $data['simpan'] = base_url('siswa/simpan');
        $data['data'] = base_url('siswa/data');
        $data['get'] = base_url('siswa/get_data');
        $data['hapus'] = base_url('siswa/hapus');
        $data['select_lembaga'] = base_url('siswa/select_lembaga');
        $this->load->view('layout/wrapper', $data);
    }

    public function data()
    {
        $temp_data = [];
        $where = [];
        $no = $this->input->post('start');
        $list = $this->Siswa_model->lists(
            'm_siswa.*, m_lembaga.name as lembaga_name',
            $where, 
            $this->input->post('length'), 
            $this->input->post('start')
        );
		if($list) {
			foreach ($list as $ls) {
				$no++;
				$row = array();
                $row['no'] = $no;
				$row['name'] = $ls['name'];
				$row['lembaga_id'] = $ls['lembaga_id'];
				$row['lembaga_name'] = $ls['lembaga_name'];
				$row['birthday'] = $ls['birthday'];
				$row['phone'] = $ls['phone'];
				$row['id'] = $ls['id'];
	
				$temp_data[] = (object)$row;
			}
		}
		
		$data['draw'] = $this->input->post('draw');
		$data['recordsTotal'] = $this->Siswa_model->list_count($where, true);
		$data['recordsFiltered'] = $this->Siswa_model->list_count($where, true);
        $data['data'] = $temp_data;
        echo json_encode($data);
    }

    public function get_data()
    {
        $where['m_siswa.id'] = $this->input->get('id', TRUE);
        $select = "m_siswa.*, m_lembaga.name as lembaga_name";
        $join = [
            [
                'table'     => 'm_lembaga',
                'on'        => 'm_lembaga.id = m_siswa.lembaga_id'
            ]
        ];
        $data['siswa'] = $this->Siswa_model->get($where, $select, $join);
        
        echo json_encode($data);
    }

    public function simpan()
    {
        $savedata['lembaga_id'] = $this->input->post('lembaga_id', TRUE);
        $savedata['name'] = $this->input->post('name', TRUE);
        $savedata['nis'] = $this->input->post('nis', TRUE);
        $savedata['birthday'] = $this->input->post('birthday', TRUE);
        $savedata['phone'] = $this->input->post('phone', TRUE);

        $this->db->trans_begin();
        if($this->input->post('id')) { 
            // edit
            $savedata['updated_at'] = date('Y-m-d H:i:s');
			$this->Siswa_model->update($savedata, array('id' => $this->input->post('id', TRUE)));
        } else { 
            //create
            $savedata['created_at'] = date('Y-m-d H:i:s');
            $this->Siswa_model->insert($savedata);
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
        
        redirect(base_url('Siswa'), 'refresh');
    }

    public function hapus()
    {
        $where['id'] = $this->input->get('id', TRUE);
        $this->db->trans_begin();
        $this->Siswa_model->delete($where);

        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $msg = array(
                'type' => 'error',
                'msg' => 'Data tidak terhapus.',
            );
        }else{
            $this->db->trans_commit();
            $msg = array(
                'type' => 'success',
                'msg' => 'Data berhasil terhapus.',
            );
        }
        echo json_encode($msg);
    }

    public function select_lembaga()
    {
        $q = $this->input->get('q');
        $where = [];
        $this->Siswa_model->order_by = "id";
        $this->Siswa_model->search_field = "name";
        $this->Siswa_model->column_search = "name";
        $this->Siswa_model->table = "m_lembaga";
        $data = $this->Siswa_model->list_select($q, $where);
        echo json_encode($data);
    }

}
