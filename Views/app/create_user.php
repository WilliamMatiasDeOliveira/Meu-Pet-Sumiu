<?php
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
if (isset($_SESSION['user'])) {
    header("Location: /dashboard");
    exit;
}
if(isset($_SESSION['email_exists'])){
    $email_exists = $_SESSION['email_exists'];
    unset($_SESSION['email_exists']);
}
if(isset($_SESSION['pssword_not_equals'])){
    $pssword_not_equals = $_SESSION['pssword_not_equals'];
    unset($_SESSION['pssword_not_equals']);
}
?>
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100 mt-5">
        <div class="col-md-6 col-lg-5">

             <?php if(isset($email_exists)): ?>
                <div class="alert alert-danger text-center">
                    <?= $email_exists ?>
                </div>
            <?php endif; ?>

             <?php if(isset($pssword_not_equals)): ?>
                <div class="alert alert-danger text-center">
                    <?= $pssword_not_equals ?>
                </div>
            <?php endif; ?>

            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <h3 class="text-center mb-4">Criar Conta</h3>

                    <form method="POST" action="/user/create">

                        <!-- Nome -->
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome completo</label>
                            <input
                                type="text"
                                class="form-control"
                                id="nome"
                                name="nome"
                                placeholder="Digite seu nome">

                            <?php if (isset($errors['nome'])): ?>
                                <div class="text-danger">
                                    <?= $errors['nome'] ?>
                                </div>
                            <?php endif; ?>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="exemplo@email.com">

                                <?php if (isset($errors['email'])): ?>
                                    <div class="text-danger">
                                        <?= $errors['email'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Telefone -->
                            <div class="mb-3">
                                <div class="row g-2">
                                    <!-- DDD -->
                                    <div class="col-4">
                                        <label for="ddd" class="form-label">DDD</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="ddd"
                                            name="ddd"
                                            placeholder="DDD"
                                            maxlength="3">
                                    </div>

                                    <!-- Número -->
                                    <div class="col-8">
                                        <label for="telefone" class="form-label">Telefone</label>
                                        <input
                                            type="tel"
                                            class="form-control"
                                            id="telefone"
                                            name="telefone"
                                            placeholder="99999-9999">
                                    </div>
                                </div>

                                <?php if (isset($errors['ddd'])): ?>
                                    <div class="text-danger">
                                        <?= $errors['ddd'] ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (isset($errors['telefone'])): ?>
                                    <div class="text-danger">
                                        <?= $errors['telefone'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>


                            <!-- Senha -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    name="password">

                                <?php if (isset($errors['password'])): ?>
                                    <div class="text-danger">
                                        <?= $errors['password'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Confirmar Senha -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">Confirmar senha</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password_confirmation"
                                    name="password_confirmation">

                                <?php if (isset($errors['password_confirmation'])): ?>
                                    <div class="text-danger">
                                        <?= $errors['password_confirmation'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Criar Conta
                                </button>
                            </div>

                    </form>

                </div>
            </div>

            <p class="text-center mt-3">
                Já possui conta?
                <a href="/login">Entrar</a>
            </p>

        </div>
    </div>
</div>