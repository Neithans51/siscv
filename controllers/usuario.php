<?php

    class Usuario extends Controller{
        function __construct(){
            parent::__construct();
          //  $this->view->render('nuevo/index');
          $this->view->mensaje="";//se agrega esta linea para msj
        }
    function render(){
        $this->view->render('usuario/index');
    }

    function Registro(){
        $this->view->render('usuario/usuario');
    }


    function RegistraUsuariof(){//Se registra un usuario con foto
    echo($foto); exit();
    $foto = base64_decode($_POST["foto"]);
	$nombres = $_POST["nombres"];
	$apellidos = $_POST["apellidos"];
	
	$email = $_POST["email"];
	$cedula = $_POST["cedula"];
    $genero = $_POST["genero"];
    
	$telefono = $_POST["telefono"];
	$nacionalidad = $_POST["nacionalidad"];

	$route_photo = "../foto/f_".$dni.".jpg";
	$name_photo = "f_".$dni.".jpg";

        
        if($var=$this->model->existe($codigo)){
          $mensaje="<div class='alert alert-danger alert-dismissable'>
          <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
          el codigo  <b>" . $var . "</b> <a class='alert-link' href='#'> existe </a>producto ya resgistrado
          </div>";
          $this->view->mensaje=$mensaje;
          $this->render();
          exit();
      }

        $mensaje="";
        
        if($this->model->insert(['codigo'=>$codigo,'nombre_producto'=>$nombre_producto,'precio'=>$precio,'existencia'=>$existencia,
        'proveedor'=>$proveedor])){
          $mensaje="<div class='alert alert-success alert-dismissable'>
          <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
          ¡Felicidades, Producto Agregado  Exitosamente! <a class='alert-link' href='#'></a></div>";
   
        }else{
          $mensaje="<div class='alert alert-danger alert-dismissable'>
          <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
          ERROR:Ha ocurrido un error al registrar el producto <a class='alert-link' href='#'></a></div>";

        }
        $this->view->mensaje=$mensaje;
        $this->render();
    }
  

    }

?>