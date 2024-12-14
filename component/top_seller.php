<?php

require 'functions.php';

if(isset($_POST['id'])){
	mysqli_query($connect, "UPDATE kamera SET top_seller=0");
	mysqli_query($connect, "UPDATE kamera SET top_seller=1 WHERE id=$_POST[id]");
	echo 'top seller berhasil diganti';
}