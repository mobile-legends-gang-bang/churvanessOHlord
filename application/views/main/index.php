<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	$this->load->view('layout/header');
	$this->load->view('layout/sidenavigation');
	$this->load->view($content);
	$this->load->view('layout/footer');
?>
