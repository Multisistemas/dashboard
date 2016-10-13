<div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <div class="container" style="width: auto;">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <?= $this->tag->linkTo([null, 'class' => 'brand', 'Multisistemas Dashboard']) ?>
        <div class="nav-collapse">

          <ul class="nav"><?php $menus = ['Inicio' => null, 'Login' => 'session/loginOpauth']; ?><?php foreach ($menus as $key => $value) { ?>
              <?php if ($value == $this->dispatcher->getControllerName()) { ?>
              <li class="active"><?= $this->tag->linkTo([$value, ($key)]) ?></li>
              <?php } else { ?>
              <li><?= $this->tag->linkTo([$value, ($key)]) ?></li>
              <?php } ?><?php } ?></ul>

      </div>
    </div>
  </div>
</div>

<div class="container main-container">
  <?= $this->getContent() ?>
</div>

<footer>
Made with love by the Phalcon Team

    <?= $this->tag->linkTo(['privacy', 'Privacy Policy']) ?>
    <?= $this->tag->linkTo(['terms', 'Terms']) ?>

© 2016 Multisistemas Team.
</footer>