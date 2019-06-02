<!DOCTYPE html>
<html lang="de">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="./css/layout.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">

    <link rel="icon" href="./images/hauptstadtbiene-icon.png" type="image/x-icon" />
    <!-- insert fitting link -->

    <title>Hobby-Imkerei L&uuml;ck</title>
</head>

<body>

    <!-- header gets loaded as react component in ./transformed/header.js -->
    <header id="header">
    </header>

    <!-- index Display gets loaded as react component in ./transformed/ImageDisplay/imageDisplayIndex.js -->
    <div id="sortimentImageDisplay"></div>


    <!-- main content section -->
    <div class="wrapper">
        <div class="col-12">
            <h1>Unser Sortiment</h1>
            <!-- Beginn der Sortiment Sektion -->
            <fieldset>
                <legend class="label-sortiment">Naturbelassener Honig</legend>
                <div class="col-12">
                        <!-- Flexcontainer für die Sortiment-Items (wrapped nach unten - 3 in row) -->
                        <div class="flex-container">
                            <!-- Start of the Sortiment-Item generator Script -->
                            <!-- set up connection to the epizy DB -->
                            <?php
                                
                                // Load DB credentials from save location
                                include './secure/db_credentials.php';

                                // Create connection
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                $sql = "SELECT * FROM honigsortiment";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        // only when the attribute 'display' is true, the html markup will be generated
                                        if($row["display"] == "true"){
                                            echo 
                                            '
                                            <div class="sortiment-item" id="'.$row["idcss"].'">
                                                    <h1>'.$row["name"].'</h1>
                                                    <img src="'.$row["imageurl"].'" alt="'.$row["name"].'" class="sortiment-Image">
                                                    <h2>Preis</h2>
                                                    <div class="sortiment-spacer-line"></div>
                                                    <p>'.$row["preis"].' €</p>
                                                    <h2>Merkmale</h2>
                                                    <div class="sortiment-spacer-line"></div>
                                                    <p>'.$row["merkmal"].'</p>
                                                    <h2>Geschmack</h2>
                                                    <div class="sortiment-spacer-line"></div>
                                                    <p>'.$row["geschmack"].'</p>
                                            </div>
                                            '
                                            ;
                                        }
                                    }
                                } else {
                                    echo "0 results";
                                }
                                $conn->close();
                            // end php skript
                            ?>
                        <!-- flex con end -->
                        </div>
                </div>
            </fieldset>
        </div>
    <!-- wrapper end -->
    </div>


    <!-- footer gets loaded as a react component stored at ./transformed/footer.js -->
    <footer id="footer">
    </footer>


    <!-- Load React. -->
    <!-- Note: when deploying, replace "development.js" with "production.min.js". -->
    <script src="./js/react/react.production-min.js"></script>
    <script src="./js/react-dom/react-dom.production-min.js"></script>

    <!-- Load React components. -->
    <script src="./transformed/footer.js"></script>
    <script src="./transformed/header.js"></script>
    <script src="./transformed/ImageDisplay/imageDisplaySortiment.js"></script>

</body>

</html>