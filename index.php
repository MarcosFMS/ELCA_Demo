<?php

/**
 PHP API for Login, Register, Changepassword, Resetpassword Requests and for Email Notifications.
 **/

if (isset($_POST['tag']) && $_POST['tag'] != '') {
  // Get tag
  $tag = $_POST['tag'];
  require_once 'include/DB_Functions.php';
  $db = new DB_Functions();
  // Include Database handler
  //require_once 'include/DB_Functions.php';
  //$db = new DB_Functions();
  // response Array
  $response = array("tag" => $tag, "success" => 0);

  // check for tag type
  if ($tag == 'store_measure') {
    // Request type is cadastrar usuario
    $deviceID = $_POST['device_id'];
    $value = $_POST['value'];
    $result = $db->storeMeasure($deviceID, $value);
    if($result){
  		$response["success"] = 1;
    }else{
      $response["success"] = 0;
    }
    echo $result;
		echo json_encode($response);
  }

  // check for tag type
  if ($tag == 'store_image') {
    // Request type is cadastrar usuario
    $deviceID = $_POST['device_id'];
    $imgData = $_POST['image_data'];
    $imgName = $_POST['image_name'];
    $result = $db->storeImage($deviceID, $imgData, $imgName);
    
    if($result){
  		$response["success"] = 1;
    }else{
      $response["success"] = 0;
    }
    echo $result;
		echo json_encode($response);
  }

}else{
  echo "Opção inválida";
}

/*$response["success"] = 1;
$response=json_encode($response);
echo $response;*/

?>
