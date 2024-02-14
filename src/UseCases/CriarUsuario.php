<?php

namespace src\UseCases;

use Exception;
use src\Entities\IUsuarioRepository;
use src\Entities\Primitives\Senha;
use src\Entities\Usuario;

class CriarUsuario
{
    private IUsuarioRepository $usuarioRepository;

    public function __construct(IUsuarioRepository $usuarioRepository) 
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function executar(string $nomeUsuario, string $senha)
    {   
        $usuarioExistente = "";
        try{
            $usuarioExistente = $this->usuarioRepository->encontrarPorNomeUsuario($nomeUsuario);
        }catch(Exception $er)
        {
            
        }
        
        if($usuarioExistente != null)
        {
            return throw new Exception("O usuário fornecido já existe!");
        }
        
        $senha = new Senha($senha);
        $usuario = new Usuario($nomeUsuario, $senha);

        //$this->usuarioRepository->salvar($usuario);
    }
}