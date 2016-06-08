<?php
include 'db.php';
$naam = $_POST['naam'];
$achternaam = $_POST['achternaam'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$repassword = md5($_POST['repassword']);
$email = $_POST['email'];
$date = $_POST['date'];


    if (strlen($username) && strlen($password) >= 5)
    {
        if ($password == $repassword)
        {  
        
            $selectinfo = "SELECT * FROM users WHERE username = '$username'";
            $result = $connect->query($selectinfo);
            if ($result->num_rows < 1){
                $infoadd = "INSERT INTO users (naam, achternaam, username, password, email, date) VALUES ('$naam','$achternaam','$username','$password','$email','$date')";
                $result2 = $connect->query($infoadd);
                header('location: ../index.php?succes');
            }
            else 
            {
                echo "Gebruiker bestaat al"; 
            }
        }
        else 
        {
            echo "Wachtwoorden komen niet overeen";
        }
    }
    else 
    {
        echo "Gebruikersnaam/Wacthwoord moet groter zijn dan 5 tekens";
    }
?>

