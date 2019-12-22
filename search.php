<?php
    include ('head.php');
    include ('redirect/not_logged_in.php');
?>
<nav>
            <ul>
            <hr>
             <li id = "search">Search Result</li>
                </ul>
            </nav>
        </div> 
        </header>               
        </div> 
        
<style>
    li#search{
        font-family: French Script MT;
        font-size: 30px;
         
    }
    h1{
        margin-bottom: 15px;
    }

    
    .display{
        color: red;
        font-size: 11px;
        text-align: center;

    }
    .article-box{
        text-align: center;
    }
    </style>



<?php
    if(isset($_GET['submit-search']) && !empty($_GET['q'])){
        
        
       
        $search = strip_tags(htmlspecialchars(htmlentities(mysqli_real_escape_string($conn, $_GET['q']))));
        
        if($search == ' '){
              echo "<p>There are <b><i>no</i></b> results matching your search!</p><hr>";
        } else{
            if($search == '  '){
              echo "<p>There are <b><i>no</i></b> results matching your search!</p><hr>";
            }
         else {
        $sql = "select * from book where file_name LIKE '%$search%' or book_name LIKE '%$search%' or book_author LIKE '%$search%' or book_descri LIKE '%$search%' or course_title LIKE '%$search%' or course_descri LIKE '%$search%' or admin_name LIKE '%$search%' or uploaded_on LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);
            
        

        if ($queryResult > 0) {
        echo '<p>There are <b>'.$queryResult.'</b> results!</p><hr><br />';
            
            
            
            while($row = mysqli_fetch_assoc($result)) {
                
                $x = $row['file_name'];
                echo " <!-- Take note -->
                <div class = 'article-box'> 
                <p>Name: <b>".$row['book_name']."</b></p>
                
                <p>Author: <b>".$row['book_author']."</b></p>
                <p>Desciption/Search Code: <b>".$row['book_descri']."</b></p>
                  <p>Course: <b>".$row['course_title']."</b></p>
                <p>Course description: <b>".$row['course_descri']."</b></p>
                <p>Uploaded by: <b>".$row['admin_name']."</b></p>
                <p>Date: <b>".$row['uploaded_on']."</b></p>
                </div>
                
                <p><a id = 'signup' target='_blank'  href = '../uploads/".$x."'>Read</a></p>
                <p><a id = 'signup' href = '../uploads/".$x."' download = 'www.thepdfconnect.com_".$x."'>Download</a></p><br>
                <hr>
                <br>                 
                
                 <style>
                 a#signup, p{
                    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    
                    text-align: center;

                }
                h1{
                    
                }

                 .neat{
                    background-color: white;
                    margin-left: 460px;
                    margin-right: 460px;
                    
                    border-radius: 70px;
                    
                 }
                 a{
                    text-decoration: none;
                    color: red;
                    
                 }
                 a:hover{
                    font-weight: bold;
                    text-decoration: underline;
                 }
                
                 .article-box{
                    text-align: 100px;    
                }
                p#heading{
                    font-weight: bold;
                    font-size: 20px;
                }
                 </style>                
                 ";
            
                 
                    
                   

                 

            }} else {
                    echo "<p>There are <b><i>no</i></b> results matching your search!</p><hr>";

            }
        }
        }
   

    }
    
        else { 
            echo "<p>There are <b><i>no</i></b> results matching your search!</p><hr>";
        }
    

?>


 <?php 
 /*
            $files = scandir("uploads");
            // print_r($files);   ----> Display all uploaded filesizess
            for ($a = 2; $a < count($files); $a++) {
                // Displaying links to download
                // Making it downloadable
                ?>
                <p>
                <h2>Python(Data Structures)</h2>
                <a href = "uploads/<?php echo $files[$a] ?>"><?php echo $files[$a] ?></a><br>
                <a download = "uploads/<?php echo $files[$a] ?>" href = "uploads/<?php echo $files[$a] ?>"><?php echo $files[$a] ?></a>
                </p>    <?php
            
            }
            */
            ?>

</div>

</body>