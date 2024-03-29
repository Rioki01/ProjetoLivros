<?php

require_once 'C:/xampp/htdocs/projetoLivros/src/models/users.model.php';

class LoginController{
    private $usersService;

    public function __construct(UsersService $usersService) {
        $this->usersService = $usersService;
    }

    public function autenticar($email, $senha) {
        $user = $this->usersService->buscarPorEmail($email);
        if ($user && password_verify($senha, $user->senha)) {
            $_SESSION['autenticar'] = 'SIM';
            $_SESSION['id'] = $user->id;
            // Supondo que você tenha um perfil associado ao usuário
            // $_SESSION['profile_id'] = $user->profile_id;
            //C:/xampp/htdocs/projetoLivros/src/view/home.php
            header('Location: ../projetoLivros/src/view/home.php');
            exit;
        } else {
            $_SESSION['autenticar'] = 'NAO';
            header('Location: index.php?login=erro');
            exit;
        }
    }
}

?>