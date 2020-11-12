<?php 
/////css/img/blog
session_start();

require_once ("connection.php");

if (isset($_POST['add-post-btn'])) {

    $title=$_POST['new-post__title'];

    $body=htmlentities( $_POST['new-post__tekst']);

    $image=$_FILES['userfile']['name'];

    $image=time().'_'.$image;

    $topic=$_POST['new-post__kategorija'];


    if ($title==="" || $body==="" || $image==="" || $topic==="") {
        header("Location:../new-post.php?create=prazno_polje&title=$title&body=$body");
        exit();
    }else{
        

            /// UPLOAD IMAGE AND VALIDATE IMAGE
            $file_extension = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
            $allowed_image_extension = array(

                "png",
                "jpg",
                "jpeg",
                "PNG",
                "JPG",
                "JPEG"

            );

            if (!in_array($file_extension, $allowed_image_extension)||($_FILES["userfile"]["size"] > 1000000)) {
                header("Location:../new-post.php?create=image_error&title=$title&body=$body");
                exit();
            } else {
                    $target = "../css/img/blog/".$image;
                    if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $target)){
///////// upisi u bazu pa prebaci u admin sekciju
                         /// INSERT NEW POST IN DB

                         $sql = "INSERT INTO posts 
                                (topic,title,image,body) VALUES (?,?,?,?)";
                         $query=$conn->prepare($sql);
                         $query->bind_param("ssss", $topic,$title,$image,$body);
                         $query->execute();
 
                     // Check if data inserted 
                     if($conn->affected_rows){
                        header("Location:../blog-admin.php?success"); 
                         exit();
                     }
                     // else data not inserted
 
                     else{ 
                        header("Location:../new-post.php?create=error&title=$title&body=$body");  
                     } 
                        
                    }else{
                        header("Location:../new-post.php?create=image_error&title=$title&body=$body");
                        exit();

                    }

                }   

            };



    }







































?>