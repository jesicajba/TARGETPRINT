<?php

class Mensajemodel extends MY_Model{
	
    function __construct(){	
		parent::__construct();
		$this->tabla= "qa_posts";	
		$this->clave= "postid";
	}
	
	function getMensajes(){
		$this->db->order_by($this->clave, "desc");	
		$query = $this->db->get( $this->tabla );
		$this->numError = $this->db->_error_number();
		return $query->result();
	}
        
        function getMensajesID($id=""){
                
                $this->db->select( "q.postid, q.title, q.content, q.articulo, q.respuesta, u.username" );
                $this->db->from( "qa_posts q");
                $this->db->join("users u", "q.userid = u.id");
                if ($id != "")
                    $this->db->where("q.articulo", $id );
		$this->db->order_by("q.postid", "desc");	
                $query = $this->db->get();
		$this->numError = $this->db->_error_number();
		return $query->result();
        }
}
?>