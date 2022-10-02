<?php
/*
 * @404 - PAGE NOT FOUND
 * Path: app/pages/404.php
 * URL: -
 */
include_once '../layouts/head.php';
include_once '../layouts/body_start.php';
include_once '../layouts/container_start.php';
?>
    <div class="row mt-5 text-center">
        <h1>404 Not Found</h1>
        <p>Sorry, the page you are looking for could not be found.</p>
        <a href="/">Go Back Home</a>
    </div>
<?php 
include_once('../layouts/container_end.php');
include_once ('../layouts/scripts.php');
include_once('../layouts/body_end.php');
?>