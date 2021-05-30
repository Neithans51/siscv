<?php
include_once 'models/cvubv.php';
class HomeModel extends Model{
    public function __construct(){
    parent::__construct();
    }

    public function getEstadistica(){
        $item=new Cvubv();
    try{
    $query=$this->db->connect()->query("SELECT * FROM estadisticas()");

    while($row=$query->fetch()){
   
    $item->pases=$row['pases'];
    $item->usuarios=$row['usuarios'];
    $item->visitantes=$row['visitantes'];
    $item->visitas=$row['visitas'];
   

    }
    return $item;

    }catch(PDOException $e){
        return false;
    }

    }
    }

    ?>