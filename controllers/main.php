<?php

    class Main extends Controller {
        function __construct(){
            parent::__construct();

            //echo "<p>Nuevo Controller</p>";
        }

        function render(){
            session_start();
            if(isset($_SESSION['id_usuario'])){
                header("Location:".constant('URL')."home");
                exit();
            }
            $this->view->render('main/index');
        }

        function iniciar(){
            
            session_start();
         
            $usuario=$_POST["usuario"];
            $contrasena=$_POST["contrasena"];
            $mensaje="";

            try{
                if($this->model->getLogin(['usuario'=> $usuario, 'contrasena' => $contrasena])){
                
                  $this->view->mensaje=$mensaje;
                  $this->view->render('home/index');
            
                 } else{
                  //  $mensaje="<large style='color: red;'>Cédula o contraseña inválida **</large>";
                  $mensaje="<div class='alert alert-danger alert-dismissable'>
                  <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
                  Usuario o Contraseña Incorrecto.<br>
                  </div>";
                  $this->view->mensaje=$mensaje;
                //$this->render();
                  $this->view->render('main/index');
    
                }
    
          
            } catch(PDOException $e){
                return null;
            }
            
    
        }



        function logout(){
            // Inicializar la sesión.
            // Si está usando session_name("algo"), ¡no lo olvide ahora!
            session_start();

            // Destruir todas las variables de sesión.
            $_SESSION = array(
                        
                $_SESSION['id_usuario'],
                $_SESSION['usuario'],
                $_SESSION['nombres'],
                $_SESSION['apellidos'],
                $_SESSION['departamento'],
                $_SESSION['correo'],
                $_SESSION['id_perfil'],
                $_SESSION['perfil'],
                $_SESSION['bienvenido'],

                            );
            //var_dump($_SESSION);
            // Si se desea destruir la sesión completamente, borre también la cookie de sesión.
            // Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }

            // Finalmente, destruir la sesión.
            session_destroy();
            session_unset();
            echo '<script>
            alert("Hasta pronto");
            </script>';
            header("location: ".constant('URL')."main");

        }
    }

?>