<?php

use src\Helpers\Rota;

$rota = new Rota();

$rota->adicionarRota("GET", "/", "UsuarioController@welcomeAPI");
$rota->adicionarRota("POST", "/usuarios", "UsuarioController@criarUsuario");
$rota->adicionarRota("GET", "/\/usuario\/[0-9]/", "UsuarioController@mostrarUsuario");