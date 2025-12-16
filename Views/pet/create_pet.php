<?php
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
if(!isset($_SESSION['user'])){
    $_SESSION['access_invalid'] = "Crie sua conta para cadastrar um Pet !";
    header("Location: /create_user");
    exit;
}
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">

            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <h4 class="text-center mb-4">Cadastrar Pet</h4>

                    <form method="POST" action="/pet/create" enctype="multipart/form-data">

                        <!-- Nome -->
                        <div class="mb-3">
                            <label class="form-label">Nome do Pet</label>
                            <input type="text" name="nome" class="form-control">
                        </div>

                        <!-- Tipo -->
                        <div class="mb-3">
                            <label class="form-label">Tipo</label>
                            <select name="tipo" class="form-select">
                                <option value="">Selecione</option>
                                <option value="cachorro">Cachorro</option>
                                <option value="gato">Gato</option>
                                <option value="outros">Outro</option>
                            </select>
                        </div>

                        <!-- Sexo -->
                        <div class="mb-3">
                            <label class="form-label">Sexo</label>
                            <select name="sexo" class="form-select">
                                <option value="desconhecido">Desconhecido</option>
                                <option value="macho">Macho</option>
                                <option value="femea">Fêmea</option>
                            </select>
                        </div>

                        <!-- Cor -->
                        <div class="mb-3">
                            <label class="form-label">Cor</label>
                            <input type="text" name="cor" class="form-control">
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label class="form-label">Situação</label>
                            <select name="status" class="form-select">
                                <option value="">Selecione</option>
                                <option value="perdido">Perdido</option>
                                <option value="encontrado">Encontrado</option>
                            </select>
                        </div>

                        <!-- Última vez visto -->
                        <div class="mb-3">
                            <label class="form-label">Última vez visto</label>
                            <input type="text" name="visto_por_ultimo" class="form-control" placeholder="Ex: Praça Central, bairro X">
                        </div>

                        <!-- Descrição -->
                        <div class="mb-3">
                            <label class="form-label">Descrição</label>
                            <textarea name="descricao" class="form-control" rows="3"></textarea>
                        </div>

                        <!-- Imagem -->
                        <div class="mb-4">
                            <label class="form-label">Foto do Pet</label>

                            <div
                                class="border rounded d-flex align-items-center justify-content-center flex-column p-3"
                                style="height: 260px">

                                <!-- Ícone -->
                                <div id="imageIcon" class="text-secondary mb-2">
                                    <p class="mb-0">Nenhuma imagem selecionada</p>
                                </div>

                                <!-- Preview -->
                                <img
                                    id="imagePreview"
                                    class="img-fluid d-none"
                                    style="max-height: 220px; object-fit: contain;">

                                <input
                                    type="file"
                                    name="imagem"
                                    class="form-control mt-3"
                                    accept="image/*"
                                    onchange="previewImage(this)">
                            </div>
                        </div>


                        <div class="d-grid">
                            <button class="btn btn-primary">Cadastrar Pet</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        const icon = document.getElementById('imageIcon');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
                icon.classList.add('d-none');
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>