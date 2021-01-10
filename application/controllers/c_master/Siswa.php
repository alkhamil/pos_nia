<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_master/Siswa_model');
        $this->load->model('m_master/Siswa_riwayat_model');
    }

	public function index()
	{
        $data['title'] = 'Siswa';
        $data['isi'] = 'v_master/siswa/index';
        $data['userdata'] = $this->userdata;
        $data['nis'] = base_url('c_master/siswa/check_nis');
        $data['simpan'] = base_url('c_master/siswa/simpan');
        $data['data'] = base_url('c_master/siswa/data');
        $data['get'] = base_url('c_master/siswa/get_data');
        $data['hapus'] = base_url('c_master/siswa/hapus');
        $data['riwayat_pembayaran'] = base_url('c_master/siswa/riwayat_pembayaran');
        $data['select_lembaga'] = base_url('c_master/siswa/select_lembaga');
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
				$row['nis'] = $ls['nis'];
				$row['name'] = $ls['name'];
				$row['lembaga_id'] = $ls['lembaga_id'];
				$row['lembaga_name'] = $ls['lembaga_name'];
				$row['birthday'] = $ls['birthday'];
				$row['address'] = $ls['address'];
				$row['phone'] = $ls['phone'];
				$row['is_graduated'] = $ls['is_graduated'];
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
        $savedata['address'] = $this->input->post('address', TRUE);

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
        
        redirect(base_url('c_master/siswa'), 'refresh');
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

    public function get_siswa_name($id)
    {
        $where['id'] = $id;
        $select = "*";
        $this->Siswa_model->table = "m_siswa";
        $this->Siswa_model->order_by = "id";
        $siswa = $this->Siswa_model->get($where, $select);
        return $siswa->name;
    }

    public function riwayat_pembayaran()
    {
        $data['siswa_id'] = $this->input->get('id', TRUE);
        $data['title'] = 'Riwayat Pembayaran Siswa : '.$this->get_siswa_name($this->input->get('id', TRUE));
        $data['userdata'] = $this->userdata;
        $data['isi'] = 'v_master/siswa/riwayat_pembayaran';
        $data['data'] = base_url('c_master/siswa/data_riwayat_pembayaran');
        $data['riwayat_pembayaran_detail'] = base_url('c_master/siswa/riwayat_pembayaran_detail');
        $data['select_tahun_ajaran'] = base_url('c_master/siswa/select_tahun_ajaran');
        $data['select_lembaga'] = base_url('c_master/siswa/select_lembaga');
        $data['select_siswa'] = base_url('c_master/siswa/select_siswa');
        $data['select_kelas'] = base_url('c_master/siswa/select_kelas');
        $data['cetak'] = base_url('c_transaksi/pembayaran/cetak');
        $this->load->view('layout/wrapper', $data);   
        // echo json_encode($data);exit;
    }

    public function riwayat_pembayaran_detail()
    {
        $pembayaran_id = $this->input->get('pembayaran_id', TRUE);
        $result = $this->pembayaran_detail($pembayaran_id);
        echo json_encode($result);
    }

    public function data_riwayat_pembayaran()
    {
        $temp_data = [];
        $where = [];
        $where['t_pembayaran.siswa_id'] = $this->input->post('siswa_id', TRUE);
        if ($this->input->post('filter_tahun_ajaran_id', TRUE)) {
            $where['m_tahun_ajaran.id'] = $this->input->post('filter_tahun_ajaran_id', TRUE);
        }
        if ($this->input->post('filter_lembaga_id', TRUE)) {
            $where['m_lembaga.id'] = $this->input->post('filter_lembaga_id', TRUE);
        }
        if ($this->input->post('filter_kelas_id', TRUE)) {
            $where['m_kelas.id'] = $this->input->post('filter_kelas_id', TRUE);
        }
        
        $no = $this->input->post('start');
        $list = $this->Siswa_riwayat_model->lists(
            '
                t_pembayaran.*, 
                m_tahun_ajaran.name as tahun_ajaran_name,
                m_lembaga.name as lembaga_name,
                m_siswa.name as siswa_name,
                m_siswa.address as siswa_address,
                m_siswa.phone as siswa_phone,
                m_kelas.name as kelas_name,'
            ,
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
				$row['tahun_ajaran_name'] = $ls['tahun_ajaran_name'];
				$row['lembaga_name'] = $ls['lembaga_name'];
				$row['siswa_name'] = $ls['siswa_name'];
				$row['siswa_phone'] = $ls['siswa_phone'];
				$row['siswa_address'] = $ls['siswa_address'];
				$row['kelas_name'] = $ls['kelas_name'];
				$row['amount'] = $ls['amount'];
                $row['created_at'] = date('d-M-Y', strtotime($ls['created_at']));
                $row['pembayaran'] = $this->pembayaran_detail($ls['id']);
				$row['id'] = $ls['id'];
	
				$temp_data[] = (object)$row;
			}
		}
		
		$data['draw'] = $this->input->post('draw');
		$data['recordsTotal'] = $this->Siswa_riwayat_model->list_count($where, true);
		$data['recordsFiltered'] = $this->Siswa_riwayat_model->list_count($where, true);
        $data['data'] = $temp_data;
        echo json_encode($data);
    }

    public function pembayaran_detail($pembayaran_id)
    {
        $komite = $this->pembayaran_type_true('t_pembayaran_komite', $pembayaran_id, 't_biaya_lembaga_komite', 'biaya_lembaga_komite_id', 'm_attribute_komite', 'attribute_komite_id', true);
        $semester = $this->pembayaran_type_true('t_pembayaran_semester', $pembayaran_id, 't_biaya_lembaga_semester', 'biaya_lembaga_semester_id', 'm_attribute_semester', 'attribute_semester_id', true);
        $lainnya = $this->pembayaran_type_true('t_pembayaran_lainnya', $pembayaran_id, 't_biaya_lembaga_lainnya', 'biaya_lembaga_lainnya_id', 'm_attribute_lainnya', 'attribute_lainnya_id', true);

        $data['data'] = [];
        if (count($komite) > 0) {
            foreach ($komite as $key => $item) {
                $colom['attribute_name'] = $item['attribute_name'];
                $colom['attribute_type_name'] = $item['attribute_type_name'];
                $colom['amount'] = $item['amount'];
                array_push($data['data'], $colom);
            }
        }
        if (count($semester) > 0) {
            foreach ($semester as $key => $item) {
                $colom['attribute_name'] = $item['attribute_name'];
                $colom['attribute_type_name'] = $item['attribute_type_name'];
                $colom['amount'] = $item['amount'];
                array_push($data['data'], $colom);
            }
        }
        if (count($lainnya) > 0) {
            foreach ($lainnya as $key => $item) {
                $colom['attribute_name'] = $item['attribute_name'];
                $colom['attribute_type_name'] = $item['attribute_type_name'];
                $colom['amount'] = $item['amount'];
                array_push($data['data'], $colom);
            }
        }

        return $data;
    }

    public function pembayaran_type_true($table, $pembayaran_id, $ref_table_1, $ref_id_1, $ref_table_2, $ref_id_2, $cetak=false)
    {
        $this->Siswa_model->table = $table;
        $this->Siswa_model->order_by = $table.'.id';
        $this->Siswa_model->order_type = 'ASC';

        $where[$table.".pembayaran_id"] = $pembayaran_id;
        if ($cetak) {
            $where[$table.".is_checkout"] = 1;
        }
        $select = $table.".*, ".$ref_table_1.".amount, ".$ref_table_2.".name as attribute_name, m_attribute_type.name as attribute_type_name";
        $join = [
            [
                'table'     => $ref_table_1,
                'on'        => $ref_table_1.'.id = '.$table.'.'.$ref_id_1
            ],
            [
                'table'     => $ref_table_2,
                'on'        => $ref_table_2.'.id = '.$ref_table_1.'.'.$ref_id_2
            ],
            [
                'table'     => 'm_attribute_type',
                'on'        => 'm_attribute_type.id = '.$ref_table_2.'.attribute_type_id'
            ]
        ];
        return $this->Siswa_model->get_all($where, $select, $join);
    }

    public function select_tahun_ajaran()
    {
        $q = $this->input->get('q');
        $where = [];
        $this->Siswa_model->order_by = "id";
        $this->Siswa_model->order_type = "ASC";
        $this->Siswa_model->search_field = "name";
        $this->Siswa_model->column_search = "name";
        $this->Siswa_model->table = "m_tahun_ajaran";
        $data = $this->Siswa_model->list_select($q, $where);
        echo json_encode($data);
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


    public function select_siswa()
    {
        $q = $this->input->get('q');
        $where['lembaga_id'] = $this->input->get('id', TRUE);
        $this->Siswa_model->order_by = "id";
        $this->Siswa_model->order_type = "ASC";
        $this->Siswa_model->search_field = "name";
        $this->Siswa_model->column_search = "name";
        $this->Siswa_model->table = "m_siswa";
        $data = $this->Siswa_model->list_select($q, $where);
        echo json_encode($data);
    }

    public function select_kelas()
    {
        $q = $this->input->get('q');
        $where = [];
        if ($this->input->get('level', TRUE)) {
            $where['level'] = $this->input->get('level', TRUE);
        }
        $this->Siswa_model->order_by = "id";
        $this->Siswa_model->order_type = "ASC";
        $this->Siswa_model->search_field = "name";
        $this->Siswa_model->column_search = "name";
        $this->Siswa_model->table = "m_kelas";
        $data = $this->Siswa_model->list_select($q, $where);
        echo json_encode($data);
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

}
