<?php
    // Load DB credentials from save location
    include '../secure/db_credentials.php';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Prepared statements
    $sql = "SELECT * FROM honigsortiment";
    $sqlFruehtrachtInsert = "INSERT INTO honigsortiment ('name', idcss, imageurl, preis, merkmal, geschmack, display)
    VALUES ('Fruehtracht', 'fruehtracht', './img', '6', 'Neu', 'Ne2', 'true');";

    // Variable for the query results
    $result = $conn->query($sql);

    // create the tablehead of the honey sortiment
    echo '
    <h3>Bestehende Vorlagen hinzufügen</h3>
    <table id="honigsort-admin">
    <tr>
    <th>Honigsorte</th>
    <th>Hinzuf&uuml;gen</th>
    </tr>
    ';

    // Funktion
    // Input: ID - durchsuche Honigsorten DB nach der gegebenen ID
        // wenn ID nicht vorhanden (soll in der Liste erscheinen)
    function lookForID($dbCon, $sqlState, $givenID){

        $dbConnection = $dbCon;
        $sqlStatement = $sqlState;
        $result = $dbConnection->query($sqlStatement);

        // DB Abfrage
        echo '<p>started</p>';
        $idExistent = 0;

        // DB query serves 1 or more entries
        if ($result->num_rows > 0){
            echo '<p>larger than 0</p>';
            while($row = $result->fetch_assoc()){

                $dummy = $row["idcss"];
                // if the givenID is present in the DB already
                if($givenID == $dummy){
                    $idExistent += 1;
                    echo '<p>found</p>';
                } else {
                    echo '<p>not found</p>';
                }
                echo '<p>Hit</p>';
            }
        }
        echo '<p>ended</p>';

        echo ''.$idExistent.'';

        // if the ID isn't found, it should be a table entry created
        if($idExistent == 0){
            return true;
        } else {
            return false;
        }
    }
        

    // Frühtracht
    $idFruehtracht = "fruehtracht";
    $displayFruehtracht = lookForID($conn, $sql, $idFruehtracht);
    // wenn die ID nicht gefunden wird, wird ein Eintrag zur Erstellung ausgegeben
    if ($displayFruehtracht == true) {
            echo '
            <tr>
            <td>Fr&uuml;htracht</td>
            <td>
            <form action="../secure/admin-sortcontrol.php" method="post">
            <input name="buttonClickedCreate" hidden value=\'fruehtracht\'>
            <input name="req" hidden value="Add">
            <input type="submit" value="Hinzuf&uuml;gen">
            </form>
            </td>
            </tr>
            ';

            // maybe script to clean url is needed for the refresh page fix? 
    } 

    echo '</table>';

    

 $conn->close();
 // end php skript
 ?>