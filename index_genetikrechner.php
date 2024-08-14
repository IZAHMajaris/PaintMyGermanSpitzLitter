<!DOCTYPE html>
<html lang="de">
<head>
    <title>Paint My German Spitz Litter</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.png">
    <link rel="stylesheet" href="styles.css">
    <script>
            // document.addEventListener('contextmenu',function(e){e.preventDefault();e.stopPropagation();});
            // document.addEventListener('copy',function(e){e.preventDefault();e.stopPropagation();});
            // document.addEventListener('cut',function(e){e.preventDefault();e.stopPropagation();});
    </script>
</head>
<body>
<?php
    include 'Ausgabe.php';
    use Ausgabe\Ausgabe;

    $a = new Ausgabe();
    $a->showContent();
?>
<hr>
<br>
<div class="ImpresssumButton"><button onclick="showImpressum()">Impressum</button><button onclick="showDatenschutz()">Datenschutz</button></div>
<script>
    function showImpressum() {
        alert("Content Erstellung & Pflege: M.Sc. Dorit Wittig, Wenzel-Verner-Str. 71, 09120 Chemnitz, info@mittelspitz-chemnitz.de");
    }
    function showDatenschutz() {
        alert("© Copyright 2024 - Dorit Wittig,  Alle Inhalte diese Webseite, insbesondere Texte, Fotografien und Grafiken, sind urheberrechtlich geschützt. Das Urheberrecht liegt, soweit nicht ausdrücklich anders gekennzeichnet, bei Dorit Wittig. Bitte fragen Sie Mich, falls Sie die Inhalte dieses Internetangebotes verwenden möchten.");
    }
</script>
</body>
</html>
