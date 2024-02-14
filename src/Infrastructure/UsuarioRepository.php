<?php

namespace src\Infrastructure;

use Exception;
use PDO;
use src\Entities\IUsuarioRepository;
use src\Entities\Primitives\Senha;
use src\Entities\Usuario;

class UsuarioRepository implements IUsuarioRepository
{
    private $db;

    public function __construct() {
        $host = "172.18.0.2:3306";
        $dbname = "TavernaDoGordo";
        $usuario = "root";
        $senha = "123";

        $this->db = new PDO("mysql:host=$host;dbname=$dbname", "$usuario", "$senha");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function salvar(Usuario $usuario) : void 
    {
        $sql = $this->db->prepare("INSERT INTO usuarios(nome_usuario, senha) VALUES(?, ?)");
        $sql->execute([$usuario->getNomeUsuario(), $usuario->getSenha()]);
    }

    public function encontrarPorNomeUsuario(string $nomeUsuario): Usuario
    {
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE nome_usuario = ?");
        $sql->execute([$nomeUsuario]);

        $dadosUsuario = $sql->fetch(PDO::FETCH_ASSOC);
        
        if($dadosUsuario == false)
        {
            return throw new Exception("Usuário não encontrado!");
        }

        $senha = new Senha($dadosUsuario["senha"]);

        return new Usuario($nomeUsuario, $senha);
    }

    public function encontrarTodos() : array
    {
        $sql = $this->db->prepare("SELECT * FROM usuarios");
        $sql->execute();

        $usuarios = $sql->fetchAll();

        return $usuarios;
    }
}