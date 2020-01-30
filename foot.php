<footer class="page-footer <?php echo colour1; ?>">
          <div class="f_container">
            <div class="f_row">
              <div class="f_row col s12">
              <!-- .f_row .f_col.s12 -->
                <h5>Footer Content</h5>
                <p class="grey lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="f_row col offset-s12">
                <h5>More</h5>
                <ul class = "navbar-nav mr-auto">
                  <li class = "nav-item"><a style = "" class = "nav-link <?php if(strpos($url, 'about')) { echo white; } else { echo links; } ?>" href="<?php echo ROOT_URL.'about'; ?>">About</a></li>

                  <!-- SiteMap -->


                  <li class = "nav-item"><a class = "nav-link <?php if(strpos($url, 'feedback')) { echo white; } else { echo links; } ?>" href="<?php echo ROOT_URL.'feedback'; ?>">Feedback</a></li>
                  <li class = "nav-item"><a class = "nav-link  <?php if(strpos($url, 'docs')) { echo white; } else { echo links; } ?>" href="<?php echo ROOT_URL.'docs'; ?>">Documentation</a></li>
                  <li class = "nav-item"><a class = "nav-link <?php if(strpos($url, 'terms')) { echo white; } else { echo links; } ?>" href="<?php echo ROOT_URL.'terms'; ?>">Terms & Policy</a></li>
                  <!-- <li class = "nav-item"><a class = "nav-link <?php if(strpos($url, 'cookie')) { echo white; } else { echo links; } ?>" href="cookie">Cookie Policy</a></li>  -->
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            Copyright &copy; an Ekomobong Archibong production <?php echo date("Y")?>
            </div>
          </div>
        </footer>

        <script src = 'public/js/jquery-3.4.1.min.js'></script>
        <script src = "public/css/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
        <script src = "public/js/script.js"></script>
         </body>
</html>
