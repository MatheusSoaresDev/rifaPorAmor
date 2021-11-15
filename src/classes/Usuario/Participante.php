<?php

namespace Rifa\Poramor\Usuario;

class Participante extends Usuario
{
    private string $contato;

    public function participaRifa(string $nome, string $email, string $contato):bool{
        return true;
    }
}