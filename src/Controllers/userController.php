<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{

    public static function create()
    {

        if (!session_start()) {
            session_start();
        }

        $data = $_POST;

        // validação de campos
        $errors = array();

        if (empty($data['nome'])) {
            $errors['nome'] = "Este campo é obrigatório !";
        }
        if (empty($data['email'])) {
            $errors['email'] = "Este campo é obrigatório !";
        }
        if (empty($data['ddd'])) {
            $errors['ddd'] = "O campo DDD é obrigatório !";
        }
        if (empty($data['telefone'])) {
            $errors['telefone'] = "O campo telefone é obrigatório !";
        }
        if (empty($data['password'])) {
            $errors['password'] = "Este campo é obrigatório !";
        }
        if (empty($data['password_confirmation'])) {
            $errors['password_confirmation'] = "Este campo é obrigatório !";
        }

        // erros para nomes vazios
        if ($errors) {
            $_SESSION['errors'] = $errors;
            header("Location: /create_user");
            exit;
        }

        // limpar possiveis "-" colocados pelo usuario
        $telefone = preg_replace('/\D/', '', $data['telefone']);
        $telefone = trim($telefone);

        $data['telefone'] = $telefone;

        // verificar se o ddd tem 3 digitos
        if (strlen($data['ddd']) != 3) {
            $errors['ddd'] = "O DDD deve ter 3 digitos !";
        }

        // verificar se o telefone tem 8 para fixo e 9 para celular
        if (strlen($telefone) < 8 || strlen($telefone) > 9) {
            $errors['telefone'] = "O Telefone deve ter no minimo 8 <br> E no maximo 9 digitos !";
        }

        if ($errors) {
            $_SESSION['errors'] = $errors;
            header("Location: /create_user");
            exit;
        }

        $user = new User();
        $response = $user->create($data);

        if ($response) {
            $_SESSION['create_user_succefull'] = "Sua conta foi criada com sucesso !";
            header("Location: /login");
            exit;
        } else if ($response === false) {
            $_SESSION['email_exists'] = "Este email já esta em uso !";
            header("Location: /create_user");
            exit;
        } else {
            $_SESSION['pssword_not_equals'] = "As senhas devem ser iguais !";
            header("Location: /create_user");
        }
    }

    public static function login_submit()
    {
        if (!session_start()) {
            session_start();
        }
        $data = $_POST;

        // validação de campos
        $errors = array();

        if (empty($data['email'])) {
            $errors['email'] = "Este campo é obrigatório !";
        }

        if (empty($data['password'])) {
            $errors['password'] = "Este campo é obrigatório !";
        }

        if ($errors) {
            $_SESSION['errors'] = $errors;
            header("Location: /login");
            exit;
        }

        $user = new User();
        $response = $user->login($data);

        if (!$response) {
            $_SESSION['email_or_password_incorrectly'] = "Email ou Senha incorretos !";
            header("Location: /login");
            exit;
        }

        $check_password = password_verify($data['password'], $response['password']);

        if (!$check_password) {
            $_SESSION['email_or_password_incorrectly'] = "Email ou Senha incorretos !";
            header("Location: /login");
            exit;
        }

        $_SESSION['user'] = $response;
        header("Location: /dashboard");
        exit;
    }

    public static function logout()
    {

        if (!session_start()) {
            session_start();
        }
        unset($_SESSION['user']);
        header("Location: /home");
        exit;
    }
}
