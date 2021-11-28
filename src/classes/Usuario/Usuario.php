<?php

namespace Rifa\Poramor\Usuario;


use Exception;

abstract class Usuario
{
    /**
     * @Id
     * @Column(type="string")
     */
    protected string $id;
    /**
     * @Column(type="string")
     */
    protected string $nome;
    /**
     * @Column(type="string")
     */
    protected string $email;


    protected abstract function createUniqueID():void;

    protected function validaNome(string $nome):bool
    {
        $nomeExplode = explode(" ", $nome);

        if(count($nomeExplode) < 0){
            throw new Exception("Insira ao menos um sobrenome!");
        }

        $this->nome = $nome;
        return true;
    }

    protected function validaEmail(string $email):bool
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new Exception("Email Inválido");
        }

        $this->email = $email;
        return true;
    }


    public function getId(): string
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}