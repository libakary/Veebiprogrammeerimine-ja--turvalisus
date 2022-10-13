<?php

echo "Ülesanne 0202<br>

Lisa käsitsi massiivi 10 looma nime kasutades massiivi kohanäitu. Nt. $ mas[0]='karu' jne.
Väljasta see 'foreach' tsükkliga.<br>";

$mas = array();
$mas[0]="karu";
$mas[1]="hunt";
$mas[2]="põder";
$mas[3]="hirv";
$mas[4]="jänes";
$mas[5]="rebane";
$mas[6]="kährik";
$mas[7]="siil";
$mas[8]="rähn";
$mas[9]="vanemuine";

echo "Massiiv: <br>";
foreach ($mas as $value) {
    echo "$value<br>";

}