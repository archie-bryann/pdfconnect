<?php
        include 'head.php';
        echo '</header>';
        $sql = "select * from users";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);
        echo '<h1 align = "center">'.$queryResult.' users</h1>';
?>