<?php
include("../vendor/autoload.php");
use Models\ClassCrud;

//isset - get
if(isset($_GET['id'])){
    
    //instancia
    $crud = new ClassCrud();
    $crud->deleteDB(
                    "operacoes",
                    "id=?",
                    array($_GET['id']),
    );
    header("Location: ../views/notas.php");
    die();
}else{
    header("Location: ../index.php");
    die();
}

?>