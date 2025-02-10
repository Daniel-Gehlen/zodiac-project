<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Signo</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include 'layouts/header.php'; ?>
    <div class="container">
        <h1 class="mt-5">Seu Signo</h1>
        <?php
        if (isset($_GET['birthdate'])) {
            $birthdate = new DateTime($_GET['birthdate']);
            $signo = getSigno($birthdate);
            $signoInfo = getSignoInfo($signo);

            echo "<div class='card mt-3'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>{$signoInfo->nome}</h5>";
            echo "<p class='card-text'>{$signoInfo->descricao}</p>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "<p>Data de nascimento não fornecida.</p>";
        }

        function getSigno($birthdate) {
            $day = (int)$birthdate->format('d');
            $month = (int)$birthdate->format('m');

            if (($month == 3 && $day >= 21) || ($month == 4 && $day <= 19)) {
                return 'aries';
            } elseif (($month == 4 && $day >= 20) || ($month == 5 && $day <= 20)) {
                return 'touro';
            } elseif (($month == 5 && $day >= 21) || ($month == 6 && $day <= 20)) {
                return 'gemeos';
            } elseif (($month == 6 && $day >= 21) || ($month == 7 && $day <= 22)) {
                return 'cancer';
            } elseif (($month == 7 && $day >= 23) || ($month == 8 && $day <= 22)) {
                return 'leao';
            } elseif (($month == 8 && $day >= 23) || ($month == 9 && $day <= 22)) {
                return 'virgem';
            } elseif (($month == 9 && $day >= 23) || ($month == 10 && $day <= 22)) {
                return 'libra';
            } elseif (($month == 10 && $day >= 23) || ($month == 11 && $day <= 21)) {
                return 'escorpiao';
            } elseif (($month == 11 && $day >= 22) || ($month == 12 && $day <= 21)) {
                return 'sagitario';
            } elseif (($month == 12 && $day >= 22) || ($month == 1 && $day <= 19)) {
                return 'capricornio';
            } elseif (($month == 1 && $day >= 20) || ($month == 2 && $day <= 18)) {
                return 'aquario';
            } elseif (($month == 2 && $day >= 19) || ($month == 3 && $day <= 20)) {
                return 'peixes';
            }
        }

        function getSignoInfo($signo) {
            $xml = simplexml_load_file('data/signos.xml');
            foreach ($xml->signo as $s) {
                if ((string)$s->id == $signo) {
                    return $s;
                }
            }
            return null;
        }
        ?>
    </div>
</body>
</html>
