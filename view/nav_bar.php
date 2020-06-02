<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php?id=1">Find it</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="index.php?id=1">Accueil</a>
      </li>
      <?php if(!isConnected()): ?>
        <li class="nav-item">
          <a class="nav-link text-primary" href="index.php?id=2">Connexion</a>
        </li>
      <?php endif; ?>
      <?php if(isCompany()): ?>
      <li class="nav-item">
        <a class="nav-link text-warning" href="index.php?id=11">Ajoutez une offre</a>
      </li>
      <?php endif; ?>
      <?php if(isCandidate()): ?>
      <li class="nav-item">
        <a class="nav-link text-warning" href="index.php?id=9">Ajoutez une candidature</a>
      </li>
      <?php endif; ?>
      <?php if(isConnected()): ?>
        <li class="nav-item">
          <a class="nav-link text-success" href="index.php?id=4">Mon compte</a>
        </li>
        <?php if(isCandidate()): ?>
        <li class="nav-item">
            <a class="nav-link text-success" href="index.php?id=12">Mes CV</a>
        </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link text-danger" href="index.php?id=10">Déconnexion</a>
        </li>
      <?php endif; ?>
      <?php if(!isAdmin()): ?>
      <li class="nav-item">
        <a class="nav-link" href="index.php?id=8">Contact</a>
      </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>