<?php
require_once 'config.php';
require_once 'reservas/Reserva.php';

$reserva = new Reserva($pdo);

$id = filter_input(INPUT_GET, 'id');
$evento = false;

if($id){
    $evento = $reserva->procurarId($id);
}

if($evento === false){
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link  href="assets/style.css"  rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<header>
        <nav class="navbar bg-dark navbar-dark d-flex justify-content-center">
        <div class="container-fluid">
            <h2 class="navbar-brand mb-0 h1">Editar Reserva</h2>
        </div>
        </nav>
    </header>

<form method="post" action="editar_action.php">

    <input type="hidden" name="id" value="<?=$evento->getId();?>">
    <div class="mb-3">
        Nome:<br>
        <input type="text" name="nome" value="<?=$evento->getNome();?>" class="form-control input"><br>
    </div>
    <div class="mb-3">
        Telefone:<br>
        <input type="number" name="telefone" value="<?=$evento->getTelefone();?>" class="form-control input"><br>
    </div>
    <div class="mb-3">
        Data de Entrada:<br>
        <input type="text" name="dataEntrada" value="<?=$evento->getDataEntrada();?>" class="form-control input"><br>
    </div>
    <div class="mb-3">
        Data de Saida<br>
        <input type="text" name="dataSaida" value="<?=$evento->getDataSaida();?>" class="form-control input"><br>
    </div>
    <div class="mb-3">
        Valor Toal:<br>
        <input type="number" name="valorTotal" value="<?=$evento->getValorTotal();?>" class="form-control input"><br>
    </div>
    <div class="mb-3">
        Valor Pago:<br>
        <input type="number" name="valorPago" value="<?=$evento->getValorPago();?>" class="form-control input"><br>
    </div>
    <input type="submit" value="Atualizar" class="btn btn-success">


</form>
    
</body>
</html>