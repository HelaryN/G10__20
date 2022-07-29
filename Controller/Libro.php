<?php

 if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
  }
    header('Access-Control-Allow-Origin: *');  
    header('Content-Type: application/json');

    require_once("../Config/conexion.php");
    require_once("../Models/libro.php");
    $libro = new Libros();

    $body = json_decode(file_get_contents("php://input"),true);

    switch($_GET["opc"]){

        case "GetLibros";
          $datos = $libro->get_Libros();
          echo json_encode($datos);
          break;

        case "GetLibro": 
          $datos = $libro->get_Libro($body["Cod_Libro"]);
          echo json_encode($datos);
          break;

        case "InsertLibro":
          $datos = $libro->insert_Libro($body["Cod_Libro"],$body["Nombre_libro"],$body["Nombre_escritor"],$body["FechaPublicacion"],$body["ISBN"],$body["Precio"],$body["Editorial"]);
          echo json_encode("Libro agregado con éxito a la librería.");
          break;
        
        case "UpdateLibro": 
          $datos = $libro->update_Libro($body["Cod_Libro"],$body["Nombre_libro"],$body["Nombre_escritor"],$body["FechaPublicacion"],$body["ISBN"],$body["Precio"],$body["Editorial"]);
          echo json_encode("Libro actualizado!");
          break;

        case "DeleteLibro": 

          $datos = $libro->delete_Libro($body["Cod_Libro"]);
          echo json_encode("Registro eliminado con éxito");
          break;
    }
   

  



  


?>