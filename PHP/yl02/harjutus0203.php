<?php

echo "Ülesanne 0203: <br>

Lisa käsitsi massiivi 10 näitleja nime kasutades massiivi array funktsiooni. 
Väljasta see 'for' tsükkliga.<br>";

$naitlejad = array("Malmsten","Ever","Avandi","Sepp","Seeman","Hunt","Kasearu","Kiisk","Raudsepp","Baskin");

echo "Massiiv: <br>";
for ($i=0,$count=count($naitlejad);$i<$count;$i++) {
    echo $naitlejad[$i] . "<br>";
}