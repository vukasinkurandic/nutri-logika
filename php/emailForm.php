<?php
require_once('connection.php');

$email = $_POST['mailing-lista'];

if ($email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location:../index.php?em=0#mailing-lista");
    echo ('<p>Neuspesna prijava, hvala Vam</p>' . $email);
} else {
    //// INSERT NEW FORM/////

    $sql = "INSERT INTO email (id,email, created_at) VALUES(null,?,null)";
    $query = $conn->prepare($sql);
    $query->bind_param("s", $email);
    $query->execute();


    if ($conn->affected_rows) {
        header("Location:../index.php?em=1#mailing-lista");
        echo ("succes" . $email);
    } else {
        header("Location:../index.php?em=2#mailing-lista");
        echo ($email . '<p>Neuspesna prijava, hvala Vam</p>');
        exit;
    }
}
