<?php
include("../vendor/autoload.php");
use Models\ClassCrud;

//isset
if(isset($_GET['id'])){
    $id = $_GET['id'];
    //instancia
    $crud = new ClassCrud();
    $row = $crud->selectDB("*","operacoes","where id=?",array($id));  
    $rows = $row->fetch(PDO::FETCH_ASSOC);
    //variaveis db
    $id = $rows['id'];
    $nf = $rows['nf'];
    $operacoesEmitente = $rows['operacoes_emitente'];
    $operacoesCidades = $rows['operacoes_cidades'];
    $cliente = $rows['cliente'];
    $destinatario = $rows['destinatario'];
    $entregador = $rows['entregador'];
    $dataOp = $rows['data_op'];
}else{
    header("Location: ../index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GT - LOG</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>

    <header>
            <!--menu-->
            <div class="navbar">
                 <!--logo-->
                 <img src="../public/images/logo-150x150.png" title="Home" width="70px" height="70px">
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="./notas.php">Notas Fiscais</a></li>
                </ul>
            </div>
    </header>
    <!--h2-->
    <div class="title-h2">
        <h2>Formulário Notas Fiscais</h2>
    </div>
    <!--section-->
    <section>
            <div class="form-index">
                    <!--form-->
                    <form action="<?php echo "../controllers/ControllerUpdate.php?id={$rows['id']}"; ?>" method="POST" id="form">
                        <!--id-->
                        <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
                        <!--div nf-->
                        <div class="forms">
                            <label for="nf">Nota Fiscal
                                <input type="text" name="nf" value="<?php echo $nf; ?>" placeholder="Nota Fiscal" maxlength="10">
                            </label>
                        </div>
                        <!--div operacoes_emitente-->
                        <div class="forms">
                            <label for="nf">Emitente
                                <select name="operacoes_emitente" id="operacoes_emitente">
                                    <option id="all">Selecione</option>
                                    <option data-name="1" value="1">SP</option>
                                    <option data-name="2" value="2">ITU</option>
                                    <option data-name="3" value="3">RP</option>
                                    <option data-name="4" value="4">IBITINGA</option>
                                    <option data-name="5" value="5">POUSO ALEGRE</option>
                                    <option data-name="6" value="6">PERDÕES</option>
                                    <option data-name="7" value="7">BH</option>
                                </select>
                            </label>
                        </div>
                        <!--div operacoes_cidades-->
                        <div class="forms">
                            <label for="operacoes_cidades">Cidades Emitente
                                <select name="operacoes_cidades" id="operacoes_cidades">
                                    <option id="all">Selecione</option>
                                    <option data-name="1" value="15">JANDIRA</option>
                                    <option data-name="1" value="14">SUZANO</option>
                                    <option data-name="1" value="16">GUARUJA</option>
                                    <option data-name="2" value="22">LEME</option>
                                    <option data-name="2" value="23">SALTO</option>
                                    <option data-name="2" value="23">SOROCABA</option>
                                    <option data-name="3" value="31">RP 1</option>
                                    <option data-name="3" value="32">RP 2</option>
                                    <option data-name="3" value="33">RP 3</option>
                                    <option data-name="4" value="24">BAURU</option>
                                    <option data-name="4" value="35">IBITINGA 1</option>
                                    <option data-name="4" value="36">IBITINGA 2</option>
                                    <option data-name="5" value="25">TRÊS CORAÇÔES</option>
                                    <option data-name="5" value="26">NEPOMUCENO</option>
                                    <option data-name="5" value="26">POUSO ALEGRE</option>
                                    <option data-name="6" value="27">PERDÕES</option>
                                    <option data-name="7" value="28">BETIM</option>
                                    <option data-name="7" value="28">BH</option>
                                    <option data-name="7" value="29">CONTAGEM</option>
                                    <option data-name="6" value="30">PERDÕES 2</option>
                                    <option data-name="6" value="34">PERDÕES 3</option>
                                </select>
                            </label>
                        </div>
                        <!--div cliente-->
                        <div class="forms">
                            <label for="cliente">Cliente
                                <input type="text" name="cliente" value="<?php echo $cliente; ?>" placeholder="Cliente" maxlength="50">
                            </label>
                        </div>
                        <!--div destinatario-->
                        <div class="forms">
                            <label for="destinatario">Destinatário
                                <input type="text" name="destinatario" value="<?php echo $destinatario; ?>" placeholder="Destinatário" maxlength="50">
                            </label>
                        </div>
                        <!--div entregador-->
                        <div class="forms">
                            <label for="entregador">Entregador
                                <input type="text" name="entregador" value="<?php echo $entregador; ?>" placeholder="Entregador" maxlength="30">
                            </label>
                        </div>
                        <!--div data-->
                        <div class="forms">
                            <label for="data">Data
                                <input type="date" name="data_op" value="<?php echo $dataOp; ?>" placeholder="Data" maxlength="20">
                            </label>

                        <!--Button-->
                        <button type="submit" name="update">Atualizar</button>
                        </div>
                    </form>
            </div>
    </section>
        
    <!--footer-->
    <footer>
        <p>Desenvolvido por Pedro Parro</p>
    </footer>

<script src="../public/js/jquery.js"></script>
<script src="../public/js/script.js"></script>
</body>
</html>