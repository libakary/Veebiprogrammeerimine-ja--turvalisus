<?php

echo "Ülesanne 0102: <br>

Järgnevas ülesandes tohib kasutada vaid IF tingimust ja FOR tsükklit. 
Kuvada ühe FOR tsükkliga välja järgmine arvude jada järgmisel kujul: <br>

-11
-10
-9
-8
-7
-6
-5
-4
-3
3
4
5
6
7
8
9
10<br>";

echo "Lahendus: <br>";
for ($i=-11; $i<11; $i++) {
    if ($i < -2 || $i > 2)
        echo "$i<br>";
}