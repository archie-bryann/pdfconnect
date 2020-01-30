<?php


if($_SESSION['id'] == $user->displayId()) {
    header("Location: edit");
}

?>