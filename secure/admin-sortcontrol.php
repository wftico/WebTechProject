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

            <!-- Fügt Script zum Erzeugen des Sortiment-Tables ein für die Verfügbarkeit -->
            <?php include '../scripts/admin-loadSortTable.php'; ?>

            <!-- Fügt script zum Bearbeiten des Verfügbarkeitsstatus ein -->
            <?php include '../scripts/admin-setAvailability.php'; ?>
            
            <h2 id="topProperties">Sortiment Merkmale</h2>
            <p>Passen Sie die Merkmale des Sortiments an.</p>

             <!-- Fügt Script zum Erzeugen des Sortiment-Tables ein für die Merkmale -->
             <?php include '../scripts/admin-loadSortTableProperties.php'; ?>
            

            <!-- script fixes the issue, that a page reload actually performed the PHP script again (get) 
            The Script removes the query string, except the #topAnchor part -->


            <script type="text/javascript">
                $(document).ready(function(){

                    function cleanURIProperty(){
                        var uri = window.location.toString();
                        if (uri.indexOf("?") > 0) {
                            var clean_uri = uri.substring(0, uri.indexOf("?")) + "#topProperties";
                            window.history.replaceState({}, document.title, clean_uri);
                        }
                    }

                    function clearURIAvailability(){
                        var uri = window.location.toString();
                        if (uri.indexOf("?") > 0) {
                            var clean_uri = uri.substring(0, uri.indexOf("?")) + "#topAnchor";
                            window.history.replaceState({}, document.title, clean_uri);
                        }
                    }

                });
            </script>
            
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