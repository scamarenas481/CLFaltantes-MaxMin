<?php
require_once('');
class DAO {
    private $conexion;
    
    public function __construct() {
        // Configurar la conexión a la base de datos
        $host = "nombre_del_host";
        $usuario = "nombre_de_usuario";
        $contrasena = "contraseña";
        $nombreBD = "nombre_de_la_base_de_datos";
        
        $this->conexion = new PDO("mysql:host=$host;dbname=$nombreBD", $usuario, $contrasena);
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function crear($dto) {
        try {
            // Preparar la consulta SQL
            $consulta = "INSERT INTO tabla (id, nombre, password, hash, fecha) VALUES (?, ?, ?, ?, ?)";
            $sentencia = $this->conexion->prepare($consulta);
            
            // Asignar los valores a los parámetros de la consulta
            $sentencia->bindParam(1, $dto->getId());
            $sentencia->bindParam(2, $dto->getNombre());
            $sentencia->bindParam(3, $dto->getPassword());
            $sentencia->bindParam(4, $dto->getHash());
            $sentencia->bindParam(5, $dto->getFecha());
            
            // Ejecutar la consulta
            $sentencia->execute();
            
            // Retornar el ID del último registro insertado
            return $this->conexion->lastInsertId();
        } catch(PDOException $e) {
            // Manejar cualquier error ocurrido durante la ejecución de la consulta
            echo "Error al crear el registro: " . $e->getMessage();
        }
    }
    
    public function leer($id) {
        try {
            // Preparar la consulta SQL
            $consulta = "SELECT * FROM tabla WHERE id = ?";
            $sentencia = $this->conexion->prepare($consulta);
            
            // Asignar el valor al parámetro de la consulta
            $sentencia->bindParam(1, $id);
            
            // Ejecutar la consulta
            $sentencia->execute();
            
            // Retornar el resultado de la consulta
            return $sentencia->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            // Manejar cualquier error ocurrido durante la ejecución de la consulta
            echo "Error al leer el registro: " . $e->getMessage();
        }
    }
    
    public function actualizar($dto) {
        try {
            // Preparar la consulta SQL
            $consulta = "UPDATE tabla SET nombre = ?, password = ?, hash = ?, fecha = ? WHERE id = ?";
            $sentencia = $this->conexion->prepare($consulta);
            
            // Asignar los valores a los parámetros de la consulta
            $sentencia->bindParam(1, $dto->getNombre());
            $sentencia->bindParam(2, $dto->getPassword());
            $sentencia->bindParam(3, $dto->getHash());
            $sentencia->bindParam(4, $dto->getFecha());
            $sentencia->bindParam(5, $dto->getId());
            
            // Ejecutar la consulta
            $sentencia->execute();
            
            // Retornar la cantidad de filas afectadas
            return $sentencia->rowCount();
        } catch(PDOException $e) {
            // Manejar cualquier error ocurrido durante la ejecución de la consulta
            echo "Error al actualizar el registro: " . $e->getMessage();
        }
    }
    
    public function eliminar($id) {
        try {
            // Preparar la consulta SQL
            $consulta = "DELETE FROM tabla WHERE id = ?";
            $sentencia = $this->conexion->prepare($consulta);
            
            // Asignar el valor al parámetro de la consulta
            $sentencia->bindParam(1, $id);
            
            // Ejecutar la consulta
            $sentencia->execute();
            
            // Retornar la cantidad de filas afectadas
            return $sentencia->rowCount();
        } catch(PDOException $e) {
            // Manejar cualquier error ocurrido durante la ejecución de la consulta
            echo "Error al eliminar el registro: " . $e->getMessage();
        }
    }


?>