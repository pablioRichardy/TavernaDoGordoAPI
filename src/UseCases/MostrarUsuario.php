<?php

namespace src\UseCases;

use src\Entities\IUsuarioRepository;

class MostrarUsuario
{
    private IUsuarioRepository $usuarioRepository;

    public function __construct(IUsuarioRepository $usuarioRepository) {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function executar() : void 
    {
        //$usuario = $this->usuarioRepository->encontrarPorID();
    }
}