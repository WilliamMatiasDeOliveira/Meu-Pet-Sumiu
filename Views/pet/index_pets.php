<?php
if (isset($_SESSION['pets'])) {
    $pets = $_SESSION['pets'];
}
?>


<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Meus Pets</h3>
        <a href="/create_pet" class="btn btn-primary">
            Novo Pet
        </a>
    </div>

    <div class="row">
        <?php if ($pets === []): ?>
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Você ainda não cadastrou nenhum pet.
                </div>
            </div>
        <?php endif; ?>

        <?php foreach ($pets as $pet): ?>    
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
                        <form action="/pet/show" method="post">
                            <input type="hidden"name="id_pet"value="<?= $pet['id'] ?>">
                            <input type="submit"class="btn btn-outline-primary btn-sm"value="Ver Detalhes">
                        </form>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>