<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse collapse" id="navbarColor01" style="">
    <ul class="navbar-nav mr-auto">
    
    <?php
        $url = $_SERVER['PHP_SELF'];
    ?>

      <li class="nav-item <?php if(strpos($url, 'dashboard')) { echo 'active'; } ?>">
        <a class="nav-link" href="<?php echo ROOT_URL.'dashboard';?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?php if(strpos($url, 'uploads')) { echo 'active'; } ?>">
        <a class="nav-link" href="<?php echo ROOT_URL.'uploads.php';?>">My Uploads</a>
      </li>
      <li class="nav-item <?php if(strpos($url, 'edit')) { echo 'active'; } ?>">
        <a class="nav-link" href="<?php echo ROOT_URL.'edit';?>">Edit Profile</a>
      </li>
      <li class="nav-item <?php if(strpos($url, 'settings')) { echo 'active'; } ?>">
        <a class="nav-link" href="<?php echo ROOT_URL.'settings';?>">Settings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo ROOT_URL.'includes/logout.inc.php';?>">Logout</a>
      </li>

    </ul>
    <?php
    include 'search.inc.php';
    ?>
  </div>
</nav>

<br>
<br>