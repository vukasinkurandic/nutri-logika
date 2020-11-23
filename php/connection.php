<?php

$host = 'localhost';

$user = 'root';

$password = '';

$database = 'nutri-logika_db';



$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function selectAll($table)
{

  global $conn;

  $sql = "SELECT * From $table WHERE status = 1 ";



  $query = $conn->prepare($sql);

  $query->execute();

  $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);

  return $result;
};


//SEARCH FUNCTION
/////// SEARCH 

function searchPost($search)
{
  global $conn;
  $sql = "SELECT *  FROM posts  WHERE status=1 AND title LIKE ? OR body LIKE ? ";
  $query = $conn->prepare($sql);
  $query->bind_param("ss", $search, $search);
  $search = '%' . $search . '%';
  $query->execute();
  $searchPosts = $query->get_result()->fetch_all(MYSQLI_ASSOC);
  return $searchPosts;
}



function dd($value)
{

  echo "<pre>" . print_r($value, true) . "</pre>";
};
