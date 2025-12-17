<?php
declare(strict_types=1);

namespace App\Controllers;

require_once __DIR__."/../../config.php";

class MainController{

    private static function layouts($page, $title){
        $title = $title;
        require_once VIEWS."/layouts/header.php";
        require_once VIEWS."/layouts/nav.php";
        require_once VIEWS."$page.php";
        require_once VIEWS."/layouts/footer.php";
    }

    public static function home(){
        self::layouts("app/home", "Home");
    }

    public static function create_user(){
        self::layouts("app/create_user", "Criar Conta");
    }

    public static function login(){
        self::layouts("app/login", "Login");
    }

    public static function dashboard(){
        self::layouts('auth/dashboard', "Dashboard");
    }

    public static function create_pet(){
        self::layouts("pet/create_pet", "Cad Pet");
    }

    public static function index_pets(){
        self::layouts("pet/index_pets", "Lista de Pets");
    }

    public static function show_pet(){
        self::layouts("pet/show", "Detalhes do Pet");
    }
}