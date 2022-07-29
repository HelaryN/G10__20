<?php

class Libros extends Conectar {

    public function get_Libros(){
        $conectar= parent::Conexion();
        parent::set_names();

        /*_______________________________MODIFICABLE____________________________________________________________*/
        $sql="SELECT * FROM libro ";
        /*_____________________________________________________________________________________________________*/
       
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_Libro($Cod_Libro){                                 
        $conectar= parent::Conexion();
        parent::set_names();

        /*_____________________________________________________________________________________________________*/
        $sql="SELECT * FROM libro WHERE Cod_Libro = ?";
        /*_____________________________________________________________________________________________________*/

        $sql=$conectar->prepare($sql);

        /*_____________________________________________________________________________________________________*/
        $sql->bindValue(1,$Cod_Libro);
        /*_____________________________________________________________________________________________________*/

        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
 
    public function insert_Libro($Cod_Libro, $Nombre_libro, $Nombre_escritor, $FechaPublicacion, $ISBN, $Precio, $Editorial){
        
        $conectar= parent::Conexion();
        parent::set_names();

        /*_____________________________________________________________________________________________________*/
        $sql="INSERT INTO libro(Cod_Libro,Nombre_libro,Nombre_escritor,FechaPublicacion,ISBN,Precio,Editorial)
        VALUES (?,?,?,?,?,?,?);";    /*? = parámetros */
        /*_____________________________________________________________________________________________________*/
       
        $sql=$conectar->prepare($sql);

        /*_____________________________________________________________________________________________________*/
        $sql->bindValue(1, $Cod_Libro);
        $sql->bindValue(2, $Nombre_libro);
        $sql->bindValue(3, $Nombre_escritor);
        $sql->bindValue(4, $FechaPublicacion);
        $sql->bindValue(5, $ISBN);
        $sql->bindValue(6, $Precio);
        $sql->bindValue(7, $Editorial);
        /*_____________________________________________________________________________________________________*/
        
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_Libro($Cod_Libro, $Nombre_libro, $Nombre_escritor, $FechaPublicacion, $ISBN, $Precio, $Editorial){
    
        $conectar= parent::Conexion();
        parent::set_names();

        /*_____________________________________________________________________________________________________*/
        $sql="UPDATE libro SET Nombre_libro=?,Nombre_escritor=?,FechaPublicacion=?,ISBN=?,Precio=?,Editorial=? WHERE Cod_Libro= ?";    /*? = parámetros */
        /*_____________________________________________________________________________________________________*/
        
        $sql=$conectar->prepare($sql);
   
        $sql->bindValue(1, $Nombre_libro);
        $sql->bindValue(2, $Nombre_escritor);
        $sql->bindValue(3, $FechaPublicacion);
        $sql->bindValue(4, $ISBN);
        $sql->bindValue(5, $Precio);
        $sql->bindValue(6, $Editorial);
        $sql->bindValue(7, $Cod_Libro);

        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function delete_Libro($Cod_Libro){
      
        $conectar= parent::Conexion();
        parent::set_names();

        $sql="DELETE FROM libro WHERE Cod_Libro = ?";   

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$Cod_Libro);

        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        
    }

}




?>