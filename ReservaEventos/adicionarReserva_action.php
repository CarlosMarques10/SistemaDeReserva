<?php
require_once 'config.php';
require_once 'reservas/Reserva.php';

$reserva = new Reserva($pdo);


$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$telefone = filter_input(INPUT_POST, 'telefone');
$valorTotal = filter_input(INPUT_POST, 'valorTotal');
$valorPago = filter_input(INPUT_POST, 'valorPago');
$dataEntrada = filter_input(INPUT_POST, 'dataEntrada');
$dataSaida = filter_input(INPUT_POST, 'dataSaida');

if($nome && $telefone && $valorTotal&& $valorPago && $dataEntrada && $dataSaida){

    $dataEntrada = explode('/', $dataEntrada);
    $dataSaida = explode('/', $dataSaida);

    $dataEntrada = $dataEntrada[2].'-'.$dataEntrada[1].'-'.$dataEntrada[0];
    $dataSaida = $dataSaida[2].'-'.$dataSaida[1].'-'.$dataSaida[0];

    if($reserva->verificarDisponibilidade($dataEntrada, $dataSaida)){

        $novaReserva = new Objeto();
        $novaReserva->setNome($nome);
        $novaReserva->setTelefone($telefone);
        $novaReserva->setDataEntrada($dataEntrada);
        $novaReserva->setDataSaida($dataSaida);
        $novaReserva->setValorTotal($valorTotal);
        $novaReserva->setValorPago($valorPago);

        $reserva->adicionarReserva($novaReserva);
      
        header("Location: index.php");
        exit;

    }else{
        echo "Essa data não está disponivel!";
    }


}


