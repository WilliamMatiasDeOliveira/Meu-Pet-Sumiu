<?php
if (isset($_SESSION['pet'])) {
    $pet = $_SESSION['pet'];
}
?>
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-sm">

                <div class="card-img-wrapper d-flex justify-content-center">
                    <img
                        <?php if ($pet['imagem'] !== NULL): ?>
                        src="/public/uploads/<?= $pet['imagem'] ?>"
                        alt="Pet"
                        <?php endif; ?>
                        src="/public/assets/imgs/default-image2.png"
                        alt="Pet">
                </div>

                <div class="card-body">

                    <h3 class="mb-2">
                        <?php if (!empty($pet['nome'])): ?>
                            <?= $pet['nome'] ?>
                        <?php else: ?>
                            Nome Desconhecido
                        <?php endif; ?>
                    </h3>

                    <span class="badge bg-<?= $pet['status'] === 'perdido' ? 'danger' : 'success' ?> mb-3">
                        <?= $pet['status'] === 'perdido' ? 'Pet Perdido' : 'Pet Encontrado' ?>
                    </span>

                    <p class="text-secondary">
                        <span>Tipo: </span><?= $pet['tipo'] ?>
                        •
                        <span>Sexo: </span><?= $pet['sexo'] ?>
                        •
                        <span>Cor: </span><?= $pet['cor'] ?>
                    </p>

                    <hr>

                    <?php if (!empty($pet['tutor_do_pet'])): ?>
                        <p>
                            <strong>Tutor:</strong>
                            <?= $pet['tutor_do_pet'] ?>
                        </p>
                    <?php endif; ?>

                    <hr>

                    <?php if (!empty($pet['email_tutor'])): ?>
                        <p>
                            <strong>Email:</strong>
                            <?= $pet['email_tutor'] ?>
                        </p>
                    <?php endif; ?>

                    <hr>

                    <?php if (!empty($pet['telefone_tutor'])): ?>

                        <p>
                            <strong>Telefone:</strong>
                            <?= "(" . $pet['ddd_tutor'] . ")" . $pet['telefone_tutor'] ?>
                        </p>
                    <?php endif; ?>

                    <hr>

                    <?php if (!empty($pet['descricao'])): ?>
                        <p>
                            <strong>Descrição:</strong>
                            <?= nl2br($pet['descricao']) ?>
                        </p>
                    <?php endif; ?>

                    <p class="text-secondary">
                        <strong>Última vez visto:</strong>
                        <?= $pet['visto_por_ultimo'] ?>
                    </p>

                </div>

                <div class="card-footer d-flex justify-content-between">
                    <a href="/dashboard" class="btn btn-outline-primary">
                        Voltar
                    </a>

                    <div class="actions col-4 d-flex justify-content-between">
                        <a href="/pet/delete" class="btn btn-outline-danger">
                            Excluir
                        </a>
                        <a href="/pet/update" class="btn btn-outline-warning">
                            Editar
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>