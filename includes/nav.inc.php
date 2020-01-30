`   


  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse collapse" id="navbarColor01" style="">
    <ul class="navbar-nav mr-auto">

    <?php  
        $url = $_SERVER['PHP_SELF'];
    ?>

      <li class="nav-item <?php if(strpos($url, 'index')) { echo 'active'; } ?>">
        <a class="nav-link" href="<?php echo ROOT_URL; ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?php if(strpos($url, 'login')) { echo 'active'; } ?>">
        <a class="nav-link" href="<?php echo ROOT_URL.'login'; ?>">Log in</a>
      </li>
      <li class="nav-item <?php if(strpos($url, 'signup')) { echo 'active'; } ?>">
        <a class="nav-link" href="<?php echo ROOT_URL.'signup'; ?>">Sign up</a>
      </li>
      <li class="nav-item <?php if(strpos($url, 'about')) { echo 'active'; } ?>">
        <a class="nav-link" href="<?php echo ROOT_URL.'about'; ?>">About</a>
      </li>
    </ul>
    <?php
    include 'search.inc.php';
    ?>
  </div>
</nav>

<br>
<br>