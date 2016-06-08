<?php 
session_start();

$username = $_POST['username'];
$password = md5 ($_POST['password']);
$password1 = $_POST['password'];

if ($username && $password) {
    include 'db.php';
    
    $queryusername = "SELECT * FROM users WHERE username = '$username'";
    $resultsusername = $connect->query($queryusername);
    
    if ($resultsusername->num_rows > 0){
        while($row = $resultsusername->fetch_assoc()){
            $dbusername = $row['username'];
            $dbpassword = $row['password'];
        }
        if ($username == $dbusername && ($password) == $dbpassword)
        {
            $_SESSION['username']=$dbusername;
            $_SESSION['admin']=$admin;
            header ("location: index.php");
            $_SESSION['password1']=$password1;
        }
        else 
        {
            echo "Wachtwoord klopt niet !<br>";
            ?><br>Klik <a href="index.php">hier</a> om terug te gaan<?php
        }
    }
    else 
    {
        echo "Gebruikersnaam bestaat niet !";
        ?><br>Klik <a href="index.php">hier</a> om terug te gaan<?php
    }

}
else 
{
    echo "Beide velden moeten ingevuld zijn !";
}

?>