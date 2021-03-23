<?php
    header('Content-Type:aplication/Json');
    $method = $_SERVER['REQUEST_METHOD'];
    switch ($method) {
        case 'GET':
            $autorization = '';
            $headers = array();
            foreach (getallheaders() as $name => $value) {
                $headers[$name] = $value;
            }

            
            $autorization = (isset($headers['Authorization'])) ? $headers['Authorization'] : null;

            $token = str_replace("Bearer ","",$autorization);

        if($token == "TWlUb2tlbkZpbmNo"){


            if(isset($_GET['paramuno'])&&isset($_GET['paramdos'])){

                $coloruno = $_GET['paramuno'];
                $colordos = $_GET['paramdos'];
                $mostrarcolores = "los colores son: ".$coloruno." ".$colordos;
                $response = array('response' => 'Success',
                                    'message' =>$mostrarcolores);
                header("HTTP/1.1 200 OK");
                print json_encode($response);
            }else{
                $response = array('response' => 'Faild',
                                    'message' => 'no se encontraron colores');
                header("HTTP/1.1 400  BAD REQUEST");
                print json_encode($response);
            }
        }else{

            header("HTTP/1.1 405 AUTORIZATHED");
            print json_encode("");
    }
            break;
        case 'POST':
            $autorization = '';
            $headers = array();
            foreach (getallheaders() as $name => $value) {
                $headers[$name] = $value;
            }

            
            $autorization = (isset($headers['Authorization'])) ? $headers['Authorization'] : null;

            $token = str_replace("Bearer ","",$autorization);

        if($token == "TWlUb2tlbkZpbmNo"){


            if(isset($_POST['nombre'])){
                $nombre =$_POST['nombre'];
                $apellidos =$_POST['apellidos'];
                $email =$_POST['email'];
                $escuela =$_POST['escuela'];
                $matricula =$_POST['matricula'];
                $datos =$nombre." ".$apellidos.", tu email es".$email.", tu escuela es".$escuela." y tu matricula es:".$matricula;
                    $response =array('response'=>'Success',
                                    'message'=>$datos
                                    );
                    header("HTTP/1.1 200 OK");
                    print json_encode($response);
            }else{
                $postBody = file_get_contents("php://input");
                $data = json_decode($postBody);

                $nombre = "Mi nombre es ".$data->nombre;
                $apellidos = ", mis apellidos son ".$data->apellidos;
                $email = ", mi email es ".$data->email;
                $escuela = ", mi escuela es ".$data->escuela;
                $matricula = ", mi matricula es ".$data->matricula;
                $datos = $nombre." ".$apellidos." ".$email." ".$escuela." ".$matricula;

                $response = array(
                    'response' => 'Success',
                    'message'  => $datos
                    );
      
                header("HTTP/1.1 200 OK");
                print json_encode($response);
            }
        }else{

            header("HTTP/1.1 405 AUTORIZATHED");
            print json_encode("");
    }
        break;
        case 'PATCH':
            $autorization = '';
            $headers = array();
            foreach (getallheaders() as $name => $value) {
                $headers[$name] = $value;
            }

            
            $autorization = (isset($headers['Authorization'])) ? $headers['Authorization'] : null;

            $token = str_replace("Bearer ","",$autorization);

            if($token == "TWlUb2tlbkZpbmNo"){


            $postBody=file_get_contents("php://input");
            $data=json_decode($postBody);

            $datos= "mi nombre es ".$data->user->nombre." "."mi email es "." ".$data->user->email;

            $response =array('response'=>'Success',
            'message'=>$datos
            );
            header("HTTP/1.1 200 OK");
            print json_encode($response);
        }else{

            header("HTTP/1.1 405 AUTORIZATHED");
            print json_encode("");
    }
            break;

        case 'PUT':
            $autorization = '';
            $headers = array();
            foreach (getallheaders() as $name => $value) {
                $headers[$name] = $value;
            }

            
            $autorization = (isset($headers['Authorization'])) ? $headers['Authorization'] : null;

            $token = str_replace("Bearer ","",$autorization);

            if($token == "TWlUb2tlbkZpbmNo"){
                $postBody=file_get_contents("php://input");
                $data=json_decode($postBody);
    
                $datos= "mi nombre es ".$data->user->nombre." "."mi email es "." ".$data->user->email;
    
                $response =array('response'=>'Success',
                'message'=>$datos
                );
                header("HTTP/1.1 200 OK");
                print json_encode($response);

            }else{

				header("HTTP/1.1 405 AUTORIZATHED");
				print json_encode("");
		}
        break;

        

    }
?>