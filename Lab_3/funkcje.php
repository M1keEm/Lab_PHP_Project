<?php
function dodaj()
{
    $dane = "";
    if (isset($_REQUEST["surname"])) {
        $dane .= htmlspecialchars($_REQUEST['surname']) . " ";
    }
    if (isset($_REQUEST["age"])) {
        $dane .= htmlspecialchars($_REQUEST['age']) . " ";
    }
    if (isset($_REQUEST["country"])) {
        $dane .= htmlspecialchars($_REQUEST['country']) . " ";
    }
    if (isset($_REQUEST["email"])) {
        $dane .= htmlspecialchars($_REQUEST['email']) . " ";
    }
    if (isset($_REQUEST['jezyki'])) {
        $dane .= " " . join(", ", $_REQUEST['jezyki']);
    } else {
        $dane .= " " . "nie wybrano żadnego tutoriala ";
    }
    if (isset($_REQUEST['payment'])) {
        $dane .= " " . $_REQUEST['payment'] . " ";
    }
    $dane .= "\n";
    $file = fopen("dane.txt", "a");
    fwrite($file, $dane);
    fclose($file);
}

function pokaz()
{
    $wp = fopen("dane.txt", "r");
    $tablica = file("dane.txt");
    for ($i = 0; $i < count($tablica); $i++) {
        echo $tablica[$i] . "<br>";
    }
    fclose($wp);
//odczytaj wszystkie dane z pliku i wyświetl wierszami...
}

function pokaz_zamowienie($tut)
{
    $wp = fopen("dane.txt", "r");
    $tablica = file("dane.txt");
    for ($i = 0; $i < count($tablica); $i++) {
        if (str_contains($tablica[$i], $tut)) {
            echo $tablica[$i] . "<br>";
        }
    }
    fclose($wp);
//odczytaj dane z pliku i wyświetl tylko te wiersze,
//w których zamówiono tutorial $tut (np. $tut="Java")
}

//Skrypt właściwy do obsługi akcji (żądań):
if (isset($_REQUEST["submit"])) { //jeśli kliknięto przycisk o name=submit
    $akcja = $_REQUEST["submit"]; //odczytaj jego value
    switch ($akcja) {
        case "Save":
            dodaj();
            break;
        case "Show":
            pokaz();
            break;
        case "Java":
            pokaz_zamowienie("Java");
            break;
        case "CPP":
            pokaz_zamowienie("CPP");
            break;
        case "PHP":
            pokaz_zamowienie("PHP");
            break;
        case "Statystyki":
            statystyki();
            break;
    }
}

function statystyki()
{
    $fileName = "dane.txt";
    if (!file_exists($fileName)) {
        echo "Brak danych w pliku.";
        return;
    }

    $totalOrders = 0;
    $under18 = 0;
    $above49 = 0;

    $file = fopen($fileName, "r");
    while (($line = fgets($file)) !== false) {
        $totalOrders++;
        $fields = explode(" ", trim($line));
        if (isset($fields[1])) { // Wiek znajduje się w 2. polu wiersza
            $age = (int)$fields[1];
            if ($age < 18) {
                $under18++;
            }
            if ($age >= 50) {
                $above49++;
            }
        }
    }
    fclose($file);

    echo "<p>Liczba wszystkich zamówień: $totalOrders</p>";
    echo "<p>Liczba zamówień od osób w wieku < 18 lat: $under18</p>";
    echo "<p>Liczba zamówień od osób w wieku >= 50 lat: $above49</p>";
}
