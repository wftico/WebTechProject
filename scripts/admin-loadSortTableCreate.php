<?php
    // Load DB credentials from save location
    include '../secure/db_credentials.php';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT * FROM honigsortiment";
    $result = $conn->query($sql);

    // create the tablehead of the honey sortiment
    echo '
    <h2>Bestehende Vorlagen hinzufügen</h2>
    <table id="honigsort-admin">
    <tr>
    <th>Honigsorte</th>
    <th>Hinzuf&uuml;gen</th>
    </tr>
    ';


    if ($result->num_rows > 0) {
 
        while($row = $result->fetch_assoc()) {

            echo '
            <tr>
            <td>'.$row["name"].'</td>
            <td>
            <form action="../secure/admin-sortcontrol.php" method="get">
            <input name="buttonClickedCreate" hidden value=\''.$row["idcss"].'\'>
            <input name="req" hidden value="Add">
            <input type="submit" value="Hinzuf&uuml;gen">
            </form>
            </td>
            </tr>
            ';
        } 
    }   
    else {
        echo "0 results";
    }
    

 echo '</table>';

 $conn->close();
 // end php skript
 ?>