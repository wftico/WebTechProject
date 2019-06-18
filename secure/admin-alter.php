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

            $errNameAdd = $errIdAdd = $errPreisAdd = $errImgurlAdd = $errMerkmalAdd = $errGeschmackAdd = "";
            $inpName = $inpId = $inpPreis = $inpImgurl = $inpMerkmal = $inpGeschmack = "";
            // Array that serves the information, if a valid information has already been provided
            // the order is: inpName, inpID, inpPreis, inpImgurl, inpMerkmal, inpGeschmack
            $validEntries = array(false, false, false, false, false, false);
            $fullValidationMessage = "";

            function cleanInput($data){
                $data = trim($data);
                $data = stripslashes($data); // for URL as well?
                $data = htmlspecialchars($data);
                return $data;
            }

            function cleanURL($data){
                $data = trim($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            // post data error checking, is data valid? For the ADD ENTRY function
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                if($_GET['addDone']){
                    // CHECK FOR NAME
                    if (empty($_POST['name'])) {
                        $errNameAdd = "Sie müssen einen Namen eingeben.";
                    } else {
                        // if input is not empty, first check if the input length is in line
                        if(strlen($_POST['name']) < 100){
                            // here we have a valid input, which has to be cleaned
                            $inpName = cleanInput($_POST['name']);
                            $validEntries[0] = true;
                        } else {
                            $errNameAdd = "Ihre Eingabe darf 100 Zeichen nicht &uuml;berschreiten.";
                        }
                    }
                    // CHECK FOR ID
                    if (empty($_POST['id'])) {
                        $errIdAdd = "Sie müssen eine ID eingeben.";
                    } else {
                        // if input is not empty, first check if the input length is in line
                        if(strlen($_POST['id']) < 100){
                            // here we have a valid input, which has to be cleaned
                            $inpId = cleanInput($_POST['id']);
                            $validEntries[1] = true;
                        } else {
                            $errIdAdd = "Ihre Eingabe darf 100 Zeichen nicht &uuml;berschreiten.";
                        }
                    }
                    // CHECK FOR PREIS
                    if (empty($_POST['preis'])) {
                        $errPreisAdd = "Sie müssen einen gültigen Preis eingeben.";
                    } else {
                        // if input is not empty, first check if the input length is in line
                        if(strlen($_POST['preis']) < 10){
                            // here we have a valid input, which has to be cleaned
                            $inpPreis = cleanInput($_POST['preis']);
                            $validEntries[2] = true;
                        } else {
                            $errPreisAdd = "Ihre Eingabe darf 10 Zeichen nicht &uuml;berschreiten.";
                        }
                    }
                    // CHECK FOR IMG URL
                    if (empty($_POST['imgurl'])){
                        $validEntries[3] = true;
                    } else {
                        // if input is not empty, first check if the input length is in line
                        if(strlen($_POST['imgurl']) < 100){
                            // here we have a valid input, which has to be cleaned
                            $inpImgurl = cleanURL($_POST['imgurl']);
                            $validEntries[3] = true;
                        } else {
                            $errImgurlAdd = "Ihre Eingabe darf 100 Zeichen nicht &uuml;berschreiten.";
                        }
                    }
                    // CHECK FOR MERKMAL
                    if (empty($_POST['merkmal'])){
                        $errMerkmalAdd = "Sie müssen ein Merkmal eingeben.";
                    } else {
                        // if input is not empty, first check if the input length is in line
                        if(strlen($_POST['merkmal']) < 200){
                            // here we have a valid input, which has to be cleaned
                            $inpMerkmal = cleanInput($_POST['merkmal']);
                            $validEntries[4] = true;
                        } else {
                            $errMerkmalAdd = "Ihre Eingabe darf 200 Zeichen nicht &uuml;berschreiten.";
                        }
                    }
                    // CHECK FOR GESCHMACK
                    if (empty($_POST['geschmack'])){
                        $errGeschmackAdd = "Sie müssen eine Geschmackseigenschaft eingeben.";
                    } else {
                        // if input is not empty, first check if the input length is in line
                        if(strlen($_POST['geschmack']) < 100){
                            // here we have a valid input, which has to be cleaned
                            $inpGeschmack = cleanInput($_POST['geschmack']);
                            $validEntries[5] = true;
                        } else {
                            $errGeschmackAdd = "Ihre Eingabe darf 100 Zeichen nicht &uuml;berschreiten.";
                        }
                    }

                    // counts how many entries are actually valid
                    $validCount = 0;
                    for($i = 0; $i < count($validEntries); $i++){
                        if($validEntries[$i] == true){
                            $validCount++;
                        }
                    }
                    
                    // if all entries are valid, show success and update database
                    if($validCount >= 6){
                        echo '<p>HARD SUCCESS!</p>';
                    }
                    

                } // get if add_done end
            }// post end


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

            } else if($_GET['addEntry']){

                echo'
                <h1>Eintrag hinzuf&uuml;gen</h1>
                <div class="col-12" id="kontakt-top-border"></div>
                    <div class="col-12 background-yellow form-headlines yBox-spacerTop">
                        <form method="post" action="../secure/admin-alter.php?addEntry=yes&addDone=yes" class="form-horizontal">
                            <fieldset>
                                <legend>Daten f&uuml;r den neuen Eintrag</legend>
                                <label>Name:<br> <input name="name" type="text" class="form-input" size="50" placeholder="Geben Sie einen Namen ein (*)" /></label>
                                <br /> <p><span class="form-error">'.$errNameAdd.'</span></p>
                                <label>ID:<br> <input name="id" type="text" class="form-input" size="50" placeholder="Geben Sie eine ID ein (*)" /></label>
                                <br /> <p><span class="form-error">'.$errIdAdd.'</span></p>
                                <label>Preis:<br> <input name="preis" type="number" class="form-input" size="50" placeholder="Geben Sie den Preis ein (*)" /></label>
                                <br /> <p><span class="form-error">'.$errPreisAdd.'</span></p>
                                <label>Bild-URL:<br> <input name="imgurl" type="text" class="form-input" size="50" placeholder="Geben Sie die URL zum Bild ein" /></label>
                                <br /> <p><span class="form-error">'.$errImgurlAdd.'</span></p>
                                <label>Merkmale:<br> <input name="merkmal" type="text" class="form-input" size="50" placeholder="Geben Sie Merkmale ein (*)" /></label>
                                <br /> <p><span class="form-error">'.$errMerkmalAdd.'</span></p>
                                <label>Geschmack:<br> <input name="geschmack" type="text" class="form-input" size="50" placeholder="Geben Sie Geschmackseigenschaften ein (*)" /></label>
                                <br /> <p><span class="form-error">'.$errGeschmackAdd.'</span></p>
                                <input type="submit" name="submit" value="Eintrag hinzufügen" class="form-button" id="formClicked">
                                <br /> <p><span class="form-valid">'.$fullValidationMessage.'</span></p>
                            </fieldset>
                        </form>
                    </div>
                <div class="col-12" id="kontakt-bottom-border"></div>
                </form>
            ';

            }

            // if the post has been sent - validate data and update it
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                // validation and updating of data in regards to which action was performed
                if($_GET['buttonClickedProperties']){
                    // Validation and msg assignment
                    $msgToValidate = $_POST["neuesMerkmal"];
                    $msgToChange = $msgToValidate;
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
                    $msgToChange = $msgToValidate;
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