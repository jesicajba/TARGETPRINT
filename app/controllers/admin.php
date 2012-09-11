<?php
	class Admin extends CI_Controller{
		function Admin(){
			parent::__construct();
		}
		
		function index()
		{
			if ($this->ion_auth->logged_in()){					
				$this->load->view('admin/admin');
			}
			else {
				redirect( 'auth/login');
			}					
		}    
		
		function abm_genero(){
        	$this->load->library('grocery_CRUD');
            $this->grocery_crud->set_table('genero_web');
            $this->grocery_crud->columns('genero','descripcion');
            $this->grocery_crud->set_subject('GENEROS DE ARTICULOS');
			
            $this->grocery_crud->set_rules('genero', 'ID', 'required');
            $this->grocery_crud->set_rules('detalle', 'descripcion', 'required');						

            $this->grocery_crud->display_as('genero','ID');
                    
			$this->grocery_crud->set_theme('datatables');            
			$output = $this->grocery_crud->render();
 
            $this->load->view( "admin/abm", $output);
		}

        function abm_seccion(){
            $this->load->library('grocery_CRUD');
			$this->grocery_crud->set_theme('datatables');            
            
			$this->grocery_crud->set_table('seccion_web');
            $this->grocery_crud->columns('seccion','descripcion');
            $this->grocery_crud->set_subject('Seccion');
			
            $this->grocery_crud->set_rules('seccion', 'seccion', 'required');
            $this->grocery_crud->set_rules('descripcion', 'descripcion', 'required');						
    		
			
            $this->grocery_crud->display_as('seccion','ID');
            $output = $this->grocery_crud->render();
 
            $this->load->view( "admin/abm", $output);
		}

		function abm_tablacolor(){
            $this->load->library('grocery_CRUD');
			$this->grocery_crud->set_theme('datatables');            
            
            $this->grocery_crud->set_table('color_web');
            $this->grocery_crud->columns('idcolor_web','detalle');
            $this->grocery_crud->set_subject('TABLA de COLORES');
			
            $this->grocery_crud->set_rules('idcolor_web', 'Color', 'required');
            $this->grocery_crud->set_rules('detalle', 'descripcion', 'required');						

            $this->grocery_crud->display_as('idcolor_web','ID');
                    
            $output = $this->grocery_crud->render();
 
            $this->load->view( "admin/abm_seccion", $output);
		}

		function abm_color(){
			$this->load->library('grocery_CRUD');
			$this->grocery_crud->set_theme('datatables');            
			$this->grocery_crud->set_table('colordet_web');
            $this->grocery_crud->columns('idcolor_web', 'idcolor', 'descripcion', 'codigo' );
            $this->grocery_crud->set_subject('COLORES por TABLA');
			
            $this->grocery_crud->set_rules('idcolor_web', 'TABLA', 'required');
            $this->grocery_crud->set_rules('idcolor', 'ID.', 'required');
			$this->grocery_crud->set_rules('descripcion', 'descripcion', 'required');						
    		
    		$this->grocery_crud->display_as('idcolor_web','TABLA');
    		$this->grocery_crud->display_as('idcolor','ID');
						
    		$this->grocery_crud->set_relation( 'idcolor_web', 'color_web', 'detalle');
    		$this->grocery_crud->callback_add_field( 'codigo', array($this,'callback_add_codigo' ));
    		$this->grocery_crud->callback_edit_field( 'codigo', array($this,'callback_edit_codigo' ));
    					
    		$output = $this->grocery_crud->render();
 
            $this->load->view( "admin/abm", $output);
		}
		
		function callback_edit_codigo($value, $primary_key){
    		return '<input type="text" maxlength="6" value="'.$value.'" name="codigo" id="codigo" class="picker" >';
		}
				
		function callback_add_codigo(){
			return '<input type="text" maxlength="6" value="" name="codigo" id="codigo" class="picker" >';
		}
		
		function abm_tablatalle(){
			$this->load->library('grocery_CRUD');
			$this->grocery_crud->set_theme('datatables');            
			$this->grocery_crud->set_table('talle_web');
            $this->grocery_crud->columns('idtalle_web','detalle');
            $this->grocery_crud->set_subject('TABLA de TALLES');
			
            $this->grocery_crud->set_rules('idtalle_web', 'ID.', 'required');
			$this->grocery_crud->set_rules('detalle', 'detalle', 'required');						
    		
    		$this->grocery_crud->display_as('idtalle_web','ID');
						
    		$output = $this->grocery_crud->render();
 
            $this->load->view( "admin/abm", $output);
		}

		function abm_talle(){
			$this->load->library('grocery_CRUD');
			$this->grocery_crud->set_theme('datatables');            
			$this->grocery_crud->set_table('talledet_web');
            $this->grocery_crud->columns('idtalle_web', 'idtalle', 'descripcion');
            $this->grocery_crud->set_subject('TALLES por TABLA');
			
            $this->grocery_crud->set_rules('idtalle_web', 'TABLA', 'required');
            $this->grocery_crud->set_rules('idtalle', 'ID.', 'required');
			$this->grocery_crud->set_rules('descripcion', 'descripcion', 'required');						
    		
    		$this->grocery_crud->display_as('idtalle_web','TABLA');
    		$this->grocery_crud->display_as('idtalle','ID');
						
    		$this->grocery_crud->set_relation( 'idtalle_web', 'talle_web', 'detalle');
    		$this->grocery_crud->order_by( 'idtalle_web');
    		$output = $this->grocery_crud->render();
 
            $this->load->view( "admin/abm", $output);
		}
		
        function abm_marca(){
			$this->load->library('grocery_CRUD');
			$this->grocery_crud->set_theme('datatables');            
			$this->grocery_crud->set_table('marca_web');
    		$this->grocery_crud->columns('marca','descripcion', 'imagen');
    		
			$this->grocery_crud->required_fields('marca', 'ID');						
    		$this->grocery_crud->set_field_upload('imagen','img/uploads');
    		$this->grocery_crud->set_subject('Marca');

			$this->grocery_crud->set_rules('marca', 'marca', 'required');
			$this->grocery_crud->set_rules('descripcion', 'descripcion', 'required');
			
    		$this->grocery_crud->display_as('marca','ID');
			// $this->grocery_crud->set_theme("dataTables");
    		$output = $this->grocery_crud->render();
 
    		$this->load->view( "admin/abm", $output);
		}		
		
		function abm_articulo(){
			$this->load->library('grocery_CRUD');
			$this->grocery_crud->set_theme('datatables');            
			$this->grocery_crud->set_table('arti_web');
    		$this->grocery_crud->set_subject('Articulo');
    		$this->grocery_crud->columns('codigo','titulo', 'precio', 'genero', 'marca', 'seccion', 'activo', 'en_oferta', 'novedad');
    		$this->grocery_crud->fields('codigo', 'titulo', 'imagen', 'precio', 'genero', 'marca', 'seccion', 'descripcion', 'talle', 'color' , 'activo', 'en_oferta', 'novedad', 'posicion', 'stock', 'imagengra');
    		$this->grocery_crud->edit_fields('titulo', 'imagen', 'precio', 'genero', 'marca', 'seccion', 'descripcion', 'activo', 'en_oferta', 'novedad', 'posicion', 'stock', 'imagengra');
    		
    		$this->grocery_crud->set_relation( 'genero', 'genero_web', 'descripcion');
    		$this->grocery_crud->set_relation( 'marca', 'marca_web', 'descripcion');
    		$this->grocery_crud->set_relation( 'seccion', 'seccion_web', 'descripcion');
    		$this->grocery_crud->set_relation( 'talle', 'talle_web', 'detalle');
    		$this->grocery_crud->set_relation( 'color', 'color_web', 'detalle');
    		
			$this->grocery_crud->set_rules('codigo', 'codigo', 'required');
			$this->grocery_crud->set_rules('titulo', 'titulo', 'required');
			$this->grocery_crud->set_rules('descripcion', 'descripcion', 'required');
			$this->grocery_crud->set_rules('precio', 'precio', 'required|numeric');
			$this->grocery_crud->set_rules('genero', 'genero', 'required');
			$this->grocery_crud->set_rules('seccion', 'seccion', 'required');
			$this->grocery_crud->set_rules('marca', 'marca', 'required');
			$this->grocery_crud->set_rules('posicion', 'posicion', 'required|is_natural');
    		
    		$this->grocery_crud->set_field_upload('imagen','img/arti');
    		$this->grocery_crud->set_field_upload('imagengra','img/arti');
    		$this->grocery_crud->display_as('imagengra','Imagen grande (800x800)');
    		$this->grocery_crud->display_as('imagen','Imagen (350x350)');

    		$this->grocery_crud->display_as('en_oferta','Oferta?');
    		$this->grocery_crud->display_as('novedad','Novedad?');

 			$this->grocery_crud->callback_column('activo',array($this,'show_activo'));
 			$this->grocery_crud->callback_column('en_oferta',array($this,'show_activo'));
			$this->grocery_crud->callback_column('novedad',array($this,'show_activo'));
			 			
    		$this->grocery_crud->add_action( "Talles/Colores", 'img/admin/update.png', 'admin/admin/tallecolor', '');
    		
    		$this->grocery_crud->callback_after_upload(array($this,'after_upload'));
    		$this->grocery_crud->callback_after_insert(array($this,'cargar_detalles'));			
    		
    		$this->grocery_crud->change_field_type('activo', 'true_false' );
    		$this->grocery_crud->change_field_type('en_oferta', 'true_false' );
    		$this->grocery_crud->change_field_type('novedad', 'true_false' );
    		
    		$output = $this->grocery_crud->render();
 
    		$this->load->view( "admin/abm", $output);
		}	

		function tallecolor( $id ){
			
			$this->load->library('grocery_CRUD');
    		$crud = new grocery_CRUD(); 
			$crud ->set_theme('datatables');            
    		$crud->set_table('precio_arti');
			$crud->where("codigo", $id);
    		$crud->set_subject('Talles y colores');
    		$crud->columns('codigo','precio', 'activo', 'idtalle', 'idcolor' );
    		$crud->display_as('idtalle', 'TALLE' );
    		$crud->display_as('idcolor', 'COLOR' );
    		$crud->display_as('precio', 'PRECIO' );
    		$crud->display_as('codigo', 'ARTICULO' );
    		$crud->edit_fields('activo');
			$crud->add_action( "activar/desactivar", 'img/admin/update.png', "admin/admin/activar/$id" );
			    		
 			$crud->callback_column('activo',array($this,'show_activo'));
 			$crud->callback_column('precio',array($this,'show_precio'));
 			$crud->callback_column('idtalle',array($this,'show_centro'));
 			$crud->callback_column('idcolor',array($this,'show_centro'));
 			
    		$crud->change_field_type('activo', 'true_false' );
    		$output = $crud->render();
    		$this->load->view( "admin/abm", $output);
		}

  
		function show_activo($valor, $fila)
		{
			if ($valor)
  				return '<div align="center"><img src="img/admin/activo.png" height="16" width="16" alt="activo" /></div>';
  			else
  				return '<div align="center"><img src="img/admin/inactivo.png" height="16" width="16" alt="inactivo" /></div>';
		}
 			
		function show_precio($valor, $fila)
		{ return number_format($valor, 2);}
		
		function show_centro($valor, $fila)
		{ return '<div align="center">'.$valor.'</div>'; }
		
		function activar( $pk, $id ){
			$this->load->model("Preciomodel");
			$v = $this->Preciomodel->get( $id );
			($v[0]["activo"]) ? $estado = "0" : $estado = "1";
			$data = array( "activo" => $estado );
			$this->Preciomodel->actualizar($id, $data);
			$this->tallecolor( $pk );
		}
		
		function after_upload($uploader_response, $field_info, $files_to_upload)	{
			$configThumb = array();
			$configThumb['image_library'] = 'gd2';
			$configThumb['source_image'] = $field_info->upload_path.'/'.$uploader_response[0]->name;
			$configThumb['create_thumb'] = TRUE;
			$configThumb['maintain_ratio'] = TRUE;
			$configThumb['thumb_marker'] = "_ch";
			/* e.g. 'image.jpg' thumb would be called 'image_thumb.jpg' */
			$configThumb['width'] = 185;
			$configThumb['height'] = 185;
			/* Load the image library */
			$this->load->library('image_lib');
			$this->image_lib->initialize($configThumb);
			if (!$this->image_lib->resize())
				return $this->image_lib->display_errors();
	    	return true;			
		}
		
		function cargar_detalles($post, $id){
				$this->load->model("Detallemodel");
				$this->load->model("Detcolormodel");
				$this->load->model("Preciomodel");

				$res = false;
				if ($post["talle"]!="")
					$aTalles = $this->Detallemodel->getTallesTabla($post["talle"]);
				else 
					$aTalles = "";
				if ($post["color"]!="")
					$aColores = $this->Detcolormodel->getColoresTabla($post["color"]);
				else 
					$aColores = "";
				
				if (is_array($aTalles ) && count($aTalles )>0){
					foreach( $aTalles as $f  )
						if (is_array($aColores) && count($aColores)>0) {
							foreach ( $aColores as $c  )
								$res = $this->insertarPrecio( $post, $f["idtalle"], $c["idcolor"] );
						} else
							$res = $this->insertarPrecio( $post, $f["idtalle"] );	
				} else {
					if (is_array($aColores) && count($aColores)>0) {
						foreach ( $aColores as $c  )
								$res = $this->insertarPrecio( $post, "", $c["idcolor"] );
						} else
							$res = $this->insertarPrecio( $post );	
				}
				return $res;
		}
		
		function insertarPrecio($post, $t="", $c=""){
			$data = array();
			
			$data["codigo"] = $post["codigo"]; //$id; 
			$data["talle"] = $post["talle"];
			$data["idtalle"] = $t;
			$data["color"] = $post["color"];
			$data["idcolor"] = $c;
			$data["activo"] = 0; // true; despues el usuario activa los talles colores que desea
			$data["precio"] = $post["precio"]; 
			return $this->Preciomodel->insertar($data);
		
		}
			
		function cambiar_precio(){
			$this->load->library('grocery_CRUD');
			$crud = new grocery_CRUD();
			$crud ->set_theme('datatables');            
			$crud->set_table('precio_arti');
    		$crud->set_subject('Cambiar precios');
    		$crud->columns('codigo','talle', 'idtalle', 'color', 'idcolor', 'precio', 'activo' );
    		$crud->edit_fields('precio', 'activo');
    		
			$crud->set_rules('precio', 'precio', 'required|numeric');
			$crud->display_as('idtalle', 'TALLE');
			$crud->display_as('idcolor', 'COLOR');
			$crud->display_as('talle', 'TABLA TALLE');
			$crud->display_as('color', 'TABLA COLOR');
			
			$crud->unset_add();
			$crud->unset_delete();
			
    		$output = $crud->render();
 
    		$this->load->view( "admin/abm", $output);
		}
		
		function get_campos( $t="arti_web" ){
			$this->load->model("Articulomodel");
			$res = $this->Articulomodel->get_field_types();
			foreach( $res as $f ){
				echo "<hr>";
				foreach( $f as $l => $v )
					echo $l . " = ".$v. "<br/>";
			}			
		}
		
		function pag_ofertas(){
			$ruta = "assets/uploads/ofertas/";
			$archivo = $ruta . 'oferta.html';
			
			$this->load->helper("file");
			$this->load->helper( "directory");

			$this->form_validation->set_error_delimiters('<span>',' - </span>');
			$this->form_validation->set_rules( 'conten', 'texto de la pagina', 'required');

			$datos["files"] = directory_map($ruta);
			$datos["ruta"] = $ruta;

			if ($this->form_validation->run() == TRUE){
				$datos["conten"] = $this->input->post("conten");
				if (! write_file($archivo, $datos["conten"]) ){
					$this->session->set_userdata("mensaje", "no se pudo subir archivo");
				}
			}
			else{
				$datos["conten"] = read_file($archivo);
			}		
			$this->load->view('admin/pagina_add', $datos );			
		}
		
		function subir_archivo($folder){
			
			$config['upload_path'] = "assets/uploads/$folder";
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '200';
			$config['max_width']  = '300';
			$config['max_height']  = '300';
			$config['overwrite']  = TRUE;
			$this->load->library('upload', $config);
		
			if ( ! $this->upload->do_upload('imagen')){
	    		$mje = 'Error al subir imagen: '.$this->upload->display_errors();
	    		$this->session->set_userdata("mensaje", $mje );
			} else{ 
				$img = $this->upload->data();
				$this->session->set_userdata("mensaje", $img);
			}

			$this->pag_ofertas();	
		}
			
	}	
?>