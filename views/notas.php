<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GT - LOG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <!--header-->
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

    <div class="title-h2">
        <h2>Notas Fiscais</h2>
    </div>
    <!--section-->
    <section id="notas">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOTA FISCAL</th>
                    <th scope="col">EMITENTE</th>
                    <th scope="col">EMITENTE CIDADE</th>
                    <th scope="col">CLIENTE</th>
                    <th scope="col">DESTINATÁRIO</th>
                    <th scope="col">ENTREGADOR</th>
                    <th scope="col">DATA</th>
                    <th scope="col">AÇÂO</th>
                </tr>
            </thead>
            <tbody>
                <!--PHP-->
                <?php
                include("../vendor/autoload.php");
                use Models\ClassCrud;
                //instancia
                $crud = new ClassCrud();
                $row = $crud->selectDB("*","operacoes","order by id",array());
                //while
                while($rows = $row->fetch(PDO::FETCH_ASSOC)){
                //variaveis
                $id = $rows['id'];
                $nf = $rows['nf'];
                $operacoesEmitente = $rows['operacoes_emitente'];
                $operacoesCidades = $rows['operacoes_cidades'];
                $cliente = $rows['cliente'];
                $destinatario = $rows['destinatario'];
                $entregador = $rows['entregador'];
                $dataOp = $rows['data_op'];


                ?>
                <tr>
                    <th scope="row"><?php echo $rows['id']; ?></th>
                    <td><?php echo $rows['nf']; ?></td>
                    <td><?php echo $rows['operacoes_emitente']; ?></td>
                    <td><?php echo $rows['operacoes_cidades']; ?></td>
                    <td><?php echo $rows['cliente']; ?></td>
                    <td><?php echo $rows['destinatario']; ?></td>
                    <td><?php echo $rows['entregador']; ?></td>
                    <td><?php echo $rows['data_op']; ?></td>
                    <td><a href="<?php echo "./notasUpdate.php?id={$rows['id']}"?>">EDITAR</a> | <a href="<?php echo "../controllers/ControllerDelete.php?id={$rows['id']}"?>">EXCLUIR</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
        
    <!--footer-->
    <footer>
        <p>Desenvolvido por Pedro Parro</p>
    </footer>

<script src="../public/js/jquery.js"></script>
<script src="../public/js/script.js"></script>
</body>
</html>