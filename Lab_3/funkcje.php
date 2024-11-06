<?php
function dodaj()
{
    $dane = "";
    if (isset($_REQUEST["nazw"])) {
        $dane .= htmlspecialchars($_REQUEST['nazw']) . " ";
    }
}

function pokaz()
{
//odczytaj wszystkie dane z pliku i wyświetl wierszami...
}

function pokaz_zamowienie($tut)
{
//odczytaj dane z pliku i wyświetl tylko te wiersze,
//w których zamówiono tutorial $tut (np. $tut="Java")
}

//Skrypt właściwy do obsługi akcji (żądań):
if (isset($_REQUEST["submit"])) { //jeśli kliknięto przycisk o name=submit
    $akcja = $_REQUEST["submit"]; //odczytaj jego value
    switch ($akcja) {
        case "Zapisz":
            dodaj();
            break;
        case "Pokaż":
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
        //pozostałe przypadki
    }
}

