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
        </div>

        <div class="col-12">

            <!-- list to choose what you want to do - edit, update, delete or create -->
            <div class="col-12" id="toggleAvailability">
                <ul class="ul-admin">
                    <li><a href="?req=Avail#topAnchor" class="a-menu" target="_self">Anpassen der<br>Verf&uuml;gbarkeit</a></li>
                    <li><a href="?req=Prop#topAnchor" class="a-menu" target="_self">Merkmale<br>&auml;ndern</a></li>
                    <li><a href="?req=Taste#topAnchor" class="a-menu" target="_self">Geschmack<br>&auml;ndern</a></li>
                    <li><a href="?req=Del#topAnchor" class="a-menu" target="_self">Eintrag<br>entfernen</a></li>
                    <li><a href="?req=Add#topAnchor" class="a-menu" target="_self">Eintrag<br>hinzufügen</a></li>
                </ul>
            </div>

            <!-- renders the content in regard to the menu button clicked -->
            <?php

                $givenRequest = "";

                if($_GET["req"]){
                    $givenRequest = $_GET["req"];
                }

                // change Availability
                if($givenRequest == "Avail"){

                    // Fügt script zum Erzeugen des Sortiment-Tables ein für die Verfügbarkeit
                    include '../scripts/admin-loadSortTable.php';
                    // Fügt script zum Bearbeiten des Verfügbarkeitsstatus ein
                    include '../scripts/admin-setAvailability.php';

                    // the script prevents that the availability data gets changed again with the refresh of the page
                    echo '
                        <script type="text/javascript">
                        $(document).ready(function(){
                                var uri = window.location.toString();
                                if (uri.indexOf("?") > 0) {
                                    var clean_uri = uri.substring(0, uri.indexOf("?")) + "?req=Avail#topAnchor";
                                    window.history.replaceState({}, document.title, clean_uri);
                                }
                        });
                        </script>
                    ';

                } 
                else if($givenRequest == "Prop"){

                    echo'
                        <h2 id="topProperties">Merkmal &auml;ndern</h2>
                    ';
                    // Fügt script zum Erzeugen des Sortiment-Tables ein für die Merkmale
                    include '../scripts/admin-loadSortTableProperties.php';

                } else if($givenRequest == "Taste"){

                    echo'
                        <h2 id="topTaste">Geschmack &auml;ndern</h2>
                    ';
                    // Fügt script zum Erzeugen des Sortiment-Tables ein für den Geschmack
                    include '../scripts/admin-loadSortTableTaste.php';

                } else if($givenRequest == "Del"){
                    echo'
                        <h2 id="topDel">Eintrag l&ouml;schen</h2>
                    ';
                    // Fügt script zum Löschen des Sortiment-Tables ein 
                    include '../scripts/admin-loadSortTableDelete.php';

                } else if($givenRequest == "Add"){
                    echo'
                        <h2 id="topAdd">Eintrag hinzuf&uuml;gen</h2>
                    ';
                    // Fügt script zum Löschen des Sortiment-Tables ein 
                    include '../scripts/admin-loadSortTableCreate.php';

                    // the script prevents that the availability data gets changed again with the refresh of the page
                    echo '
                        <script type="text/javascript">
                        $(document).ready(function(){
                                var uri = window.location.toString();
                                if (uri.indexOf("?") > 0) {
                                    var clean_uri = uri.substring(0, uri.indexOf("?")) + "?req=Add#topAnchor";
                                    window.history.replaceState({}, document.title, clean_uri);
                                }
                        });
                        </script>
                    ';

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