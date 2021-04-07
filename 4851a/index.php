<?php
    require "conexion.php";
    header('Content-Type: application/JSON');
    $method = $_SERVER['REQUEST_METHOD'];
    switch ($method) {
        case 'GET':

                if(isset($_GET['param'])&& isset($_GET['paramdos'])){
                    $id   = intval($_GET['param']);
                    $email =($_GET['paramdos']);
                    $query = "SELECT * FROM alumnos where id='$id' and email='$email' ";
                    $result   = mysqli_query($db, $query);

                    if($result->num_rows > 0 ){
                        while ($row = mysqli_fetch_array($result)) {
                            $id = $row['id'];
                            $email = $row['email'];
                            $carrera = $row['carrera'];
                            $nombre = $row['nombre'];
                            $escuela = $row['escuela'];

                        }
                        $datos = "Tu id es: ".$id
                        ." ".", Tu nombre es: ".$nombre
                        ." ".", Tu carrera es: ".$carrera
                        ." ".", Tu email es: ".$email
                        ." ".", Tu escuela es ".$escuela

                        ;
                        $response = array(
                            'response' => 'Success' ,
                            'message' =>  $datos
                        );
                        header("HTTP/1.1 200 OK");
                        echo json_encode($response);
                    }else{
                        header("HTTP/1.1 404 NOT FOUND");
                        echo json_encode("");
                    }
                }else{
                    $response = array(
                        'response' => 'Faild' ,
                        'message' => "No enviaste la variable param en la url"
                    );

                    header("HTTP/1.1 400 BAD REQUEST");
                    echo json_encode($response);
                }

            break;
    }
?>
