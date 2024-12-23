<?php
// Tablica technologii ze skryptu do zadania 4.3.
$tech = ["C", "CPP", "Java", "C#", "Html", "CSS", "XML", "PHP", "JavaScript"];
$fileName = "ankieta.txt";

// Inicjalizacja pliku, jeśli nie istnieje
if (!file_exists($fileName)) {
    $file = fopen($fileName, "w");
    foreach ($tech as $t) {
        fwrite($file, "$t:0\n");
    }
    fclose($file);
}

// Funkcja odczytująca dane z pliku
function getVotes($fileName): array
{
    $votes = [];
    $file = fopen($fileName, "r");
    while (($line = fgets($file)) !== false) { // Odczytaj plik wiersz po wierszu, jeśli wystąpi błąd przerwij
        list($language, $count) = explode(":", trim($line)); // podziel wiersz na język i liczbę głosów, usuwając białe znaki
        $votes[$language] = (int)$count; // zapisz liczbę głosów jako liczbę całkowitą
    }
    fclose($file);
    return $votes; // zwróć tablicę z wynikami
}

// Funkcja zapisywania danych do pliku
function saveVotes($fileName, $votes): void
{
    $file = fopen($fileName, "w");
    foreach ($votes as $language => $count) {
        fwrite($file, "$language:$count\n");
    }
    fclose($file);
}

// Przetwarzanie formularza
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $votes = getVotes($fileName); // Odczytaj głosy z pliku
    foreach ($tech as $t) {
        if (isset($_POST[$t])) { // Jeśli technologia została zaznaczona
            $votes[$t]++; // Zwiększ liczbę głosów
        }
    }
    saveVotes($fileName, $votes); // Nadpisz głosy w pliku
    header("Location: ankieta.php"); // Przekieruj na stronę ankiety, aby uniknąć ponownego przesłania formularza
    exit(); // Unikamy niechcianych efektów dalszego wykonywania skryptu
}

// Wyświetlanie wyników
$votes = getVotes($fileName);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Ankieta</title>
</head>
<body>
<h2>Wybierz technologie, które znasz:</h2>
<form method="post">
    <?php foreach ($tech as $t): ?>
        <label>
            <input type="checkbox" name="<?= $t ?>"> <?= $t ?> <!-- ?= zmienna ? jest równoznaczne z <php echo zmienna -->
        </label><br>
    <?php endforeach; ?>
    <button type="submit">Wyślij</button>
</form>

<h2>Wyniki ankiety:</h2>
<ul>
    <?php foreach ($votes as $language => $count): ?>
        <li><?= $language ?>: <?= $count ?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>
