<?php

class Conta
{
    private Titular $titular;
    private float $saldo;
    private static $numeroDeContas = 0;

    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
        $this->saldo = 0;

        self::$numeroDeContas++;
    }

    public function __destruct()
    {
        self::$numeroDeContas--;
    }

    public function sacar(float $valorASacar): void
    {
        if ($valorASacar > $this->saldo) {
            echo "Saldo indisponivel";
            return;
        }
        $this->saldo -= $valorASacar;
    }

    public function depositar(float $valorADepositar): void
    {
        if ($valorADepositar <  0) {
            echo "O valor precisa ser positivo";
            return;
        }
        $this->saldo = $valorADepositar;

    }

    public function transferir(float $valorATransferir, Conta $contaDestino): void
    {
        if ($valorATransferir > $this->saldo) {
            echo "saldo indisponivel";
            return;
        }
        $this->sacar($valorATransferir);
        $contaDestino->depositar($valorATransferir);

    }
    
    public function mostrarSaldo(): float
    {
        return $this->saldo;
    }

    public function mostrarCpfTitular(): string
    {
        return $this->titular->getCpf();
    }

    public function mostrarNomeTitular(): string
    {
        return $this->titular->getNome();
    }

    public static function mostraNumeroDeContas(): int
    {
        return self::$numeroDeContas;
    }
}