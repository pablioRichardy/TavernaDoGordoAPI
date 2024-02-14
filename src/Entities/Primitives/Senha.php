<?php

namespace src\Entities\Primitives;

use ErrorException;

class Senha
{
    private string $senha;

    public function __construct(string $senha) {
        $this->senha = "";
        if(!$this->validar($senha))
        {
            return throw new ErrorException("A senha deve conter caracteres especiais e ser maior que 8 caraceres ou as senhas não são iguais. Por favor, digite novamente!");
        }
        $this->senha = $senha;
    }
    
    private function validar(string $senha) : bool
    {
        return strlen($senha) >= 8
        && (preg_match("/[A-Z]/", $senha) && preg_match("/[a-z]/", $senha)) 
        && preg_match("/[0-9]/", $senha) 
        && preg_match("/[^A-Za-z0-9]/", $senha);
    }

    public function getSenha()
    {
        return $this->senha;
    }
}