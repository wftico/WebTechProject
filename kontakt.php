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

    <header id="header">
    </header>

    <!-- index Display gets loaded as react component in ./transformed/ImageDisplay/imageDisplayContact.js -->
    <div id="contactImageDisplay"></div>

    <!-- main content section -->
    <div class="wrapper">

        <!-- Top section before the actual form -->
        <div class="col-12">
            <h1>Fragen, W&uuml;nsche oder Anregungen?</h1>
            <h2>Treten Sie mit uns in Kontakt!</h2>
            <p>
                Aus welchen Gr&uuml;nden Sie sich auch immer an uns wenden m&ouml;chten, wir bem&uuml;hen uns Ihre Anfragen schnellstm&ouml;glich zu bearbeiten.
                Wenn Sie Produkte gerne bei uns im Direktverkauf erwerben m&ouml;chten, ist ein vorheriger Anruf nat&uuml;rlich sehr praktisch um sicher zu gehen,
                dass wir auch da sind. Wenn Sie sich gerne etwas per Post zuschicken lassen wollen, schreiben Sie uns doch einfach eine kurze eMail oder nutzen
                unser Kontaktformular.<br /><br />
                Sie erreichen uns schriftlich, telefonisch oder per E-Mail.<br />
            </p>
        </div>

        <!-- Form PHP Script -->
        <?php
        // define variables and set to empty values
        $nameErr = $emailErr = $topicErr = $msgErr = "";
        $name = $email = $topic = $msg = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Sie müssen einen Namen eingeben.";
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Es sind nur Leerzeichen und Buchstaben erlaubt."; 
            }
        }
        
        if (empty($_POST["email"])) {
            $emailErr = "Sie müssen eine E-Mail angeben.";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Ihre E-Mail hat ein falsches Format."; 
            }
        }
            
        if (empty($_POST["topic"])) {
            $topicErr = "Sie müssen einen Betreff eingeben.";
        } else {
            $topic = test_input($_POST["topic"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$topic)) {
            $topicErr = "Es sind nur Leerzeichen und Buchstaben erlaubt."; 
            }
        }

        if (empty($_POST["message"])) {
            $msg = "";
        } else {
            $msg = test_input($_POST["message"]);
        }
        }

        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

        // send email - currenty it seems even if entries were wrong
        mail("wfsona@yahoo.de",$topic,$msg);
        ?>

        <!-- Form Section -->
        <div class="col-12" id="kontakt-top-border"></div>
            <div class="col-12 background-yellow form-headlines yBox-spacerTop">
                <!-- content eg divs have to have "margin-zero" class if they are close to the top or bottom yellow border. Otherwise Gap -->
                <!-- the col-3 serve as spacers to the side -->
                <div class="col-2"></div>
                <div class="col-8">
                    <!-- start of the form -->
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal">
                        <fieldset>
                            <legend>Ihre Kontaktdaten</legend>
                
                            <label>Name:<br> <input name="name" type="text" class="form-input" size="50" /></label>
                            <!-- error name -->
                            <br />
                            <span class="form-error"><?php echo $nameErr;?></span>
                            <br />
                            <label>E-Mail Adresse:<br> <input name="mail" type="email" class="form-input" size="50" /></label>
                            <!-- error adress -->
                            <br />
                            <span class="form-error"><?php echo $emailErr;?></span>
                            <br />
                
                        </fieldset>
                        <fieldset>
                            <legend>Nachricht</legend>
                
                            <label>Betreff:<br> <input name="topic" type="text" class="form-input" size="50" /></label>
                            <!-- error betreff-->
                            <br />
                            <span class="form-error"><?php echo $topicErr;?></span>
                            <br />
                            <label>Nachricht:<br> <textarea name="message" class="textarea-sizeForce form-input" cols="90" rows="10"></textarea></label>
                            <!-- error message -->
                            <br />
                            <span class="form-error"><?php echo $msgErr;?></span>
                            <br />
                
                        </fieldset>
                        <p>
                            <input type="submit" name="submit" value="Absenden" class="form-button" id="formClicked">
                        </p>
                    </form>
                <!-- div col-6 end -->
                </div>
                <div class="col-2"></div>
            <!-- col-12 end -->    
            </div>
        <div class="col-12" id="kontakt-bottom-border"></div>
        <!-- wrapper end -->
    </div>
    <!-- Form Section end -->

    <footer id="footer">
    </footer>

    <!-- Load React. -->
    <!-- Note: when deploying, replace "development.js" with "production.min.js". -->
    <script src="./js/react/react.production-min.js"></script>
    <script src="./js/react-dom/react-dom.production-min.js"></script>

    <!-- Load React components. -->
    <script src="./transformed/footer.js"></script>
    <script src="./transformed/header.js"></script>
    <script src="./transformed//ImageDisplay/imageDisplayContact.js"></script>

</body>

</html>