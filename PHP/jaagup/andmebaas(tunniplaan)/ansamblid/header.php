<?php
// eemalda urlist muutujad
function clearVarsExcept($url, $varname)
{
return strtok($url, "?") . "?$varname=" . $_REQUEST[$varname];
}
?>

<!doctype html>
<html lang="et">
<head>
    <title>Ansamblid</title>
    <link rel="stylesheet" href="stiil.css" type="text/css"/>
</head>
<body>