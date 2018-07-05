<?php
class Tipo_model extends CI_Model{
    //put your code here

    public function get_tipo() {
        $this->db->order_by('descripcion', 'asc');
        $consulta = $this->db->get('t_tipo');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }
  

}