<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin/connexion'] = 'Login';
$route['admin/deconnexion'] = 'Login/logout';
$route['admin/gestion-evolution-covid-19'] = 'Evolution';
$route['admin/inserer-evolution-covid-19'] = 'Evolution/insert';
$route['admin/gestion-actualites-covid-19'] = 'News';