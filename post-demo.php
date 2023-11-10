<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post resultaat</title>
  <link rel="stylesheet" href="./styles/style.css" />
  <link rel="shortcut icon" href="./img/portfolio.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
</head>
<body>
  <h1>Je post data</h1>
  <p>Normaal sla je die op in een databank of verstuur je ze in een e-mail, maar als demo ben ik gewoon een echo.</p>
  <pre>
<?php
echo
'Voornaam: ' . htmlspecialchars($_POST["Voornaam"]) . "\n" .
'Familienaam: ' . htmlspecialchars($_POST["Familienaam"]) . "\n" .
'E-mail: ' . htmlspecialchars($_POST["E-mail"]) . "\n" .
'Nummer: ' . htmlspecialchars($_POST["Nummer"]) . "\n" .
'Vraag: ' . htmlspecialchars($_POST["Vraag"]) . "\n";
?>
  </pre>
</body>
</html>
