<?php

namespace src\Entities;

use src\Entities\Usuario;

interface IUsuarioRepository
{
    public function salvar(Usuario $usuario) : void;
    public function encontrarPorNomeUsuario(string $nomeUsuario) : Usuario;
    //public function encontrarPorID() : Usuario;
    public function encontrarTodos(): array;
}