<?php
     include_once 'models/cvubv.php';
     include_once 'SED.php';
    class MainModel extends Model{
        public function __construct(){
            parent::__construct();
        }
        
      

        public function getLogin($datos){
            //var_dump($datos);
        //    exit();
            try{ 
                $crypt= new SED();
                $contrasena=$crypt->encryption($datos['contrasena']);


                    

                $query=$this->db->connect()->prepare("SELECT usuario.id_usuario,usuario,password,estatus,cedula,nombres,apellidos,correo,
                departamento.descripcion AS departamento, persona.id_persona,usuario_perfil.id_usuario_perfil,usuario_perfil.descripcion AS perfil,documento
                FROM usuario,usuario_perfil,persona,departamento 
                WHERE usuario.id_usuario_perfil=usuario_perfil.id_usuario_perfil
                AND usuario.id_persona=persona.id_persona
                AND usuario.id_departamento=departamento.id_departamento
                AND  (usuario=:usuario OR correo=:usuario) AND password=:password");
                $query->execute(['usuario'=> $datos['usuario'], 'password' =>$contrasena]);
                
                $var=$query->fetch();
                if(($var['correo']==$datos['usuario'] || $var['usuario']==$datos['usuario'] ) && $var['password'] == $contrasena && $var['estatus'] == 1 ){
                   
                    //variables de sesion
                    //session_start();
                    $_SESSION['id_usuario']=$var['id_usuario'];
                    $_SESSION['usuario']=$var['usuario'];
                    $_SESSION['nombres']=$var['nombres'];
                    $_SESSION['apellidos']=$var['apellidos'];
                    $_SESSION['departamento']=$var['departamento'];
             
                    $_SESSION['correo']=$var['correo'];
                    
                    $_SESSION['id_perfil']=$var['id_perfil'];
                    $_SESSION['documento']=$var['documento'];

                    $_SESSION['id_usuario_perfil']=$var['id_usuario_perfil'];
                    $_SESSION['perfil']=$var['perfil'];
                    $_SESSION['bienvenido']=1;
                  
                  

                    return true;
                }

            } catch(PDOException $e){
                return false;
            }


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