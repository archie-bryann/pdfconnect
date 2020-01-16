<?php
    include ('head.php');
    // include ('redirect/not_logged_in.php');
?>
<nav>
            <ul>
            <hr>
             <li>Search Result</li>
                </ul>
            </nav>
        </div> 
        </header>               
        </div> 
  
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
                
                <p><a target='_blank'  href = '../uploads/".$x."'>Read</a></p>
                <p><a href = '../uploads/".$x."' download = 'www.thepdfconnect.com_".$x."'>Download</a></p><br>
                <hr>
                <br>                 
         
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



</div>

</body>