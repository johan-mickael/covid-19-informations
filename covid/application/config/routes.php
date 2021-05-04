<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['informations-covid-19/pandemie-covid-19-informations-sur-la-maladie-coronavirus'] = 'Home/index/Home';
$route['informations-covid-19/questions-reponses-sur-les-masques-et-les-enfants-dans-le-contexte-de-la-covid-19'] = 'Home/index/MaskChild';
$route['informations-covid-19/maladie-a-coronavirus-covid-19-conseils-au-grand-public'] = 'Home/index/Advice';
$route['informations-covid-19/statistique-du-covid-19-a-madagascar-et-dans-le-monde'] = 'Statistics/index/Statistics';
$route['informations-covid-19/pandemie-covid-19-actualites-sur-la-maladie-coronavirus'] = 'News/index/News';