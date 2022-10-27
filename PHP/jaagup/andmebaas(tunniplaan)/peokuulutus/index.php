<?php
require ("../dbConfig.php"); //logib tunnipla kasutajaga sisse
global $yhendus;

//kontrollida andmeid
//kontrollime kas kõik väljad on täidetud
if (isset($_REQUEST["fname"],$_REQUEST["lname"],$_REQUEST["email"]))
    {
        $kask = $yhendus->prepare("INSERT INTO `peolised` (`eesnimi`, `perenimi`, `epost`) VALUES (?, ?, ?)");
        $kask->bind_param("sss", $_REQUEST["fname"], $_REQUEST["lname"], $_REQUEST["email"]);
        $kask->execute();
        // saame sundida brauseri oma asukohta muuta/suunamine
        header("Location: $_SERVER[PHP_SELF]?message=Registered");
        //ühendus kinni
        $yhendus->close();
        exit();
    }

?>

<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peokuulutus</title>
</head>
<body>
<h1>Suur pidu!</h1>
<h2>Olete kutsutud!</h2>

<?php if (isset($_REQUEST["message"])) { ?>
    <h3 style="background:beige">Olete registreeritud :)</h3>
<?php } else { ?>
    <h3>Palun registreeri oma andmed:</h3>

<form>
    <label for="fname">Eesnimi:</label><br>
    <input type="text" id="fname" name="fname"><br>
    <label for="lname">Perenimi:</label><br>
    <input type="text" id="lname" name="lname"><br>
    <label for="lname">E-post:</label><br>
    <input type="text" id="email" name="email"><br>
    <input type="submit" value="Registreeri"><br>
</form>
<?php } ?>

</body>
</html>
