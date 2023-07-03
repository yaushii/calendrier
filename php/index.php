<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/calendar.css">
</head>

<body>

    <nav class="navbar navbar-dark bg-primary mb-3">
        <a href="/index.php" class="navbar-brand">Calendrier Apprenti</a>
    </nav>

    <?php
    require '../src/date/month.php';
    /* <?php try {

        $month = new App\Date\Month($_GET['month'] ?? null, $_GET['year'] ?? null);
    } catch (\Exception $e) {
        $month = new App\Date\Month();
    } ?>*/

    $month = new App\Date\Month($_GET['month'] ?? null, $_GET['year'] ?? null); 
$day = $month->getStartDay()->modify('last monday');
?>


    <h1><?= $month->toString(); ?></h1>

  

    <table class ="calendarTable calendarTable--<?= $month->getWeeks(); ?>weeks">
        <?php
        for ($i = 0; $i < $month->getWeeks(); $i++) { ?>
            <tr>
                <td>Lundi<br>
                <?= $day->format('d') ?>
            </td>

                <td>Mardi</td>
                <td>Mercredi</td>
                <td>Jeudi</td>
                <td>Vendredi</td>
                <td>Samedi</td>
                <td>Dimanche</td>
            </tr>
        <?php } ?>





    </table>



</body>

</html>