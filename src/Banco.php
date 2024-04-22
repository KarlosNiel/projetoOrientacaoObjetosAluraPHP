<?php

require_once 'Conta.php';
require_once 'Titular.php';

$carlos = new Titular(new Cpf("123-456-789-10"), "Carlos");
$primeiraConta = new Conta($carlos);
$primeiraConta->depositar(500);
$primeiraConta->sacar(300);

$jairo = new Titular(new Cpf("122-221-333-09"), "Jairo");
new Conta($jairo);
$jessica = new Titular(new Cpf("122-221-366-09"), "Jessica");
new Conta($jessica);

echo $primeiraConta->mostrarCpfTitular() . PHP_EOL;
echo $primeiraConta->mostrarNomeTitular() . PHP_EOL;
echo $primeiraConta->mostrarSaldo() . PHP_EOL;

echo Conta::mostraNumeroDeContas();