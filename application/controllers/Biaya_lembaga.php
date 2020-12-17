<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biaya_lembaga extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Biaya_lembaga_model');
    }

	public function index()
	{
        $data['title'] = 'Biaya Lembaga';
        $data['isi'] = 'biaya_lembaga/index';
        $data['simpan'] = base_url('biaya_lembaga/simpan');
        $data['data'] = base_url('biaya_lembaga/data');
        $data['get'] = base_url('biaya_lembaga/get_data');
        $data['get_biaya_lembaga'] = base_url('biaya_lembaga/get_biaya_lembaga');
        $data['hapus'] = base_url('biaya_lembaga/hapus');
        $data['select_tahun_ajaran'] = base_url('biaya_lembaga/select_tahun_ajaran');
        $data['select_lembaga'] = base_url('biaya_lembaga/select_lembaga');
        $data['select_attribute'] = base_url('biaya_lembaga/select_attribute');
        $this->load->view('layout/wrapper', $data);
    }

    public function data()
    {
        $temp_data = [];
        $where = [];
        $no = $this->input->post('start');
        $list = $this->Biaya_lembaga_model->lists(
            '   
                t_biaya_lembaga.*, 
                m_tahun_ajaran.id as tahun_ajaran_id,
                m_tahun_ajaran.name as tahun_ajaran_name,
                m_lembaga.id as lembaga_id,
                m_lembaga.name as lembaga_name,
            ',
            $where, 
            $this->input->post('length'), 
            $this->input->post('start')
        );
		if($list) {
			foreach ($list as $ls) {
				$no++;
				$row = array();
                $row['no'] = $no;
				$row['tahun_ajaran_id'] = $ls['tahun_ajaran_id'];
				$row['tahun_ajaran_name'] = $ls['tahun_ajaran_name'];
				$row['lembaga_id'] = $ls['lembaga_id'];
				$row['lembaga_name'] = $ls['lembaga_name'];
				$row['id'] = $ls['id'];
	
				$temp_data[] = (object)$row;
			}
		}
		
		$data['draw'] = $this->input->post('draw');
		$data['recordsTotal'] = $this->Biaya_lembaga_model->list_count($where, true);
		$data['recordsFiltered'] = $this->Biaya_lembaga_model->list_count($where, true);
        $data['data'] = $temp_data;
        echo json_encode($data);
    }

    public function get_data()
    {
        $where['t_biaya_lembaga.id'] = $this->input->get('id', TRUE);
        $select = "
            t_biaya_lembaga.*, 
            m_tahun_ajaran.id as tahun_ajaran_id,
            m_tahun_ajaran.name as tahun_ajaran_name,
            m_lembaga.id as lembaga_id,
            m_lembaga.name as lembaga_name,
        ";
        $join = [
            [
                'table'     => 'm_tahun_ajaran',
                'on'        => 'm_tahun_ajaran.id = t_biaya_lembaga.tahun_ajaran_id'
            ],
            [
                'table'     => 'm_lembaga',
                'on'        => 'm_lembaga.id = t_biaya_lembaga.lembaga_id'
            ]
        ];
        $data['biaya_lembaga'] = $this->Biaya_lembaga_model->get($where, $select, $join);

        if($data['biaya_lembaga']) {
            $row['tahun_ajaran_id'] = $data['biaya_lembaga']->tahun_ajaran_id;
            $row['tahun_ajaran_name'] = $data['biaya_lembaga']->tahun_ajaran_name;
            $row['lembaga_id'] = $data['biaya_lembaga']->lembaga_id;
            $row['lembaga_name'] = $data['biaya_lembaga']->lembaga_name;
            $row['id'] = $data['biaya_lembaga']->id;
            $row['biaya_lembaga_detail'] = $this->biaya_lembaga_detail($data['biaya_lembaga']->id);
        }
        $data['biaya_lembaga'] = (object)$row;
        
        echo json_encode($data);
    }

    public function biaya_lembaga_detail($biaya_lembaga_id)
    {
        $this->db->select("
            t_biaya_lembaga_detail.*,
            m_attribute.name as name,
            m_attribute_type.name as attribute_type_name,
            ")->where(['t_biaya_lembaga_detail.biaya_lembaga_id'=>$biaya_lembaga_id])
            ->join('m_attribute', 'm_attribute.id = t_biaya_lembaga_detail.attribute_id')
            ->join('m_attribute_type', 'm_attribute_type.id = m_attribute.attribute_type_id');
          
        $list = $this->db->get('t_biaya_lembaga_detail');
        return $list->result_array();
    }

    public function get_biaya_lembaga()
    {
        $where['tahun_ajaran_id'] = $this->input->get('tahun_ajaran_id', TRUE);
        $where['lembaga_id'] = $this->input->get('lembaga_id', TRUE);
        $select = "
            t_biaya_lembaga.*, 
            m_tahun_ajaran.id as tahun_ajaran_id,
            m_tahun_ajaran.name as tahun_ajaran_name,
            m_lembaga.id as lembaga_id,
            m_lembaga.name as lembaga_name,
        ";
        $join = [
            [
                'table'     => 'm_tahun_ajaran',
                'on'        => 'm_tahun_ajaran.id = t_biaya_lembaga.tahun_ajaran_id'
            ],
            [
                'table'     => 'm_lembaga',
                'on'        => 'm_lembaga.id = t_biaya_lembaga.lembaga_id'
            ]
        ];
        $biaya_lembaga = $this->Biaya_lembaga_model->get($where, $select, $join);
        $data['tahun_ajaran_name'] = isset($biaya_lembaga->tahun_ajaran_name) ? $biaya_lembaga->tahun_ajaran_name : null;
        $data['lembaga_name'] = isset($biaya_lembaga->lembaga_name) ? $biaya_lembaga->lembaga_name : null;
        if ($biaya_lembaga == null) {
            // jika belum ada
            $this->Biaya_lembaga_model->table = 'm_attribute';
            $this->Biaya_lembaga_model->order_by = 'm_attribute.id';
            $where = [];
            $select = "m_attribute.*, m_attribute_type.name as attribute_type_name";
            $join = [
                [
                    'table'     => 'm_attribute_type',
                    'on'        => 'm_attribute_type.id = m_attribute.attribute_type_id'
                ]
            ];
            $data['id'] = null;
            $data['is_isset'] = false;
            $data['biaya_lembaga'] = $this->Biaya_lembaga_model->get_all($where, $select, $join);;
        }else {
            // jika sudah ada
            $this->Biaya_lembaga_model->table = 't_biaya_lembaga_detail';
            $this->Biaya_lembaga_model->order_by = 't_biaya_lembaga_detail.id';
            $where = ['t_biaya_lembaga_detail.biaya_lembaga_id'=>$biaya_lembaga->id];

            $select = "t_biaya_lembaga_detail.*, m_attribute.name as name, m_attribute_type.name as attribute_type_name";
            $join = [
                [
                    'table'     => 'm_attribute',
                    'on'        => 'm_attribute.id = t_biaya_lembaga_detail.attribute_id'
                ],
                [
                    'table'     => 'm_attribute_type',
                    'on'        => 'm_attribute_type.id = m_attribute.attribute_type_id'
                ]
            ];
            $data['id'] = $biaya_lembaga->id;
            $data['is_isset'] = true;
            $data['biaya_lembaga'] = $this->Biaya_lembaga_model->get_all($where, $select, $join);
        }
        echo json_encode($data);
    }

    public function simpan()
    {
        $savedata['tahun_ajaran_id'] = $this->input->post('tahun_ajaran_id', TRUE);
        $savedata['lembaga_id'] = $this->input->post('lembaga_id', TRUE);

        $this->db->trans_begin();
        if($this->input->post('id')) { 
            // edit
            $savedata['tahun_ajaran_id'] = $this->input->post('tahun_ajaran_id_temp', TRUE);
            $savedata['lembaga_id'] = $this->input->post('lembaga_id_temp', TRUE);
			$this->Biaya_lembaga_model->update($savedata, array('id' => $this->input->post('id', TRUE)));
        } else { 
            //create
            $list_attribute_temp = json_decode($this->input->post('list-attribute-temp'));
            $biaya_lembaga_id = $this->Biaya_lembaga_model->insert($savedata, true);
            if ($biaya_lembaga_id) {
                $savedata_detail = [];
                foreach ($list_attribute_temp as $key => $lat) {
                    $savedata_detail['biaya_lembaga_id'] = $biaya_lembaga_id;
                    $savedata_detail['attribute_id'] = $lat->id;
                    $savedata_detail['amount'] = $lat->amount;

                    $this->Biaya_lembaga_model->table = 't_biaya_lembaga_detail';
                    $this->Biaya_lembaga_model->insert($savedata_detail);
                }
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
        
        redirect(base_url('biaya_lembaga'), 'refresh');
    }

    public function hapus()
    {
        $where['id'] = $this->input->get('id', TRUE);
        $this->db->trans_begin();
        $this->Biaya_lembaga_model->delete($where);

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

    public function select_tahun_ajaran()
    {
        $q = $this->input->get('q');
        $where = [];
        $this->Biaya_lembaga_model->order_by = "id";
        $this->Biaya_lembaga_model->search_field = "name";
        $this->Biaya_lembaga_model->column_search = "name";
        $this->Biaya_lembaga_model->table = "m_tahun_ajaran";
        $data = $this->Biaya_lembaga_model->list_select($q, $where);
        echo json_encode($data);
    }


    public function select_lembaga()
    {
        $q = $this->input->get('q');
        $where = [];
        $this->Biaya_lembaga_model->order_by = "id";
        $this->Biaya_lembaga_model->search_field = "name";
        $this->Biaya_lembaga_model->column_search = "name";
        $this->Biaya_lembaga_model->table = "m_lembaga";
        $data = $this->Biaya_lembaga_model->list_select($q, $where);
        echo json_encode($data);
    }

    public function select_attribute()
    {
        $q = $this->input->get('q');
        $where = [];
        $this->Biaya_lembaga_model->order_by = "m_attribute.id";
        $this->Biaya_lembaga_model->search_field = "m_attribute.name";
        $this->Biaya_lembaga_model->table = "m_attribute";
        $select = "m_attribute.*, m_attribute_type.name as attribute_type_name";
        $data = $this->Biaya_lembaga_model->list_select($q, $where, $select, 10, 0, true);
        echo json_encode($data);
    }

}
