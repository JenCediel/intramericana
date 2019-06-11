<?php
	
	function conectar2($sql){
		$mbd = new PDO('pgsql:host=localhost;dbname=salvo','postgres','admin');
		$res = $mbd->prepare($sql);
		return $res;	
	}
	// $res->execute();
	// $res1 = $res->fetchAll();
	// print_r($res1);



	

?>