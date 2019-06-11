<?php
    // Load DB credentials from save location
    include '../secure/db_credentials.php';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT * FROM honigsortiment";
    $result = $conn->query($sql);

    // create the table of the honey sortiment
    echo '<table id="honigsort-admin">
    <tr>
    <th>Honigsorte</th>
    <th>L&ouml;schen</th>
    </tr>
    ';


    if ($result->num_rows > 0) {
 
        while($row = $result->fetch_assoc()) {

            echo '
            <tr>
            <td>'.$row["name"].'</td>
            <td>
            <form action="../secure/admin-alter.php" method="get">
            <input name="buttonClickedDelete" hidden value=\''.$row["idcss"].'\'>
            <input name="req" hidden value="Del">
            <input type="submit" value="L&ouml;schen">
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