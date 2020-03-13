<?php

include 'src\Conta.php';
$c = null;
$opcao = 0;
$listaConta = array();
$contaTransferir = null;

function adicionaConta($a, $b, $c) {
    global $listaConta;
    $conta = new Conta();
    $conta->setNumeroConta($a);
    $conta->setSaldo($b);
    $conta->setTipo($c);
    array_push($listaConta, $conta);
}

adicionaConta(1, 2000, 1);
adicionaConta(2, 5000, 1);
adicionaConta(3, 5000, 1);
adicionaConta(4, 3000, 1);
do {
    printf('Digite o numero da sua conta: ');
    $numeroConta = fgets(STDIN);
    validarConta($numeroConta, $listaConta);
    if ($c == null) {
        printf("erro conta invalida");
    }
} while ($c == null);
do {

    printf('Digite a opção que deseja ');
    printf('1 - Saque ');
    printf('2 - Deposito ');
    printf('3 - Transferencia ');
    printf('0 - sair ');
    $opcao = fgets(STDIN);


    if ($opcao >= 0 && $opcao < 4) {
        switch ($opcao) {
            case 1:
                printf('Deseja sacar qual valor? ');
                $valorSaque = fgets(STDIN);
                $valorSaque = (double) $valorSaque;
                $c->verificaSaldoSaque($valorSaque);
                break;
            case 2:
                printf('Deseja depositar qual valor ');
                $valorDeposito = fgets(STDIN);
                $valorDeposito = (double) $valorDeposito;
                $c->efetuaDeposito($valorDeposito);
                break;
            case 3:
                printf('Deseja depositar qual valor? ');
                $valorTransferencia = fgets(STDIN);
                $valorTransferencia = (double) $valorTransferencia;
                $contaTransferir = $c;
                printf('Deseja depositar em qual conta? ');
                $numeroContaTrasTransferir = fgets(STDIN);
                validarContaTranferencia($numeroContaTrasTransferir, $listaConta);
                $c->validaTransferencia($valorTransferencia, $contaTransferir);
                break;
            case 0:
                printf(' conexão finalizada');
                break;
        }
    } else {
        printf('opção invalida ');
    }
} while ($opcao != 0);

function validarConta($numeroConta, $listaConta) {
    foreach ($listaConta as &$conta) {
        global $c;
        $c = $conta;
        if ($c->getNumeroConta() == $numeroConta) {
            break;
        } else {
            $c = null;
        }
    };
}

function validarContaTranferencia($numeroContaTrasTransferir, $listaConta) {
    foreach ($listaConta as &$conta) {
        global $contaTransferir;
        $contaTransferir = $conta;
        if ($contaTransferir->getNumeroConta() == $numeroContaTrasTransferir) {
            break;
        } else {
            $contaTransferir = null;
        }
    };
}
