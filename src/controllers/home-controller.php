<?php 

/**
 * Affiche la page d'accueil
 * @URL("/")
 * @render views/home/index.php
 */
function index(): void
{
    require __DIR__ . '/../views/home/index.php';
}

/**
 * Affiche la page 404
 * @render views/home/not_found.php
 */
function notFound(): void
{
    require __DIR__ . '/../views/home/not_found.php';
}

