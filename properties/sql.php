<?php 

require "database.php";

define('HOST', 'localhost');
define('USER', 'root');
define('PWD', '');
define('DBNAME', 'webshop1');


class Sql extends Database{

   public function __construct(){

       parent::__construct();
   }
  


/*
//Data Deletion function Function
public function delete($rid)
	{
	$deleterecord=mysqli_query($this->dbh,"delete from tblusers where id=$rid");
	return $deleterecord;
	}
}
*/

//Kategóriák megjelenítése

public function kategoria(){

   $dbCon = parent::connect();
   $res = $dbCon->prepare("SELECT DISTINCT katnev,id FROM kategoriak");
   $res->execute();
   $kategoria = $res->fetchAll();

   return $kategoria;
}


//Termék megjelenítése
public function show_termek($id){

   $dbCon = parent::connect();
   $res = $dbCon->prepare("SELECT id,nev,ar,cikkszam,keszlet,rleiras,hleiras,kep FROM termekek WHERE id=? ");
   $res->bindParam(1, $id);
   $res->execute();

   $termek = $res->fetchAll();

   return $termek;
}



//Termékek megjelenítése
public function termekek(){

   $dbCon = parent::connect();
   $res = $dbCon->prepare("SELECT id,nev,ar,kep FROM termekek");
   $res->execute();

   $termekek = $res->fetchAll();

   return $termekek;
}






}

?>