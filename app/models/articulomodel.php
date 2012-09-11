<?php

class Articulomodel extends MY_Model{
	
    function __construct(){
		parent::__construct();
		$this->tabla= "arti_web";	
		$this->clave= "codigo";
		
		$this->talle = "talledet_web"; 
	}
	
	function reordenar( $id, $desde ){
		// obtengo la seccion que modificare
		$this->db->where("codigo", $id);
		$query = $this->db->get($this->tabla);
		$res = $query->result();
		$seccion = $res[0]->seccion;
		
		do{
			// por cada articulo de la posicion indicada
			$this->db->where("posicion", $desde);
			// de la seccion pasada
			$this->db->where("seccion", $seccion);
			// que no sea el articulo inicial
			$this->db->where("codigo !=", $id);
			$query = $this->db->get($this->tabla);
			
			foreach( $query->result() as $row )
			{
				// actualizo la posicion para que no se superponga con el articulo que ingrese/cambie 
				$id = $row->codigo;		
				// y tomo el nuevo codigo de articulo modificado para no volver a cambiarlo y tomarlo como base		
				$this->db->where("codigo", $id);
				$this->db->set("posicion", "posicion+1", false);
				// actualizo su posicion
				$this->db->update($this->tabla);
			}
			// ahora veamos si el numero modificado presenta un conflicto.
			$desde++;			
		} while($query->num_rows >0); // hasta que haya filas	
	}
	
	function incrementarPos( $id ){
		// obtengo posicion actual de elemento a modificar
		$this->db->where("codigo", $id);
		$query = $this->db->get($this->tabla);
		$res = $query->result();
		$desde = $res[0]->posicion+1;
		$seccion = $res[0]->seccion;
				
		// incremento la posicion en 1
		$this->db->where("codigo", $id);	
		$this->db->set("posicion", "posicion+1", false);
		$query = $this->db->update($this->tabla);
		
		// modifico el articulo que ocupa la posicion actual en la misma seccion
		// asignandole la posicion de nuestro articulo modificada
		$this->db->where("posicion", $desde);
		$this->db->where("seccion", $seccion);
		$this->db->where("codigo !=", $id);
		$this->db->set("posicion", "posicion-1", false);
		$query = $this->db->update($this->tabla);
	}
	
	function decrementarPos( $id ){
		// obtengo posicion actual de elemento a modificar
		$this->db->where("codigo", $id);
		$query = $this->db->get($this->tabla);
		$res = $query->result();
		$desde = $res[0]->posicion-1;
		$seccion = $res[0]->seccion;
		
		// decremento la posicion en 1
		$this->db->where("codigo", $id);	
		$this->db->set("posicion", "posicion-1", false);
		$query = $this->db->update($this->tabla);
		
		if ($desde > 0 ){
			// modifico el articulo que ocupa la posicion actual en la misma seccion
			// asignandole la posicion de nuestro articulo modificada
			// solo si el articulo original no ha pasado a inactivo 
			$this->db->where("posicion", $desde);
			$this->db->where("seccion", $seccion);
			$this->db->where("codigo !=", $id);
			$this->db->set("posicion", "posicion+1", false);
			$query = $this->db->update($this->tabla);
		}				
	}
	
	function getByGenero( $genero, $desde=-1, $cant=0 ){
		// $this->db->order_by("posicion");
		$this->db->order_by("codigo");		
		$this->db->where("genero", $genero);
		$this->db->where("activo", 1);
		if ($desde == -1)
			$query = $this->db->get( $this->tabla );
		else 
			$query = $this->db->get( $this->tabla, $cant, $desde );
		$this->numError = $this->db->_error_number();
		return $query->result();
	}

   function getBySeccion( $seccion, $desde=-1, $cant=0 ){
		// $this->db->order_by("posicion");
		$this->db->order_by("codigo");   	
		$this->db->where("seccion", $seccion);
		$this->db->where("activo", 1);
		if ($desde == -1)
			$query = $this->db->get( $this->tabla );
		else 
			$query = $this->db->get( $this->tabla, $cant, $desde );
		$this->numError = $this->db->_error_number();
		return $query->result();
	}

	function getByMarca( $marca, $desde=-1, $cant=0 ){
		// $this->db->order_by("posicion");
		$this->db->order_by("codigo");		
		$this->db->where("marca", $marca);
		$this->db->where("activo", 1);		
		if ($desde == -1)
			$query = $this->db->get( $this->tabla );
		else 
			$query = $this->db->get( $this->tabla, $cant, $desde );
		$this->numError = $this->db->_error_number();
		return $query->result();
	}	
	
	function getActivos( $seccion, $desde=-1, $cant=0 ){
		// $this->db->order_by("posicion");
		$this->db->order_by("codigo");
		$this->db->where("seccion", $seccion);
		$this->db->where("posicion !=", 0);
		$this->db->where("activo", 1);		
		if ($desde == -1)
			$query = $this->db->get( $this->tabla );
		else 
			$query = $this->db->get( $this->tabla, $cant, $desde );
		$this->numError = $this->db->_error_number();
		return $query->result();
	}	

	function getByOferta( $desde=-1, $cant=0 ){
		$this->db->order_by("codigo");
		$this->db->where("en_oferta", 1);
		if ($desde == -1)
			$query = $this->db->get( $this->tabla );
		else 
			$query = $this->db->get( $this->tabla, $cant, $desde );
		$this->numError = $this->db->_error_number();
		return $query->result();
	}	

	function getByNovedad( $desde=-1, $cant=0 ){
		$this->db->order_by("codigo");
		$this->db->where("novedad", 1);
		if ($desde == -1)
			$query = $this->db->get( $this->tabla );
		else 
			$query = $this->db->get( $this->tabla, $cant, $desde );
		$this->numError = $this->db->_error_number();
		return $query->result();
	}	
	
	function getActivosMarca( $marca, $desde=-1, $cant=0 ){
		$this->db->order_by("posicion");
		$this->db->where("marca", $marca);
		$this->db->where("posicion !=", 0);		
		if ($desde == -1)
			$query = $this->db->get( $this->tabla );
		else 
			$query = $this->db->get( $this->tabla, $cant, $desde );
		$this->numError = $this->db->_error_number();
		return $query->result();
	}	
	
	function getConPrecio($orden){
		$this->db->order_by($orden);
		$this->db->where("precio >", 0);
		$this->db->where("posicion !=", 0);		
		
		$query = $this->db->get( $this->tabla );		
		$this->numError = $this->db->_error_number();
		return $query->result();
	}
	
	function insTalles( $datos ){
		// debe insertar los talles ya que es nuevo articulo
		// echo "ingresando talles de articulos ...".$datos["talle"];
		$this->db->where("idtalle_web", $datos["talle"]);
		$q = $this->db->get("talledet_web");
		// print_r($q);
		foreach( $q->result() as $f ){
			$reg["codigo"] = $datos["codigo"];
			$reg["idtalle"] = $datos["talle"];
			$reg["iddettalle"] = $f->idtalle;  
			$reg["activo"] = 1;
			$reg["precio"] = $datos["precio"];
			$this->db->insert( "precio_talle", $reg );
			// print_r($reg);
			//echo "otro precio ingresado";
		}
		$this->numError = $this->db->_error_number();
		return $this->numError;		
	}

	function contarTodosMarca($sec){
			$this->db->where( "marca", $sec);
			$this->db->where("activo", 1);
			$this->db->from("arti_web");
			return $this->db->count_all_results();			
	}

	function contarTodosSeccion($sec){
			$this->db->where( "seccion", $sec);
			$this->db->where("activo", 1);
			$this->db->from("arti_web");
			return $this->db->count_all_results();			
	}	

	function contarTodosGenero($gen){
			$this->db->where( "genero", $gen);
			$this->db->where("activo", 1);
			$this->db->from("arti_web");
			return $this->db->count_all_results();			
	}	

	function contarTodosOferta(){
			$this->db->where( "en_oferta", 1);
			$this->db->where("activo", 1);
			$this->db->from("arti_web");
			return $this->db->count_all_results();			
	}
	
	function contarTodosNovedad(){
			$this->db->where( "novedad", 1);
			$this->db->where("activo", 1);
			$this->db->from("arti_web");
			return $this->db->count_all_results();			
	}
	
    function toggleArt( $id, $activo){
            $data = array( 'activo' => $activo );
            $this->db->where( "codigo", $id );
            $this->db->update($this->tabla, $data);
            $this->numError = $this->db->_error_number();
            return $this->numError;
    }

    function getArticulo( $id ){
		$query = $this->db->select( "a.*, m.descripcion as nombremarca")
			->where( $this->clave, $id )
			->join( "marca_web m", "m.marca = a.marca")
			->get( $this->tabla . " a ");

		$this->numError = $this->db->_error_number();
		return $query->result_array();    	
    }
}
?>