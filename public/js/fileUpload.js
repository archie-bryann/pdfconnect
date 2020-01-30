
// javascript is smart

function _(el) {
    return document.getElementById(el);
}



function uploadFile() {
    var file = _("file").files[0];
    var token = _("token").value;
    var book_name = _("book_name").value;
    var book_author = _("book_author").value;
    var course = _("course").value;
    var uploaded_by = _("uploaded_by").value;
    var user_id = _("user_id").value;


    // check if the variable is empty here & echo error message

    if(file == undefined || file == null) {
        _("status").innerHTML = "Please choose a file for upload!";
    } 

    else {
                                
        var formdata = new FormData();
        formdata.append("file", file);
        formdata.append("token", token);
        formdata.append("book_name", book_name);
        formdata.append("book_author", book_author);
        formdata.append("course", course);
        formdata.append("uploaded_by", uploaded_by);
        formdata.append("user_id", user_id);

        var ajax = new XMLHttpRequest();

        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);

        ajax.open('POST', "fileUpload.php");
        ajax.send(formdata);
    
    }
    

}

function progressHandler(event) {
    if(Math.round(event.total/1000000) < 2) {  // if lesser than 2mb
        _("loaded_n_total").innerHTML = "Uploaded " + Math.round(event.loaded/1000) + "KB/" + Math.round(event.total/1000) + "KB";
    } else {
        _("loaded_n_total").innerHTML = "Uploaded " + Math.round(event.loaded/1000000) + "MB/" + Math.round(event.total/1000000) + "MB";
    }
    var percent = (event.loaded / event.total) * 100;
    _("progressBar").value = Math.round(percent);
    _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";

    _("file").disabled = true;
    
    _("progressBar").classList.add("visible");
    _("cancel").classList.add("visible");
}

function completeHandler(event) {
    _("status").innerHTML = event.target.responseText;
    _("progressBar").value = 0;

    _("file").disabled = false;

    _("progressBar").classList.remove("visible");
    _("cancel").classList.remove("visible");

   

    

}

function errorHandler(event) {
    _("status").innerHTML = "Upload Failed";
}

function abortHandler(event) {  // end the uploadFile function
    window.location = "index.php";  
}