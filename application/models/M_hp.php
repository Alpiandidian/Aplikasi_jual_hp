<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_hp extends CI_Model {

    function datahp()
    {

        return $this->db->get('hp')->result();
    }
     function simpan_data()
     {
         $nilai = $this->input->post('nilai');
         $harga = $this->input->post('harga');
         $merek = $this->input->post('merek');
         $stok = $this->input->post('stok');
         $foto = $this->input->post('foto');
        

         $data = array(
             'nilai'=>$nilai,
             'harga'=>$harga,
             'merek'=>$merek,
             'stok'=>$stok,
             'foto'=>$foto,
         );

         $this->db->insert('hp',$data);
     }
     function hapus_hp($id)
     {
         $this->db->delete('hp',array('id'=>$id));
     }
     function edit_hp($id)
     {
       return $this->db->get_where('hp',array('id'=>$id))->result();
     }
   function simpan_edit()
   {
    $nilai = $this->input->post('nilai');
    $harga = $this->input->post('harga');
    $merek = $this->input->post('merek');
    $stok  = $this->input->post('stok');
    $foto  = $this->input->post('foto');
    $id = $this->input->post('id');

    $data = array(
        'nilai'=>$nilai,
        'harga'=>$harga,
        'merek'=>$merek,
        'stok'=>$stok,
        'foto'=>$foto
    );
      $this->db->where('id',$id);
      $this->db->update('hp',$data);
   }
}