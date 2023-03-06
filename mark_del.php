<?php
	include "database.php";
	session_start();
	$s="delete from mark where MID={$_GET["id"]}";
	$db->query($s);
	echo "<script>window.open('view_mark.php?mes=Data Deleted..','_self');</script>";
?>