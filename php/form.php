<?php
require_once 'connection.php';
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$email = $_POST['email'];
$godine = $_POST['godine'];
$telefon = $_POST['telefon'];
$pol = $_POST['pol'];
$cilj = $_POST['cilj'];
$plan = $_POST['plan'];

if ($ime === "" || !preg_match("/^[a-zšđčćžA-ZŠĐČĆŽ ]*$/", $ime)) {
    echo ("<p>Ime je obavezno</p>");
} else {
    if ($prezime === "" || !preg_match("/^[a-zšđčćžA-ZŠĐČĆŽ ]*$/", $prezime)) {
        echo ("<p>Prezime je obavezno</p>");
    } else {
        if ($email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo ("<p>Email nedostaje ili je neispravan</p>");
        } else {
            if ($godine == "" || !is_numeric($godine)) {
                echo ("<p>Vase godine su obavezne</p>");
            } else {
                if ($telefon === "") {
                    echo ("<p>Broj telefona je obavezan</p>");
                } else {
                    if ($pol == "" || $cilj == "" || $plan == "") {
                        echo ("<p>Pol, Cilj i Plan su obavezni</p>");
                    } else {
                        //// INSERT NEW FORM/////

                        $sql = "INSERT INTO plans VALUES(null,?,?,?,?,?,?,?,?,null,1)";
                        $query = $conn->prepare($sql);
                        $query->bind_param("sssissss", $ime, $prezime, $email, $godine, $telefon, $pol, $cilj, $plan);
                        $query->execute();

                        if ($conn->affected_rows) {
                            echo ("succes");
                        } else {
                            echo ('<p>Neuspesna prijava, hvala Vam</p>');
                            exit;
                        }
                    }
                }
            }
        }
    }
}
