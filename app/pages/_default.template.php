<?php
/*
 * @DEFAULT_TEMPLATE - A UTILISER EN CAS DE CREATION D'UNE NOUVELLE PAGE
 * Path: public/default.template.php
 * URL: -
 */

include_once '../../layouts/head.php';
include_once '../../layouts/body_start.php';
include_once '../../layouts/container_start.php';

require '../../../.connec.php';
?>
<div class="row">
    </div>
    <h1>DEFAULT TEMPLATE</h1>
    // Your code here
    <!-- 📝 INSERER LE CODE HTML DE LA PAGE ICI -->
<?php 
include_once('../../layouts/container_end.php');
include_once('../../layouts/scripts.php');
include_once('../../layouts/body_end.php');
?>