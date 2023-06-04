<?php
require_once 'models/Objeto.php';

class Reserva extends Objeto{
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    
    public function getReservas($dataEntrada, $dataSaida){
        $array = array();

        $sql = $this->pdo->prepare("SELECT * FROM eventos WHERE NOT (data_entrada > :data_saida OR data_saida < :data_entrada)");
        $sql->bindValue(':data_entrada',$dataEntrada);
        $sql->bindValue(':data_saida',$dataSaida);
        $sql->execute();

        if($sql->rowCount()>0){
            $array = $sql->fetchAll();
        }

        return $array;

    }


    public function verificarDisponibilidade($dataEntrada, $dataSaida){

        $sql = $this->pdo->prepare("SELECT * FROM eventos WHERE (NOT (data_entrada > :data_saida OR data_saida < :data_entrada))");
        $sql->bindValue(':data_entrada',$dataEntrada);
        $sql->bindValue(':data_saida',$dataSaida);
        $sql->execute();

        if($sql->rowCount() > 0){
            return false;
        }else{
            return true;
        }
    }


    public function adicionarReserva(Objeto $o){

        $sql = $this->pdo->prepare("INSERT INTO eventos (nome,telefone,data_entrada,data_saida,valor_total,valor_pago) VALUES (:nome,:telefone,:data_entrada,:data_saida,:valor_total,:valor_pago)");
        $sql->bindValue(':nome', $o->getNome());
        $sql->bindValue(':telefone', $o->getTelefone());
        $sql->bindValue(':data_entrada', $o->getDataEntrada());
        $sql->bindValue(':data_saida', $o->getDataSaida());
        $sql->bindValue(':valor_total', $o->getValorTotal());
        $sql->bindValue(':valor_pago', $o->getValorPago());
        $sql->execute();

        $o->setId($this->pdo->lastInsertId());
        return $o;

    }

    public function excluir($id){

        $sql = $this->pdo->prepare("DELETE FROM eventos WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

    }

    public function procurarId($id){

        $sql = $this->pdo->prepare("SELECT * FROM eventos WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            $o = new Objeto();
            $o->setId($data['id']);
            $o->setNome($data['nome']);
            $o->setTelefone($data['telefone']);
            $o->setDataEntrada($data['data_entrada']);
            $o->setDataSaida($data['data_saida']);
            $o->setValorTotal($data['valor_total']);
            $o->setValorPago($data['valor_pago']);

            return $o;
        }else{
            return false;
        }
    }
    
    public function atualizarReserva(Objeto $o){
        
        $sql = $this->pdo->prepare("UPDATE eventos SET nome = :nome, telefone = :telefone, data_entrada = :data_entrada, data_saida = :data_saida, valor_total = :valor_total, valor_pago = :valor_pago WHERE id = :id");
        $sql->bindValue(':nome', $o->getNome());
        $sql->bindValue(':telefone', $o->getTelefone());
        $sql->bindValue(':data_entrada', $o->getDataEntrada());
        $sql->bindValue(':data_saida', $o->getDataSaida());
        $sql->bindValue(':valor_total', $o->getValorTotal());
        $sql->bindValue(':valor_pago', $o->getValorPago());
        $sql->bindValue(':id', $o->getId());
        $sql->execute();

        return true;
        
    }



}