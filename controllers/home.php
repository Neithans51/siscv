<?php

    class Home extends Controller{
        function __construct(){
            parent::__construct();
          //  $this->view->render('nuevo/index');
          $this->view->mensaje="";//se agrega esta linea para msj
        }
    function render(){
        $this->view->render('home/index');
    }

  

    }

?>