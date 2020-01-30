<?php
    include ('head.php');
        
    if(isset($_SESSION['id'])) {
        include 'includes/nav2.inc.php';
    } else {
        include 'includes/nav.inc.php';
    }

    if(isset($_GET['submit-search'])) {
        header("Location: http://localhost/pdfconnect/search?q=".$_GET['q']."");
    }

    
    if(isset($_GET['q'])) {
    echo "<h3>Search results for '". htmlspecialchars($_GET['q']) ."'</h3><br>";
    }
?>

        <?php
        if(isset($_GET['q'])) {
        $search = $_GET['q'];  
        $smart = $_GET['q'];
        

        $toSearch = new UsersContr();
        
        echo $toSearch->searchPublic($search);
        }
        ?>

</div>

</body>

<?php
    include 'foot.php';
?>