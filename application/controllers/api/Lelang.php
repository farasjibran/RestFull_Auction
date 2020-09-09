<?php

defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Lelang extends RestController
{

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function index_get($id = 0)
	{
		if (!empty($id)) {
			$data = $this->db->get_where("tb_barang", ['id_barang' => $id])->row_array();
		} else {
			$data = $this->db->get("tb_barang")->result();
		}

		$this->response($data, RestController::HTTP_OK);
	}

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function index_post()
	{
		$input = $this->input->post();
		$this->db->set('tanggal_upload', 'NOW()', FALSE);
		$this->db->insert('tb_barang', $input);

		$this->response(['Item created is successfully.'], RestController::HTTP_OK);
	}

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function index_put($id)
	{
		$input = $this->put();
		$this->db->set('tanggal_upload', 'NOW()', FALSE);
		$this->db->update('tb_barang', $input, array('id_barang' => $id));

		$this->response(['Item updated is successfully.'], RestController::HTTP_OK);
	}

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function index_delete($id)
	{
		$this->db->delete('tb_barang', array('id_barang' => $id));

		$this->response(['Item deleted is successfully.'], RestController::HTTP_OK);
	}
}
