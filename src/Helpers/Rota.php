<?php

namespace src\Helpers;

class Rota
{
    private $rotas = [
    ];

    public function adicionarRota(string $metodo, string $rota, string $controllerAcao) : void 
    {
        array_push($this->rotas,
            [
                "rota" => $rota,
                "metodo"=> $metodo,
                "controllerAcao" => $controllerAcao
            ]
        );
    }

    public function buscar(string $uri, string $metodo) : void 
    {
        foreach($this->rotas as $key)
        {
            if($key["rota"] == $uri && $key["metodo"] == $metodo)
            {
                $this->executar($key["controllerAcao"]);
                return;
            }
            
            $padrao = $key["rota"];

            if($padrao[0] == "/" && $padrao[-1] == "/" && $padrao != "/")
            {
                if(preg_match($padrao, $uri, $rota) && $key["metodo"] == $metodo)
                {
                    $argumento = explode("/", $rota[0]);
                    $argumento = $argumento[sizeof($argumento) - 1];
                    
                    $this->executar($key["controllerAcao"], $argumento);
                    return;
                }
            }
        }
        
        echo "PÁGINA NÃO ENCONTRADA!";
    }

    private function executar(string $controllerAcao, string $argumento = "") : void
    {
        $controllerAcao = explode("@", $controllerAcao);

        $controller = $controllerAcao[0];
        $acao = $controllerAcao[1];
        
        $class = new \ReflectionClass("src\Presentation\\" . $controller);
        $class = $class->newInstance();

        if($argumento)
        {
            $class->$acao($argumento);
            return;
        }

        $class->$acao();
        return;
    }
}