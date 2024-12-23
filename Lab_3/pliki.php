<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Formularz zamówienia</title>
</head>
<body>
<h2>Formularz zamówienia</h2>
<form action="pliki.php" method="POST">
    <label for="surname">Nazwisko:</label>
    <input type="text" id="surname" name="surname"><br><br>

    <label for="age">Wiek:</label>
    <input type="number" id="age" name="age"><br><br>

    <label for="country">Państwo:</label>
    <select id="country" name="country">
        <option value="Polska">Polska</option>
        <option value="Niemcy">Niemcy</option>
        <option value="Anglia">Anglia</option>
    </select><br><br>

    <label for="email">Adres e-mail:</label>
    <input type="email" id="email" name="email"><br><br>

    <p>Zamawiam tutorial z języka:</p>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $jezyki = ["C", "CPP", "Java", "C#", "HTML", "CSS", "XML", "PHP", "JavaScript"];
    foreach ($jezyki as $jezyk) {
        echo "<input type='checkbox' name='jezyki[]' value='$jezyk'> $jezyk";
    }
    ?>

    <p>Sposób zapłaty:</p>
    <input type="radio" name="payment" value="eurocard" checked> Eurocard<br>
    <input type="radio" name="payment" value="visa"> Visa<br>
    <input type="radio" name="payment" value="przelew bankowy"> Przelew bankowy<br><br>

    <input type="reset" name="submit" value="Clear">
    <input type="submit" name="submit" value="Save">
    <input type="submit" name="submit" value="Show">
    <input type="submit" name="submit" value="PHP">
    <input type="submit" name="submit" value="CPP">
    <input type="submit" name="submit" value="Java">
    <input type="submit" name="submit" value="Statystyki">
    <br>
    <?php
    include_once "funkcje.php";
    ?>
</form>
</body>
</html>