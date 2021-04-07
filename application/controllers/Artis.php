<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artis extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Model_artis');
    }

    public function index()
    {
        $data['judul']= "Data Artis";

        $data['artis'] = $this->Model_artis->getAllArtis();
        $this->load->view('header', $data);
        $this->load->view('list_artis');
        $this->load->view('footer');
    }

    public function tambah()
    {
        $data['judul']= "Data Artis";
        $data['hasil']=$this->Model_artis->Provinsi();
        
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'TempatLahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('header', $data);
                $this->load->view('tambah_data',$data);
                $this->load->view('footer');
        }
        else
        {
            $config['upload_path']          = './assets/images';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['min_size']             = 100;

            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                echo $this->upload->display_errors();
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $data = [
                    "uuid" => '12',
                    "nama" => $this->input->post('nama'),
                    "tempat_lahir" => $this->input->post('tempat_lahir'),
                    "tanggal_lahir" => $this->input->post('tanggal_lahir'),
                    "foto" => $data['upload_data']['file_name'],
                    "alamat_tinggal" => $this->input->post('alamat'),
                    "id_kecamatan" => $this->input->post('kecamatan'),
                ];

                $this->Model_artis->TambahDataArtis($data);
                redirect('artis');
            }


        }
        
    }

    public function addDataArtis()
    {
        $data['judul']= "Data Artis";
        $data['hasil']=$this->Model_artis->Provinsi();
        
        $this->load->view('header', $data);
        $this->load->view('tambah_data',$data);
        $this->load->view('footer');
    }

	public function get_kabkota()
    {
        $id_provinsi=$this->input->post('id_provinsi');
        $data=$this->Model_artis->Kabkota($id_provinsi);
        echo json_encode($data);
    }

    public function get_kecamatan()
    {
        $id_kabkota=$this->input->post('id_kabkota');
        $data=$this->Model_artis->Kecamatan($id_kabkota);
        echo json_encode($data);
    }

}
