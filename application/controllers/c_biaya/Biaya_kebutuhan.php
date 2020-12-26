<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biaya_kebutuhan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_biaya/Biaya_kebutuhan_model');
        $this->load->library('pdf');
    }

	public function index()
	{
        $data['title'] = 'Biaya Kebutuhan';
        $data['isi'] = 'v_biaya/biaya_kebutuhan/index';
        $data['userdata'] = $this->userdata;
        $data['simpan'] = base_url('c_biaya/biaya_kebutuhan/simpan');
        $data['data'] = base_url('c_biaya/biaya_kebutuhan/data');
        $data['get'] = base_url('c_biaya/biaya_kebutuhan/get_data');
        $data['get_biaya_kebutuhan'] = base_url('c_biaya/biaya_kebutuhan/get_biaya_kebutuhan');
        $data['cetak'] = base_url('c_biaya/biaya_kebutuhan/cetak');
        $data['select_tahun_ajaran'] = base_url('c_biaya/biaya_kebutuhan/select_tahun_ajaran');
        $data['select_lembaga'] = base_url('c_biaya/biaya_kebutuhan/select_lembaga');
        $data['select_attribute'] = base_url('c_biaya/biaya_kebutuhan/select_attribute');
        $this->load->view('layout/wrapper', $data);
    }

    public function data()
    {
        $temp_data = [];
        $where = [];
        $no = $this->input->post('start');
        $list = $this->Biaya_kebutuhan_model->lists(
            '   
                t_biaya_kebutuhan.*, 
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
		$data['recordsTotal'] = $this->Biaya_kebutuhan_model->list_count($where, true);
		$data['recordsFiltered'] = $this->Biaya_kebutuhan_model->list_count($where, true);
        $data['data'] = $temp_data;
        echo json_encode($data);
    }

    public function get_data()
    {
        $where['t_biaya_kebutuhan.id'] = $this->input->get('id', TRUE);
        $select = "
            t_biaya_kebutuhan.*, 
            m_tahun_ajaran.id as tahun_ajaran_id,
            m_tahun_ajaran.name as tahun_ajaran_name,
            m_lembaga.id as lembaga_id,
            m_lembaga.name as lembaga_name,
        ";
        $join = [
            [
                'table'     => 'm_tahun_ajaran',
                'on'        => 'm_tahun_ajaran.id = t_biaya_kebutuhan.tahun_ajaran_id'
            ],
            [
                'table'     => 'm_lembaga',
                'on'        => 'm_lembaga.id = t_biaya_kebutuhan.lembaga_id'
            ]
        ];
        $data['biaya_kebutuhan'] = $this->Biaya_kebutuhan_model->get($where, $select, $join);

        if($data['biaya_kebutuhan']) {
            $row['tahun_ajaran_id'] = $data['biaya_kebutuhan']->tahun_ajaran_id;
            $row['tahun_ajaran_name'] = $data['biaya_kebutuhan']->tahun_ajaran_name;
            $row['lembaga_id'] = $data['biaya_kebutuhan']->lembaga_id;
            $row['lembaga_name'] = $data['biaya_kebutuhan']->lembaga_name;
            $row['id'] = $data['biaya_kebutuhan']->id;
            $row['biaya_kebutuhan_detail'] = $this->biaya_kebutuhan_detail($data['biaya_kebutuhan']->id);
        }
        $data['biaya_kebutuhan'] = (object)$row;
        
        echo json_encode($data);
    }

    public function biaya_kebutuhan_detail($biaya_kebutuhan_id)
    {
        $result =  $this->biaya_kebutuhan_type_true('t_biaya_kebutuhan_detail', $biaya_kebutuhan_id, 'm_kebutuhan', 'kebutuhan_id');
        return $result;
    }

    public function get_biaya_kebutuhan()
    {
        $where['tahun_ajaran_id'] = $this->input->get('tahun_ajaran_id', TRUE);
        $where['lembaga_id'] = $this->input->get('lembaga_id', TRUE);
        $select = "
            t_biaya_kebutuhan.*, 
            m_tahun_ajaran.id as tahun_ajaran_id,
            m_tahun_ajaran.name as tahun_ajaran_name,
            m_lembaga.id as lembaga_id,
            m_lembaga.name as lembaga_name,
        ";
        $join = [
            [
                'table'     => 'm_tahun_ajaran',
                'on'        => 'm_tahun_ajaran.id = t_biaya_kebutuhan.tahun_ajaran_id'
            ],
            [
                'table'     => 'm_lembaga',
                'on'        => 'm_lembaga.id = t_biaya_kebutuhan.lembaga_id'
            ]
        ];
        $biaya_kebutuhan = $this->Biaya_kebutuhan_model->get($where, $select, $join);
        $data['tahun_ajaran_name'] = isset($biaya_kebutuhan->tahun_ajaran_name) ? $biaya_kebutuhan->tahun_ajaran_name : null;
        $data['lembaga_name'] = isset($biaya_kebutuhan->lembaga_name) ? $biaya_kebutuhan->lembaga_name : null;
        if ($biaya_kebutuhan == null) {
            // jika belum ada
            $data['id'] = null;
            $data['is_isset'] = false;
            $data['biaya_kebutuhan'] = $this->biaya_kebutuhan_type_false('m_kebutuhan');
        }else {
            // jika sudah ada
            $data['id'] = $biaya_kebutuhan->id;
            $data['is_isset'] = true;
            $data['biaya_kebutuhan'] = $this->biaya_kebutuhan_type_true('t_biaya_kebutuhan_detail', $biaya_kebutuhan->id, 'm_kebutuhan', 'kebutuhan_id');
        }
        echo json_encode($data);
    }

    public function biaya_kebutuhan_type_false($table)
    {
        $this->Biaya_kebutuhan_model->table = $table;
        $this->Biaya_kebutuhan_model->order_by = $table.'.type';
        $this->Biaya_kebutuhan_model->order_type = 'ASC';
        $where = [];
        $select = $table.'.*';
        return $this->Biaya_kebutuhan_model->get_all($where, $select);
    }

    public function biaya_kebutuhan_type_true($table, $biaya_kebutuhan_id, $ref_table, $ref_id)
    {
        $this->Biaya_kebutuhan_model->table = $table;
        $this->Biaya_kebutuhan_model->order_by = $table.'.id';
        $where = [$table.".biaya_kebutuhan_id"=>$biaya_kebutuhan_id];        
        $select = $table.".*, ".$ref_table.".name as name ,".$ref_table.".desc,".$ref_table.".type";
        $join = [
            [
                'table'     => $ref_table,
                'on'        => $ref_table.'.id = '.$table.'.'.$ref_id
            ]
        ];
        return $this->Biaya_kebutuhan_model->get_all($where, $select, $join);
    }

    public function simpan()
    {
        $savedata['tahun_ajaran_id'] = $this->input->post('tahun_ajaran_id', TRUE);
        $savedata['lembaga_id'] = $this->input->post('lembaga_id', TRUE);

        $list_kebutuhan_temp = json_decode($this->input->post('list-kebutuhan-temp'));

        // echo json_encode($list_kebutuhan_temp);exit;
        
        $this->db->trans_begin();
        if($this->input->post('id')) { 
            // edit
            $biaya_kebutuhan_id = $this->input->post('id',TRUE);
            
            $savedata['tahun_ajaran_id'] = $this->input->post('tahun_ajaran_id_temp', TRUE);
            $savedata['lembaga_id'] = $this->input->post('lembaga_id_temp', TRUE);

            $this->Biaya_kebutuhan_model->update($savedata, ['id'=>$biaya_kebutuhan_id]);

            $this->update_detail($list_kebutuhan_temp, 't_biaya_kebutuhan_detail');
        } else { 
            //create
            $biaya_kebutuhan_id = $this->Biaya_kebutuhan_model->insert($savedata, true);
            if ($biaya_kebutuhan_id) {
                $this->store_detail($list_kebutuhan_temp, $biaya_kebutuhan_id, 'kebutuhan_id', 't_biaya_kebutuhan_detail');
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
        
        redirect(base_url('c_biaya/biaya_kebutuhan'), 'refresh');
    }


    public function update_detail($data, $table)
    {
        $savedata_detail = [];
        foreach ($data as $key => $dt) {
            $savedata_detail['amount'] = $dt->amount;
            $this->Biaya_kebutuhan_model->table = $table;
            $this->Biaya_kebutuhan_model->update($savedata_detail, ['id'=>$dt->id]);
        }
    }


    public function store_detail($data, $biaya_kebutuhan_id, $foreign_key, $table)
    {
        $savedata_detail = [];
        foreach ($data as $key => $dt) {
            $savedata_detail['biaya_kebutuhan_id'] = $biaya_kebutuhan_id;
            $savedata_detail[$foreign_key] = $dt->id;
            $savedata_detail['amount'] = $dt->amount;

            $this->Biaya_kebutuhan_model->table = $table;
            $this->Biaya_kebutuhan_model->insert($savedata_detail);
        }
    }

    public function cetak()
    {
        $where['t_biaya_kebutuhan.id'] = $this->input->get('id', TRUE);
        $select = "
            t_biaya_kebutuhan.*, 
            m_tahun_ajaran.id as tahun_ajaran_id,
            m_tahun_ajaran.name as tahun_ajaran_name,
            m_lembaga.id as lembaga_id,
            m_lembaga.name as lembaga_name,
        ";
        $join = [
            [
                'table'     => 'm_tahun_ajaran',
                'on'        => 'm_tahun_ajaran.id = t_biaya_kebutuhan.tahun_ajaran_id'
            ],
            [
                'table'     => 'm_lembaga',
                'on'        => 'm_lembaga.id = t_biaya_kebutuhan.lembaga_id'
            ]
        ];
        $result = $this->Biaya_kebutuhan_model->get($where, $select, $join);
        
        $data['tahun_ajaran_id'] = $result->tahun_ajaran_id;
        $data['tahun_ajaran_name'] = $result->tahun_ajaran_name;
        $data['lembaga_id'] = $result->lembaga_id;
        $data['lembaga_name'] = $result->lembaga_name;
        $data['id'] = $result->id;
        $data['biaya_kebutuhan_detail'] = $this->biaya_kebutuhan_detail($result->id);
        $data['title'] = 'Lampiran Biaya Kebutuhan '.$result->lembaga_name.' Tahun Ajaran '.$result->tahun_ajaran_name;
        // echo json_encode($data);exit;
        
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->filename = $data['title'];
        $this->pdf->load_view('v_biaya/biaya_kebutuhan/cetak', $data);
    }

    public function select_tahun_ajaran()
    {
        $q = $this->input->get('q');
        $where = [];
        $this->Biaya_kebutuhan_model->order_by = "id";
        $this->Biaya_kebutuhan_model->search_field = "name";
        $this->Biaya_kebutuhan_model->column_search = "name";
        $this->Biaya_kebutuhan_model->table = "m_tahun_ajaran";
        $data = $this->Biaya_kebutuhan_model->list_select($q, $where);
        echo json_encode($data);
    }


    public function select_lembaga()
    {
        $q = $this->input->get('q');
        $where = [];
        $this->Biaya_kebutuhan_model->order_by = "id";
        $this->Biaya_kebutuhan_model->search_field = "name";
        $this->Biaya_kebutuhan_model->column_search = "name";
        $this->Biaya_kebutuhan_model->table = "m_lembaga";
        $data = $this->Biaya_kebutuhan_model->list_select($q, $where);
        echo json_encode($data);
    }

    public function select_attribute()
    {
        $q = $this->input->get('q');
        $where = [];
        $this->Biaya_kebutuhan_model->order_by = "m_attribute.id";
        $this->Biaya_kebutuhan_model->search_field = "m_attribute.name";
        $this->Biaya_kebutuhan_model->table = "m_attribute";
        $select = "m_attribute.*, m_attribute_type.name as attribute_type_name";
        $data = $this->Biaya_kebutuhan_model->list_select($q, $where, $select, 10, 0, true);
        echo json_encode($data);
    }

}
