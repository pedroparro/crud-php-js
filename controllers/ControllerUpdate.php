<?php
include("../vendor/autoload.php");
use Models\ClassCrud;

    extract($_POST);
    //isset
    if(isset($_POST['id']) && isset($_POST['nf']) && isset($_POST['operacoes_emitente']) &&
    isset($_POST['operacoes_cidades']) && isset($_POST['cliente']) && isset($_POST['destinatario']) 
    && isset($_POST['entregador']) && isset($_POST['data_op'])){

    //variaveis
    $id;
    $nf = $_POST['nf'];
    $operacoesEmitente = $_POST['operacoes_emitente'];
    $operacoesCidades = $_POST['operacoes_cidades'];
    $cliente = $_POST['cliente'];
    $destinatario = $_POST['destinatario'];
    $entregador = $_POST['entregador'];
    $dataOp = $_POST['data_op'];

    //instancia
    $Crud = new ClassCrud();
    $Crud->updateDB(
            "operacoes",
            "nf=?,operacoes_emitente=?,operacoes_cidades=?,cliente=?,destinatario=?,entregador=?,data_op=?","id=?",
            array(
                $nf,
                $operacoesEmitente,
                $operacoesCidades,
                $cliente,
                $destinatario,
                $entregador,
                $dataOp,
                $id
            )
    );
        header("Location: ../index.php");
        die();
        
    }else{
        header("Location: ../index.php");
        die();
    }
?>
