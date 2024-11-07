<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wynik zamówienia</title>
</head>
<body>
<h2>Wybrane języki:</h2>
<?php
if (isset($_POST['jezyki'])) {
    echo "Wybrane tutoriale:";
    foreach ($_POST['jezyki'] as $jezyk) {
        echo " " . $jezyk, " ";
    }
} else {
    echo "<p>Nie wybrano żadnych tutoriali.</p>";
}
echo "<br>Wybrany sposób płatności: ";
if (isset($_POST['payment'])) {
    $payment = $_POST['payment'];
    echo $payment . "<br>";
}
$surname = $_POST['surname'];
$age = $_POST['age'];
$email = $_POST['email'];
$country = $_POST['country'];
if ($surname && $age && $email && $country) {
    print("<p><a href = 'klient.php?nazwisko=$surname&wiek=$age&email=$email&panstwo=$country'>");
    print("informaje konktaktowe</a>");
} else echo "dane zamawiającego nie są kompletne";
echo "<p><a href = '/formularz.php'>" . "Powrót do formularza" . "</a>"
?>

</body>
</html>
