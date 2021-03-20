<?php
Class Model_artis extends CI_Model
{

    function getAllArtis(){
        $query = $this->db->get('mytable');
        return $query->result();
    }


    function Provinsi()
    {
        $this->db->order_by('id_provinsi', 'ASC');
        return $this->db->from('provinsi')
          ->get()
          ->result();
    }

    function Kabkota($id_provinsi)
    {
        $this->db->where('id_provinsi', $id_provinsi);
        $this->db->order_by('id_kabkota', 'ASC');
        return $this->db->from('kabkota')
            ->get()
            ->result();
    }
    function Kecamatan($id_kabkota)
    {
        $this->db->where('id_kabkota', $id_kabkota);
        $this->db->order_by('id_kecamatan', 'ASC');
        return $this->db->from('kecamatan')
            ->get()
            ->result();
    }

}
?>