<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi/Riwayat_model');
    }

	public function index()
	{
        $data['title'] = 'Riwayat';
        $data['isi'] = 'v_transaksi/riwayat/index';
        $data['userdata'] = $this->userdata;
        $data['data'] = base_url('c_transaksi/riwayat/data');
        $data['get'] = base_url('c_transaksi/riwayat/get_data');
        $data['riwayat_pembayaran_detail'] = base_url('c_transaksi/riwayat/riwayat_pembayaran_detail');
        $data['select_tahun_ajaran'] = base_url('c_transaksi/riwayat/select_tahun_ajaran');
        $data['select_lembaga'] = base_url('c_transaksi/riwayat/select_lembaga');
        $data['select_siswa'] = base_url('c_transaksi/riwayat/select_siswa');
        $data['select_kelas'] = base_url('c_transaksi/riwayat/select_kelas');
        $data['cetak'] = base_url('c_transaksi/pembayaran/cetak');
        $data['cetak_semua'] = base_url('c_transaksi/riwayat/cetak_semua');
        $this->load->view('layout/wrapper', $data);
    }

    public function data()
    {
        $temp_data = [];
        $where = [];
        if ($this->input->post('filter_siswa_id', TRUE)) {
            $where['m_siswa.id'] = $this->input->post('filter_siswa_id', TRUE);
        }
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
        $list = $this->Riwayat_model->lists(
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
		$data['recordsTotal'] = $this->Riwayat_model->list_count($where, true);
		$data['recordsFiltered'] = $this->Riwayat_model->list_count($where, true);
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
        $this->Riwayat_model->table = "t_pembayaran";
        return $data;
    }

    public function pembayaran_type_true($table, $pembayaran_id, $ref_table_1, $ref_id_1, $ref_table_2, $ref_id_2, $cetak=false)
    {
        $this->Riwayat_model->table = $table;
        $this->Riwayat_model->order_by = $table.'.id';
        $this->Riwayat_model->order_type = 'ASC';

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
        return $this->Riwayat_model->get_all($where, $select, $join);
    }

    public function riwayat_pembayaran_detail()
    {
        $pembayaran_id = $this->input->get('pembayaran_id', TRUE);
        $result = $this->pembayaran_detail($pembayaran_id);
        echo json_encode($result);
    }

    public function select_tahun_ajaran()
    {
        $q = $this->input->get('q');
        $where = [];
        $this->Riwayat_model->order_by = "id";
        $this->Riwayat_model->order_type = "ASC";
        $this->Riwayat_model->search_field = "name";
        $this->Riwayat_model->column_search = "name";
        $this->Riwayat_model->table = "m_tahun_ajaran";
        $data = $this->Riwayat_model->list_select($q, $where);
        echo json_encode($data);
    }

    public function select_lembaga()
    {
        $q = $this->input->get('q');
        $where = [];
        $this->Riwayat_model->order_by = "id";
        $this->Riwayat_model->search_field = "name";
        $this->Riwayat_model->column_search = "name";
        $this->Riwayat_model->table = "m_lembaga";
        $data = $this->Riwayat_model->list_select($q, $where);
        echo json_encode($data);
    }


    public function select_siswa()
    {
        $q = $this->input->get('q');
        $where = [];
        if ($this->input->get('id', TRUE)) {
            $where['lembaga_id'] = $this->input->get('id', TRUE);
        }
        $this->Riwayat_model->order_by = "id";
        $this->Riwayat_model->order_type = "ASC";
        $this->Riwayat_model->search_field = "name";
        $this->Riwayat_model->column_search = "name";
        $this->Riwayat_model->table = "m_siswa";
        $data = $this->Riwayat_model->list_select($q, $where);
        echo json_encode($data);
    }

    public function select_kelas()
    {
        $q = $this->input->get('q');
        $where = [];
        if ($this->input->get('level', TRUE)) {
            $where['level'] = $this->input->get('level', TRUE);
        }
        $this->Riwayat_model->order_by = "id";
        $this->Riwayat_model->order_type = "ASC";
        $this->Riwayat_model->search_field = "name";
        $this->Riwayat_model->column_search = "name";
        $this->Riwayat_model->table = "m_kelas";
        $data = $this->Riwayat_model->list_select($q, $where);
        echo json_encode($data);
    }

    public function get_name($table, $id)
    {
        $this->Riwayat_model->table = $table;   
        $this->Riwayat_model->order_by = 'id';   
        $where['id'] = $id;
        $row = $this->Riwayat_model->get($where);
        return $row->name;  
    }

    public function cetak_semua()
    {
        $where = [];
        $data['tahun_ajaran_name'] = null;
        if ($this->input->get('filter_tahun_ajaran_id', TRUE)) {
            $where['m_tahun_ajaran.id'] = $this->input->get('filter_tahun_ajaran_id', TRUE);
            $data['tahun_ajaran_name'] = $this->get_name('m_tahun_ajaran', $this->input->get('filter_tahun_ajaran_id', TRUE));
        }
        $data['tahun_lembaga'] = null;
        if ($this->input->get('filter_lemabaga_id', TRUE)) {
            $where['m_lemabaga.id'] = $this->input->get('filter_lemabaga_id', TRUE);
            $data['lembaga_name'] = $this->get_name('m_lembaga', $this->input->get('filter_lembaga_id', TRUE));
        }
        $data['siswa_name'] = null;
        if ($this->input->get('filter_siswa_id', TRUE)) {
            $where['m_siswa.id'] = $this->input->get('filter_siswa_id', TRUE);
            $data['siswa_name'] = $this->get_name('m_siswa', $this->input->get('filter_siswa_id', TRUE));
        }
        $data['kelas_name'] = null;
        if ($this->input->get('filter_kelas_id', TRUE)) {
            $where['m_kelas.id'] = $this->input->get('filter_kelas_id', TRUE);
            $data['kelas_name'] = $this->get_name('m_kelas', $this->input->get('filter_kelas_id', TRUE));
        }
        $this->Riwayat_model->table = "t_pembayaran";   
        $this->Riwayat_model->order_by = "t_pembayaran.id";   
        $select = "
            t_pembayaran.*, 
            m_tahun_ajaran.name as tahun_ajaran_name,
            m_lembaga.name as lembaga_name,
            m_siswa.name as siswa_name,
            m_siswa.address as siswa_address,
            m_siswa.phone as siswa_phone,
            m_kelas.name as kelas_name
        ";
        $join = [
            [
                'table'     => 'm_tahun_ajaran',
                'on'        => 'm_tahun_ajaran.id = t_pembayaran.tahun_ajaran_id'
            ],
            [
                'table'     => 'm_lembaga',
                'on'        => 'm_lembaga.id = t_pembayaran.lembaga_id'
            ],
            [
                'table'     => 'm_siswa',
                'on'        => 'm_siswa.id = t_pembayaran.siswa_id'
            ],
            [
                'table'     => 'm_kelas',
                'on'        => 'm_kelas.id = t_pembayaran.kelas_id'
            ],
        ];
        $list = $this->Riwayat_model->get_all($where, $select, $join);
        $data['data'] = $list;
        $data['title'] = 'Lampiran Pembayaran';

        // echo json_encode($data);exit;

        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->filename = $data['title'];
        $this->pdf->load_view('v_transaksi/riwayat/cetak', $data);
        
        echo json_encode($data);
    }
}