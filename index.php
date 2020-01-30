<?php
    include ('head.php');
    include ('redirect/logged_in.php');
    

?>

<?php
    include 'includes/nav.inc.php';
?>  

                    <br>
                    <br>
                    <br>
  <div class = "container col-11">
  <div class="jumbotron">
  <h1 class="display-3">Hello, world!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
    <a class="btn <?php echo colour2; ?> btn-lg" href="<?php echo ROOT_URL.'signup'; ?>" role="button">Get Started</a>
  </p>
</div>
</div>

<br>

<div class="container center col-10">
<div class="row">

    <div class="col-sm-4">    
        <figure class = "filter-crema">
        <img src="img/alberto-restifo-Ni4NgA64TFQ-unsplash.jpg" class="responsive-img"> 
        </figure>
        <h2>Rounded Corners</h2>
        <p>The rounded class adds rounded corners to an image.</p>    
    </div>
    
    <div class="col-sm-4">     
        <figure class = "filter-crema">     
        <img src="img/book_lamp.jpg" class="responsive-img"> 
        </figure>
        <h2>Rounded Corners</h2>
        <p>The rounded class adds rounded corners to an image.</p>     
    </div>
    
    <div class="col-sm-4">   
        <figure class = "filter-crema">
        <img src="img/kris-atomic-Z5dKUnRJIiY-unsplash.jpg" class="responsive-img">
        </figure>
        <h2>Rounded Corners</h2>
        <p>The rounded class adds rounded corners to an image.</p>    
    </div>

    
    </div>
    </div>


    <br>
<br>
 <?php
    include ('foot.php');
 ?>