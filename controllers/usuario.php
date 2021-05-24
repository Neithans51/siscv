<?php

    class Usuario extends Controller{
        function __construct(){
            parent::__construct();
          //  $this->view->render('nuevo/index');
          $this->view->mensaje="";//se agrega esta linea para msj
        }
    function render(){
        $usuarios=$this->model->getUsuarios('departamento');
        $this->view->usuarios=$usuarios;

        $this->view->render('usuario/index');
    }

    function Registro(){
    
      //Tipo de persona
    /*  $tipos=$this->model->getCatalogo('persona_tipo');
      $this->view->tipos=$tipos;*/

       //Departamento
      $departamentos=$this->model->getCatalogo('departamento');
      $this->view->departamentos=$departamentos;

      //Perfil
      $perfiles=$this->model->getCatalogo('usuario_perfil');
      $this->view->perfiles=$perfiles;

        $this->view->render('usuario/add_user');
    }


    function BuscarUsuario(){
      $cedula=$_POST['ci'];
      $data = $this->model->Buscar($cedula);
      echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    function Save_photo(){//Se registra un usuario con foto
  
    //Datos genrales
    $cedula = $_POST["cedula"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $genero = $_POST["genero"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $departamento = $_POST["departamento"];
    $perfil = $_POST["perfil"];
      
    //Datos para Tomar una foto 
    $foto = base64_decode($_POST["foto"]);
    $route_photo = "src/fotos/".$cedula.".jpg";
    $name_photo = $cedula.".jpg";
    $file = fopen($route_photo, "w");

  
      /*  if($var=$this->model->existe($codigo)){
          $mensaje="<div class='alert alert-danger alert-dismissable'>
          <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
          el codigo  <b>" . $var . "</b> <a class='alert-link' href='#'> existe </a>producto ya resgistrado
          </div>";
          $this->view->mensaje=$mensaje;
          $this->render();
          exit();
        }*/

        $mensaje="";
        
        if($this->model->insert(['file'=>$file,'foto'=>$foto,'cedula'=>$cedula,'nombres'=>$nombres,'apellidos'=>$apellidos,
        'genero'=>$genero,'telefono'=>$telefono,'correo'=>$correo,'departamento'=>$departamento,
        'perfil'=>$perfil,'route_photo'=>$route_photo,'name_photo'=>$name_photo])){

          $mensaje="<div class='alert alert-success alert-dismissable'>
          <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
          ¡Felicidades, Usuario registrado  Exitosamente! <a class='alert-link' href='#'></a></div>";
   
        }else{
          $mensaje="<div class='alert alert-danger alert-dismissable'>
          <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
          ERROR:Ha ocurrido un error al registrar usuario <a class='alert-link' href='#'></a></div>";

        }
        $this->view->mensaje=$mensaje;
        $this->render();
    }
  



    function Save_img(){//Se registra un usuario con foto
  
      //Datos genrales
      $cedula = $_POST["cedula"];
      $nombres = $_POST["nombres"];
      $apellidos = $_POST["apellidos"];
      $genero = $_POST["genero"];
      $telefono = $_POST["telefono"];
      $correo = $_POST["correo"];
      $departamento = $_POST["departamento"];
      $perfil = $_POST["perfil"];
        
      //Datos para Guaardar una foto 
      $archivo = $_FILES["archivo"]["name"];
      $route_temp=$_FILES["archivo"]["tmp_name"];
      $fileName = basename($archivo);
      $targetFilePath = 'src/fotos/'.$fileName;
      $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
      $allowTypes = array('jpg', 'png', 'jpeg');
    
        /*  if($var=$this->model->existe($codigo)){
            $mensaje="<div class='alert alert-danger alert-dismissable'>
            <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
            el codigo  <b>" . $var . "</b> <a class='alert-link' href='#'> existe </a>producto ya resgistrado
            </div>";
            $this->view->mensaje=$mensaje;
            $this->render();
            exit();
          }*/
  
          $mensaje="";
          
          if($this->model->insert(['file'=>$file,'foto'=>$foto,'cedula'=>$cedula,'nombres'=>$nombres,'apellidos'=>$apellidos,
          'genero'=>$genero,'telefono'=>$telefono,'correo'=>$correo,'departamento'=>$departamento,
          'perfil'=>$perfil,'archivo'=>$archivo,'route_temp'=>$route_temp,'fileName'=>$fileName,'targetFilePath'=>$targetFilePath,
          'fileType'=>$fileType,'allowTypes'=>$allowTypes])){
  
            $mensaje="<div class='alert alert-success alert-dismissable'>
            <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
            ¡Felicidades, Usuario registrado  Exitosamente! <a class='alert-link' href='#'></a></div>";
     
          }else{
            $mensaje="<div class='alert alert-danger alert-dismissable'>
            <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
            ERROR:Ha ocurrido un error al registrar usuario <a class='alert-link' href='#'></a></div>";
  
          }
          $this->view->mensaje=$mensaje;
          $this->render();
      }





    }

?>