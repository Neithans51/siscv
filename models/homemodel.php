<?php

class HomeModel extends Model{
    public function __construct(){
    parent::__construct();
    }

    public function insert($datos){
    //echo "<br>insertar datos";
    try{
        $query=$this->db->connect()->prepare('INSERT INTO alumno(matricula,nombre,apellido) values(:matricula, :nombre, :apellido)');
       // $query=$this->db->conect()->prepare('INSERT INTO ALUMNO(MATRICULA,NOMBRE,APELLIDO)values(:matricula,:nombre,:apellido)');
        $query->execute(['matricula'=>$datos['matricula'],'nombre'=>$datos['nombre'],'apellido'=>$datos['apellido']]);
   return true;
   
    }catch(PDOException $e){
        //echo "Matricula duplicada";
        return false;
             }
    
    
            }
    }

    ?>