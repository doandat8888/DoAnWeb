
<?php
$filepath = realpath(dirname(__FILE__));
  include ($filepath. '/../config/config.php');
?>
<?php
Class Database {
   public $host   = HOST;
   public $user   = USER;
   public $pass   = PASSWORD;
   public $dbname = DB;
 
 
   public $link;
   public $error;
 
 public function __construct(){
  $this->connectDB();
 }
 
 private function connectDB(){
  $this->link = mysqli_connect($this->host, $this->user, $this->pass, 
   $this->dbname);
  if(!$this->link){
    $this->error ="Connection fail".$this->connect_error;
   return false;
  }
}
 
// Select or Read data
public function select($query){
  $result = $this->link->query($query) or 
   die($this->link->error.__LINE__);
  if($result->num_rows > 0){
    return $result;
  } else {
    return false;
  }
 }

// Insert data
public function insert($query){
   $insert_row = $this->link->query($query) or 
     die($this->link->error.__LINE__);
   if($insert_row){
     return $insert_row;
   } else {
     return false;
    }
 }
  
// Update data
 public function update($query){
   $update_row = $this->link->query($query) or 
     die($this->link->error.__LINE__);
   if($update_row){
    return $update_row;
   } else {
    return false;
    }
 }
  
// Delete data
public function delete($query){
   $delete_row = $this->link->query($query) or 
     die($this->link->error.__LINE__);
   if($delete_row){
     return $delete_row;
   } else {
     return false;
  }
}
 
public function chayTruyVanTraVeDL($link, $q)
{
	$result = mysqli_query($link, $q);
	return $result;
}

public function chayTruyVanKhongTraVeDL($link, $q)
{
	$result = mysqli_query($link, $q);
	return $result;
}

public function giaiPhongBoNho($link, $result)
{
	try {
		mysqli_close($link);
		mysqli_free_result($result);
	} 
  catch (TypeError $e) {
	}
}
}
?>