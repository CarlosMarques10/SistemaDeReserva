<?php

class Objeto {
    private $id;
    private $nome;
    private $telefone;
    private $valorTotal;
    private $valorPago;
    private $dataEntrada;
    private $dataSaida;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = trim($id);

        return $this;
    }


    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = ucwords(trim($nome));

        return $this;
    }


    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = trim($telefone);

        return $this;
    }


    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = trim($valorTotal);

        return $this;
    }


    public function getValorPago()
    {
        return $this->valorPago;
    }

    public function setValorPago($valorPago)
    {
        $this->valorPago = trim($valorPago);

        return $this;
    }


    public function getDataEntrada()
    {
        return $this->dataEntrada;
    }

    public function setDataEntrada($dataEntrada)
    {
        $this->dataEntrada = $dataEntrada;

        return $this;
    }

  

    public function getDataSaida()
    {
        return $this->dataSaida;
    }

    public function setDataSaida($dataSaida)
    {
        $this->dataSaida = $dataSaida;

        return $this;
    }
}