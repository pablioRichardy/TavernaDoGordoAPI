<?php

namespace src\Entities;

use src\Entities\Primitives\Senha;

class Usuario
{
    private string $nome_usuario;
    private Senha $senha;

    public function __construct(string $nome_usuario, $senha) 
    {
        $this->nome_usuario = $nome_usuario;
        $this->senha = $senha;
    }

    public function getNomeUsuario() : string 
    {
        return $this->nome_usuario;
    }
    public function getSenha() : string 
    {
        return $this->senha->getSenha();
    }
}