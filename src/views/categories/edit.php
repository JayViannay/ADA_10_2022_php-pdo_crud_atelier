<?php
/*
 * @ PAGE QUI PERMET DE MODIFIER UNE CATEGORY EN BASE DE DONNEES
 * Path: app/pages/category/edit.php
 * URL: '/pages/category/edit.php?id={id}'
 */

require __DIR__.'/../layouts/head.php';
require __DIR__.'/../layouts/body_start.php';
require __DIR__.'/../layouts/container_start.php';

include_once('components/_form.php');

require __DIR__.'/../layouts/container_end.php';
require __DIR__.'/../layouts/scripts.php';
require __DIR__.'/../layouts/body_end.php';
?>