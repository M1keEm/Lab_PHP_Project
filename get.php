<div>
    <h2>Dane odebrane z formularza:</h2>
    <?php
    $countryNames = [
        'pl' => 'Polska',
        'de' => 'Niemcy',
        'fr' => 'Francja'
    ];

    if (isset($_REQUEST['surname']) && ($_REQUEST['surname'] != "")) {
        $surname = htmlspecialchars(trim($_REQUEST['surname']));
        echo "Nazwisko: $surname <br />";
    } else echo "Nie wpisano nazwiska <br />";

    if (isset($_REQUEST['name']) && ($_REQUEST['name'] != "")) {
        $name = htmlspecialchars(trim($_REQUEST['name']));
        echo "Imię: $name <br />";
    } else echo "Nie wpisano imienia <br />";

    if (isset($_REQUEST['age']) && ($_REQUEST['age'] != "")) {
        $age = htmlspecialchars(trim($_REQUEST['age']));
        echo "Wiek: $age <br />";
    } else echo "Nie wpisano wieku <br />";

    if (isset($_REQUEST['country']) && ($_REQUEST['country'] != "")) {
        $countryCode = htmlspecialchars(trim($_REQUEST['country']));
        $country = isset($countryNames[$countryCode]) ? $countryNames[$countryCode] : 'Nieznany kraj';
        echo "Kraj: $country <br />";
    } else echo "Nie wpisano kraju <br />";

    if (isset($_REQUEST['email']) && ($_REQUEST['email'] != "")) {
        $email = htmlspecialchars(trim($_REQUEST['email']));
        echo "Email: $email <br />";
    } else echo "Nie wpisano emaila <br />";



    ?>
</div>