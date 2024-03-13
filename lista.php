<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container w-50">
        <div class="row">
            <div class="col gy-5">
                <table class="table table-light table-striped text-center">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Materia</th>
                            <th>Voto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $fileHandle = fopen("voti.csv", "r");
                        if (filesize("voti.csv") > 0) {
                            while (!feof($fileHandle)) {
                                $riga = explode(";", fgets($fileHandle));
                                echo "<tr><td>".$riga[0]."</td>";
                                echo "<td>".$riga[1]."</td>";
                                echo "<td>".$riga[2]."</td></tr>";
                            }
                        } else {
                            $empty = true;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col"><a href="index.php"><button class="btn btn-secondary">INSERISCI VOTO</button></a></div>
            <span class="text-danger"><?php if ($empty) echo "Prima di visualizzare, riempire l'archivio";?></span>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>