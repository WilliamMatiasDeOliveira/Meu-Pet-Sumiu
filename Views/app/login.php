<?php
if (isset($_SESSION['login_error'])) {
    $login_error = $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}

if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
if (isset($_SESSION['create_user_succefull'])) {
    $create_user_succefull = $_SESSION['create_user_succefull'];
    unset($_SESSION['create_user_succefull']);
}
if (isset($_SESSION['email_or_password_incorrectly'])) {
    $email_or_password_incorrectly = $_SESSION['email_or_password_incorrectly'];
    unset($_SESSION['email_or_password_incorrectly']);
}
if (isset($_SESSION['user'])) {
    header("Location: /dashboard");
    exit;
}
if(isset($_SESSION['access_invalid'])){
    $access_invalid = $_SESSION['access_invalid'];
    unset($_SESSION['access_invalid']);
}

?>
<div class="container">
    <div class="row justify-content-center p-5 min-vh-100">
        <div class="col-md-6 col-lg-5">

            <!-- Mensagem de erro -->
            <?php if (isset($login_error)): ?>
                <div class="alert alert-danger">
                    <?= $login_error ?>
                </div>
            <?php endif; ?>

            <!-- menssagens de erro -->
            <?php if (isset($create_user_succefull)): ?>
                <div class="alert alert-success text-center">
                    <?= $create_user_succefull ?>
                </div>
            <?php endif; ?>

            <!-- menssagens de erro -->
            <?php if (isset($email_or_password_incorrectly)): ?>
                <div class="alert alert-danger text-center">
                    <?= $email_or_password_incorrectly ?>
                </div>
            <?php endif; ?>
                <!-- menssagem de erro -->
            <?php if(isset($access_invalid)): ?>
                <div class="alert alert-danger text-center">
                    <?= $access_invalid ?>
                </div>
            <?php endif; ?>

            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <h3 class="text-center mb-4">Entrar</h3>

                    <form method="POST" action="/login_submit">

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

                        <!-- Senha -->
                        <div class="mb-4">
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

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Entrar
                            </button>
                        </div>

                    </form>

                </div>
            </div>

            <p class="text-center mt-3">
                Ainda não tem conta?
                <a href="/create_user">Criar conta</a>
            </p>

        </div>
    </div>
</div>