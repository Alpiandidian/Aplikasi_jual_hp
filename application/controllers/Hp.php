<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hp extends CI_Controller {
    public function __construct(){
        parent:: __construct();

        $this->load->model('M_Hp');
    }

	public function index()
	{
        $data['Hp'] = $this->M_Hp->dataHp();
		$this->load->view('template/header');
		$this->load->view('Hp/data_Hp',$data);
		$this->load->view('template/footer');
	}
    
    function tambah_data()
    {
        $this->load->view('template/header');
		$this->load->view('Hp/tambah_Hp');
		$this->load->view('template/footer');
    }
    function simpan_Hp()   
    {
        $this->M_Hp->simpan_data();
        redirect('Hp');
    }
    function upload_foto()
    {
        $config['upload_path']          = './foto/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('foto'))
        {
            echo "Gagal Tambah";
        }
        else
        {
           $foto = $this->upload->data();
           $file_name = $foto['file_name'];
           $id = $this->input->post('id', TRUE);
           $nilai = $this->input->post('nilai', TRUE);
           $harga = $this->input->post('harga', TRUE);
           $merek = $this->input->post('merek', TRUE);
           $stok = $this->input->post('stok', TRUE);
           $foto = $this->input->post('foto', TRUE);

           $data = array(
               'nilai' => $nilai,
               'harga' => $harga,
               'merek' => $merek,
               'stok' => $stok,
               'foto' => $file_name,
           );
           
           $this->db->insert('Hp', $data);
           $this->session->set_flashdata('data', '<div class="alert alert-info" role="alert">
           data berhasil ditambahkan!
         </div>');

             redirect('Hp');
        }
    }
    function hapus_Hp($id)
    {
        $this->M_Hp->hapus_Hp($id);
        $this->session->set_flashdata('isi', '<div class="alert alert-danger" role="alert">
        data berhasil dihapus!!!
      </div>');
        redirect("Hp");
         
    }
    function edit_Hp($id)
    {
        $this->load->view('template/header');
        $data['editHp'] = $this->M_Hp->edit_Hp($id);
		$this->load->view('Hp/edit_Hp',$data);
		$this->load->view('template/footer');
    }
    function simpan_edit_Hp()
    {
       $this->M_Hp->simpan_edit();
    //    $this->db->insert('Hp', $data);
           $this->session->set_flashdata('file','<div class="alert alert-info" role="alert">
           data berhasil diubah!
         </div>');
       redirect('Hp');
    }
}
    
