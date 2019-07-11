<?php
    // Load DB credentials from save location
    include '../secure/db_credentials.php';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Prepared statements
    $sql = "SELECT * FROM honigsortiment";
    // Statements to create the various preset honey
    $sqlInsertFruehtracht = "INSERT INTO honigsortiment (name, idcss, imageurl, preis, merkmal, geschmack, display)
    VALUES ('Fr&uuml;htracht', 'fruehtracht', './images/sortiment/Fruehtracht.jpg', '6', 'heller, fl&uuml;ssiger Bl&uuml;tenhonig, hoher Kernobstanteil, Hauptleitpollen Vergissmeinnicht', 'mildes, rundes und warmes Aroma', 'true');";
    $sqlInsertFruehjahrsbluetenhonig = "INSERT INTO honigsortiment (name, idcss, imageurl, preis, merkmal, geschmack, display)
    VALUES ('Fr&uuml;hjahrsbl&uuml;tenhonig', 'fruehjahrsbluetenhon', './images/sortiment/FruehjahrBluetenhonig2017.jpg', '5', 'fester, br&auml;unlicher Bl&uuml;tenhonig, hoher Anteil an Vergissmeinnicht', 'aromatisch', 'true');";
    $sqlInsertHeidehonig = "INSERT INTO honigsortiment (name, idcss, imageurl, preis, merkmal, geschmack, display)
    VALUES ('Heidehonig', 'heidehonig', './images/sortiment/Heidehonig2017.jpg', '6', 'goldbraun auch bernsteinfarben, zartfl&uuml;ssig', 'kr&auml;ftig mit einzigartigem Aroma, herb und w&uuml;rzig', 'true');";
    $sqlInsertKornblumenhonig = "INSERT INTO honigsortiment (name, idcss, imageurl, preis, merkmal, geschmack, display)
    VALUES ('Kornblumenhonig', 'kornblumenhonig', './images/sortiment/Kornblume.jpg', '6.5', 'fester Honig, hohe antibakterielle Wirkung', 'w&uuml;rzigs&uuml;&szlig; und typisches Aroma', 'true');";
    $sqlInsertLindenhonig = "INSERT INTO honigsortiment (name, idcss, imageurl, preis, merkmal, geschmack, display)
    VALUES ('Lindenhonig', 'lindenhonig', './images/sortiment/Lindenhonig2017.jpg', '6', 'hellgelb bis beige', 'sehr s&uuml;&szlig;, typisch aromatisch, mit leicht minzigem Geschmack', 'true');";
    $sqlInsertRobinienhonig = "INSERT INTO honigsortiment (name, idcss, imageurl, preis, merkmal, geschmack, display)
    VALUES ('Robinienhonig', 'robinienhonig', './images/sortiment/Robinienhonig2017.jpg', '7', 'fast farblos bis hellgelb, bleibt extrem lange fl&uuml;ssig', 'schwach aromatisch, blumig-mild', 'true');";
    $sqlInsertSommerbluete = "INSERT INTO honigsortiment (name, idcss, imageurl, preis, merkmal, geschmack, display)
    VALUES ('Sommerbl&uuml;te', 'sommerbluete', './images/sortiment/Sommerbluete2017.jpg', '6.5', 'kr&auml;ftig gelb bis braun', 'liebliches Aroma', 'true');";
    $sqlInsertWaldhonig = "INSERT INTO honigsortiment (name, idcss, imageurl, preis, merkmal, geschmack, display)
    VALUES ('Waldhonig', 'waldhonig', './images/sortiment/Waldhonig2017.jpg', '10', 'dunkel Lernsteinfarben, dunkelbraun bis fast schwarz', 'intensiv malziges Aroma', 'true');";
    $sqlInsertRapshonig = "INSERT INTO honigsortiment (name, idcss, imageurl, preis, merkmal, geschmack, display)
    VALUES ('Rapshonig', 'rapshonig', './images/sortiment/rapshonig2017.jpg', '6', 'cremiger, heller fast wei&szlig;er Honig, gleichm&auml;ßige und feine Kristallisation', 'charakteristisch mild', 'true');";
    $sqlInsertSommertracht = "INSERT INTO honigsortiment (name, idcss, imageurl, preis, merkmal, geschmack, display)
    VALUES ('Sommertracht', 'sommertracht', './images/sortiment/Sommertracht2017.jpg', '7', 'cremiger Sommerhonig mit Rapsanteil', 'angenehm kr&auml;ftig', 'true');";
    $sqlInsertHimbeerhonig = "INSERT INTO honigsortiment (name, idcss, imageurl, preis, merkmal, geschmack, display)
    VALUES ('Himbeerhonig', 'himbeerhonig', './images/sortiment/Himbeerhonig2017.jpg', '6.5', 'hellgelb', 'feiner Himbeergeschmack', 'true');";

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
        $idExistent = 0;

        // DB query serves 1 or more entries
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){

                $dummy = $row["idcss"];
                // if the givenID is present in the DB already
                if($givenID == $dummy){
                    $idExistent += 1;
                } else {
                }
            }
        }
        // if the ID isn't found, it should be a table entry created
        if($idExistent == 0){
            return true;
        } else {
            return false;
        }
    }
        
    // Arrays
    $idArr = array("fruehtracht", "fruehjahrsbluetenhon", "heidehonig", "kornblumenhonig", "lindenhonig", "robinienhonig", "sommerbluete", "waldhonig", "rapshonig", "sommertracht", "himbeerhonig");
    $dspArr = array();
    $nameArr = array("Fr&uuml;htracht", "Fr&uuml;hjahrsbl&uuml;tenhonig", "Heidehonig", "Kornblumenhonig", "Lindenhonig", "Robinienhonig", "Sommerbl&uuml;te", "Waldhonig", "Rapshonig", "Sommertracht", "Himbeerhonig" );

    // fills the dspArr with true/false values, regarding if they should be shown or not
    for($i = 0; $i < count($idArr); $i++){
        $dspArr[$i] = lookForID($conn, $sql, $idArr[$i]);

        // does the acual display of the table content - checks the arrays which IDs should be displayed
        if($dspArr[$i] == true){
            echo '
            <tr>
            <td>'.$nameArr[$i].'</td>
            <td>
            <form action="../secure/admin-sortcontrol.php?req=Add&buttonClickedCreate='.$idArr[$i].'" method="post">
            <input name="buttonClickedCreate" hidden value="'.$idArr[$i].'">
            <input name="req" hidden value="Add">
            <input type="submit" value="Hinzuf&uuml;gen">
            </form>
            </td>
            </tr>
            ';
        }
    }

            // maybe script to clean url is needed for the refresh page fix? 
    
    echo '</table>';

    // section to create a fully new entry
    
    echo '
        <h3>Komplett neuen Eintrag hinzuf&uuml;gen</h3>
        <a href="../secure/admin-alter.php?addEntry=true" target="_self">Hier klicken um fortzufahren...</a>
    ';



    // POST part handling - when post, check for the posted ID and fulfill the create SQL query
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if($_POST["buttonClickedCreate"]){
            // saves the ID to the toCreate variable
            $toCreate = $_POST["buttonClickedCreate"];
            // finds out which ID needs to be inserted
            switch($toCreate){
                case 'fruehtracht': 
                    if ($conn->query($sqlInsertFruehtracht) === TRUE) {
                        echo '
                        <div id="successMessageAbsolute"><p>Eintrag erfolgreich erstellt.</p></div>
                            <script type="text/javascript">
                                $("#successMessageAbsolute").click(function () {
                                    $("#successMessageAbsolute").fadeOut(500);
                                });
                            </script>
                        ';

                    } else {
                        echo '
                            <div id="errorMessageAbsolute"><p><span class="form-valid">Error: '.$conn->error.'</span></p></div>
                             
                            <script type="text/javascript">
                                $("#errorMessageAbsolute").click(function () {
                                    $("#errorMessageAbsolute").fadeOut(500);
                                });
                            </script>
                        ';
                    }
                    break;
                case 'fruehjahrsbluetenhon': 
                    if ($conn->query($sqlInsertFruehjahrsbluetenhonig) === TRUE) {
                        echo '
                        <div id="successMessageAbsolute"><p>Eintrag erfolgreich erstellt.</p></div>
                        <script type="text/javascript">
                            $("#successMessageAbsolute").click(function () {
                                $("#successMessageAbsolute").fadeOut(500);
                            });
                        </script>
                        ';

                    } else {
                        echo '
                        <div id="errorMessageAbsolute"><p><span class="form-valid">Error: '.$conn->error.'</span></p></div>
                         
                        <script type="text/javascript">
                            $("#errorMessageAbsolute").click(function () {
                                $("#errorMessageAbsolute").fadeOut(500);
                            });
                        </script>
                    ';
                    }
                    break;
                case 'heidehonig': 
                    if ($conn->query($sqlInsertHeidehonig) === TRUE) {
                        echo '
                        <div id="successMessageAbsolute"><p>Eintrag erfolgreich erstellt.</p></div>
                            <script type="text/javascript">
                                $("#successMessageAbsolute").click(function () {
                                    $("#successMessageAbsolute").fadeOut(500);
                                });
                            </script>
                        ';

                    } else {
                        echo '
                            <div id="errorMessageAbsolute"><p><span class="form-valid">Error: '.$conn->error.'</span></p></div>
                             
                            <script type="text/javascript">
                                $("#errorMessageAbsolute").click(function () {
                                    $("#errorMessageAbsolute").fadeOut(500);
                                });
                            </script>
                        ';
                    }
                    break;
                case 'kornblumenhonig': 
                    if ($conn->query($sqlInsertKornblumenhonig) === TRUE) {
                        echo '
                        <div id="successMessageAbsolute"><p>Eintrag erfolgreich erstellt.</p></div>
                            <script type="text/javascript">
                                $("#successMessageAbsolute").click(function () {
                                    $("#successMessageAbsolute").fadeOut(500);
                                });
                            </script>
                        ';

                    } else {
                        echo '
                        <div id="errorMessageAbsolute"><p><span class="form-valid">Error: '.$conn->error.'</span></p></div>
                         
                        <script type="text/javascript">
                            $("#errorMessageAbsolute").click(function () {
                                $("#errorMessageAbsolute").fadeOut(500);
                            });
                        </script>
                    ';
                    }
                    break;
                case 'lindenhonig': 
                    if ($conn->query($sqlInsertLindenhonig) === TRUE) {
                        echo '
                        <div id="successMessageAbsolute"><p>Eintrag erfolgreich erstellt.</p></div>
                            <script type="text/javascript">
                                $("#successMessageAbsolute").click(function () {
                                    $("#successMessageAbsolute").fadeOut(500);
                                });
                            </script>
                        ';

                    } else {
                        echo '
                        <div id="errorMessageAbsolute"><p><span class="form-valid">Error: '.$conn->error.'</span></p></div>
                         
                        <script type="text/javascript">
                            $("#errorMessageAbsolute").click(function () {
                                $("#errorMessageAbsolute").fadeOut(500);
                            });
                        </script>
                    ';
                    }
                    break;
                case 'robinienhonig': 
                    if ($conn->query($sqlInsertRobinienhonig) === TRUE) {
                        echo '
                        <div id="successMessageAbsolute"><p>Eintrag erfolgreich erstellt.</p></div>
                            <script type="text/javascript">
                                $("#successMessageAbsolute").click(function () {
                                    $("#successMessageAbsolute").fadeOut(500);
                                });
                            </script>
                        ';

                    } else {
                        echo '
                        <div id="errorMessageAbsolute"><p><span class="form-valid">Error: '.$conn->error.'</span></p></div>
                         
                        <script type="text/javascript">
                            $("#errorMessageAbsolute").click(function () {
                                $("#errorMessageAbsolute").fadeOut(500);
                            });
                        </script>
                    ';
                    }
                    break;
                case 'sommerbluete': 
                    if ($conn->query($sqlInsertSommerbluete) === TRUE) {
                        echo '
                        <div id="successMessageAbsolute"><p>Eintrag erfolgreich erstellt.</p></div>
                            <script type="text/javascript">
                                $("#successMessageAbsolute").click(function () {
                                    $("#successMessageAbsolute").fadeOut(500);
                                });
                            </script>
                        ';

                    } else {
                        echo '
                        <div id="errorMessageAbsolute"><p><span class="form-valid">Error: '.$conn->error.'</span></p></div>
                         
                        <script type="text/javascript">
                            $("#errorMessageAbsolute").click(function () {
                                $("#errorMessageAbsolute").fadeOut(500);
                            });
                        </script>
                    ';
                    }
                    break;
                case 'waldhonig': 
                    if ($conn->query($sqlInsertWaldhonig) === TRUE) {
                        echo '
                        <div id="successMessageAbsolute"><p>Eintrag erfolgreich erstellt.</p></div>
                            <script type="text/javascript">
                                $("#successMessageAbsolute").click(function () {
                                    $("#successMessageAbsolute").fadeOut(500);
                                });
                            </script>
                        ';

                    } else {
                        echo '
                        <div id="errorMessageAbsolute"><p><span class="form-valid">Error: '.$conn->error.'</span></p></div>
                         
                        <script type="text/javascript">
                            $("#errorMessageAbsolute").click(function () {
                                $("#errorMessageAbsolute").fadeOut(500);
                            });
                        </script>
                    ';
                    }
                    break;
                case 'rapshonig': 
                    if ($conn->query($sqlInsertRapshonig) === TRUE) {
                        echo '
                        <div id="successMessageAbsolute"><p>Eintrag erfolgreich erstellt.</p></div>
                            <script type="text/javascript">
                                $("#successMessageAbsolute").click(function () {
                                    $("#successMessageAbsolute").fadeOut(500);
                                });
                            </script>
                        ';

                    } else {
                        echo '
                        <div id="errorMessageAbsolute"><p><span class="form-valid">Error: '.$conn->error.'</span></p></div>
                         
                        <script type="text/javascript">
                            $("#errorMessageAbsolute").click(function () {
                                $("#errorMessageAbsolute").fadeOut(500);
                            });
                        </script>
                    ';
                    }
                    break;
                case 'sommertracht': 
                    if ($conn->query($sqlInsertSommertracht) === TRUE) {
                        echo '
                        <div id="successMessageAbsolute"><p>Eintrag erfolgreich erstellt.</p></div>
                            <script type="text/javascript">
                                $("#successMessageAbsolute").click(function () {
                                    $("#successMessageAbsolute").fadeOut(500);
                                });
                            </script>
                        ';

                    } else {
                        echo '
                        <div id="errorMessageAbsolute"><p><span class="form-valid">Error: '.$conn->error.'</span></p></div>
                         
                        <script type="text/javascript">
                            $("#errorMessageAbsolute").click(function () {
                                $("#errorMessageAbsolute").fadeOut(500);
                            });
                        </script>
                    ';
                    }
                    break;
                case 'himbeerhonig': 
                    if ($conn->query($sqlInsertHimbeerhonig) === TRUE) {
                        echo '
                        <div id="successMessageAbsolute"><p>Eintrag erfolgreich erstellt.</p></div>
                            <script type="text/javascript">
                                $("#successMessageAbsolute").click(function () {
                                    $("#successMessageAbsolute").fadeOut(500);
                                });
                            </script>
                        ';

                    } else {
                        echo '
                        <div id="errorMessageAbsolute"><p><span class="form-valid">Error: '.$conn->error.'</span></p></div>
                         
                        <script type="text/javascript">
                            $("#errorMessageAbsolute").click(function () {
                                $("#errorMessageAbsolute").fadeOut(500);
                            });
                        </script>
                    ';
                    }
                    break;
                    
            break;    
            }

        }
    }

    
    

 $conn->close();
 // end php skript
 ?>