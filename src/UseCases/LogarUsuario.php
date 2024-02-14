<?php

namespace src\UseCases;

use src\Entities\IUsuarioRepository;

class LogarUsuario
{
    private IUsuarioRepository $usuarioRepository;

    public function __construct(IUsuarioRepository $usuarioRepository) 
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function executar(string $nomeUsuario, string $senha) : void
    {
        $usuario = $this->usuarioRepository->encontrarPorNomeUsuario($nomeUsuario);

        if(!empty($usuario->getNomeUsuario()) && $usuario->getSenha() == $senha)
        {
            session_start();
            $_SESSION["nomeUsuario"] = $nomeUsuario;
            header("Location: /");
        }
    }

}