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

    function RegistroUsuario(){
        $this->view->render('usuario/usuario');
    }
  

    }

?>