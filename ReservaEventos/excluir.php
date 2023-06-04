<?php
require_once 'config.php';
require 'reservas/Reserva.php';

$reserva = new Reserva($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id){
    $reserva->excluir($id);
}
header("Location: index.php");
exit;
