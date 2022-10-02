<?php
/*
 * @ PAGE QUI PERMET DE MODIFIER UN ARTICLE EN BASE DE DONNEES
 * Path: public/pages/article/edit.php
 * URL: '/pages/article/edit.php?id={id}'
 */

require __DIR__.'/../layouts/head.php';
require __DIR__.'/../layouts/body_start.php';
require __DIR__.'/../layouts/container_start.php';

include_once('components/_form.php');

require __DIR__.'/../layouts/container_end.php';
require __DIR__.'/../layouts/scripts.php';
require __DIR__.'/../layouts/body_end.php';
?>