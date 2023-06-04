<?php
require_once 'config.php';
require 'reservas/Reserva.php';

$reserva = new Reserva($pdo);

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$telefone = filter_input(INPUT_POST, 'telefone');
$dataEntrada = filter_input(INPUT_POST, 'dataEntrada');
$dataSaida = filter_input(INPUT_POST, 'dataSaida');
$valorTotal = filter_input(INPUT_POST, 'valorTotal');
$valorPago = filter_input(INPUT_POST, 'valorPago');

if($id && $nome && $telefone && $dataEntrada && $dataSaida && $valorTotal && $valorPago){

    $evento = new Objeto();
    $evento->setId($id);
    $evento->setNome($nome);
    $evento->setTelefone($telefone);
    $evento->setDataEntrada($dataEntrada);
    $evento->setDataSaida($dataSaida);
    $evento->setValorTotal($valorTotal);
    $evento->setValorPago($valorPago);

    $reserva->atualizarReserva($evento);
    
    header("Location: index.php");
    exit;
}

header("Location: editar.php?id=".$id);
exit;