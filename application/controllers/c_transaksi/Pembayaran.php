<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi/Pembayaran_model');
    }

	public function index()
	{
        $data['title'] = 'Pembayaran';
        $data['isi'] = 'v_transaksi/pembayaran/index';
        $data['userdata'] = $this->userdata;
        $data['simpan'] = base_url('c_transaksi/pembayaran/simpan');
        $data['data'] = base_url('c_transaksi/pembayaran/data');
        $data['get'] = base_url('c_transaksi/pembayaran/get_data');
        $data['get_tahun_ajaran'] = base_url('c_transaksi/pembayaran/get_tahun_ajaran');
        $data['get_pembayaran_siswa'] = base_url('c_transaksi/pembayaran/get_pembayaran_siswa');
        $data['cetak'] = base_url('c_transaksi/pembayaran/cetak');
        $data['select_lembaga'] = base_url('c_transaksi/pembayaran/select_lembaga');
        $data['select_siswa'] = base_url('c_transaksi/pembayaran/select_siswa');
        $data['select_kelas'] = base_url('c_transaksi/pembayaran/select_kelas');
        $this->load->view('layout/wrapper', $data);
    }

    public function data()
    {
        $temp_data = [];
        $where = [];
        $no = $this->input->post('start');
        $list = $this->Pembayaran_model->lists(
            '
                t_pembayaran.*, 
                m_tahun_ajaran.name as tahun_ajaran_name,
                m_lembaga.name as lembaga_name,
                m_siswa.nis as siswa_nis,
                m_siswa.name as siswa_name,
                m_kelas.name as kelas_name,
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
				$row['code'] = $ls['code'];
				$row['tahun_ajaran_name'] = $ls['tahun_ajaran_name'];
				$row['lembaga_name'] = $ls['lembaga_name'];
				$row['siswa_nis'] = $ls['siswa_nis'];
				$row['siswa_name'] = $ls['siswa_name'];
				$row['amount'] = $ls['amount'];
				$row['kelas_name'] = $ls['kelas_name'];
				$row['created_at'] = date('d-M-Y H:i:s', strtotime($ls['created_at']));
				$row['id'] = $ls['id'];
				$temp_data[] = (object)$row;
			}
		}
		
		$data['draw'] = $this->input->post('draw');
		$data['recordsTotal'] = $this->Pembayaran_model->list_count($where, true);
		$data['recordsFiltered'] = $this->Pembayaran_model->list_count($where, true);
        $data['data'] = $temp_data;
        echo json_encode($data);
    }

    public function get_data()
    {
        $where['t_pembayaran.id'] = $this->input->get('id', TRUE);
        $select = "t_pembayaran.*";
        $data['pembayaran'] = $this->Pembayaran_model->get($where, $select);
        
        echo json_encode($data);
    }

    public function get_pembayaran_siswa()
    {
        $where['t_pembayaran.tahun_ajaran_id'] = $this->input->get('tahun_ajaran_id', TRUE);
        $where['t_pembayaran.lembaga_id'] = $this->input->get('lembaga_id', TRUE);
        $where['t_pembayaran.siswa_id'] = $this->input->get('siswa_id', TRUE);
        $where['t_pembayaran.kelas_id'] = $this->input->get('kelas_id', TRUE);
        
        $select = "
            t_pembayaran.*, 
            m_tahun_ajaran.name as tahun_ajaran_name,
            m_lembaga.name as lembaga_name,
            m_siswa.name as siswa_name,
            m_kelas.name as kelas_name,
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
            ]
        ];
        $pembayaran = $this->Pembayaran_model->get($where, $select, $join);
        $data['tahun_ajaran_name'] = isset($pembayaran->tahun_ajaran_name) ? $pembayaran->tahun_ajaran_name : null;
        $data['lembaga_name'] = isset($pembayaran->lembaga_name) ? $pembayaran->lembaga_name : null;
        $data['siswa_name'] = isset($pembayaran->siswa_name) ? $pembayaran->siswa_name : null;
        $data['kelas_name'] = isset($pembayaran->kelas_name) ? $pembayaran->kelas_name : null;
        $data['code'] = isset($pembayaran->code) ? $pembayaran->code : null;
        $data['tanggal'] = isset($pembayaran->created_at) ? date('d-M-Y', strtotime($pembayaran->created_at)) : null;

        $where_['t_biaya_lembaga.tahun_ajaran_id'] = $this->input->get('tahun_ajaran_id', TRUE);
        $where_['t_biaya_lembaga.lembaga_id'] = $this->input->get('lembaga_id', TRUE);
        $select_ = "
            t_biaya_lembaga.*, 
            m_tahun_ajaran.name as tahun_ajaran_name,
            m_lembaga.name as lembaga_name,
        ";
        $join_ = [
            [
                'table'     => 'm_tahun_ajaran',
                'on'        => 'm_tahun_ajaran.id = t_biaya_lembaga.tahun_ajaran_id'
            ],
            [
                'table'     => 'm_lembaga',
                'on'        => 'm_lembaga.id = t_biaya_lembaga.lembaga_id'
            ]
        ];
        $this->Pembayaran_model->table = "t_biaya_lembaga";
        $this->Pembayaran_model->order_by = "t_biaya_lembaga.id";
        $biaya_lembaga = $this->Pembayaran_model->get($where_, $select_, $join_);
        

        if ($pembayaran == null) {
            // jika belum ada
            $data['id'] = null;
            $data['is_isset'] = false;
            $data['pembayaran']['komite'] = $this->pembayaran_type_false('t_biaya_lembaga_komite', $biaya_lembaga->id, 'm_attribute_komite', 'attribute_komite_id');
            $data['pembayaran']['semester'] = $this->pembayaran_type_false('t_biaya_lembaga_semester', $biaya_lembaga->id, 'm_attribute_semester', 'attribute_semester_id');
            $data['pembayaran']['lainnya'] = $this->pembayaran_type_false('t_biaya_lembaga_lainnya', $biaya_lembaga->id, 'm_attribute_lainnya', 'attribute_lainnya_id');
        }else {
            // jika sudah ada
            $data['id'] = $pembayaran->id;
            $data['is_isset'] = true;
            $data['pembayaran']['komite'] = $this->pembayaran_type_true('t_pembayaran_komite', $pembayaran->id, 't_biaya_lembaga_komite', 'biaya_lembaga_komite_id', 'm_attribute_komite', 'attribute_komite_id');
            $data['pembayaran']['semester'] = $this->pembayaran_type_true('t_pembayaran_semester', $pembayaran->id, 't_biaya_lembaga_semester', 'biaya_lembaga_semester_id', 'm_attribute_semester', 'attribute_semester_id');
            $data['pembayaran']['lainnya'] = $this->pembayaran_type_true('t_pembayaran_lainnya', $pembayaran->id, 't_biaya_lembaga_lainnya', 'biaya_lembaga_lainnya_id', 'm_attribute_lainnya', 'attribute_lainnya_id');
            
        }
        echo json_encode($data);
    }

    public function pembayaran_type_false($table, $biaya_lembaga_id, $ref_table, $ref_id)
    {
        $this->Pembayaran_model->table = $table;
        $this->Pembayaran_model->order_by = $table.'.id';
        $this->Pembayaran_model->order_type = 'DESC';
        $where[$table.'.biaya_lembaga_id'] = $biaya_lembaga_id;
        $where[$table.'.is_checked'] = 1;
        $select = $table.'.*,'.$ref_table.'.name as attribute_name';
        $join = [
            [
                'table'     => $ref_table,
                'on'        => $ref_table.'.id = '.$table.'.'.$ref_id
            ],
        ];
        return $this->Pembayaran_model->get_all($where, $select, $join);
    }

    public function pembayaran_type_true($table, $pembayaran_id, $ref_table_1, $ref_id_1, $ref_table_2, $ref_id_2, $cetak=false)
    {
        $this->Pembayaran_model->table = $table;
        $this->Pembayaran_model->order_by = $table.'.id';
        $this->Pembayaran_model->order_type = 'ASC';

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
        return $this->Pembayaran_model->get_all($where, $select, $join);
    }

    public function get_tahun_ajaran()
    {
        $where['is_active'] = 1;
        $select = "*";
        $this->Pembayaran_model->table = "m_tahun_ajaran";
        $this->Pembayaran_model->order_by = "id";
        $tahun_ajaran = $this->Pembayaran_model->get($where, $select);
        echo json_encode($tahun_ajaran->id);
    }

    public function get_lembaga($id)
    {
        $where['id'] = $id;
        $select = "*";
        $this->Pembayaran_model->table = "m_lembaga";
        $this->Pembayaran_model->order_by = "id";
        $lembaga = $this->Pembayaran_model->get($where, $select);
        $this->Pembayaran_model->table = "t_pembayaran";
        return $lembaga->name;
    }

    public function simpan()
    {
        $savedata['tahun_ajaran_id'] = $this->input->post('tahun_ajaran_id', TRUE);
        $savedata['lembaga_id'] = $this->input->post('lembaga_id', TRUE);
        $savedata['siswa_id'] = $this->input->post('siswa_id', TRUE);
        $savedata['kelas_id'] = $this->input->post('kelas_id', TRUE);
        $savedata['code'] = $this->check_code($this->get_lembaga($savedata['lembaga_id']));

        $list_checkout = json_decode($this->input->post('list-checkout-temp', TRUE));
        $list_pembayaran = json_decode($this->input->post('list-pembayaran-temp', TRUE));

        $savedata['amount'] = $this->kalkulasi_pembayaran($list_checkout);

        $savedata['created_at'] = date('Y-m-d H:i:s');
        $savedata['created_by'] = $this->userdata->id;

        $this->db->trans_begin();
        if($this->input->post('id')) { 
            // edit
			$this->Pembayaran_model->update($savedata, array('id' => $this->input->post('id', TRUE)));
        } else { 
            //create
            $pembayaran_id = $this->Pembayaran_model->insert($savedata, true);
            if ($pembayaran_id) {
                $this->store_detail($list_pembayaran->komite, $pembayaran_id, 't_pembayaran_komite', 'biaya_lembaga_komite_id');
                $this->store_detail($list_pembayaran->semester, $pembayaran_id, 't_pembayaran_semester', 'biaya_lembaga_semester_id');
                $this->store_detail($list_pembayaran->lainnya, $pembayaran_id, 't_pembayaran_lainnya', 'biaya_lembaga_lainnya_id');

                // update lembaga amount
                $this->update_amount($savedata);
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
        
        redirect(base_url('c_transaksi/pembayaran'), 'refresh');
    }

    public function update_amount($data)
    {
        $where['id'] = $data['lembaga_id'];
        $this->Pembayaran_model->table = "m_lembaga";
        $this->Pembayaran_model->order_by = "id";
        $lembaga = $this->Pembayaran_model->get($where);
        if ($lembaga) {
            $update['saldo'] = $lembaga->saldo + $data['amount'];
            $this->Pembayaran_model->update($update, $where);
        }
    }

    public function kalkulasi_pembayaran($pembayaran)
    {
        $total_komite = 0;
        if (isset($pembayaran->komite)) {
            foreach ($pembayaran->komite as $key => $item) {
                if ($item->is_checkout == 1) {
                    $total_komite+=$item->amount;
                }
            }
        }

        $total_semester = 0;
        if (isset($pembayaran->semester)) {
            foreach ($pembayaran->semester as $key => $item) {
                if ($item->is_checkout == 1) {
                    $total_semester+=$item->amount;
                }
            }
        }

        $total_lainnya = 0;
        if (isset($pembayaran->lainnya)) {
            foreach ($pembayaran->lainnya as $key => $item) {
                if ($item->is_checkout == 1) {
                    $total_lainnya+=$item->amount;
                }
            }
        }
        return $total_komite + $total_semester + $total_lainnya;
    }

    public function store_detail($pembayaran_detail, $pembayaran_id, $table, $field)
    {
        foreach ($pembayaran_detail as $key => $pd) {
            $savedata_detail['pembayaran_id'] = $pembayaran_id;
            $savedata_detail[$field] = $pd->id;
            $savedata_detail['is_checkout'] = $pd->is_checkout;
            $this->Pembayaran_model->table = $table;
            $this->Pembayaran_model->insert($savedata_detail);
        }
    }

    public function select_lembaga()
    {
        $q = $this->input->get('q');
        $where = [];
        $this->Pembayaran_model->order_by = "id";
        $this->Pembayaran_model->order_type = "ASC";
        $this->Pembayaran_model->search_field = "name";
        $this->Pembayaran_model->column_search = "name";
        $this->Pembayaran_model->table = "m_lembaga";
        $data = $this->Pembayaran_model->list_select($q, $where);
        echo json_encode($data);
    }

    public function select_siswa()
    {
        $q = $this->input->get('q');
        $where['lembaga_id'] = $this->input->get('id', TRUE);
        $this->Pembayaran_model->order_by = "id";
        $this->Pembayaran_model->order_type = "ASC";
        $this->Pembayaran_model->search_field = "name";
        $this->Pembayaran_model->column_search = "name";
        $this->Pembayaran_model->table = "m_siswa";
        $data = $this->Pembayaran_model->list_select($q, $where);
        echo json_encode($data);
    }

    public function select_kelas()
    {
        $q = $this->input->get('q');
        $where['level'] = $this->input->get('level', TRUE);;
        $this->Pembayaran_model->order_by = "id";
        $this->Pembayaran_model->order_type = "ASC";
        $this->Pembayaran_model->search_field = "name";
        $this->Pembayaran_model->column_search = "name";
        $this->Pembayaran_model->table = "m_kelas";
        $data = $this->Pembayaran_model->list_select($q, $where);
        echo json_encode($data);
    }

    public function check_code($lembaga)
    {
        $tahun = $this->db->order_by('id', 'desc')->limit(1)->get('t_pembayaran')->row_array();
        if ($tahun) {
            $tahun = date('Y', strtotime($tahun['created_at']));
            if ($tahun != date('Y')) {
                $code = 0;
            }else{
                $code = count($this->db->get('t_pembayaran')->result_array());
            }
        }else{
            $code = count($this->db->get('t_pembayaran')->result_array());
        }
        $result = 'IN/'.$lembaga.'/'.date('Ym').'/'.str_pad($code + 1, 4, "0", STR_PAD_LEFT);
        return $result;
    }

    public function cetak()
    {
        $where['t_pembayaran.id'] = $this->input->get('id', TRUE);
        
        $select = "
            t_pembayaran.*, 
            m_tahun_ajaran.name as tahun_ajaran_name,
            m_lembaga.name as lembaga_name,
            m_siswa.name as siswa_name,
            m_kelas.name as kelas_name,
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
            ]
        ];
        $pembayaran = $this->Pembayaran_model->get($where, $select, $join);
        $data['tahun_ajaran_name'] = isset($pembayaran->tahun_ajaran_name) ? $pembayaran->tahun_ajaran_name : null;
        $data['lembaga_name'] = isset($pembayaran->lembaga_name) ? $pembayaran->lembaga_name : null;
        $data['siswa_name'] = isset($pembayaran->siswa_name) ? $pembayaran->siswa_name : null;
        $data['kelas_name'] = isset($pembayaran->kelas_name) ? $pembayaran->kelas_name : null;
        $data['code'] = isset($pembayaran->code) ? $pembayaran->code : null;
        $data['tanggal'] = isset($pembayaran->created_at) ? date('d M Y H:i:s', strtotime($pembayaran->created_at)) : null;
        $data['title'] = 'Lampiran Pembayaran';

        if ($pembayaran != null) {
            $data['id'] = $pembayaran->id;
            $data['pembayaran']['komite'] = $this->pembayaran_type_true('t_pembayaran_komite', $pembayaran->id, 't_biaya_lembaga_komite', 'biaya_lembaga_komite_id', 'm_attribute_komite', 'attribute_komite_id', true);
            $data['pembayaran']['semester'] = $this->pembayaran_type_true('t_pembayaran_semester', $pembayaran->id, 't_biaya_lembaga_semester', 'biaya_lembaga_semester_id', 'm_attribute_semester', 'attribute_semester_id', true);
            $data['pembayaran']['lainnya'] = $this->pembayaran_type_true('t_pembayaran_lainnya', $pembayaran->id, 't_biaya_lembaga_lainnya', 'biaya_lembaga_lainnya_id', 'm_attribute_lainnya', 'attribute_lainnya_id', true);
        }
        
        $data['data'] = [];
        if (count($data['pembayaran']['komite']) > 0) {
            foreach ($data['pembayaran']['komite'] as $key => $item) {
                $colom['attribute_name'] = $item['attribute_name'];
                $colom['attribute_type_name'] = $item['attribute_type_name'];
                $colom['amount'] = $item['amount'];
                array_push($data['data'], $colom);
            }
        }
        if (count($data['pembayaran']['semester']) > 0) {
            foreach ($data['pembayaran']['semester'] as $key => $item) {
                $colom['attribute_name'] = $item['attribute_name'];
                $colom['attribute_type_name'] = $item['attribute_type_name'];
                $colom['amount'] = $item['amount'];
                array_push($data['data'], $colom);
            }
        }
        if (count($data['pembayaran']['lainnya']) > 0) {
            foreach ($data['pembayaran']['lainnya'] as $key => $item) {
                $colom['attribute_name'] = $item['attribute_name'];
                $colom['attribute_type_name'] = $item['attribute_type_name'];
                $colom['amount'] = $item['amount'];
                array_push($data['data'], $colom);
            }
        }
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->filename = $data['title'];
        $this->pdf->load_view('v_transaksi/pembayaran/cetak', $data);
    }
}
