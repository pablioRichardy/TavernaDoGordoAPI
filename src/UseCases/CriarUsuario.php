<?php

namespace src\UseCases;

use Exception;
use src\Entities\IUsuarioRepository;
use src\Entities\Primitives\Senha;
use src\Entities\Usuario;

class CriarUsuario
{
    private IUsuarioRepository $usuarioRepository;
    private $nomeUsuario;
    private $senha;

    public function __construct(IUsuarioRepository $usuarioRepository, string $nomeUsuario, string $senha) 
    {
        $this->usuarioRepository = $usuarioRepository;
        $this->nomeUsuario = $nomeUsuario;
        $this->senha = $senha;
    }

    public function executar()
    {   
        $usuarioExistente = "";
        try{
            $usuarioExistente = $this->usuarioRepository->encontrarPorNomeUsuario($this->nomeUsuario);
        }catch(Exception $er)
        {
            
        }
        
        if($usuarioExistente != null)
        {
            return throw new Exception("O usuário fornecido já existe!");
        }
        
        $senha = new Senha($this->senha);
        $usuario = new Usuario($this->nomeUsuario, $senha);

        //$this->usuarioRepository->salvar($usuario);
    }
}