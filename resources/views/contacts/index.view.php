<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="MVC: Building a Personal Framework">
    <link rel="shortcut icon" href="http://<?= $_SERVER['SERVER_NAME'] ?>/img/new-php-logo.svg" type="image/svg+xml">
    <meta name="google" content="notranslate" />
    <title><?= $title ?></title>
    <link rel="stylesheet" href="http://<?= $_SERVER['SERVER_NAME'] ?>/css/main.css">
</head>

<body>
    <h1><?= $description ?></h1>
    <ul>
        <?php foreach ($contacts as $contact) : ?>
            <li>
                <a href="/contacts/<?= $contact['id'] ?>">
                    <?= $contact['name'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>