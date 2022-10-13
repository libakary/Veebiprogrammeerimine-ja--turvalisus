<?php

echo "Ülesanne 0105:<br>

Kuvada kahe FOR tsükkliga välja järgmine arvude jada järgmisel kujul:<br>

10,-10
10,-9
10,-8
10,-7
10,-6
10,-5
10,-4
10,-3
10,-2
10,-1
10,0
10,1
10,2
10,3
10,4
10,5
10,6
10,7
10,8
10,9
10,10
9,-10
9,-9
... jne. kuni
-10,10<br>";

echo "Lahendus: <br>";
for ($j=10; $j<(-10); $j+=1) {
    for ($i=(-10);$i<10;$i+=1) {
        echo "$j,$i<br>";
    }
}