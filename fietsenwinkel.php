<?php

$dsn = "mysql:host=localhost;dbname=fietswinkel"; 
$username = "root"; 
$password = ""; 

// Verbinding maken met de PDO-class, en een table maken met alle informaties die vanuit datebase (fietswinkel) opgehaald zijn.
try{

    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "you are connected<br><br>";

    $stmt = $conn->prepare("SELECT Id, Merk, Type, Prijs FROM fietsen");
    $stmt ->execute();

    echo "<table style = 'border: solid 0.5px black;'>";

    echo "<tr>  <th>Id</th>  <th>Merk</th>  <th>Type</th>  <th>Prijs</th>  </tr>";
    
    //De resulterende array in op associative stellen.
    $result = $stmt ->setFetchMode(PDO::FETCH_ASSOC);

    echo "<tr>";

    foreach($stmt->fetchAll() as $k => $v){
        echo "<tr>";
        echo "<td>" . $v['Id'] . "</td>"; 
        echo "<td>" . $v['Merk'] . "</td>";  
        echo "<td>" . $v['Type'] . "</td>"; 
        echo "<td>" . $v['Prijs'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

}

//Om te tonen dat het niet lukt om een verbinding te maken met datebase doe het volgende:
catch(PDOException $e){
    echo "Faild" . $e ->getMessage();
}
$conn = null;



?>
