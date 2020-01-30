
function _(el) {
    return document.getElementById(el);
}

function uploadFile() {
    _("status").innerHTML = "<i>Pls wait a moment...</i>";  // use a preloader (materialize own)
}