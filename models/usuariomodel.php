<?php
include_once 'models/siscv.php';
include_once 'SED.php';
class UsuarioModel extends Model{
    public function __construct(){
    parent::__construct();
    }

         public function Buscar($cedula){
        //   $item=new Dtodito();
           try{
           
            list($nacionalidad, $nro_cedula) = explode("-", $cedula);

             $query=$this->db->connect()->prepare("SELECT cedper AS cedula, nomper AS nombres, apeper AS apellidos,telmovper AS telefono, sexper AS genero,
             nacper AS nacionalidad, coreleper AS correo, carantper AS cargo
              FROM sno_personal WHERE cedper=:cedula AND nacper=:nacionalidad");
             $query->execute(['cedula'=>$nro_cedula,'nacionalidad'=>$nacionalidad]);
             $row=$query->fetch();
             if(!empty($row)){
               $data=$row;
             }else{
               $data=0;
             }
             return $data;
           }catch(PDOException $e){
             return null;
           }
           
         }

         public function getCatalogo($valor){
            $items=[];
           try{
          $query=$this->db->connect()->query("SELECT * FROM ".$valor."");
          
          while($row=$query->fetch()){
          $item=new Siscv();
          $item->id=$row['id_'.$valor.''];
          $item->descripcion=$row['descripcion'];
          
          array_push($items,$item);
          
          }
          return $items;
          
          }catch(PDOException $e){
          return[];
          }
          
          }

        



      public function insert($datos){
     
        try{

            //1. guardas el objeto pdo en una variable
            $pdo=$this->db->connect();
            //2. comienzas transaccion
            $pdo->beginTransaction();

             //3. hacer toas las consultas 

            //SEPARAMOS CEDULA DE NACIONALIDAD
             list($nacionalidad, $nro_cedula) = explode("-", $datos['cedula']);

             //Guardar foto carturada
             if($datos['file']){
                $fotos = fwrite($datos['file'], $datos['foto']);
                fclose($datos['file']);
                
                //Tabla persona
             $query=$pdo->prepare('INSERT INTO persona(
                 cedula, nombres, apellidos, telefono, nacionalidad, 
                genero, documento, id_persona_tipo, correo)
                  VALUES (:cedula, :nombres, :apellidos, :telefono, :nacionalidad, :genero, 
                :documento, :id_persona_tipo, :correo);');
          
            $query->execute(['cedula'=>$nro_cedula,'nombres'=>$datos['nombres'],
            'apellidos'=>$datos['apellidos'],'telefono'=>$datos['telefono'],
            'nacionalidad'=>$nacionalidad,'genero'=>$datos['genero'],
            'documento'=>$datos['route_photo'],'id_persona_tipo'=>1,
            'correo'=>$datos['correo']]);
            

            //Toma el id de persona
            $query = $pdo->prepare("SELECT id_persona FROM persona ORDER BY id_persona DESC LIMIT 1");
            $query ->execute();
            $persona = $query->fetch();
            $persona['id_persona'];

              //Tabla usuario
            $query=$pdo->prepare('INSERT INTO usuario(
                usuario, password, fecha_registro, estatus, id_departamento, 
                id_persona, id_usuario_perfil) VALUES (:usuario, :password, :fecha_registro, :estatus, :id_departamento, :id_persona, 
                :id_usuario_perfil);');
           
            $crypt= new SED();
            $query->execute(['usuario'=>'ubv'.$nro_cedula,'password'=>$crypt->encryption($nro_cedula),
            'fecha_registro'=>date('Y/m/d'),'estatus'=>1,
            'id_departamento'=>$datos['departamento'],'id_persona'=>$persona['id_persona'],
            'id_usuario_perfil'=>$datos['perfil']]);
            

             }


             //Guardar foto 
             if(!empty($datos["archivo"])){
              if (in_array($datos["fileType"], $datos["allowTypes"])) {
                if(copy($datos["route_temp"], $datos["targetFilePath"])){
                  $uploadedFile = $datos["fileName"];


                //Tabla persona
                $query=$pdo->prepare('INSERT INTO persona(
                  cedula, nombres, apellidos, telefono, nacionalidad, 
                genero, documento, id_persona_tipo, correo)
                  VALUES (:cedula, :nombres, :apellidos, :telefono, :nacionalidad, :genero, 
                :documento, :id_persona_tipo, :correo);');

                $query->execute(['cedula'=>$nro_cedula,'nombres'=>$datos['nombres'],
                'apellidos'=>$datos['apellidos'],'telefono'=>$datos['telefono'],
                'nacionalidad'=>$nacionalidad,'genero'=>$datos['genero'],
                'documento'=>$datos['targetFilePath'],'id_persona_tipo'=>1,
                'correo'=>$datos['correo']]);
                

                //Toma el id de persona
                $query = $pdo->prepare("SELECT id_persona FROM persona ORDER BY id_persona DESC LIMIT 1");
                $query ->execute();
                $persona = $query->fetch();
                $persona['id_persona'];

                  //Tabla usuario
                $query=$pdo->prepare('INSERT INTO usuario(
                    usuario, password, fecha_registro, estatus, id_departamento, 
                    id_persona, id_usuario_perfil) VALUES (:usuario, :password, :fecha_registro, :estatus, :id_departamento, :id_persona, 
                    :id_usuario_perfil);');

                $crypt= new SED();
                $query->execute(['usuario'=>'ubv'.$nro_cedula,'password'=>$crypt->encryption($nro_cedula),
                'fecha_registro'=>date('Y/m/d'),'estatus'=>1,
                'id_departamento'=>$datos['departamento'],'id_persona'=>$persona['id_persona'],
                'id_usuario_perfil'=>$datos['perfil']]);
                


                }
              }
            }




            // header('Content-type: application/json; charset=utf-8');
       
              //4. consignas la transaccion (en caso de que no suceda ningun fallo)
              $pdo->commit(); 
            
                return true;
       
        }catch(PDOException $e){
            //echo "Matricula duplicada";
            return false;
                 }
            
                }
    




                public function getUsuarios($valor){
                  $items=[];
                 try{
                $query=$this->db->connect()->query("SELECT id_usuario,usuario.id_persona, usuario, fecha_registro,
                 estatus,nombres,apellidos,telefono,correo,usuario_perfil.descripcion AS perfil,
                  departamento.descripcion AS departamento
                  FROM usuario,usuario_perfil,departamento,persona WHERE
                  usuario.id_usuario_perfil = usuario_perfil.id_usuario_perfil
                  AND usuario.id_departamento=departamento.id_departamento
                  AND usuario.id_persona=persona.id_persona");
                
                while($row=$query->fetch()){
                $item=new Siscv();
                $item->id_usuario=$row['id_usuario'];
                $item->id_persona=$row['id_persona'];
                $item->usuario=$row['usuario'];
                $item->fecha_registro=$row['fecha_registro'];
                $item->perfil=$row['perfil'];
                $item->departamento=$row['departamento'];
                $item->estatus=$row['estatus'];

                $item->nombres=$row['nombres'];   
                $item->apellidos=$row['apellidos'];
                $item->telefono=$row['telefono'];
                $item->correo=$row['correo'];
                
                
                array_push($items,$item);
                
                }
                return $items;
                
                }catch(PDOException $e){
                return[];
                }
                
                }
      
         

  
    }

    ?>