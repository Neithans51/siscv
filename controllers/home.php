<?php
include_once 'session_admin.php';
    class Home extends Controller{
        function __construct(){
            parent::__construct();
          //  $this->view->render('nuevo/index');
          $this->view->mensaje="";//se agrega esta linea para msj
        }
    function render(){

        $estadistica=$this->model->getEstadistica();
        $this->view->estadistica=$estadistica;

        $this->view->render('home/index');
    }

  

    }

?>