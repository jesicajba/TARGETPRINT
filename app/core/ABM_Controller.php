<?php
	class ABM_Controller extends MY_Controller{
		function __construct($mod, $ver, $add, $edit){
			parent::__construct();
			
			$this->load->library( "form_validation");
			$this->load->helper("form");
			$this->load->helper("file");	
			$this->load->model($mod, "modelo");
			
			$this->vista_add = $add;
			$this->vista_ver = $ver;
			$this->vista_edit = $edit;

			$this->class = get_class($this);
		}
		
		function index(){
			$this->leer();
		}
		
		function leer($fila=0){
			$this->data['regs'] = array(); //completar en clase descendente ya que puede no cargarse todos los campos;
			$this->data['regs'] = $this->modelo->gettodos($fila, $this->limite ); // por defecto cargamos todos...
			
			$this->data['pagination'] = $this->iniciarPaginado();
			$this->cargarVista($this->vista_ver );
		}
		
		function insertar(){
			$this->setRules();	
		
			if ($this->form_validation->run() == FALSE){
				$this->cargarVista($this->vista_add);
			}
			else {
				$regis = array();
				foreach( $_POST as $campo => $valor ){	
	    	   		$regis[$campo] = $valor;
	    	   		$this->data[$campo] = $valor;
				}
				if (isset($_FILES) && is_array($_FILES) && count($_FILES)>0){
	    	   		$err = $this->cargarImagen($this->imagen, $img);
	    	   		if (!$err){
	    				$regis[$this->imagen] = $this->path.$img["file_name"];
	    				$this->data[$this->imagen] = $regis[$this->imagen];
	    				if ($this->crearTmb){
	    					$this->crearThumb($img);
	    				}
	    	   		}
	    			else
	    				$this->session->set_flashdata('flashError', $this->upload->display_errors());
				}			
				$err = $this->modelo->insertar($regis);	    	   		    	   					
	            if (!$err){
	           		$this->session->set_flashdata('flashConfirm', 'Se ha insertado el nuevo registro.');
	           		$this->afterinsert();
					redirect("$this->class/leer");	// volver a leer
	            } else{
	            	$this->data['flashError'] = " (".$err.") ".$this->db->_error_message();	
	           		$this->cargarVista($this->vista_add);           		
	            }	           					
			}								
		}

		function editar($id){
			$this->setRules();	
			if($this->form_validation->run())
	    	{
				foreach( $_POST as $campo => $valor ){	
	    	   		$this->data['regs'][$campo] = $valor;
				}	    	   	
				
				if (isset($_FILES) && is_array($_FILES) && count($_FILES)>0){
	    	   		$err = $this->cargarImagen($this->imagen, $img);
	    	   		if (!$err)
	    				$this->data["regs"][$this->imagen] = $this->path.$img["file_name"];
	    			else
	    				$this->session->set_flashdata('flashError', $this->upload->display_errors());
				}
								
	           	$err = $this->modelo->actualizar_2($this->data['regs']);
	           	if (!$err){	           		
	           		$this->session->set_flashdata('flashConfirm', 'Se han aceptado los cambios al registro.');
	           		$this->afteredit();
	           		redirect("$this->class/leer");
	         	}
	           	else{
	    	   		$this->data['flashError']=" (".$err.") ".$this->db->_error_message();	           		
	            }	           	           	
	    	}
	    	else
	    	{	   
	    	   	$vector = $this->modelo->get($id);
	    	   	$this->data['regs'] = $vector[0];
	    	}
	    	$this->cargarVista($this->vista_edit );
	    }
		
		function cargarVista($vista ){
			$info["vista"] = $vista;
			$info["data"] = $this->data;
			$info["titulo"] = $this->titulo;
			$info["ayuda"] = $this->ayuda;
			$this->load->view("template_ver", $info);
			return;	
		}

		function setRules(){
			$this->form_validation->set_error_delimiters('<div class="msgError">',' - </div>');
			// completar en clases hijas
		}
			
		function borrar($id){
	    	$res = $this->modelo->borrar($id);
			if ($res == 0)
	    		$this->session->set_flashdata('flashConfirm', "Se ha eliminado el registro $id");
	    	else if ($this->modelo->numError != 0)
	           	$this->session->set_flashdata('flashError', " (".$this->modelo->numError.") ".$this->db->_error_message());
	        $this->afterdelete();		
	        redirect("$this->class/leer");					
		}
		
		function afterinsert(){
			// para que la clase hija haga alguna tarea especifica
		}
		function afteredit(){
			// para que la clase hija haga alguna tarea especifica			
		}
		function afterborrar(){
			// para que la clase hija haga alguna tarea especifica			
		}
		
		
		function crearThumb($img){
      		$configThumb = array();
      		$configThumb['image_library'] = 'gd2';
          	$configThumb['source_image'] = $img['full_path'];
      		$configThumb['create_thumb'] = TRUE;
      		$configThumb['maintain_ratio'] = TRUE;
      		/* e.g. 'image.jpg' thumb would be called 'image_thumb.jpg' */
      		$configThumb['width'] = 160;
      		$configThumb['height'] = 120;
      		/* Load the image library */
      		$this->load->library('image_lib');

          	$this->image_lib->initialize($configThumb);
          	if (!$this->image_lib->resize())
          			$this->session->set_flashdata('flashError', $this->image_lib->display_errors());
		}
		
		function cargarImagen($img, &$dat){
			$config['upload_path'] = $this->path;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= $this->img_tamanomax;
			$config['max_width'] = $this->img_anchomax;
			$config['max_height'] = $this->img_altomax;
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			
			if ( !$this->upload->do_upload($img)){
				return TRUE;
			} else 
				$dat = $this->upload->data();	    		
	  		return FALSE;			
		}

		function configEditor($editor, $ancho="680", $alto="150"){
			$this->load->helper('ckeditor');

			return 		array(
				'id' 	=> 	$editor, 	
				'path'	=>	'js/ckeditor',	// Path to the ckeditor folder relative to index.php
				'config' => array(
					'width' 	=> 	$ancho."px",	//Setting a custom width
					'height' 	=> 	$alto."px",	//Setting a custom height
					'filebrowserUploadUrl' =>  site_url()."/".$this->class."/upload_ckeditor",
					'filebrowserImageUploadUrl' => site_url()."/".$this->class.'/upload_ckeditor/descripcion/1/es' // << My own file uploader			
			));		 						
		}
		 
	  	function upload_ckeditor(){
        	$this->subirImagen('upload', $upload );
        	
        	if ( isset($upload['file_name']) && trim($upload['file_name']) != '') {       		        		
        		$funcNum = $this->uri->segment('4');
            	$CKEditor = $this->uri->segment('3');
            	$langCode = $this->uri->segment('5');
 
        		// Check the $_FILES array and save the file. Assign the correct path to some variable ($url).
           	 	$url = base_url().'/uploads/' . $upload['file_name'];
        		// Usually you will assign here something only if file could not be uploaded.
        		$message = '';
        		// echo "<_script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');<_/script>";
        	} else {
            	echo "no se ha podido subir la imagen";
        	}
	  	}	  
		
		function iniciarPaginado(){
			$this->load->library('pagination');
			$config['base_url'] = site_url($this->class."/leer");
 			$config['total_rows'] = $this->modelo->contarTodos();
 			$config['per_page'] = $this->limite;
			$config['uri_segment'] = 3;
			//$config['full_tag_open'] = '<span class "texto">';
			//$config['full_tag_close'] = '</span>';		
			$config['first_link'] = 'Inicio';
			$config['last_link'] = 'Ultimo';
			$this->pagination->initialize($config);
		
			return $this->pagination->create_links();		
		}
		
		
		function excel($titulo=NULL){
			$this->load->library("Excel");
			
			$regs = $this->modelo->gettodos();

			$fecha = date("dmy hm");
			$this->excel->crearHoja($this->class."-".$fecha);
			
            if (!isset($titulo)){
            	$titulo = "LISTADO de ".$this->class;
            }
			$this->excel->Linea( $titulo );
			$this->excel->Linea( "");
			
			if (isset($regs)){				
				$reg = $regs[0];
				// print_r( $reg );
				foreach ( $reg as $k => $v ) {
					// echo "<br/> linea...";
					$this->excel->Celda( $k );
				}
			}
			$this->excel->Linea( );
			// echo "<br />entrando a bucle de datos";
				
			foreach ( $regs as $reg ){
				foreach ( $reg as $k => $v ){
					// echo "<br />$k = $v ";
					$this->excel->Celda( $v );
					// todo ingresar imagen <? if($reg->imagen!="") echo '<img src="'.base_url().$reg->imagen.'" width="120" height="75" align="left">'				
				}
				$this->excel->Linea( );
			}
			$this->excel->grabar();
			
			$this->session->set_flashdata('flashConfirm', 'Se ha generado el informe pedido. Puede encontrarlo en la carpeta informes');
			redirect("/informes");
		}
		
		function pdf($titulo=NULL)
		{
            /*load library cezpdf*/
            $this->load->library('cezpdf');
            $this->load->helper('pdf_helper');
            $this->load->helper('file');
            
            prep_pdf();
            // $this->cezpdf->ezText('<b>Cliente No.:</b> 12');
            $db_data[] = array('eye' => 'O.D.','ESF' => '+9.75','CIL' => '-1.25','EJE' => '3','ADD' => '+2.50','REF' => 'D.I. 4 mm'); 
            // $col_names = array( 'eye' => '', 'ESF' => 'ESF.', 'REF' => '' );   
            // $this->cezpdf->ezTable($db_data, $col_names, 'Graduacion registrada el 3 de Diciembre del 2009', array('width'=>550));          
            // $this->cezpdf->ezStream(array('Content-Disposition'=>'nama_file.pdf'));
            if (!isset($titulo)){
            	$titulo = "LISTADO de ".$this->class;
            }
			$this->cezpdf->ezText( $titulo );
			$this->cezpdf->ezText( "");
			
			$regs = $this->modelo->gettodos();
			$items = array();		
			
			if (isset($regs)){
				$reg = $regs[0];
				foreach ( $reg as $k => $v ) {
					$tits[$k] = $k;
				}				
			}
			foreach ($regs as $reg ){
				$item = array();
				foreach ( $reg as $k => $v ){
					$item[$k] = $v;
				}
				$items[] = $item;
			}
			//print_r( $db_data );
			//echo "<br />";
			//print_r( $items );
			//echo "<br />";
			
			$this->cezpdf->ezTable($items, $tits, "DETALLE de ITEMS" );
            
            // $this->cezpdf->addJpegfromFile( "./uploads/JACKSON_2700.jpg", 0, 0, 480 );          
			$datos = $this->cezpdf->ezOutput();
			$fecha = date("dmy Hi");
            write_file("./".APPPATH."/views/informes/$this->class-".$fecha.".pdf", $datos);
            
			$this->session->set_flashdata('flashConfirm', 'Se ha generado el informe pedido.');
			redirect('/informes');	// volver a leer
			return;            
		}		
	}