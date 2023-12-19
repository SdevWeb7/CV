<?php

$routeur->map('GET', '/', 'home', 'home');
$routeur->map('GET', '/parcours', 'parcours', 'parcours');
$routeur->map('GET', '/portfolio', 'portfolio', 'portfolio');
$routeur->map('GET', '/contact', 'contact', 'contact');

$routeur->map('POST', '/contact', 'contact', 'contact-post');