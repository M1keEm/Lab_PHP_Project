<?php

if (isset($_POST['zapisz']) && $_POST['zapisz'] == 'Zapisz' && !isset($_GET['pic'])) {
    if (is_uploaded_file($_FILES['zdjecie']['tmp_name'])) {
        $typ = $_FILES['zdjecie']['type'];
        if ($typ == "image/jpeg") {
            mkdir("./Miniatury", 777, true);
            mkdir("./Zdjecia", 777, true);
            move_uploaded_file($_FILES['zdjecie']['tmp_name'], "./Zdjecia/" . $_FILES['zdjecie']['name']);
            $link = $_FILES['zdjecie']['name'];
            $random = uniqid('IMG_'); //wygenerowanie losowej wartości
            $zdj = "./Zdjecia/" . $random . '.jpg';
            copy('./Zdjecia/' . $link, $zdj); //utworzenie kopii zdjęcia

            $dlugosc = strlen($link);
            $dlugosc -= 4;
            $link = substr($link, 0, $dlugosc);
            echo "link=$link <br/>";
            header('location:zdjecia.php?pic=' . $link);

            list($width, $height) = getimagesize($zdj); //pobranie rozmiarów obrazu
            $wys = $_POST['wys']; //wysokość preferowana przez użytkownika
            $szer = $_POST['szer']; //szerokość preferowana przez użytkownika
            $skalaWys = 1;
            $skalaSzer = 1;
            $skala = 1;
            if ($width > $szer) $skalaSzer = $szer / $width;
            if ($height > $wys) $skalaWys = $wys / $height;
            if ($skalaWys <= $skalaSzer) $skala = $skalaWys;
            else $skala = $skalaSzer;
            //ustalenie rozmiarów miniaturki tworzonego zdjęcia:
            $newH = $height * $skala;
            $newW = $width * $skala;

            header('Content-Type: image/jpeg');
            $nowe = imagecreatetruecolor($newW, $newH); //czarny obraz
            $obraz = imagecreatefromjpeg($zdj);
            imagecopyresampled($nowe, $obraz, 0, 0, 0, 0,
                $newW, $newH, $width, $height);
            imagejpeg($nowe, './Miniatury/mini-' . $link . ".jpg", 100);

            echo "nowe=./mini-$link <br>";
            imagedestroy($nowe);
            imagedestroy($obraz);
            unlink($zdj);


        } else {
            header('location:zdjecia.html');
        }
    }
}
if (isset($_GET['pic']) && !empty($_GET['pic']))
    echo '<p>Galeria:</p>';
$sciezkaMiniatury = './Miniatury/';
if (is_dir($sciezkaMiniatury)) {
    $pliki = array_diff(scandir($sciezkaMiniatury), array('.', '..'));
    foreach ($pliki as $plik) {
        echo '<a href="./Zdjecia/' . str_replace('mini-', '', $plik) . '">';
        echo '<img src="' . $sciezkaMiniatury . $plik . '" alt="Miniatura" style="margin: 10px; width: 150px; height: auto;">';
        echo '</a>';
    }
}
echo '<br/><a href="zdjecia.html">Powrot do formularza</a>';


?>