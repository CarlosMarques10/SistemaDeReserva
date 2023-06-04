<?php
require_once 'config.php';
require_once 'reservas/Reserva.php';

$reserva = new Reserva($pdo);

?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <link  href="assets/style.css"  rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<header>
    <nav class="navbar bg-dark navbar-dark d-flex justify-content-center">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Reservar Eventos</span>
    </div>
    </nav>
</header>

<div class="d-flex justify-content-between">
<div class="d-flex justify-content-end">
<a href="adicionarReserva.html" class="btn btn-secondary adicionar ">Adicionar Reserva</a>
</div>


    <form method="get" class="d-flex form-data">
        <select name="ano" class="form-select data">
            <option>2023</option>
            <option>2024</option>
        </select>
        <select name="mes" class="form-select data">
            <?php for($m = 1; $m<=12 ; $m++): ?>
            <option><?=$m;?></option>
            <?php endfor; ?>
        </select>
        <input type="submit" value="Mostrar" class="btn btn-success">
    </form>
</div>
                

<?php
    if(empty($_GET['ano'])){
        exit;
    }else{
    
        $dataEvento = $_GET['ano'].'-'.$_GET['mes'];
        $dia1 = date('w', strtotime($dataEvento));
        $dias = date('t', strtotime($dataEvento));
        $linhas =  ceil(($dia1 + $dias) / 7);
        $dia1 = -$dia1;
        $dataEntrada = date('Y-m-d', strtotime($dia1.' days', strtotime($dataEvento)));
        $dataSaida = date('Y-m-d', strtotime(($dia1 + ($linhas * 7) -1).' days', strtotime($dataEvento)));
        
        $lista = $reserva->getReservas($dataEntrada, $dataSaida);
    
    }

  
?>

<?php require 'calendario.php'; ?>

</body>
</html>

