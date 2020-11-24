<?php

require "database2.php";

define('HOST', 'localhost');
define('USER', 'root');
define('PWD', '');
define('DBNAME', 'webshop1');
  
class Sql extends Database2{

   public function __construct(){

       parent::__construct();
   }
  
//Product Upload
public function uploadTermek($file,$termeknev,$termekar,$cikkszam,$keszlet,
                                 $termekrovid,$termekhosszu,$termekkat){

   $con = parent::connect();
   $res = $con->prepare("INSERT INTO termekek(kategoria,nev,cikkszam,ar,rleiras,hleiras,kep,keszlet) VALUES(?,?,?,?,?,?,?,?)");
   $res->bindParam(1, $termekkat);
   $res->bindParam(2, $termeknev);
   $res->bindParam(3, $cikkszam);
   $res->bindParam(4, $termekar);
   $res->bindParam(5, $termekrovid);
   $res->bindParam(6, $termekhosszu);
   $res->bindParam(7, $file);
   $res->bindParam(8, $keszlet);
   
    if(empty($file) || empty($termeknev) || empty($termekar) || empty($cikkszam) ||
                         empty($keszlet) || empty($termekrovid) || empty($termekhosszu) || 
                           empty($termekkat) )
                           {

       throw new Exception(" <h4 class='text-danger'> Minden mező kitöltése kötelező! </h4>");

    }
    
     $res->execute(); 
     echo"
    <div class='contaier'>
        <div class='row justify-content-center col-6 mx-auto rounded bg-light shadow my-3 text-center p-3 '>
            <h3 class='text-success'>Sikeres feltöltés!</h3>
        </div>
    </div>
     ";
}

//Delete Product
public function deleteProduct($id){

    $con = parent::connect();
    $res = $con->prepare("DELETE FROM termekek WHERE id=?");
    $res->bindParam(1, $id);
    $res->execute();
    if($res){
        return True;
    }else{
        return False;
    }
}


//Read Product '' ki kell venni ha nem működik
public function read(){
    $con = parent::connect();
    $res = $con->prepare("SELECT id,nev,cikkszam FROM termekek");
    $res->execute();
    $read = $res->fetchAll();
    return $read;

}


/*
//Read Product '' ki kell venni ha nem működik
public function read($ID=null){
    $con = parent::connect();
    $res = $con->prepare("SELECT * FROM termekek WHERE id='$ID' ");
    $res->execute();

    return $read;

}

*/

/*
//Autók törlése adatbázisból
public function deleteTermek(){

   $con = parent::connect();
   $res = $con->prepare("DELETE FROM termekek WHERE id=? AND cikkszam=?");
   $res->execute();
    if( ! $res->rowCount() ){
        throw new Exception("Hiba!!");
    }
   
}




//Termék listázása
public function termekLista(){

    $con = parent::connect();
    $res = $con->prepare("SELECT id,nev,cikkszam FROM termekek");
    $res->execute();
    $termekLista = $res->fetchAll();
 
    return $termekLista;
 }

*/

}

?>