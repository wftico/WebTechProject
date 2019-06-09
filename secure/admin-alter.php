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

        $id = $_GET['buttonClickedProperties'];
        $msgToChange = "test";

        // Start DB connection 
        // Load DB credentials from save location
        include 'db_credentials.php';

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        $sql = "SELECT * FROM honigsortiment WHERE idcss='$id'";
        $sqlProperty = "UPDATE honigsortiment SET merkmal='$msgToChange' WHERE idcss='$id'";

        $result = $conn->query($sql); 

        $row = $result->fetch_assoc();

        // to change properties
        if($_GET['buttonClickedProperties']){
            
            // render the content - static action has to be replaced with proper url method
            echo '
                <h1>Merkmale &auml;ndern von</h1>
                <h2>'.$row["name"].'</h2>

                <form method="post" action="admin-alter.php?buttonClickedProperties=fruehtracht">
                    <fieldset>
                        <label>Geben Sie das neue Merkmal ein:</br>
                        <input name="neuesMerkmal" type="text" class="form-input" size="50" />
                        </label>
                        <input type="submit" name="submit" value="Absenden" class="form-button" id="formClicked">
                    </fieldset>
                </form
            ';
        }

        // if the post has been sent - validate data and update it
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $msgToValidate = $_POST["neuesMerkmal"];

            // validate data function
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $msgToChange = test_input($msgToValidate);

            // refresh the SQL Statement
            $sqlProperty = "UPDATE honigsortiment SET merkmal='$msgToChange' WHERE idcss='$id'";

            // change the db entry - no proper validation (length and so on)
            if (mysqli_query($conn, $sqlProperty)) {
                echo '
                    <div>
                        <p>Daten wurden erfolgreich aktualisiert</p>
                    </div>
                    ';
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }

        }

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