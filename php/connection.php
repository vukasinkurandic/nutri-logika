<?php  

$host='localhost';

$user='root';

$password='';

$database='nutri-logika_db';



$conn= new mysqli($host,$user,$password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function selectAll($table, $conditions=[]){

  global $conn;

  $sql = "SELECT * From $table";

  if (empty($conditions)) {

      $query=$conn->prepare($sql);

      $query->execute();

      $result=$query->get_result()->fetch_all(MYSQLI_ASSOC);

      return $result;

  } 

  };


  function dd($value){

      echo "<pre>". print_r($value, true)."</pre>";

       }; 

?>