<?php
if(!isset($_SESSION['user'])){
    header("Location: /login");
    exit;
}

if(isset($_SESSION['success'])){
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}

if(isset($_SESSION['not_pet'])){
    $not_pet = $_SESSION['not_pet'];
    unset($_SESSION['not_pet']);
}
?>
<div class="container mt-5">

    <?php if(isset($not_pet)): ?>
        <div class="alert alert-danger text-center">
            <?= $not_pet ?>
        </div>
    <?php endif; ?>

    <?php if(isset($success)): ?>
        <div class="alert alert-success text-center">
            <?= $success ?>
        </div>
    <?php endif; ?>

    <div class="row mb-4">
        <div class="col-12 text-center">
            <h2 class="fw-bold">Dashboard</h2>
            <p class="text-secondary">
                Bem-vindo ao painel do sistema <strong>Meu Pet Sumiu</strong>
            </p>
        </div>
    </div>

    <div class="row g-4">

        <!-- Card 1 -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Cadastrar Pet</h5>
                    <p class="card-text">
                        Registre um novo pet perdido ou encontrado.
                    </p>
                    <a href="/create_pet" class="btn btn-primary">
                        Novo Cadastro
                    </a>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Meus Pets</h5>
                    <p class="card-text">
                        Visualize e gerencie seus pets cadastrados.
                    </p>
                    <a href="pet/index" class="btn btn-primary">
                        Ver Lista
                    </a>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Mensagens</h5>
                    <p class="card-text">
                        Veja contatos de pessoas que encontraram seu pet.
                    </p>
                    <a href="/messages" class="btn btn-primary">
                        Acessar
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-5">
        <div class="col-12 text-center">
            <div class="btn btn-primary">
                Utilize o menu superior para navegar entre as funcionalidades.
            </div>
        </div>
    </div>
</div>
