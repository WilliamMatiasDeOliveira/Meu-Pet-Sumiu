<?php

declare(strict_types=1);

use App\Controllers\MainController;
use App\Controllers\PetController;
use App\Controllers\UserController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace("\\", "/", $uri);



switch ($uri) {
    case "/":
    case "/home":
        MainController::home();
        break;
    case "/create_user":
        MainController::create_user();
        break;
    case "/user/create":
        UserController::create();
        break;
    case "/login":
        MainController::login();
        break;
    case "/login_submit":
        UserController::login_submit();
        break;
    case "/dashboard":
        MainController::dashboard();
        break;
    case "/logout":
        UserController::logout();
        break;
    case "/dashboard":
        MainController::dashboard();
        break;
    case "/create_pet":
        MainController::create_pet();
        break;
    case "/pet/create":
        PetController::create();
        break;
    case "/pet/index":
        PetController::index();
        break;
    case "/index_pet":
        MainController::index_pets();
        break;
    case "/pet/show":
        $id_pet = (int) $_POST['id_pet'];
        PetController::show($id_pet);
        break;
    case "/show_pet":
        MainController::show_pet();
        break;
    case "/pet/delete":
        if (!session_start()) {
            session_start();
        }
        PetController::delete($_SESSION['pet']['id']);
        break;
    case "/pets_encontrados":
        PetController::show_pets_encontrados();
        break;
    case "/show_pets_encontrados":
        MainController::show_pets_encontrados();
        break;
    case "/pet/show_encontrados":
        $id_pet = (int) $_POST['id_pet'];
        PetController::show_encontrados($id_pet);
        break;
    case "/show_pets_details":
        MainController::show_pets_details();
        break;
}

// ROTAS DINÂMICAS (fallback)
// $uriParts = explode('/', trim($uri, '/'));

// if ($uriParts[0] === 'pets' && isset($uriParts[1]) && is_numeric($uriParts[1])) {
//     PetController::show((int) $uriParts[1]);
//     exit;
// }
