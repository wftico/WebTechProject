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
        <div class="col-12" id="topPriorities"> <!-- Place id="topAnchor" for page reload php button landing -->
            
        <?php

            $id = "";
            $msgToChange = "";
            $msgToValidate = "";
            // set the proper ID value in regards to which button was clicked (property or taste)
            if($_GET['buttonClickedProperties']){
                $id = $_GET['buttonClickedProperties'];
            } else if($_GET['buttonClickedTaste']){
                $id = $_GET['buttonClickedTaste'];
            } else if($_GET['buttonClickedDelete']){
                $id = $_GET['buttonClickedDelete'];
            }

            // Start DB connection 
            // Load DB credentials from save location
            include 'db_credentials.php';

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            $sql = "SELECT * FROM honigsortiment WHERE idcss='$id'";

            $result = $conn->query($sql); 
            $row = $result->fetch_assoc();

            // to change properties
            if($_GET['buttonClickedProperties']){
                
                echo '
                    <h1>Merkmale &auml;ndern von</h1>
                    <h2>'.$row["name"].'</h2>

                    <form method="post" action="../secure/admin-alter.php?buttonClickedProperties='.$id.'">
                        <fieldset>
                            <label>Geben Sie das neue Merkmal ein:</br>
                            <input name="neuesMerkmal" type="text" class="form-input" size="50" />
                            </label>
                            <input type="submit" name="submit" value="Absenden" class="form-button" id="formClicked">
                        </fieldset>
                    </form>
                ';

            } else if($_GET['buttonClickedTaste']){

                echo '
                    <h1>Geschmacksbeschreibung &auml;ndern von</h1>
                    <h2>'.$row["name"].'</h2>

                    <form method="post" action="../secure/admin-alter.php?buttonClickedTaste='.$id.'">
                        <fieldset>
                            <label>Geben Sie die neue Geschmacksbeschreibung ein:</br>
                            <input name="neuerGeschmack" type="text" class="form-input" size="50" />
                            </label>
                            <input type="submit" name="submit" value="Absenden" class="form-button" id="formClicked">
                        </fieldset>
                    </form>
                ';
            } else if($_GET['buttonClickedDelete']){

                echo'
                    <h1>Eintrag L&ouml;schen</h1>
                    <h2>M&ouml;chten Sie '.strtoupper($id).' wirklich L&ouml;schen?
                    <form method="post" action="../secure/admin-alter.php?buttonClickedDelete='.$id.'">
                        <fieldset>
                            <input type="submit" name="submit" value="Entg&uuml;ltig l&ouml;schen" class="form-button" id="formClicked">
                        </fieldset>
                    </form>

                ';

            }

            // if the post has been sent - validate data and update it
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                // validate data function
                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                // validation and updating of data in regards to which action was performed
                if($_GET['buttonClickedProperties']){
                    // Validation and msg assignment
                    $msgToValidate = $_POST["neuesMerkmal"];
                    $msgToChange = test_input($msgToValidate);
                    // set up the SQL Statement
                    $sqlProperty = "UPDATE honigsortiment SET merkmal='$msgToChange' WHERE idcss='$id'";
                    // change the db entry - no proper validation (length and so on)
                    if (mysqli_query($conn, $sqlProperty)) {
                        echo '
                            <div class="dbUpdateSuccess">
                                <p>Daten wurden erfolgreich aktualisiert</p>
                            </div>
                            ';
                    } else {
                        echo "Error updating record: " . mysqli_error($conn);
                    }
                } else if($_GET['buttonClickedTaste']){
                    // Validation and msg assignment
                    $msgToValidate = $_POST["neuerGeschmack"];
                    $msgToChange = test_input($msgToValidate);
                    $sqlTaste = "UPDATE honigsortiment SET geschmack='$msgToChange' WHERE idcss='$id'";
                    // change the db entry - no proper validation (length and so on)
                    if (mysqli_query($conn, $sqlTaste)) {
                        echo '
                            <div class="dbUpdateSuccess">
                                <p>Daten wurden erfolgreich aktualisiert</p>
                            </div>
                            ';
                    } else {
                        echo "Error updating record: " . mysqli_error($conn);
                    }
                } else if($_GET['buttonClickedDelete']){
                    // prepare Delete statement and show message according to success or not
                    $sqlDelete = "DELETE FROM honigsortiment WHERE idcss='$id'";
                    if (mysqli_query($conn, $sqlDelete)) {
                        echo '
                            <div class="dbUpdateSuccess">
                                <p>Eintrag wurde erfolgreich gel&ouml;scht</p>
                            </div>
                            ';
                    } else {
                        echo "Error updating record: " . mysqli_error($conn);
                    }
                }
            }

            echo '
                    <a href="admin-sortcontrol.php" class="a-menu">Zur&uuml;ck zum Admin-Panel</a>
                ';

            $conn->close();

        ?>


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