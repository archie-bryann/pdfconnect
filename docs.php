<?php
    include 'head.php';
    // include ('redirect/not_logged_in.php');

?>
           <?php
                if(isset($_SESSION['id'])) {
                    include 'includes/nav2.inc.php';
                } else {
                    include 'includes/nav.inc.php';
                }
           ?>

        <br>
        <br>
        <section>
            <div>
                <article>
                <h1>File extensions allowed for upload</h1>

                    <p>
                    <b>.PDF</b> - Portable Document Format<br>
                    <b>.TXT</b> - Plain Text File<br>
                    <b>.DOC</b> - Microsoft Word Document<br>
                    <b>.PPT</b> - Powerpoint Open Presentation<br>
                    <b>.PPS</b> - PowerPoint Slide Show<br>

                    </p>
                    <style>
                        p {
                            text-align: left;
                        }
                        </style>
                        <br>
                    <p>
                    <b>.XLS</b> - Excel Spreadsheet<br>
                    <b>.XLR</b> - Works Spreadsheet<br>
                    <b>.LOG</b> - Log File<br>
                    <b>.MSG</b> - Outlook Mail Message<br>
                    <b>.PAGES</b> - Pages Document<br>
                    </p>

                        <br />
                    <p>
                    <b>.RTF</b> - Rich Text Format File<br>
                    <b>.TEX</b> - LaTEX Source Document<br>
                    <b>.WPD</b> - WordPerfect Document<br>
                    <b>.WPS</b> - Microsoft Works Word Processor Document<br>
                    <b>.CSV</b> - Comma Seperated Values File<br>
                    </p>
                        <br />
                    <p>
                    <b>.DAT</b> - Data File<br>
                    <b>.ODT</b> - OpenDocument Text Document<br>
                    <b>.TEX</b> - LaTEX Source Document<br>
                    <b>.WPS</b> - Microsoft Works Word Processor Document<br>
                    <b>.CSV</b> - Comma Seperated Values File<br>
                    </p>
                        <br />
                    <p>
                    <b>.KEY</b> - Keynote Presentation<br>
                    <b>.SDF</b> - Standard Data File<br>
                    <b>.TAR</b> - Consolidated Unix File Archive<br>
                    <b>.TAX2016</b> - TurboTax 2016 Tax Return<br>
                    <b>.TAX2018</b> - TurboTax 2018 Tax Return<br>
                    </p>
                        <br />
                    <p>
                    <b>.VCF</b> - vCard File<br>
                    <b>.INDD</b> - Adobe InDesign Document<br>
                    <b>.XLR</b> - Works Spreadsheet<br>
                    <b>.ODS</b> - Operational Data Store<br>
                    </p>


                    <br>
                  

                    triangle alert <a href = "<?php echo ROOT_URL.'feedback?title=type'; ?>">My e-book type is not on the list.</a><br><br>

                </article>  
               

                 
               
                    
            </section>

    <br>
<?php
    include ('foot.php');
?>