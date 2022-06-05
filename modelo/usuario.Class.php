<?php
class Usuario
{
    private $db = null;

    public function __construct($dbparam)
    {
        $this->db = $dbparam;
    }

    function insertarUsuario($datos)
    {

        try {
            $insert = $this->db->prepare('INSERT INTO ususario values(NULL,:formuser,:formpass)');
            $insert->bindValue('formuser', $datos['floatingInput']);
            $insert->bindValue('formpass', md5($datos['floatingPassword']));
            $insert->execute();

            return 'insertado con exito';
        } catch (Exception $e) {

            return 'Error al insertar';
        }
    }

    function iniciosession($datos)
    {

        try {
            $select = $this->db->prepare("SELECT * FROM ususario where correo = :formuser and clave = :formpass");
            $select->bindValue('formuser', $datos['loginform']);
            $select->bindValue('formpass', md5($datos['loginpass']));
            $select->execute();
            
            return $select->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            return 'Usuario no existe en base de datos';
        }
    }
}
