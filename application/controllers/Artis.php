<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artis extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Model_artis');
    }

	function index()
	{
	    $data['hasil']=$this->Model_artis->Provinsi();
		$this->load->view('tambah_data',$data);
	}

	function get_kabkota()
    {
        $id_provinsi=$this->input->post('id_provinsi');
        $data=$this->Model_artis->Kabkota($id_provinsi);
        echo json_encode($data);
    }

    function get_kecamatan()
    {
        $id_kabkota=$this->input->post('id_kabkota');
        $data=$this->Model_artis->Kecamatan($id_kabkota);
        echo json_encode($data);
    }

}
