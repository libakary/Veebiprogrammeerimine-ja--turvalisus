<!doctype html>
<html>
<head>
    <title>Arvutamine</title>
</head>

<body>
<h1>Tollikalkulaator</h1>
<form action="?" method="get"> Monitori diagonaal tollides:
    <input type="text" name="tollid" />
    <input type="submit" value="OK" />
</form>

<?php
if(empty($_REQUEST["tollid"])){
    echo "Ootan sisestust.";
} else {
    echo $_REQUEST["tollid"]." tolli on ".
        ($_REQUEST["tollid"]*2.54)." cm.";
}
?>

<form action="?" method="post"> Laual on mitu sentimeetrit ruumi:
    <input type="text" name="sentimeetrid" />
    <input type="submit" value="OK" />
</form>

<?php
    if (empty($_REQUEST["sentimeetrid"])) {
        echo "Ootan sisestust";
    }
    else {
        echo $_REQUEST["sentimeetrid"] . " cm on " . ($_REQUEST["sentimeetrid"] / 2.54) . " tolli.";
    }
?>

</body>
</html>