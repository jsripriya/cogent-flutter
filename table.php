<?php
	include 'shadow.php';

	$flutter = "CREATE TABLE IF NOT EXISTS `flutter_tble`(
	    id int(10) primary key auto_increment,
	    email varchar(100) null,
	    added_date datetime DEFAULT CURRENT_TIMESTAMP
	)";
	$esdy_in->exec($flutter);

?>