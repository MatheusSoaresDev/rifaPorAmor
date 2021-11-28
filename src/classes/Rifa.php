<?php

namespace Rifa\Poramor;

use Exception;
use Carbon\Carbon;
use Rifa\Poramor\serviceClasses\serviceClass;

/**
 * @Entity
 */
class Rifa
{
    /**
     * @Id
     * @Column(type="string")
     */
    private string $id;
    /**
     * @Column(type="string")
     */
    private string $nome;
    /**
     * @Column(type="string")
     */
    private string $dataFechamento;
    /**
     * @Column(type="integer")
     */
    private int $limiteParticipantes;
    /**
     * @Column(type="string")
     */
    private string $premio;
    /**
     * @Column(type="string")
     */
    private string $objetivo;

    private string $createAt;
    private string $updateAt;

    public function criarRifa(string $nome, string $dataFechamento, int $limiteParticipantes, string $premio, string $objetivo):bool
    {
        $this->id = $this->createUniqId();
        $this->dataFechamento = $this->validaDataFechamento($dataFechamento);

        if($this->validaNome($nome)){$this->nome = $nome;}
        if($this->validaLimiteParticipantes($limiteParticipantes)){$this->limiteParticipantes = $limiteParticipantes;}
        if($this->validaPremio($premio)){$this->premio = $premio;}
        if($this->validaObjetivo($objetivo)){$this->objetivo = $objetivo;}

        return true;
    }

    private function createUniqId():string
    {
        return uniqid("rifa_");
    }

    private function validaNome(string $nome):bool
    {
        if(empty($nome)){
            throw new Exception("Insira seu nome e sobrenome!");
        }

        return true;
    }

    private function validaDataFechamento(string $fechamento)
    {
        $dataDigitada = explode("/", $fechamento);

        $dataAtual = Carbon::now("America/Sao_Paulo");
        $dataDigitadaCarbon = Carbon::createMidnightDate($dataDigitada[2], $dataDigitada[1], $dataDigitada[0]);

        if($dataAtual->greaterThan($dataDigitadaCarbon)) {
            throw new Exception("A data de fechamento não pode ser menor que a data de hoje!");
        }

        return $dataDigitadaCarbon->toDateString();
    }

    private function validaLimiteParticipantes(int $limite):bool
    {
        if($limite < 5){
            throw new Exception("A rifa deve ter ao menos 5 participantes!");
        }

        return true;
    }

    private function validaPremio(string $premio):bool
    {
        if(empty($premio)){
            throw new Exception("Informe o prêmio da rifa!");
        }

        return true;
    }

    private function validaObjetivo(string $objetivo):bool
    {
        if(empty($objetivo)){
            throw new Exception("Informe aos participantes o objetivo da rifa!");
        }

        return true;
    }
}


