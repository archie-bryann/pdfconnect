<?php

// For view only

class UploadsView extends Users {

    

    public function displayUploads($id) {
        $stmt = $this->checkUploads($id);    
        while($row = $stmt->fetch()) {
            echo '<b>Name Given</b>: '.$row['book_name'].'<br>';
            echo '------------------------------------------<br>';
            echo '<b>File Name</b>: '.$row['searchFileName'].'<br>';
            echo '<b>Type</b>: '.$row['extension'].'<br>';

            if(round($row['file_size']) < 2) {
                echo '<b>Size</b>: '.round($row['file_size']*1000).'KB<br>';
            } else {
                echo '<b>Size</b>: '.round($row['file_size']).'MB<br>';
            }
            
            echo '------------------------------------------<br>';

            echo '<b>Author</b>: '.$row['book_author'].'<br>';
            echo '<b>Code</b>: '.$row['code'].'<br>';
            echo '<b>Course</b>: '.$row['course'].'<br>';

           $id = $row['user_id'];
           $results = $this->checkId($id);
           
           
           if($row['uploaded_by'] !== 'Anonymous') {  // cheking if it's anonymous
                echo '<b>Uploaded by</b>: '.$results[0]['firstname']. ' '.$results[0]['lastname'].'<br>';
            } else  {
                echo '<b>Uploaded by</b>: Anonymous<br>';
            }

            echo '<b>Time</b>: '.$row['time'].'<br>';
            
            if($row['extension'] == 'pdf') {
                echo '<a href = "'.$this->uploadLocation().$row['file_name'].'/'.$row['file_name'].'" target = "_blank">Read</a> . '; 
            }

            echo '<a href = "'.$this->uploadLocation().$row['file_name'].'/'.$row['file_name'].'" download = "rubberspace_'.$row['file_name'].'">Download</a> . ';

            // if pdf, output 'READ'
            echo '<a href = "'.ROOT_URL.'update.php?rc_CODE='.$row['code'].'&up_id='.$row['user_id'].'">Update</a> . ';


            // 
            echo '<a href = "whatsapp://send?text=My%20e-book%20code%20is%20'.$row['code'].'.Log%20on%20to'.ROOT_URL.'%20and%20do%20a%20search%20the%20code.">Share on whatsapp</a> . ';


            if($row['visible'] == 1){
                 echo '<a href = "'.ROOT_URL.'visibility.php?uc_CODE='.$row['code'].'">Hide from public</a> . ';
            } else {
                 echo '<a href = "'.ROOT_URL.'visibility.php?uc_CODE='.$row['code'].'">Reveal to public</a> . ';
            }
            
            // Reveal to others

            echo '<a href = "'.ROOT_URL.'delete.php?uc_CODE='.$row['code'].'">Delete</a>';

            echo '<br><br><br><br>';

            
           
        }
    }

  


}