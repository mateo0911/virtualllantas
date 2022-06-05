<?php
include '../include/configuracion.php';
include '../modelo/post.class.php';
switch ($_POST["tipoformulario"]) {
    case '1':
        insertarpost($_POST, $db, $_FILES);
        break;
    
    case '2':
        consultar($db);
        break;
    
    default:
        
        break;
}

function insertarpost($datos, $db, $files)
{
    if(!empty($datos['titulo']) && !empty($datos['email']) && !empty($datos['contenido'])  && !empty($files['file']['name'])){ // validacion de datos
        $uploadedFile = '';
        if(!empty($files["file"]["type"])){ // validacion de campo file
            $fileName = time().'_'.$files['file']['name'];// se genera nuevo nombre del archivo
            $valid_extensions = array("jpeg", "jpg", "png");// array con las extensiones permitidas
            $temporary = explode(".", $files["file"]["name"]);//separacion del nombre . la extension
            $file_extension = end($temporary);//toma la ultuma posicion del arreglo (extension)
            if((($files["file"]["type"] == "image/png") || ($files["file"]["type"] == "image/jpg") || ($files["file"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
                $sourcePath = $files['file']['tmp_name'];
                $targetPath = "../images/".$fileName;//se crea la ruta en la que se guardara la imagen
                if(move_uploaded_file($sourcePath,$targetPath)){//es para mover el archivo a la ubicacion que se le puso antes
                    $uploadedFile = $fileName;
                }
            }
            $post = new Post($db);
            echo $post->insertarpost($datos, $uploadedFile);
        }
    }else{
        echo 'ingrese por favor todos los datos ';
    }


}


function consultar($db)
{
    $post = new Post($db);

    echo $post->consultar(); // se pone echo para devolver los datos al json
}
?>