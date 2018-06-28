<?php
header('Content-type: text/html; charset=utf-8');
class DB_Functions {

  private $db;

  //put your code in here
  // constructor
  function __construct() {
    require_once 'DB_Connect.php';
    // connecting to database
    $this->db = new DB_Connect();
  }

  // destructor
  function __destruct() {

  }

  private function getConnection(){
    return $this->db->connect();
  }

  /**
  * Adding new user to mysql database
  * returns user details
  */

  public function storeMeasure($deviceId, $value) {
    $date = date("Y-m-d H:i:s");
    $result = mysqli_query($this->getConnection(), "INSERT INTO measures(DeviceID, value, Date) VALUES('$deviceId', $value, '$date')");
    return $result;
  }

  public function storeImage($DeviceID, $imageData,$imageName){
    $imagePath = "images/".$imageName.".png";
    $date = date("Y-m-d H:i:s");
    $InsertSQL = "insert into images(DeviceID, image_name, Date)
      values ('$DeviceID','$imageName','$date')";
    $conn = $this->getConnection();
    if(mysqli_query($conn, $InsertSQL)){
        file_put_contents($imagePath,base64_decode($imageData));
        return true;
    }else{
      return false;
    }
  }
}

?>
