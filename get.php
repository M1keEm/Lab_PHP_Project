<div>
    <h2>Dane odebrane z formularza:</h2>
    <?php
    if (isset($_REQUEST['surname']) && ($_REQUEST['surname'] != "")) {
        $surname = htmlspecialchars(trim($_REQUEST['surname']));
        echo "Nazwisko: $surname <br />";
    } else echo "Nie wpisano nazwiska <br />";

    if(isset($_REQUEST['age']) && ($_REQUEST['age'] != "")) {
        $age = htmlspecialchars(trim($_REQUEST['age']));
        echo "Wiek: $age <br />";
    } else echo "Nie wpisano wieku <br />";


    ?>
</div>