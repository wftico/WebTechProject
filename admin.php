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
    <div id="indexImageDisplay"></div>


    <!-- main content section -->
    <div class="wrapper">
        <div class="col-12">
            <h1>Admin</h1>
            <h2>Manage das Sortiment</h2>
            <p>Entsprechende Honigsorten können hinzugefügt oder aber auch gelöscht werden.
            </p>
            <button onclick="myFunction()">Entferne Himbeerhonig</button>
        </div>

        <!-- REACT TEST -->
        <div id="like_button_container"></div>
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
    <script src="./transformed/ImageDisplay/imageDisplayIndex.js"></script>

</body>

</html>