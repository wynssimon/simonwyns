<!DOCTYPE html>
<!--wynssimon.be-->
<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simon Wyns</title>
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="./styles/home.css" />
    <link rel="shortcut icon" href="./img/portfolio.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <script defer src="./scripts/hamburger.js"></script>
  </head>
  <body>
    <header>
      <nav class="socials">
        <ul>
          <li>
            <a href="https://www.linkedin.com/in/simonwyns/" target="_blank">
              <img src="./img/linkedin.png" alt="linkedin" />
            </a>
          </li>
          <li>
            <a href="https://www.youtube.com/@simonwyns" target="_blank">
              <img src="./img/youtube.png" alt="youtube" />
            </a>
          </li>
          <li>
            <a href="https://www.instagram.com/simon.wyns/" target="_blank">
              <img src="./img/instagram.png" alt="instagram" />
            </a>
          </li>
          <li>
            <a href="https://github.com/wynssimon" target="_blank">
              <img src="./img/github.png" alt="github" />
            </a>
          </li>
        </ul>
      </nav>
      <a id="titel" href="https://wynssimon.be"
        ><h1>Simon <span>Wyns</span></h1></a
      >
      <img onclick="hamb()" id="hamburger" src="./img/hamburger.png" />
      <script></script>
      <nav class="navigatie">
        <ul>
          <li><a class="nounderline" href="./index.html">Home</a></li>
          <li>
            <a class="nonunderline" href="./pages/overmij.html">Over mij</a>
          </li>
          <li>
            <a class="nonunderline" href="./pages/projecten.html">Projecten</a>
          </li>
          <li>
            <a class="nonunderline" href="./pages/werkplekleren.html"
              >Werkplekleren</a
            >
          </li>
        </ul>
      </nav>
    </header>
    <main id="homeBlock">
    <?php
        // Define the recipient email address
        $recipient_email = "wynssimonw@gmail.com";

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Collect and sanitize input
            $voornaam = filter_input(INPUT_POST, 'voornaam', FILTER_SANITIZE_STRING);
            $familienaam = filter_input(INPUT_POST, 'familienaam', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $nummer = filter_input(INPUT_POST, 'nummer', FILTER_SANITIZE_NUMBER_INT);
            $bericht = filter_input(INPUT_POST, 'bericht', FILTER_SANITIZE_STRING);

            // Validate inputs
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                die("Invalid email format");
            }

            // Prepare email content
            $email_subject = "$voornaam $familienaam stuurde je zonet een email";
            $email_body = "Naam: $familienaam $voornaam\n";
            $email_body .= "Email: $email\n";
            $email_body .= "Telefoonnummer: $nummer\n\n";
            $email_body .= "$bericht\n";

            // Set content-type header for sending HTML email
            //MIME-Version: 1.0: MIME staat voor Multipurpose Internet Mail Extensions en is een standaard die is ontworpen om verschillende soorten gegevens (tekst, afbeeldingen, audio, video, enz.) in e-mailberichten mogelijk te maken. De MIME-Version-header geeft aan welke versie van de MIME-standaard wordt gebruikt. Hier is het "1.0".
            $headers = "MIME-Version: 1.0" . "\r\n";
            //dit specificeert het type inhoud en de tekenset van de e-mail. Dit zorgt dat de inhoud als platte tekst behandeld wordt
            $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";
            //hier wordt de afzender van de mail ingesteld. \r wordt gebruikt om de cursor terug naar het begin van de regel te verplaatsen
            $headers .= "From: <$email>" . "\r\n";

            // Send the email
            if (mail($recipient_email, $email_subject, $email_body, $headers)) {
                echo "<p>Uw email werd succesvol verstuurd. Ik doe mijn best zo snel mogelijk te antwoorden.</p>";
            } else {
                echo "<p>Fout bij het versturen van de email, probeer opnieuw.</p>";
            }
              // Prepare email content for the sender (copy)
            $copy_subject = "Kopie van uw bericht aan Simon Wyns";
            $copy_body = "Hieronder ziet u een kopie van uw bericht aan Simon\n\n\n";
            $copy_body .= "Naam: $familienaam $voornaam\n";
            $copy_body .= "Email: $email\n";
            $copy_body .= "Telefoonnummer: $nummer\n\n";
            $copy_body .= "$bericht\n\n";
            $copy_body .= "Bedankt voor uw bericht. Ik probeer zo snel mogelijk te antwoorden.";

            // Set content-type header for sending HTML email
            $copy_headers = "MIME-Version: 1.0" . "\r\n";
            $copy_headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";
            $copy_headers .= "From: <$recipient_email>" . "\r\n";


            mail($email, $copy_subject, $copy_body, $copy_headers);
        } else {
            die("Invalid request");
        }
        ?></main>

    </main>
  </body>
</html>

