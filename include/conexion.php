<?php
    class  Db{
        private static $conexion = NULL;

        public static function Connect($host,$user,$pass,$db){
            try {
                $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
                self::$conexion= new PDO("mysql:host=$host;dbname=$db",$user,$pass,$pdo_options);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return self::$conexion;
            }
            catch (PDOException $e) {
                print("Error connecting to SQL Server.");
                die(print_r($e));
            }            
        }		
    } 
?>
