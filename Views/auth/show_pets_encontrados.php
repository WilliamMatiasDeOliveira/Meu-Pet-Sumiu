<?php
if (!isset($_SESSION['user'])) {
    $_SESSION['access_invalid'] = "Entre com a conta para acessar o sistema !";
    header("Location: /login");
    exit;
}
if(isset($_SESSION['pets_encontrados'])){
    $pets_encontrados = $_SESSION['pets_encontrados'];
    $_SESSION['pets_encontrados'];
}

?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Pets Encontrados</h3>
    </div>

    <div class="row">
        <?php if ($pets_encontrados === []): ?>
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Não existe pets encontrados no momento.
                </div>
            </div>
        <?php endif; ?>

        <?php foreach ($pets_encontrados as $pet): ?>    
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                
                    <img
                        <?php if ($pet['imagem'] !== NULL): ?>
                        src="/public/uploads/<?= $pet['imagem'] ?>"
                        class="card-img-top"
                        style="height: 200px; object-fit: cover;"
                        alt="Pet"
                        <?php endif; ?>
                        src="/public/assets/imgs/default-image2.png"
                        class="card-img-top"
                        style="height: 200px; object-fit: cover;"
                        alt="Pet">

                    <div class="card-body">
                        <h5 class="card-title">
                            <?= htmlspecialchars($pet['nome']) ?>
                        </h5>

                        <p class="text-secondary mb-1">
                            <?= ucfirst($pet['tipo']) ?> • <?= ucfirst($pet['sexo']) ?> • <?= ucfirst($pet['cor']) ?>
                        </p>

                        <span class="badge bg-<?= $pet['status'] === 'perdido' ? 'danger' : 'success' ?>">
                            <?= $pet['status'] === 'perdido' ? 'Perdido' : 'Encontrado' ?>
                        </span>
                    </div>
    
                    <div class="card-footer text-center bg-white">
                        <form action="/pet/show_encontrados" method="post">
                            <input type="hidden"name="id_pet"value="<?= $pet['id'] ?>">
                            <input type="submit"class="btn btn-outline-primary btn-sm"value="Ver Detalhes">
                        </form>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


