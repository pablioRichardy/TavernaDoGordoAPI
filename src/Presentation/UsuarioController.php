<?php

namespace src\Presentation;

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

use Exception;
use src\Infrastructure\UsuarioRepository;
use src\UseCases\CriarUsuario;
use src\UseCases\LogarUsuario;

class UsuarioController
{
    public function criarUsuario($dados = []) : void 
    {
        $usuarioRepository = new UsuarioRepository();
        $criaUsuario = new CriarUsuario($usuarioRepository, $dados["nomeUsuario"], $dados["senha"]);

        try
        {
            $criaUsuario->executar();
            http_response_code(200);
            die(
                json_encode(
                    [
                        "codigo" => "200",
                        "mensagem" => "O usuário foi criado com sucesso!"
                    ]
                )
            );
        }
        catch(Exception $er)
        {
            die(
                json_encode(
                    [
                        "codigo" => "400",
                        "mensagem" => $er->getMessage()
                    ]
                )
            );
        }
    }

    public function logarUsuario() : void 
    {
        $usuarioRepository = new UsuarioRepository();
        $logarUsuario = new LogarUsuario($usuarioRepository);

        $dados = json_decode(file_get_contents("php://input"), true);
        
        //$logarUsuario->executar($dados["nomeUsuario"], $dados["senha"]);
    }

    public function welcomeAPI() : void 
    {
        die(
            json_encode(
                [
                    "autor" => "Pablio Richardy",
                    "descricao" => "Uma aplicação focada em atender outras aplicações focadas em mesas de RPG, use e se divirta!",
                    "gitHub" => ""
                ]
            )
        );
    }

    public function mostrarUsuario($idUsuario) : void 
    {
        echo $idUsuario;
    }
}