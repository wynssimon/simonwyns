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
            $email_subject = "$voornaam $familienaam sent you an email";
            $email_body = "Naam: $familienaam $voornaam\n";
            $email_body .= "Email: $email\n";
            $email_body .= "Telefoonnummer: $nummer\n";
            $email_body .= "Bericht: $bericht\n";

            // Set content-type header for sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";
            $headers .= "From: <$email>" . "\r\n";

            // Send the email
            if (mail($recipient_email, $email_subject, $email_body, $headers)) {
                echo "<p>Uw email werd succesvol verstuurd. Ik doe mijn best zo snel mogelijk te antwoorden.</p>";
            } else {
                echo "<p>Fout bij het versturen van de email, probeer opnieuw.</p>";
            }
        } else {
            die("Invalid request");
        }
        ?></main>

    </main>
    <footer>
      <p>© 2023, all rights reserved</p>
    </footer>
  </body>
</html>

