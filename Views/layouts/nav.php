<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="/home">Meu Pet Sumiu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/create_user">Criar Conta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard">Perfil</a>
        </li>
    </div>

    

    <div class="d-flex align-items-center gap-3">
      <?php if (isset($_SESSION['user'])): ?>
        <?= $_SESSION['user']['nome'] ?>
        <a href="/logout"class="btn btn-danger">Logout</a>
      <?php endif; ?>

      <button id="themeToggle" class="btn btn-outline-secondary btn-sm">
        🌙 / ☀️
      </button>
    </div>
  </div>
</nav>