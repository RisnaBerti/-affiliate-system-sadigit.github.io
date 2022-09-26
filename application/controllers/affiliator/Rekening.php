<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('Umum_model', 'umum');
        $this->load->model('affiliator/M_rekening', 'm_rekening');
		$this->load->model('M_bonus', 'm_bonus');

	}

	public function index()
	{
		$data = [
            'view' => 'affiliator/rekening',
            'active' => 'rekening',
            'sub1' => 'rekening',
        ];

        $data['bank'] = $this->db->get('tb_bank')->result();

        $this->load->view('template/index', $data);
	}

	public function tb_bonus()
	{
		header('Content-Type: application/json');


		$tabel = 'tb_rekening';
		$column_order = array();
		$coloumn_search = array('id_rek', 'id_bank', 'nama_pemilik_rek', 'no_rek');
		$select = "*";
		$order_by = array('id_rek' => 'asc');
		$join[] = ['field' => 'tb_bank', 'condition' => 'tb_rekening.id_bank = tb_bank.id_bank', 'direction' => 'left'];
		$where = [];
		$group_by = [];
		$list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
		$data = array();
		$no = @$_POST['start'];

		foreach ($list as $list) {
			$edit =  "<i class='fas fa-edit btn btn-icon btn-light-primary' onclick={_edit('$list->id_rek')}></i>";
			$hapus =  "<i class='fas fa-trash-alt btn btn-icon btn-light-danger' onclick={_delete('$list->id_rek')}></i>";
			$row = array();
			$row[] = ++$no;
			$row[] = $list->nama_bank;
			$row[] = $list->nama_pemilik_rek;
			$row[] = $list->no_rek;
			$row[] = "<center>
                       $edit 
                       $hapus
                    </center>";
			$data[] = $row;
		}

		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->umum->count_all($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by),
			"recordsFiltered" => $this->umum->count_filtered($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	function check_bonus()
	{
		$id_rek = $this->input->post('id_rek');
		$id_bank = $this->input->post('id_bank');
		$nama_pemilik_rek = $this->input->post('nama_pemilik_rek');
		$no_rek = $this->input->post('no_rek');

		$check = $this->db->select('id_rek', 'id_bank', 'nama_pemilik_rek', 'no_rek')->from('tb_rekening')->where('id_rek !=', $id_rek)->where('id_bank', $id_bank)->get();
		if ($check->num_rows() > 0) {
			return false;
		}
		return true;
	}

	public function save()
	{
		$config = [
			[
				'field' => 'id_bank',
				'rules' => 'required',
				'errors' => [
					'required' => 'nama user tidak boleh kosong'
				]
			],
			[
				'field' => 'nama_pemilik_rek',
				'rules' => 'required',
				'errors' => [
					'required' => 'catatan tidak boleh kosong'
				]
			],
            [
				'field' => 'no_rek',
				'rules' => 'required',
				'errors' => [
					'required' => 'catatan tidak boleh kosong'
				]
			],
		];

		$data = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if ($this->form_validation->run() == TRUE) {

			$id_rek = $this->input->post('id_rek');
            $id_bank = $this->input->post('id_bank');
            $nama_pemilik_rek = $this->input->post('nama_pemilik_rek');
            $no_rek = $this->input->post('no_rek');

			$payloadData = [
				'id_rek' => $this->input->post('id_rek'),
                'id_bank' => $this->input->post('id_bank'),
				'nama_pemilik_rek' => $this->input->post('nama_pemilik_rek'),
				'no_rek' => $this->input->post('no_rek'),
			];

			if ($id_rek == "") {
				$this->db->insert('tb_rekening', $payloadData);
			} else {
				$this->db->update('tb_rekening', $payloadData, ['id_rek' => $id_rek]);
			}

			$data['status'] = true;
		} else {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		}
		echo json_encode($data);
	}

	function getBonus()
	{
		$id_rek = $this->input->post('id_rek', true);
		$data = $this->db->get_where('tb_rekening', ['id_rek' => $id_rek])->row();
		echo json_encode($data);
	}

	function delete()
	{
		$id_rek = $this->input->post('id_rek', true);
		$this->db->delete('tb_rekening',['id_rek'=>$id_rek]);
		echo json_encode('');
	}
}
