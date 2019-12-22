<?php
    include 'head.php';
    include ('redirect/not_logged_in.php');

?>
            <nav>
            <ul>
               
            <li id = "one"><a href = "<?php echo ROOT_URL.'welcome.php'; ?>">Home</a></li>
                  <li id = "two"><a href = "<?php echo ROOT_URL.'about.php'; ?>">About</a></li>
                <li id = "down"><a id = "black" href = "<?php echo ROOT_URL.'includes/logout.inc.php'; ?>"><i>Log out</i></a></li>
                <style>
                li#down{
                    background-color: lightgreen;

                    
                }
                a#black{
                    color: black;
                
                }
                </style>
                </ul>
            </nav>
        </div> 
        </header>
        <section id = "newsletter">
        <div class = "container">
            <h1>Download course materials free</h1>
            <form action = "search.php" method = "GET">
                <input required  name = "q" class = "text_form" type ="text" placeholder = "Search for any course material...">
                 <button name = "submit-search" type = "submit" class = "button_1" >Search</button>
             </form>
            
                <style>


@media(width: 320px){
         section#newsletter div.container form input{
            margin-left: 8%;
         }
         button.button_1{
                
         }
      }

      
section#newsletter div.container form button{
                                margin-left: 110px;
                        }
<?php
    // Styling For Iphone
    if(!isset($_SESSION['id'])){
        echo '
        @media(width:320px){
            section#newsletter div.container form button{
                margin-left: 37%;
        }
        }
        
    /* For Jiophone 2 */
    @media(width: 240px){
       section#newsletter div.container form{
          margin-top: -20px;
  }

  
  section#newsletter div.container form input{
          margin-left: 9%;
          width: 140px;
  }

  
  section#newsletter div.container form button{
          margin-left: 26%;
  }
    }
    
        
      /* For Nexus 7 */
      @media(width: 600px){
    section#newsletter div.container form button{
                margin-left: 0px;
           }

    #newsletter .container form{
        margin-top: 1.1px;
    margin-right: 18%;
    margin-bottom: 20px;
}
           }
        ';
    } else {
        echo '
        @media(width:320px){
            section#newsletter div.container form input{
                margin-left: 17.6%;
        }
        section#newsletter div.container form button{
            margin-left: 33%;
    }
        } 

        
    /* For Jiophone 2 */
    @media(width: 240px){
       section#newsletter div.container form{
          margin-top: -20px;
  }

  
  section#newsletter div.container form input{
          margin-left: 9%;
          width: 140px;
  }

  
  section#newsletter div.container form button{
          margin-left: 26%;
  }
    }
            
    /* For Nexus 7 */
    @media(width: 600px){
  section#newsletter div.container form button{
              margin-left: 0px;
         }

  #newsletter .container form{
      margin-top: 1.1px;
  margin-right: 18%;
  margin-bottom: 20px;
}
         }

    
        ';
    }
    


?>
    
                        
                        .button_1{
                            height: 38px;
        background: #e8491d;
        border: 0;  
        padding-left: 20px;
        padding-right: 20px;
        color: #ffffff;
                        }
                        </style>
            
            </div>
        </section>
        
        <style>
                            li, video{
                                border-radius: 5px;
                            }
                            div.dark_1{
                                border-radius: 5px;

                            }
                            </style>


            </div>
        </section>

        <br>
        <br>
        <section id = "main">
            <div class = "container">
                <article id = "main-col">
                <ul id = "services">
                <h1 class = "page-title">File extensions allowed for upload</h1>

                <li>
                    <p>
                    <b>.PDF</b> - Portable Document Format<br>
                    <b>.TXT</b> - Plain Text File<br>
                    <b>.DOC</b> - Microsoft Word Document<br>
                    <b>.PPT</b> - Powerpoint Open Presentation<br>
                    <b>.PPS</b> - PowerPoint Slide Show<br>

                    </p>
                    </li>
                    <style>
                        p {
                            text-align: left;
                        }
                        </style>
                        <br>
                        <li>
                    <p>
                    <b>.XLS</b> - Excel Spreadsheet<br>
                    <b>.XLR</b> - Works Spreadsheet<br>
                    <b>.LOG</b> - Log File<br>
                    <b>.MSG</b> - Outlook Mail Message<br>
                    <b>.PAGES</b> - Pages Document<br>
                    </p>
                    </li>

                        <br />
                        <li>
                    <p>
                    <b>.RTF</b> - Rich Text Format File<br>
                    <b>.TEX</b> - LaTEX Source Document<br>
                    <b>.WPD</b> - WordPerfect Document<br>
                    <b>.WPS</b> - Microsoft Works Word Processor Document<br>
                    <b>.CSV</b> - Comma Seperated Values File<br>
                    </p>
                    </li>
                        <br />
                        <li>
                    <p>
                    <b>.DAT</b> - Data File<br>
                    <b>.ODT</b> - OpenDocument Text Document<br>
                    <b>.TEX</b> - LaTEX Source Document<br>
                    <b>.WPS</b> - Microsoft Works Word Processor Document<br>
                    <b>.CSV</b> - Comma Seperated Values File<br>
                    </p>
                    </li>
                        <br />
                        <li>
                    <p>
                    <b>.KEY</b> - Keynote Presentation<br>
                    <b>.SDF</b> - Standard Data File<br>
                    <b>.TAR</b> - Consolidated Unix File Archive<br>
                    <b>.TAX2016</b> - TurboTax 2016 Tax Return<br>
                    <b>.TAX2018</b> - TurboTax 2018 Tax Return<br>
                    </p>
                    </li>
                        <br />
                        <li>
                    <p>
                    <b>.VCF</b> - vCard File<br>
                    <b>.INDD</b> - Adobe InDesign Document<br>
                    <b>.XLR</b> - Works Spreadsheet<br>
                    <b>.ODS</b> - Operational Data Store<br>
                    </p>
                    </li>
            
                        
       <style>
       P{
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    
           
       }
                            div.dark{
                                border-radius: 5px;
                            }
                        </style>
                </article>  
                <style>
        form button, input, textarea{
            border-radius: 5px;
        }
        li, div.dark{
            border-radius: 5px;
        }
        </style>
         
                 
                </ul>
                <aside id = "sidebar">
                    <div class = "">
                    <div class = "">



                    <style>
                    @media(width: 333px){
                        aside#sidebar .dark .dark form input, textarea{
                            margin-left: -15px;
                        }
                    }
                    @media(max-width: 328px){
                        aside#sidebar .dark .dark form input, textarea{
                            margin-left: -20px;
                        }
                    }

                 
                    @media(width: 298px){
                        aside#sidebar .dark .dark form input, textarea{
                            margin-left: -28px;
                        }
                    }

                    aside#sidebar .dark .dark form input{
                        width: 80%;
                    }
                  
                    </style>
                
                        </div>
                    
                    <p> 
                    
                    </p>
                        </div>  

                   
                    


               <style>

 @media(max-width: 1338px){
     article#main-col{
      
         float: none;
         text-align: center;
         width: 100%;
     }

     aside#sidebar{
        margin-top: 20px;
         text-align: center;
         width: 100%;
     }
 }

 </style>
            </section>

    <br>
<?php
    include ('foot.php');
?>