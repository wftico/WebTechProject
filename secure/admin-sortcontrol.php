<!DOCTYPE html>
<html lang="de">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../css/layout.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">

    <link rel="icon" href="../images/hauptstadtbiene-icon.png" type="image/x-icon" />
    <!-- insert fitting link -->

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>

    <title>Hobby-Imkerei L&uuml;ck</title>
</head>

<body>
    <!-- header gets loaded as react component in ./transformed/header.js -->
    <header id="header">
    </header>

    <!-- index Display gets loaded as react component in ./transformed/ImageDisplay/imageDisplayIndex.js -->
    <div id="adminImageDisplay"></div>


    <!-- main content section -->
    <div class="wrapper">
        <div class="col-12" id="topAnchor"> <!-- Place id="topAnchor" for page reload php button landing -->
            <h1>Admin Panel</h1>
            <!-- Beginn der Sortiment Sektion -->
                <h2>Sortiment Kontrolle</h2>
                <p>
                    Passen Sie das Sortiment an.
                </p>
        </div>
        <div class="col-12">
        <?php
                                
                                // Load DB credentials from save location
                                include '../secure/db_credentials.php';

                                // Create connection
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                $sql = "SELECT * FROM honigsortiment";
                                $result = $conn->query($sql);
                                $placeholder = "change";
                                $available = "";

                                // create the table of the honey sortiment
                                echo '<table id="honigsort-admin">
                                <tr>
                                <th>Honigsorte</th>
                                <th>Verfügbar</th>
                                <th>Verfübarkeit ändern</th>
                                </tr>
                                ';


                                if ($result->num_rows > 0) {
                                    
                                    while($row = $result->fetch_assoc()) {

                                        // check if the honey should display as available or not
                                        if($row["display"] == "true"){
                                            $available = "Ja";
                                        } else {
                                            $available = "Nein";
                                        }

                                        echo '
                                        <tr>
                                            <td>'.$row["name"].'</td>
                                            <td id="'.$row["idcss"].'available">'.$available.'</td>
                                            <td>
                                                <form action="../secure/admin-sortcontrol.php#topAnchor" method="get">
                                                <input name="buttonClicked" hidden value=\''.$row["idcss"].'\'>
                                                <input type="submit" value="Change">
                                                </form>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                } else {
                                    echo "0 results";
                                }

                                echo '</table>';

                                $conn->close();
                            // end php skript
                            ?>

            <!-- Begin of PHP alter DB entries skript -->
            <?php
            if($_GET['buttonClicked']){
            
                // current issue: not sanitized, page refresh (F5) instantly triggers the IF GET


                echo 'IT WORKED';

                // should be sanitized !
                $id = $_GET['buttonClicked'];

                echo ''.$id.'';

                // Start DB connection 
                // Load DB credentials from save location
                include '../secure/db_credentials.php';

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                $sql = "SELECT * FROM honigsortiment";
                $sqlDisplay ="UPDATE honigsortiment SET display='true' WHERE idcss='$id'";
                $sqlDontDisplay ="UPDATE honigsortiment SET display='false' WHERE idcss='$id'";

            
                $result = $conn->query($sql); 
                
                while($row = $result->fetch_assoc()) {

                    $dummy = $row["idcss"];

                    echo ''.$dummy.'';

                    // wenn die ID zum DB Eintrag passt
                    if($dummy == $id){
                        if($row["display"] == "true"){
                            // dann auf nicht display setzen
                            if (mysqli_query($conn, $sqlDontDisplay)) {
                                echo '
                                <script type="text/javascript">
                                document.getElementById("'.$id.'available").innerHTML = "Nein";
                                </script>
                                ';
                            } else {
                                echo "Error updating record: " . mysqli_error($conn);
                            }
                        } else {
                            // auf display setzen
                            if (mysqli_query($conn, $sqlDisplay)) {
                                echo '
                                <script type="text/javascript">
                                document.getElementById("'.$id.'available").innerHTML = "Ja";
                                </script>
                                ';
                            } else {
                                echo "Error updating record: " . mysqli_error($conn);
                            }
                        }
                    } 

                }

                $conn->close();
            }
            ?>

        <!-- div col12 end -->
        </div>
    <!-- wrapper end -->
    </div>


    <!-- footer gets loaded as a react component stored at ./transformed/footer.js -->
    <footer id="footer">
    </footer>


    <!-- Load React. -->
    <!-- Note: when deploying, replace "development.js" with "production.min.js". -->
    <script src="../js/react/react.production-min.js"></script>
    <script src="../js/react-dom/react-dom.production-min.js"></script>

    <!-- Load React components. -->
    <script src="../transformed/secure/secureFooter.js"></script>
    <script src="../transformed/secure/secureHeader.js"></script>
    <script src="../transformed/ImageDisplay/imageDisplayAdmin.js"></script>

</body>

</html>