<?php
include_once 'models/cvubv.php';
include_once 'SED.php';
class VisitanteModel extends Model{
    public function __construct(){
    parent::__construct();
    }


        public function existePaseAsignado($nro_cedula){//Valisa si el usuario tiene un pase asignado
          try{
        
            $validator = array('asig_pase' => false, 'messages' => array());

            $sql = $this->db->connect()->prepare("SELECT pase.id_pase FROM visitante,pase WHERE
            visitante.id_persona=(SELECT id_persona FROM persona WHERE cedula=:cedula)
            AND visitante.id_pase=pase.id_pase 
            AND estatus =:estatus LIMIT 1");
            $sql->execute(['cedula' =>$nro_cedula,'estatus' =>1]);
            $nombre=$sql->fetch();
            
            if(!empty($nombre['id_pase'])){
              $validator['asig_pase'] = true;
                return $validator;
        
            } 
            return false;
          } catch(PDOException $e){
            return false;
          }
        }

        public function existePases(){ //VAlida si hay pases para asignar
          try{
        
            $validator = array('no_pase' => false, 'messages' => array());

            $sql = $this->db->connect()->prepare("SELECT id_pase FROM pase WHERE estatus=:estatus LIMIT 1");
            $sql->execute(['estatus' =>0]);
            $nombre=$sql->fetch();
            
            if(empty($nombre['id_pase'])){
              $validator['no_pase'] = true;
                return $validator;
        
            } 
            return false;
          } catch(PDOException $e){
            return false;
          }
        }



       /* public function ValVisitante(){ //VAlida si hay pases para asignar
          try{
        
            $validator = array('no_pase' => false, 'messages' => array());

            $sql = $this->db->connect()->prepare("SELECT id_pase FROM pase WHERE estatus=:estatus LIMIT 1");
            $sql->execute(['estatus' =>0]);
            $nombre=$sql->fetch();
            
            if(empty($nombre['id_pase'])){
              $validator['no_pase'] = true;
                return $validator;
        
            } 
            return false;
          } catch(PDOException $e){
            return false;
          }
        }*/

        public function Detalle($id_usuario){
          $item=new Cvubv();
         try{
        $query=$this->db->connect()->prepare("SELECT persona.id_persona,cedula,nombres,apellidos,
        telefono,nacionalidad,genero,documento,persona.id_persona_tipo,
        persona_tipo.descripcion AS persona_tipo,correo, usuario.id_usuario,usuario,password,
        fecha_registro,usuario.estatus,departamento.id_departamento,
        departamento.descripcion AS departamento,
        usuario_perfil.id_usuario_perfil,usuario_perfil.descripcion AS usaurio_perfil
        FROM persona,persona_tipo,usuario,usuario_perfil,departamento 
        WHERE persona.id_persona_tipo=persona_tipo.id_persona_tipo 
        AND usuario.id_persona=persona.id_persona
        AND usuario.id_usuario_perfil=usuario_perfil.id_usuario_perfil
        AND usuario.id_departamento=departamento.id_departamento
        AND usuario.id_usuario=:id_usuario");
        $query->execute(['id_usuario' =>$id_usuario]);

        while($row=$query->fetch()){
      
        $item->id_persona=$row['id_persona'];
        $item->cedula=$row['cedula'];
        $item->nombres=$row['nombres'];
        $item->apellidos=$row['apellidos'];
        $item->telefono=$row['telefono'];
        $item->nacionalidad=$row['nacionalidad'];
        $item->genero=$row['genero'];
        $item->documento=$row['documento'];
        $item->id_persona_tipo=$row['id_persona_tipo'];
        $item->persona_tipo=$row['persona_tipo'];
        $item->correo=$row['correo'];

        $item->id_usuario=$row['id_usuario'];
        $item->usuario=$row['usuario'];
        $item->password=$row['password'];
        $item->fecha_registro=$row['fecha_registro'];
        $item->estatus=$row['estatus'];
        $item->id_departamento=$row['id_departamento'];

        $item->departamento=$row['departamento'];
        $item->id_usuario_perfil=$row['id_usuario_perfil'];
        $item->usaurio_perfil=$row['usaurio_perfil'];

      
        
        }
        return $item;
        
        }catch(PDOException $e){
        return null;
        }
        
        }

         public function Buscar($cedula){
        //   $item=new Dtodito();
           try{
           
            list($nacionalidad, $nro_cedula) = explode("-", $cedula);

            //BD SIGAD TABLA SNO_PERSONA
             $query=$this->db->connect()->prepare("SELECT cedper AS cedula, nomper AS nombres, apeper AS apellidos,telmovper AS telefono, sexper AS genero,
             nacper AS nacionalidad, coreleper AS correo, carantper AS cargo
              FROM sno_personal WHERE cedper=:cedula AND nacper=:nacionalidad");
             $query->execute(['cedula'=>$nro_cedula,'nacionalidad'=>$nacionalidad]);
            
             $row=$query->fetch();


            //TABLA PERSONA
             $query1=$this->db->connect()->prepare("SELECT id_persona,cedula,nombres,apellidos,telefono,genero,nacionalidad,correo FROM persona
             WHERE cedula=:cedula AND nacionalidad=:nacionalidad");
             $query1->execute(['cedula'=>$nro_cedula,'nacionalidad'=>$nacionalidad]);

             $row1=$query1->fetch();


             
             if(!empty($row1)){//SISTEMA
               $data=$row1;
             }else if(!empty($row)){ //SIGAD
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
          $item=new Cvubv();
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

             $validator = array('success' => false, 'messages' => array());

           
             if(!empty($datos['file'])){  //Guardar foto carturada
                $fotos = fwrite($datos['file'], $datos['foto']);
                fclose($datos['file']);
                
               //////////////////////////////////////////////////////////              
                if(empty($datos['id_persona'])){ //USUARIO NO REGISTRADO lo REGISTRAMOS
                
                  //TABLA SIGAD (VALIDAMOS SI EL USUARIO EXIsTE PRA CAMBIAR SU TIPO )
  
                  $query=$pdo->prepare('SELECT cedper FROM sno_personal WHERE cedper=:cedula');
                  $query->execute(['cedula'=>$nro_cedula]);
                  $tipo_persona = $query->fetch();
                  $tipo=$tipo_persona['cedper'];
  
                  if(!empty($tipo)){
                    //REGISTRO EXIsTE
                    $tipo_persona=1;// Personal UBV
                  }else{
                    $tipo_persona=2;// Visitante
  
                  }
  
                  //TABLA PERSONA
                $query=$pdo->prepare('INSERT INTO persona(
                  cedula, nombres, apellidos, telefono, nacionalidad, 
                genero, documento, id_persona_tipo, correo)
                  VALUES (:cedula, :nombres, :apellidos, :telefono, :nacionalidad, :genero, 
                :documento, :id_persona_tipo, :correo);');
  
                $query->execute(['cedula'=>$nro_cedula,'nombres'=>$datos['nombres'],
                'apellidos'=>$datos['apellidos'],'telefono'=>$datos['telefono'],
                'nacionalidad'=>$nacionalidad,'genero'=>$datos['genero'],
                'documento'=>$datos['foto_ubv'],'id_persona_tipo'=>$tipo_persona,
                'correo'=>$datos['correo']]);
  
                //Toma el id de persona
                $query = $pdo->prepare("SELECT id_persona FROM persona ORDER BY id_persona DESC LIMIT 1");
                $query ->execute();
                $persona = $query->fetch();
                $id_persona=$persona['id_persona'];
                }else{
                 $id_persona=$datos['id_persona'];
                }
  
                //SELECIONAMOS EL PASE
                $query=$pdo->prepare('SELECT id_pase FROM pase WHERE estatus=:estatus LIMIT 1');
                $query->execute(['estatus'=>0]);
                $pase = $query->fetch();
                $pase['id_pase'];
  
  
                $query=$pdo->prepare('INSERT INTO visitante(
                   motivo, paquete, observacion, id_departamento, 
                  id_persona, id_pase, procedencia, id_anfitrion)
                  VALUES  (:motivo, :paquete, :observacion, :id_departamento,
                   :id_persona, :id_pase, 
                :procedencia, :id_anfitrion);');
  
                $query->execute(['motivo'=>$datos['motivo'],'paquete'=>$datos['paquete'],
                'observacion'=>$datos['observacion'],'id_departamento'=>$datos['departamento'],
                'id_persona'=>$id_persona,'id_pase'=> $pase['id_pase'],
                'procedencia'=>$datos['procedencia'],
                'id_anfitrion'=>$datos['anfitrion']]);
  
                 //Toma el id del visitante
                 $query = $pdo->prepare("SELECT id_visitante FROM visitante ORDER BY id_visitante DESC LIMIT 1");
                 $query ->execute();
                 $persona = $query->fetch();
                 $persona['id_visitante'];
  
                  //ACTUALIZAMOS EL ESTATUS DEL PASE SELECIONADO 
                  $query=$pdo->prepare('UPDATE pase SET estatus=:estatus WHERE id_pase=:id_pase ');
                  $query->execute(['estatus'=>1,'id_pase'=> $pase['id_pase']]);
  
  
                  //REGISTRAMOS LA ENTRADA DEL VISITANTE A LA INSTITUCION
  
                  $query=$pdo->prepare('INSERT INTO visitante_detalle(
                     estatus, fecha, id_visitante, id_usuario)
                   VALUES  (:estatus, :fecha, :id_visitante, :id_usuario);');
                //Estatus 1 entro 0 salio
                 $query->execute(['estatus'=>1,'fecha'=>date('Y-m-d h:i:s', time()),
                 'id_visitante'=>$persona['id_visitante'],'id_usuario'=>$_SESSION['id_usuario']]);
   
                //////////////////////////////////////////////////////////


            

             }else if(!empty($datos["archivo"])){ //Guardar foto tomada del sistema
              if (in_array($datos["fileType"], $datos["allowTypes"])) {

                list($url, $extension) = explode(".", $datos["targetFilePath"]);
              //SE RENOMBRA IMAGEN
                $url="src/fotos/".$nro_cedula.".".$extension;

                if(copy($datos["route_temp"], $url)){
                  $uploadedFile = $datos["fileName"];

           
                  //////////////////////////////////////////////////////////
                  if(empty($datos['id_persona'])){ //USUARIO NO REGISTRADO lo REGISTRAMOS
                
                    //TABLA SIGAD (VALIDAMOS SI EL USUARIO EXIsTE PRA CAMBIAR SU TIPO )
    
                    $query=$pdo->prepare('SELECT cedper FROM sno_personal WHERE cedper=:cedula');
                    $query->execute(['cedula'=>$nro_cedula]);
                    $tipo_persona = $query->fetch();
                    $tipo=$tipo_persona['cedper'];
    
                    if(!empty($tipo)){
                      //REGISTRO EXIsTE
                      $tipo_persona=1;// Personal UBV
                    }else{
                      $tipo_persona=2;// Visitante
    
                    }
    
                    //TABLA PERSONA
                  $query=$pdo->prepare('INSERT INTO persona(
                    cedula, nombres, apellidos, telefono, nacionalidad, 
                  genero, documento, id_persona_tipo, correo)
                    VALUES (:cedula, :nombres, :apellidos, :telefono, :nacionalidad, :genero, 
                  :documento, :id_persona_tipo, :correo);');
    
                  $query->execute(['cedula'=>$nro_cedula,'nombres'=>$datos['nombres'],
                  'apellidos'=>$datos['apellidos'],'telefono'=>$datos['telefono'],
                  'nacionalidad'=>$nacionalidad,'genero'=>$datos['genero'],
                  'documento'=>$datos['foto_ubv'],'id_persona_tipo'=>$tipo_persona,
                  'correo'=>$datos['correo']]);
    
                  //Toma el id de persona
                  $query = $pdo->prepare("SELECT id_persona FROM persona ORDER BY id_persona DESC LIMIT 1");
                  $query ->execute();
                  $persona = $query->fetch();
                  $id_persona=$persona['id_persona'];
                  }else{
                   $id_persona=$datos['id_persona'];
                  }
    
                  //SELECIONAMOS EL PASE
                  $query=$pdo->prepare('SELECT id_pase FROM pase WHERE estatus=:estatus LIMIT 1');
                  $query->execute(['estatus'=>0]);
                  $pase = $query->fetch();
                  $pase['id_pase'];
    
    
                  $query=$pdo->prepare('INSERT INTO visitante(
                     motivo, paquete, observacion, id_departamento, 
                    id_persona, id_pase, procedencia, id_anfitrion)
                    VALUES  (:motivo, :paquete, :observacion, :id_departamento,
                     :id_persona, :id_pase, 
                  :procedencia, :id_anfitrion);');
    
                  $query->execute(['motivo'=>$datos['motivo'],'paquete'=>$datos['paquete'],
                  'observacion'=>$datos['observacion'],'id_departamento'=>$datos['departamento'],
                  'id_persona'=>$id_persona,'id_pase'=> $pase['id_pase'],
                  'procedencia'=>$datos['procedencia'],
                  'id_anfitrion'=>$datos['anfitrion']]);
    
                   //Toma el id del visitante
                   $query = $pdo->prepare("SELECT id_visitante FROM visitante ORDER BY id_visitante DESC LIMIT 1");
                   $query ->execute();
                   $persona = $query->fetch();
                   $persona['id_visitante'];
    
                    //ACTUALIZAMOS EL ESTATUS DEL PASE SELECIONADO 
                    $query=$pdo->prepare('UPDATE pase SET estatus=:estatus WHERE id_pase=:id_pase ');
                    $query->execute(['estatus'=>1,'id_pase'=> $pase['id_pase']]);
    
    
                    //REGISTRAMOS LA ENTRADA DEL VISITANTE A LA INSTITUCION
    
                    $query=$pdo->prepare('INSERT INTO visitante_detalle(
                       estatus, fecha, id_visitante, id_usuario)
                     VALUES  (:estatus, :fecha, :id_visitante, :id_usuario);');
                  //Estatus 1 entro 0 salio
                   $query->execute(['estatus'=>1,'fecha'=>date('Y-m-d h:i:s', time()),
                   'id_visitante'=>$persona['id_visitante'],'id_usuario'=>$_SESSION['id_usuario']]);
                    //////////////////////////////////////////////////////////


                
                }
              }
            }else{ //Guardar foto del sistema (UBV)
              //Tabla persona
              //////////////////////////////////////////////////////////
              if(empty($datos['id_persona'])){ //USUARIO NO REGISTRADO lo REGISTRAMOS
                
                //TABLA SIGAD (VALIDAMOS SI EL USUARIO EXIsTE PRA CAMBIAR SU TIPO )

                $query=$pdo->prepare('SELECT cedper FROM sno_personal WHERE cedper=:cedula');
                $query->execute(['cedula'=>$nro_cedula]);
                $tipo_persona = $query->fetch();
                $tipo=$tipo_persona['cedper'];

                if(!empty($tipo)){
                  //REGISTRO EXIsTE
                  $tipo_persona=1;// Personal UBV
                }else{
                  $tipo_persona=2;// Visitante

                }

                //TABLA PERSONA
              $query=$pdo->prepare('INSERT INTO persona(
                cedula, nombres, apellidos, telefono, nacionalidad, 
              genero, documento, id_persona_tipo, correo)
                VALUES (:cedula, :nombres, :apellidos, :telefono, :nacionalidad, :genero, 
              :documento, :id_persona_tipo, :correo);');

              $query->execute(['cedula'=>$nro_cedula,'nombres'=>$datos['nombres'],
              'apellidos'=>$datos['apellidos'],'telefono'=>$datos['telefono'],
              'nacionalidad'=>$nacionalidad,'genero'=>$datos['genero'],
              'documento'=>$datos['foto_ubv'],'id_persona_tipo'=>$tipo_persona,
              'correo'=>$datos['correo']]);

              //Toma el id de persona
              $query = $pdo->prepare("SELECT id_persona FROM persona ORDER BY id_persona DESC LIMIT 1");
              $query ->execute();
              $persona = $query->fetch();
              $id_persona=$persona['id_persona'];
              }else{
               $id_persona=$datos['id_persona'];
              }

              //SELECIONAMOS EL PASE
              $query=$pdo->prepare('SELECT id_pase FROM pase WHERE estatus=:estatus LIMIT 1');
              $query->execute(['estatus'=>0]);
              $pase = $query->fetch();
              $pase['id_pase'];


              $query=$pdo->prepare('INSERT INTO visitante(
                 motivo, paquete, observacion, id_departamento, 
                id_persona, id_pase, procedencia, id_anfitrion)
                VALUES  (:motivo, :paquete, :observacion, :id_departamento,
                 :id_persona, :id_pase, 
              :procedencia, :id_anfitrion);');

              $query->execute(['motivo'=>$datos['motivo'],'paquete'=>$datos['paquete'],
              'observacion'=>$datos['observacion'],'id_departamento'=>$datos['departamento'],
              'id_persona'=>$id_persona,'id_pase'=> $pase['id_pase'],
              'procedencia'=>$datos['procedencia'],
              'id_anfitrion'=>$datos['anfitrion']]);

               //Toma el id del visitante
               $query = $pdo->prepare("SELECT id_visitante FROM visitante ORDER BY id_visitante DESC LIMIT 1");
               $query ->execute();
               $persona = $query->fetch();
               $persona['id_visitante'];

                //ACTUALIZAMOS EL ESTATUS DEL PASE SELECIONADO 
                $query=$pdo->prepare('UPDATE pase SET estatus=:estatus WHERE id_pase=:id_pase ');
                $query->execute(['estatus'=>1,'id_pase'=> $pase['id_pase']]);


                //REGISTRAMOS LA ENTRADA DEL VISITANTE A LA INSTITUCION

                $query=$pdo->prepare('INSERT INTO visitante_detalle(
                   estatus, fecha, id_visitante, id_usuario)
                 VALUES  (:estatus, :fecha, :id_visitante, :id_usuario);');
              //Estatus 1 entro 0 salio
               $query->execute(['estatus'=>1,'fecha'=>date('Y-m-d h:i:s', time()),
               'id_visitante'=>$persona['id_visitante'],'id_usuario'=>$_SESSION['id_usuario']]);
 
                //////////////////////////////////////////////////////////


            }              
            // header('Content-type: application/json; charset=utf-8');
              //4. consignas la transaccion (en caso de que no suceda ningun fallo)
              $pdo->commit(); 
              $validator['success'] = true;
              //header('Content-type: application/json; charset=utf-8');
              //echo json_encode($validator);

                return $validator;
       
        }catch(PDOException $e){
          	//5. regresas a un estado anterior en caso de error
				$pdo->rollBack();
          $validator['success'] = false;
          return $validator;
                 }
            
                }
    

                public function edit($datos){
     
                  try{
          
                      //1. guardas el objeto pdo en una variable
                      $pdo=$this->db->connect();
                      //2. comienzas transaccion
                      $pdo->beginTransaction();
          
                       //3. hacer toas las consultas 
          
                      //SEPARAMOS CEDULA DE NACIONALIDAD
                       list($nacionalidad, $nro_cedula) = explode("-", $datos['cedula']);
          
                       $validator = array('success' => false, 'messages' => array());
          
                     
                       if(!empty($datos['file'])){  //Guardar foto carturada Save_photo
                          $fotos = fwrite($datos['file'], $datos['foto']);
                          fclose($datos['file']);
                          
                          //Tabla persona
                       $query=$pdo->prepare('UPDATE persona
                       SET  cedula=:cedula, nombres=:nombres, apellidos=:apellidos,
                        telefono=:telefono, nacionalidad=:nacionalidad, 
                           genero=:genero, documento=:documento, id_persona_tipo=:id_persona_tipo,
                            correo=:correo
                     WHERE id_persona=:id_persona');
                    
                      $query->execute(['cedula'=>$nro_cedula,'nombres'=>$datos['nombres'],
                      'apellidos'=>$datos['apellidos'],'telefono'=>$datos['telefono'],
                      'nacionalidad'=>$nacionalidad,'genero'=>$datos['genero'],
                      'documento'=>$datos['route_photo'],'id_persona_tipo'=>1,
                      'correo'=>$datos['correo'],'id_persona'=>$datos['id_persona']]);
                      
          
                        //Tabla usuario
                      $query=$pdo->prepare('UPDATE usuario
                      SET estatus=:estatus,id_departamento=:id_departamento, id_usuario_perfil=:id_usuario_perfil
                    WHERE id_persona=:id_persona');
                     
                      $query->execute(['estatus'=>$datos['estatus'],
                      'id_departamento'=>$datos['departamento'],
                      'id_usuario_perfil'=>$datos['perfil'],'id_persona'=>$datos['id_persona']]);


                        //Cambiar contraseña
                        if(!empty($datos['password'])){
                      $query=$pdo->prepare('UPDATE usuario
                      SET  password=:password WHERE id_persona=:id_persona');
                     
                      $crypt= new SED();
                      $query->execute(['password'=>$crypt->encryption($datos['password']),
                      'id_persona'=>$datos['id_persona']]);
                        }



                      
          
                       }else if(!empty($datos["archivo"])){ //Guardar foto tomada del sistema
                        if (in_array($datos["fileType"], $datos["allowTypes"])) {
          
                          list($url, $extension) = explode(".", $datos["targetFilePath"]);
                        //SE RENOMBRA IMAGEN
                          $url="src/fotos/".$nro_cedula.".".$extension;
          
                          if(copy($datos["route_temp"], $url)){
                            $uploadedFile = $datos["fileName"];
          
                          //Tabla persona
                            //Tabla persona
                       $query=$pdo->prepare('UPDATE persona
                       SET  cedula=:cedula, nombres=:nombres, apellidos=:apellidos,
                        telefono=:telefono, nacionalidad=:nacionalidad, 
                           genero=:genero, documento=:documento, id_persona_tipo=:id_persona_tipo,
                            correo=:correo
                     WHERE id_persona=:id_persona');
                    
                      $query->execute(['cedula'=>$nro_cedula,'nombres'=>$datos['nombres'],
                      'apellidos'=>$datos['apellidos'],'telefono'=>$datos['telefono'],
                      'nacionalidad'=>$nacionalidad,'genero'=>$datos['genero'],
                      'documento'=>$url,'id_persona_tipo'=>1,
                      'correo'=>$datos['correo'],'id_persona'=>$datos['id_persona']]);
                      
          
                        //Tabla usuario
                      $query=$pdo->prepare('UPDATE usuario
                      SET estatus=:estatus,id_departamento=:id_departamento, id_usuario_perfil=:id_usuario_perfil
                    WHERE id_persona=:id_persona');
                     
                      $query->execute(['estatus'=>$datos['estatus'],
                      'id_departamento'=>$datos['departamento'],
                      'id_usuario_perfil'=>$datos['perfil'],'id_persona'=>$datos['id_persona']]);

                        //Cambiar contraseña
                        if(!empty($datos['password'])){
                      $query=$pdo->prepare('UPDATE usuario
                      SET  password=:password WHERE id_persona=:id_persona');
                     
                      $crypt= new SED();
                      $query->execute(['password'=>$crypt->encryption($datos['password']),
                      'id_persona'=>$datos['id_persona']]);
                        }


                          
                          }
                        }
                      }else{ //Guardar foto del sistema (UBV)
                        //Tabla persona
                         //Tabla persona
                         $query=$pdo->prepare('UPDATE persona
                         SET  cedula=:cedula, nombres=:nombres, apellidos=:apellidos,
                          telefono=:telefono, nacionalidad=:nacionalidad, 
                             genero=:genero, documento=:documento, id_persona_tipo=:id_persona_tipo,
                              correo=:correo
                       WHERE id_persona=:id_persona');
                      
                        $query->execute(['cedula'=>$nro_cedula,'nombres'=>$datos['nombres'],
                        'apellidos'=>$datos['apellidos'],'telefono'=>$datos['telefono'],
                        'nacionalidad'=>$nacionalidad,'genero'=>$datos['genero'],
                        'documento'=>$datos['foto_ubv'],'id_persona_tipo'=>1,
                        'correo'=>$datos['correo'],'id_persona'=>$datos['id_persona']]);
                        
            
                          //Tabla usuario
                        $query=$pdo->prepare('UPDATE usuario
                        SET estatus=:estatus,id_departamento=:id_departamento, id_usuario_perfil=:id_usuario_perfil
                      WHERE id_persona=:id_persona');
                       
                        $query->execute(['estatus'=>$datos['estatus'],
                        'id_departamento'=>$datos['departamento'],
                        'id_usuario_perfil'=>$datos['perfil'],'id_persona'=>$datos['id_persona']]);
  
                          //Cambiar contraseña
                          if(!empty($datos['password'])){
                        $query=$pdo->prepare('UPDATE usuario
                        SET  password=:password WHERE id_persona=:id_persona');
                       
                        $crypt= new SED();
                        $query->execute(['password'=>$crypt->encryption($datos['password']),
                        'id_persona'=>$datos['id_persona']]);
                          }
  
  
          
                      }              
                      // header('Content-type: application/json; charset=utf-8');
                        //4. consignas la transaccion (en caso de que no suceda ningun fallo)
                        $pdo->commit(); 
                        $validator['success'] = true;
                        //header('Content-type: application/json; charset=utf-8');
                        //echo json_encode($validator);
          
                          return $validator;
                 
                  }catch(PDOException $e){
                    	//5. regresas a un estado anterior en caso de error
				            $pdo->rollBack();
                    $validator['success'] = false;
                    return $validator;
                           }
                      
                          }


                public function getUsuarios(){
                  $items=[];
                 try{
                $query=$this->db->connect()->query("SELECT DISTINCT persona.id_persona,nacionalidad,cedula,
                nombres,apellidos,telefono,persona_tipo.descripcion AS persona_tipo, 
                motivo,pase.descripcion AS pase,
                DATE(visitante_detalle.fecha) AS fecha_ingreso,visitante.id_visitante
                  FROM persona,visitante,pase,persona_tipo,visitante_detalle
                 WHERE persona.id_persona_tipo=persona_tipo.id_persona_tipo 
                 AND persona.id_persona=visitante.id_persona 
                 AND visitante.id_pase=pase.id_pase 
                 AND visitante.id_visitante=visitante_detalle.id_visitante");
                
                while($row=$query->fetch()){
                $item=new Cvubv();
                $item->id_persona=$row['id_persona'];
                $item->id_visitante=$row['id_visitante'];
                
                $item->nacionalidad=$row['nacionalidad'];
                $item->cedula=$row['cedula'];
                $item->nombres=$row['nombres'];
                $item->apellidos=$row['apellidos'];
                $item->telefono=$row['telefono'];
                $item->persona_tipo=$row['persona_tipo'];

                $item->motivo=$row['motivo'];   
                $item->pase=$row['pase'];
                $item->fecha_ingreso=$row['fecha_ingreso'];
                
                array_push($items,$item);
                
                }
                return $items;
                
                }catch(PDOException $e){
                return[];
                }
                
                }


             
        

                public function getUsuariosFecha(){
                  $items=[];
                 try{
                $query=$this->db->connect()->query("SELECT DISTINCT persona.id_persona,nacionalidad,cedula,
                nombres,apellidos,telefono,persona_tipo.descripcion AS persona_tipo, 
                motivo,pase.descripcion AS pase,visitante.id_visitante
                  FROM persona,visitante,pase,persona_tipo,visitante_detalle
                 WHERE persona.id_persona_tipo=persona_tipo.id_persona_tipo 
                 AND persona.id_persona=visitante.id_persona 
                 AND visitante.id_pase=pase.id_pase 
                 AND visitante.id_visitante=visitante_detalle.id_visitante  AND  CURRENT_DATE = date(fecha)");
                

              
                
                while($row=$query->fetch()){
                $item=new Cvubv();
                $item->id_persona=$row['id_persona'];
                $item->nacionalidad=$row['nacionalidad'];
                $item->cedula=$row['cedula'];
                $item->nombres=$row['nombres'];
                $item->apellidos=$row['apellidos'];
                $item->telefono=$row['telefono'];
                $item->persona_tipo=$row['persona_tipo'];

                $item->motivo=$row['motivo'];   
                $item->pase=$row['pase'];
                //$item->estatus=$row['estatus'];
                //$item->fecha_ingreso=$row['fecha_ingreso'];

                // OBTENEMOS FECHAS DE ENTRADA Y SALIDA A LA INTITUCION

                $item->id_visitante=$row['id_visitante'];

                $item->fecha_ingreso=$this->Obtener_fecha(1,$row['id_visitante']); //ENTRADA

                $item->fecha_salida=$this->Obtener_fecha(0,$row['id_visitante']); //SALIDA
                
                array_push($items,$item);
                
                }
                return $items;
                
                }catch(PDOException $e){
                return[];
                }
                
                }
      
         
                public function Obtener_fecha($estatus,$id_visitante){//Valisa si el usuario tiene un pase asignado
                  try{
                    
                    $query =$this->db->connect()->prepare("SELECT fecha FROM visitante_detalle WHERE estatus=:estatus AND id_visitante=:id_visitante ");
                    $query->execute(['estatus'=>$estatus,'id_visitante'=>$id_visitante]);
                    $visita = $query->fetch();

                    return  $visita['fecha'];
                  } catch(PDOException $e){
                    return null;
                  }
                }

                public function cambio($id_visitante){
                  try{
                  //1. guardas el objeto pdo en una variable
                  $pdo=$this->db->connect();
                 //2. comienzas transaccion
                  $pdo->beginTransaction();
          
                 //3. hacer toas las consultas 

                  //CAMBIAR ESTATUS DEL PASE
                  $query = $pdo->prepare("UPDATE pase SET estatus=:estatus WHERE
                   id_pase=(SELECT id_pase FROM visitante WHERE id_visitante=:id_visitante)");
                  $query->execute(['estatus'=>0,'id_visitante'=>$id_visitante]);


                 //INSERTAR NUEVO DETALLE VISITANTE
                 $query=$pdo->prepare('INSERT INTO visitante_detalle(
                  estatus, fecha, id_visitante, id_usuario)
                  VALUES  (:estatus, :fecha, :id_visitante, :id_usuario);');
                //Estatus 1 entro 0 salio
                 $query->execute(['estatus'=>0,'fecha'=>date('Y-m-d h:i:s', time()),
              'id_visitante'=>$id_visitante,'id_usuario'=>$_SESSION['id_usuario']]);

               //////////////////////////////////////////////////////////

                      //4. consignas la transaccion (en caso de que no suceda ningun fallo)
                      $pdo->commit(); 
                      return true;
              
                      }catch(PDOException $e){
                       	//5. regresas a un estado anterior en caso de error
			              	$pdo->rollBack();
                        return false;
                        }
              
              
                  }

  
    }

    ?>