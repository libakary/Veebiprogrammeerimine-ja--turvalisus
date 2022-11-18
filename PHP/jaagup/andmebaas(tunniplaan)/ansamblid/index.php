<?php
require("../dbConfig.php");

?>
<!doctype html>
<html lang="et">
<head>
    <title>Ansamblid</title>
    <link rel="stylesheet" href="stiil.css" type="text/css"/>
</head>
<body>
<?php
include "header.php";
include "navigatsioon.php";

if (isset($_REQUEST['page'])) {
    include $_REQUEST['page'] . ".php";
} else {
    include "avaleht.php";
}

include "footer.php";
?>
</body>
</html>
<?php
if (isset($yhendus)) {
    $yhendus->close();
}
?>