<?php
if($_SESSION["role"]!='admin') {
    echo "<div class='d-flex justify-content-center  alert alert-danger' role='alert'><h4>This page is for admins only</h4></div>";
    exit();
}
?>