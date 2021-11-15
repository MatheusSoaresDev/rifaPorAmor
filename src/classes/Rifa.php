<?php

namespace Rifa\Poramor;

use Exception;
use Carbon\Carbon;
use Rifa\Poramor\serviceClasses\serviceClass;

class Rifa
{
    private string $id;
    private string $nome;
    private string $dataCriacao;
    private string $dataFechamento;
    private int $limiteParticipantes;
    private string $premio;
    private string $objetivo;
    private string $idAdmin;

    public function criarRifa(string $nome, string $dataFechamento, int $limiteParticipantes, string $premio, string $objetivo/*, string $idAdmin*/):bool
    {
        $this->id = serviceClass::createUniqueID();//Gera id unico e aleatório; //

        if(serviceClass::validaNome($nome)){$this->nome = $nome;} else {throw new Exception("Insira ao menos um sobrenome!");} //Valida o nome; //

        $this->dataCriacao = Carbon::now("America/Sao_Paulo");// Insere a data e hora atual como data de criação; //

        $this->dataFechamento = serviceClass::validaFechamento($dataFechamento); //Transforma a data de fechamento digitada para formato carbon

        if($limiteParticipantes > 0){$this->limiteParticipantes = $limiteParticipantes;} else {throw new Exception("O limite de participantes deve ser pelo menos 1");} // Valida limite de participantes;

        if(!empty($premio)) {$this->premio = $premio;} else {throw new Exception("Preencha o prêmio!");}

        if(!empty($objetivo)) {$this->objetivo = $objetivo;} else {throw new Exception("Preencha o objetivo da rifa!");}
        return true;
    }
}