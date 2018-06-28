<?php
class DB_Connect {

  // constructor
  function __construct() {

  }

  // destructor
  function __destruct() {
    // $this->close();
  }

  // Connecting to database
  public function connect() {
    require_once 'include/config.php';
    // connecting to mysql
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    // selecting database
    if (!$con) {
      echo "Error: Unable to connect to MySQL." . PHP_EOL;
      echo "Debugging error: " . mysqli_connect_errno() . PHP_EOL;
      echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
      exit;
    }
    // return database handler
    return $con;
  }

  // Closing database connection
  public function close() {
    mysqli_close();
  }

}

?>
