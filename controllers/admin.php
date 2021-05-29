<?php
  include_once 'session_admin.php';
    class Admin extends Controller {
        function __construct(){
            parent::__construct();

            //echo "<p>Nuevo Controller</p>";
        }

        function render(){ //Pases
          $pases=$this->model->getPases();
          $this->view->pases=$pases;
          $this->view->render('admin/pase');
        }

        function Pase(){//Paases
            $this->view->render('admin/add_pase');
          }

          function VerPase($param=null){//Pases
            $id_pase=$param[0];
            $vista=$param[1];
            $pase = $this->model->DetallePase($id_pase);
            $this->view->vista=$vista;
            $this->view->pase=$pase;

            $this->view->render('admin/add_pase');
          }

      
       
        function RegistrarPase(){
        //Datos Pases
        $pase = $_POST["pase"];

        if($data=$this->model->existe($pase)){
        $mensaje="<div class='alert alert-danger alert-dismissable'>
        <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
        El codigo  <b>" . $data . "</b> ya se encuentra registrado
        </div>";
        $this->view->mensaje=$mensaje;
        $this->render();
        exit();
      }
  
            $mensaje="";
            
            if($this->model->insert(['pase'=>$pase])){
    
              $mensaje="<div class='alert alert-success alert-dismissable'>
              <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
              ¡Felicidades, registro  Exitoso! <a class='alert-link' href='#'></a></div>";
       
            }else{
              $mensaje="<div class='alert alert-danger alert-dismissable'>
              <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
              ERROR:Ha ocurrido un error al realizar su registro <a class='alert-link' href='#'></a></div>";
    
            }
            $this->view->mensaje=$mensaje;
            $this->render();
            
        }

        function EditarPase(){
          //Datos Pases
          $id_pase = $_POST["id_pase"];
          $pase = $_POST["pase"];
  
         /* if($data=$this->model->existe($pase)){
          $mensaje="<div class='alert alert-danger alert-dismissable'>
          <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
          El codigo  <b>" . $data . "</b> ya se encuentra registrado
          </div>";
          $this->view->mensaje=$mensaje;
          $this->render();
          exit();
        }*/
    
              $mensaje="";
              
              if($this->model->edit(['id_pase'=>$id_pase,'pase'=>$pase])){
      
                $mensaje="<div class='alert alert-success alert-dismissable'>
                <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
                ¡Felicidades, registro editado Exitosamente! <a class='alert-link' href='#'></a></div>";
         
              }else{
                $mensaje="<div class='alert alert-danger alert-dismissable'>
                <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
                ERROR:Ha ocurrido un error al editar su registro <a class='alert-link' href='#'></a></div>";
      
              }
              $this->view->mensaje=$mensaje;
              $this->render();
              
          }
  


      
        function Depart(){//Departamentos
          $departs=$this->model->getDepartamentos();
          $this->view->departs=$departs;
          $this->view->render('admin/depart');
        }

        function Departamento(){//Departamentos ver registro
          $this->view->render('admin/add_depart');
        }

        function VerDepart($param=null){//Pases
          $id_departamento=$param[0];
          $vista=$param[1];
          $depart = $this->model->DetalleDepart($id_departamento);
          $this->view->vista=$vista;
          $this->view->depart=$depart;

          $this->view->render('admin/add_depart');
        }


       
        function RegistrarDepart(){
          //Datos Pases
          $oficina = $_POST["oficina"];
          $nombre = $_POST["nombre"];

         /* if($data=$this->model->existe($pase)){
          $mensaje="<div class='alert alert-danger alert-dismissable'>
          <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
          El codigo  <b>" . $data . "</b> ya se encuentra registrado
          </div>";
          $this->view->mensaje=$mensaje;
          $this->render();
          exit();
        }*/
    
              $mensaje="";
              
              if($this->model->insertDepart(['oficina'=>$oficina,'nombre'=>$nombre])){
      
                $mensaje="<div class='alert alert-success alert-dismissable'>
                <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
                ¡Felicidades, registro  Exitoso! <a class='alert-link' href='#'></a></div>";
         
              }else{
                $mensaje="<div class='alert alert-danger alert-dismissable'>
                <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
                ERROR:Ha ocurrido un error al realizar su registro <a class='alert-link' href='#'></a></div>";
      
              }
              $this->view->mensaje=$mensaje;
              $this->Depart();
              
          }
  
          function EditarDepart(){
            //Datos Pases
            $id_departamento = $_POST["id_departamento"];
            $oficina = $_POST["oficina"];
            $nombre = $_POST["nombre"];
    
           /* if($data=$this->model->existe($pase)){
            $mensaje="<div class='alert alert-danger alert-dismissable'>
            <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
            El codigo  <b>" . $data . "</b> ya se encuentra registrado
            </div>";
            $this->view->mensaje=$mensaje;
            $this->render();
            exit();
          }*/
      
                $mensaje="";
                
                if($this->model->editDepart(['id_departamento'=>$id_departamento,'oficina'=>$oficina,'nombre'=>$nombre])){
        
                  $mensaje="<div class='alert alert-success alert-dismissable'>
                  <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
                  ¡Felicidades, registro editado Exitosamente! <a class='alert-link' href='#'></a></div>";
           
                }else{
                  $mensaje="<div class='alert alert-danger alert-dismissable'>
                  <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
                  ERROR:Ha ocurrido un error al editar su registro <a class='alert-link' href='#'></a></div>";
        
                }
                $this->view->mensaje=$mensaje;
                $this->Depart();
                
            }
    
  
  


    }

?>