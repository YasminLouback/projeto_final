<?php
require_once __DIR__ . '/Model/Usuario.php';

$u = new Usuario();

$u->setNome("Teste MVC");
$u->setCPF("12345678912");
$u->setEmail("teste@teste.com");
$u->setSenha("123");

if ($u->inserirBD()) {
    echo "Usuário inserido com sucesso!";
} else {
    echo "Erro ao inserir usuário!";
}
?>