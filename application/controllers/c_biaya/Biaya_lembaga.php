<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biaya_lembaga extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_biaya/Biaya_lembaga_model');
        $this->load->library('pdf');
    }

	public function index()
	{
        $data['title'] = 'Biaya Lembaga';
        $data['isi'] = 'v_biaya/biaya_lembaga/index';
        $data['userdata'] = $this->userdata;
        $data['simpan'] = base_url('c_biaya/biaya_lembaga/simpan');
        $data['data'] = base_url('c_biaya/biaya_lembaga/data');
        $data['get'] = base_url('c_biaya/biaya_lembaga/get_data');
        $data['get_biaya_lembaga'] = base_url('c_biaya/biaya_lembaga/get_biaya_lembaga');
        $data['cetak'] = base_url('c_biaya/biaya_lembaga/cetak');
        $data['select_tahun_ajaran'] = base_url('c_biaya/biaya_lembaga/select_tahun_ajaran');
        $data['select_lembaga'] = base_url('c_biaya/biaya_lembaga/select_lembaga');
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
        $result['komite'] = $this->biaya_lembaga_type_true('t_biaya_lembaga_komite', $biaya_lembaga_id, 'm_attribute_komite', 'attribute_komite_id');
        $result['semester'] = $this->biaya_lembaga_type_true('t_biaya_lembaga_semester', $biaya_lembaga_id, 'm_attribute_semester', 'attribute_semester_id');
        $result['lainnya'] = $this->biaya_lembaga_type_true('t_biaya_lembaga_lainnya', $biaya_lembaga_id, 'm_attribute_lainnya', 'attribute_lainnya_id');
        return $result;
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
            $data['id'] = null;
            $data['is_isset'] = false;
            $data['biaya_lembaga']['komite'] = $this->biaya_lembaga_type_false('m_attribute_komite');
            $data['biaya_lembaga']['semester'] = $this->biaya_lembaga_type_false('m_attribute_semester');
            $data['biaya_lembaga']['lainnya'] = $this->biaya_lembaga_type_false('m_attribute_lainnya');
        }else {
            // jika sudah ada
            
            $data['id'] = $biaya_lembaga->id;
            $data['is_isset'] = true;
            $data['biaya_lembaga']['komite'] = $this->biaya_lembaga_type_true('t_biaya_lembaga_komite', $biaya_lembaga->id, 'm_attribute_komite', 'attribute_komite_id');
            $data['biaya_lembaga']['semester'] = $this->biaya_lembaga_type_true('t_biaya_lembaga_semester', $biaya_lembaga->id, 'm_attribute_semester', 'attribute_semester_id');
            $data['biaya_lembaga']['lainnya'] = $this->biaya_lembaga_type_true('t_biaya_lembaga_lainnya', $biaya_lembaga->id, 'm_attribute_lainnya', 'attribute_lainnya_id');
        }
        echo json_encode($data);
    }

    public function biaya_lembaga_type_false($table)
    {
        $this->Biaya_lembaga_model->table = $table;
        $this->Biaya_lembaga_model->order_by = $table.'.id';
        $where = [];
        $select = $table.'.*, m_attribute_type.name as attribute_type_name';
        $join = [
            [
                'table'     => 'm_attribute_type',
                'on'        => 'm_attribute_type.id = '.$table.'.attribute_type_id'
            ]
        ];
        return $this->Biaya_lembaga_model->get_all($where, $select, $join);
    }

    public function biaya_lembaga_type_true($table, $biaya_lembaga_id, $ref_table, $ref_id)
    {
        $this->Biaya_lembaga_model->table = $table;
        $this->Biaya_lembaga_model->order_by = $table.'.id';
        $where = [$table.".biaya_lembaga_id"=>$biaya_lembaga_id];        
        $select = $table.".*, ".$ref_table.".name as name, m_attribute_type.name as attribute_type_name";
        $join = [
            [
                'table'     => $ref_table,
                'on'        => $ref_table.'.id = '.$table.'.'.$ref_id
            ],
            [
                'table'     => 'm_attribute_type',
                'on'        => 'm_attribute_type.id = '.$ref_table.'.attribute_type_id'
            ]
        ];
        return $this->Biaya_lembaga_model->get_all($where, $select, $join);
    }

    public function simpan()
    {
        $savedata['tahun_ajaran_id'] = $this->input->post('tahun_ajaran_id', TRUE);
        $savedata['lembaga_id'] = $this->input->post('lembaga_id', TRUE);

        $list_attribute_temp = json_decode($this->input->post('list-attribute-temp'));

        // echo json_encode($list_attribute_temp->komite);exit;
        
        $this->db->trans_begin();
        if($this->input->post('id')) { 
            // edit
            $biaya_lembaga_id = $this->input->post('id',TRUE);
            
            $savedata['tahun_ajaran_id'] = $this->input->post('tahun_ajaran_id_temp', TRUE);
            $savedata['lembaga_id'] = $this->input->post('lembaga_id_temp', TRUE);
            $this->Biaya_lembaga_model->update($savedata, ['id'=>$biaya_lembaga_id]);

            $this->update_detail($list_attribute_temp->komite, 't_biaya_lembaga_komite');
            $this->update_detail($list_attribute_temp->semester, 't_biaya_lembaga_semester');
            $this->update_detail($list_attribute_temp->lainnya, 't_biaya_lembaga_lainnya');
            
        } else { 
            //create
            $biaya_lembaga_id = $this->Biaya_lembaga_model->insert($savedata, true);
            if ($biaya_lembaga_id) {
                $this->store_detail($list_attribute_temp->komite, $biaya_lembaga_id, 'attribute_komite_id', 't_biaya_lembaga_komite');
                $this->store_detail($list_attribute_temp->semester, $biaya_lembaga_id, 'attribute_semester_id', 't_biaya_lembaga_semester');
                $this->store_detail($list_attribute_temp->lainnya, $biaya_lembaga_id, 'attribute_lainnya_id', 't_biaya_lembaga_lainnya');
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
        
        redirect(base_url('c_biaya/biaya_lembaga'), 'refresh');
    }


    public function update_detail($data, $table)
    {
        $savedata_detail = [];
        foreach ($data as $key => $dt) {
            $savedata_detail['amount'] = $dt->amount;
            $savedata_detail['is_checked'] = $dt->is_checked;
            $this->Biaya_lembaga_model->table = $table;
            $this->Biaya_lembaga_model->update($savedata_detail, ['id'=>$dt->id]);
        }
    }


    public function store_detail($data, $biaya_lembaga_id, $foreign_key, $table)
    {
        $savedata_detail = [];
        foreach ($data as $key => $dt) {
            $savedata_detail['biaya_lembaga_id'] = $biaya_lembaga_id;
            $savedata_detail[$foreign_key] = $dt->id;
            $savedata_detail['amount'] = $dt->amount;
            $savedata_detail['is_checked'] = (isset($dt->is_checked)) ? $dt->is_checked : 0;

            $this->Biaya_lembaga_model->table = $table;
            $this->Biaya_lembaga_model->insert($savedata_detail);
        }
    }

    public function cetak()
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
        $result = $this->Biaya_lembaga_model->get($where, $select, $join);

        $data['tahun_ajaran_id'] = $result->tahun_ajaran_id;
        $data['tahun_ajaran_name'] = $result->tahun_ajaran_name;
        $data['lembaga_id'] = $result->lembaga_id;
        $data['lembaga_name'] = $result->lembaga_name;
        $data['id'] = $result->id;
        $data['biaya_lembaga_detail'] = $this->biaya_lembaga_detail($result->id);
        $data['title'] = 'Lampiran Biaya Lembaga '.$result->lembaga_name. ' Tahun Ajaran '.$result->tahun_ajaran_name;

        // echo json_encode($data);exit;
        
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->filename = $data['title'];
        $this->pdf->load_view('v_biaya/biaya_lembaga/cetak', $data);
    }

    public function select_tahun_ajaran()
    {
        $q = $this->input->get('q');
        $where = [];
        $this->Biaya_lembaga_model->order_by = "id";
        $this->Biaya_lembaga_model->order_type = "ASC";
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
        $this->Biaya_lembaga_model->order_type = "ASC";
        $this->Biaya_lembaga_model->search_field = "name";
        $this->Biaya_lembaga_model->column_search = "name";
        $this->Biaya_lembaga_model->table = "m_lembaga";
        $data = $this->Biaya_lembaga_model->list_select($q, $where);
        echo json_encode($data);
    }

}
