<!
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Vorm</title>
</head>
<body>

<pre>
Ülesanne 0404:

Tee vorm &lt;form> tagiga kangelase andmete sisestamiseks.
    Pange kogu vorm ka tabelisse.
    Paigutage lahtrite kirjelduse esimesse veergu ja lahtrid teise veergu.

Nimi (&lt;input type=text>)
Klass (&lt;select>, &lt;options>)
Rass (&lt;select>, &lt;options>)
Sugu (&lt;input type=radio>)
Lemmikloom kaasas (&lt;input type=checkbox>)
Kirjeldus (&lt;textarea>&lt;/textarea>)
Submit nupp &lt;input type=submit>
Vorm kinni.
</pre>
<form>
    <label for="nimi">Nimi:</label><br>
    <input type=text><br>

    <label for="klass">Klass:</label><br>
    <select id="klass">
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="esimene">Esimene kursus</option>
        <option value="teine">Teine kursus</option>
    </select><br>

    <label for="maailmajagu">Sünnikoht:</label><br>
    <select id="maailmajagu">
        <option value="aafrika">Aafrika</option>
        <option value="aasia">Aasia</option>
        <option value="ameerikaN">Põhja-Ameerika</option>
        <option value="ameerikaS">Lõuna-Ameerika</option>
        <option value="austraalia">Austraalia ja Okeaania</option>
        <option value="euroopa">Euroopa</option>
    </select><br>

    <label for="sugu">Sugu:</label><br>
        <input type=radio id="naine" name="sugu" value="NAINE">
        <label for="naine">Naine</label><br>
        <input type=radio id="mees" name="sugu" value="MEES">
        <label for="mees">Mees</label><br>
        <input type=radio id="mittebinaarne" name="sugu" value="MITTEBINAARNE">
        <label for="mittebinaarne">Mittebinaarne</label><br>
        <input type=radio id="ei" name="sugu" value="EI">
        <label for="ei">Ei soovi avaldada</label><br>

    <label for="lemmikloom">Lemmikloom kaasas:</label>
    <input type=checkbox><br>

    <label for="kirjeldus">Kirjeldus:</label><br>
    <textarea></textarea><br>

    <input type=submit><br>
</form>

</body>
</html>

