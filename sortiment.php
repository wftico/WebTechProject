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
            <h1>Hobby-Imkerei in Berlin-L&uuml;bars</h1>
            <h2>Herzlich willkommen auf unserer Website ...</h2>
            <p>auf welcher wir Ihnen gerne unsere Imkerei N&auml;herbringen m&ouml;chten. Sie finden hier Ank&uuml;ndigungen rund um unsere Imkerei, falls wir z. B. wieder einmal auf einem Markt anzutreffen sind und unseren naturbelassenen Honig anbieten.
                Hierf&uuml;r empfehlen wir Ihnen aber auch, uns bei Twitter zu folgen. So werden sie stets informiert, wann und wo wir anzutreffen sind.
                <br /><br /> Sie erfahren hier mehr &uuml;ber uns, was uns zur Imkerei gebracht hat und was uns beim Imkern wichtig ist. Und wenn es etwas gibt, was Sie interessiert aber hier nicht finden, k&ouml;nnen Sie uns gerne eine Nachricht schreiben.
                <br /><br /> Der Verkauf unseres Honigs findet unter anderem im Direktverkauf an unserer Haust&uuml;r in Berlin-L&uuml;bars statt. Die flei&szlig;igen Bienen fliegen meist im Tegeler Forst, Fließtal, und in L&uuml;bars sowie Heiligensee.
                St&ouml;bern Sie ganz bequem in unserem Sortiment und &uuml;berzeugen Sie sich selbst von unserem Honig.
                <br /><br /> Viel Spaß!
            </p>
        </div>

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