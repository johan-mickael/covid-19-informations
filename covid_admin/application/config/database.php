<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $active_group = 'default';
$active_group = 'deploy';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'johan',
	'password' => '1',
	'database' => 'covid2',
	'dbdriver' => 'postgre',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => FALSE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$db['deploy'] = array(
	'dsn'	=> '',
	'hostname' => 'ec2-54-160-96-70.compute-1.amazonaws.com',
	'username' => 'jviyenkawjqrfm',
	'password' => 'd18692134292cf2a2ae82408a8aa1f5ef7513f901dd1c804f4ab34fa28e48d93',
	'database' => 'dqpu1q9sm78e',
	'dbdriver' => 'postgre',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => FALSE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

