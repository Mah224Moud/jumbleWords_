<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A la quête des différents mélanges possible d'un mot? Vous êtes bien au bon endroit !!! Entrer le mot que vous souhaitez mélanger et le nombre de differents mots que vous souhaiter obtenir suivant la taille du mot.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>JumbleWords</title>
</head>


<body class="bg-dark text-white">
    <div class="container mt-3">
        <div class="p-3 bg-info bg-opacity-10 border border-danger rounded">
            <h1 class="text-center display-5">Bienvenue sur jumble words</h1>

        </div>
        <p class="text-center mt-2">A la quête des différents mélanges possible d'un mot?<br>
            Vous êtes bien au bon endroit !!! <br>
            Entrer le mot que vous souhaitez mélanger et le nombre de differents mots que vous souhaiter obtenir suivant la taille du mot.
        </p>

    </div>


    <div class="container text-center mt-5 mb-3">
        <form action="" method="post">
            <div>
                <label for="">Nombre de mots à afficher</label>
                <input class="rounded text-center bg-secondary w-20" type="number" name="numberOfwords" value="<?= $_POST['numberOfwords'] ?? '5' ?>" min="5" max="50">
            </div>
            <input class="w-50 rounded bg-dark text-white text-center m-2" type="text" placeholder="Entrez un mot" name="word" value="<?= $_POST['word'] ?? '' ?>" required><br>
            <input type="submit" value="Générer" class="m-1 btn btn-outline-danger w-25">
        </form>
    </div>



    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        $word = $_POST['word'];
        $wordSize = strlen($word);
        $list = [];
        $colors = ['primary', 'success', 'warning', 'primary', 'info', 'danger', 'light'];

        $numberOfwords = $_POST['numberOfwords'];

        //echo $colors[rand(0, count($colors) - 1)];
        if (!empty($word)) {
            for ($i = 0; $i < $numberOfwords; $i++) {

                $shuffle = str_shuffle($word);
                if ($i == 0)
                    array_push($list, $shuffle);
                else
                    if (!in_array($shuffle, $list))
                    array_push($list, $shuffle);
            }
        }
    }
    ?>

    <?php if (($_SERVER["REQUEST_METHOD"] == "POST") and (!empty($word))) : ?>
        <div class=" container shadow p-3 mb-5 bg-dark rounded d-flex flex-wrap justify-content-center align-items-center">
            <?php foreach ($list as $listElement) : ?>

                <span class="btn btn-outline-<?= $colors[rand(0, count($colors) - 1)] ?> rounded bg-opacity-10 border border-<?= $colors[rand(0, count($colors) - 1)] ?>  m-2 p-2 ">
                    <?= $listElement ?>
                </span>
            <?php endforeach ?>
        </div>

        <footer class="mt-5 shadow border-top border-danger rounded">
            <?php
            include("./Parsedown.php");
            $Parsedown = new Parsedown();
            $Parsedown->setSafeMode(true);
            ?>
            <div class="m-4 mt-4 mb-2 social-medias-title ">
                <h2><?= $Parsedown->text("Réseaux sociaux") ?></h2>
            </div>
            <div class="mt-1 mb-2 d-flex flex-wrap justify-content-around">
                <div>
                    <span>
                        <?= $Parsedown->text("[![linkedin](https://img.shields.io/badge/nous_joindre_sur_linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/mamoudou-diallo-528020199/)") ?>
                    </span>
                </div>

                <div>
                    <span>
                        <?= $Parsedown->text("[![discord](https://img.shields.io/badge/nous_joindre_sur_discord-blueviolet?style=for-the-badge&logo=discord&logoColor=white)](https://discord.gg/p3fFTTHTqF)") ?>
                    </span>
                </div>

                <div>
                    <span class="">
                        <?= $Parsedown->text("[![github](https://img.shields.io/badge/voir_sur_github-black?style=for-the-badge&logo=github&logoColor=white)](https://github.com/Mah224Moud)") ?>
                    </span>
                </div>
            </div>
            <div class="mt-2 mb-2 d-flex flex-wrap justify-content-around">
                <span>
                    © Unknow 2022 by Mamoudou
                </span>
            </div>

        </footer>

    <?php else : ?>
        <footer class="mt-5 fixed-bottom shadow border-top border-danger rounded">
            <?php
            include("./Parsedown.php");
            $Parsedown = new Parsedown();
            $Parsedown->setSafeMode(true);
            ?>
            <div class="m-4 mt-4 mb-2 social-medias-title ">
                <h2><?= $Parsedown->text("Réseaux sociaux") ?></h2>
            </div>
            <div class="mt-1 mb-2 d-flex flex-wrap justify-content-around">
                <div>
                    <span>
                        <?= $Parsedown->text("[![linkedin](https://img.shields.io/badge/nous_joindre_sur_linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/mamoudou-diallo-528020199/)") ?>
                    </span>
                </div>

                <div>
                    <span>
                        <?= $Parsedown->text("[![discord](https://img.shields.io/badge/nous_joindre_sur_discord-blueviolet?style=for-the-badge&logo=discord&logoColor=white)](https://discord.gg/p3fFTTHTqF)") ?>
                    </span>
                </div>

                <div>
                    <span class="">
                        <?= $Parsedown->text("[![github](https://img.shields.io/badge/voir_sur_github-black?style=for-the-badge&logo=github&logoColor=white)](https://github.com/Mah224Moud)") ?>
                    </span>
                </div>
            </div>
            <div class="mt-2 mb-2 d-flex flex-wrap justify-content-around">
                <span>
                    © Unknow 2022 by Mamoudou
                </span>
            </div>

        </footer>
    <?php endif ?>



</body>

</html>

<?php

?>