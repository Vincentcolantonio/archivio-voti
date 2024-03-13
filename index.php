<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light-subtle">
    <?php 
    $nomeErr = false;
    $votoErr = false;
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nome = $_POST["nomeAlunno"];
        $materia = $_POST["materia"];
        $voto = intval($_POST["voto"]);
        if (strlen($nome) >= 30 || str_contains($nome, ";")) {
            $nomeErr = true;
        } else if ($voto > 10 || $voto < 1) {
            $votoErr = true;
        } else {
            $fileHandle = fopen("voti.csv", "a");
            //Sanificazione dei dati
            $nome = htmlspecialchars(basename(trim($nome)));
            fwrite($fileHandle, $nome.";".$materia.";".$voto."\n");
            fclose($fileHandle);
        }
    }
    ?>
    <div class="container w-50 h-50">
        <div class="row">
            <div class="col gy-5">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="row g-3">
                    <label for="nomeAlunno" class="form-label">Nome Alunno</label>
                    <input class="form-control" type="text" name="nomeAlunno" id="nomeAlunno" required/>
                    <span class="text-danger"><?php if ($nomeErr) echo "Immetti un nome valido"; else echo "";?></span>
                    <div class="col">
                        <label for="materia" class="form-label">Materia</label>
                        <select name="materia" id="materia" class="form-control">
                            <option value="TPSIT">TPSIT</option>
                            <option value="Sistemi e Reti">Sistemi e Reti</option>
                            <option value="Informatica">Informatica</option>
                            <option value="Italiano">Italiano</option>
                            <option value="Storia">Storia</option>
                            <option value="Matematica">Matematica</option>
                            <option value="Scienze Motorie">Scienze Motorie</option>
                            <option value="Inglese">Inglese</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="voto" class="form-label">Voto</label>
                        <input class="form-control" type="number" name="voto" id="voto" required/>
                        <span class="text-danger"><?php if ($votoErr) echo "Seleziona un voto"; else echo ""; ?></span>
                    </div>
                    <button class="btn btn-primary" type="submit">SALVA</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col gy-3">
                <a class="m-0" href="lista.php"><button class="w-100 btn btn-secondary">VISUALIZZA VOTI</button></a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>