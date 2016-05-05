<?php
	$host="ap-cdbr-azure-east-c.cloudapp.net";
	$user="ba0bdd406a8601";
	$pass="e1ee282f";
	$database="acsm_cb9f0a3d1dfdee6";
	$koneksi=new mysqli($host,$user,$pass,$database);
	if (mysqli_connect_errno()) {
	  trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR); 
	}
?>