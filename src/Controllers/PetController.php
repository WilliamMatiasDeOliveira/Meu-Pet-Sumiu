<?php

namespace App\Controllers;

use App\Models\Pet;

class PetController
{

    public static function create(): void
    {

        if (!session_start()) {
            session_start();
        }

        $data = $_POST;
        $errors = [];

        if (empty($data['tipo'])) {
            $errors['tipo'] = 'Tipo do pet é obrigatório.';
        }

        if (empty($data['status'])) {
            $errors['status'] = 'Situação do pet é obrigatória.';
        }

        if (empty($data['sexo'])) {
            $errors['sexo'] = 'Sexo é obrigatório.';
        }

        if ($errors) {
            $_SESSION['errors'] = $errors;
            header("Location: /create_pet");
            exit;
        }
        // Upload da imagem
        $imageName = null;
        if (!empty($_FILES['imagem']['name'])) {
            $extension = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
            $imageName = uniqid('pet_', true) . '.' . $extension;

            move_uploaded_file(
                $_FILES['imagem']['tmp_name'],
                __DIR__ . '/../../public/uploads/' . $imageName
            );
        }

        $pet = new Pet();
        $pet->create($data, $imageName, $_SESSION['user']['id']);

        $_SESSION['success'] = 'Pet cadastrado com sucesso!';
        header("Location: /dashboard");
        exit;
    }

    public static function index(): void
    {
        if (!session_start()) {
            session_start();
        }
        $pet = new Pet();
        $pets = $pet->takeUserPet((int) $_SESSION['user']['id']);

        $_SESSION['pets'] = $pets;
        header("Location: /index_pet");
        exit;
    }

    public static function show(int $id): void
    {
        
        if(!session_start()){
            session_start();
        }

        $petModel = new Pet();
        $pet = $petModel->findById($id);

        // se o telefone tiver tamanho 8 adicionar "-" apos o 4° digito
        if(strlen($pet['telefone_tutor']) == 8){
            $pet['telefone_tutor'] = substr($pet['telefone_tutor'], 0, 4) . '-' . substr($pet['telefone_tutor'], 4);
        } else {
            // se o telefone tiver tamanho 9 adicionar "-" apos o 5° digito
             $pet['telefone_tutor'] = substr($pet['telefone_tutor'], 0, 5) . '-' . substr($pet['telefone_tutor'], 5);
        }
        
        
        if (!$pet) {
            $_SESSION['not_pet'] = "Você ainda não possue pet cadastrado !";
            header("Location: /dashboard");
            exit;
        }

        $_SESSION['pet'] = $pet;
        header("Location: /show_pet");
        exit;
    }

    public static function update(){
        
    }
}
