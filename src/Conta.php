<?php

class Conta {

    private $numeroConta;
    private $tipo;
    private $saldo;

    function __construct() {
        
    }

    function getNumeroConta() {
        return $this->numeroConta;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getSaldo() {
        return $this->saldo;
    }

    function setNumeroConta($numeroConta): void {
        $this->numeroConta = $numeroConta;
    }

    function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    function setSaldo($saldo): void {
        $this->saldo = $saldo;
    }

    function verificaSaldoSaque($valorSaque) {
        if ($this->tipo == 1 && $valorSaque <= 600) {
            if ($this->saldo >= $valorSaque + 2.50) {
                $this->saldo -= $valorSaque + 2.50;
                echo 'operação efetuada';
            } else {
                echo 'operação não efetuada';
                echo 'saldo insuficiente';
                return false;
            }
        } else if ($this->tipo == 2 && $valorSaque <= 1000) {
            if ($this->saldo >= $valorSaque - 0.80) {
                $this->saldo -= $valorSaque - 0.80;
                echo 'operação efetuada';
                return true;
            } else {
                echo 'operação não efetuada';
                echo 'saldo insuficiente';
                return false;
            }
        } else {
            echo 'erro na conta';
        }
    }

    function validaTransferencia($valorTransferencia, $contaTransferir) {
        if ($this->saldo >= $valorTransferencia) {
            $this->saldo -= $valorTransferencia;
            $contaTransferir->setSaldo($contaTransferir->getSaldo() + $valorTransferencia);
            echo 'operação efetuada';
        } else {
            echo 'operação não efetuada';
            echo 'saldo insuficiente';
            return false;
        }
    }

    function efetuaDeposito($valorDeposito) {
        $this->saldo += $valorDeposito;
    }

}
