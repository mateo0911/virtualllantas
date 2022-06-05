<?php
class Post
{
    private $db = null;

    public function __construct($dbparam)
    {
        $this->db = $dbparam;
    }

    function insertarpost($datos, $upload)
    {
        try {
            $insert = $this->db->prepare('INSERT INTO post values(NULL,:formtitulo,:formemail,:formimagen, :formcontenido, NULL)');
            $insert->bindValue('formtitulo', $datos['titulo']);
            $insert->bindValue('formemail', $datos['email']);
            $insert->bindValue('formimagen', $upload);
            $insert->bindValue('formcontenido', $datos['contenido']);
            $insert->execute();

            return 'POST insertado con exito';
        } catch (Exception $e) {
            return 'Error al insertar post';
        }
    }


    function consultar()
    {
        try {
            $consultar = $this->db->prepare("SELECT id_post, titulo, email, imagen, contenido, date_format(fecha, '%d-%m-%Y') as fecha FROM post ORDER BY id_post DESC");
            $consultar->execute();
            return json_encode($consultar->fetchAll());

        } catch (Exception $e) {
            echo 'No se encontraron datos';
        }
    }
}
