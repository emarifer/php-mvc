<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="MVC: Building a Personal Framework">
    <link rel="shortcut icon" href="/img/new-php-logo.svg" type="image/svg+xml">
    <meta name="google" content="notranslate" />
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <h1><?= $description ?></h1>

    <a href="/contacts/<?= $contact['id'] ?>/edit">
        Edit Contact
        <img width="24" height="24" src="/img/edit-contact-icon.svg" alt="edit contact icon">

    </a>

    <p><span>Name:</span> <?= $contact['name'] ?></p>
    <p><span>Email:</span> <?= $contact['email'] ?></p>
    <p><span>Phone:</span> <?= $contact['phone'] ?></p>

    <form action="/contacts/<?= $contact['id'] ?>/delete" method="post">
        <label>
            <img width="24" height="24" src="/img/delete-contact-icon.svg" alt="delete contact icon">

            <input type="submit" value="Delete">
        </label>
    </form>

    <br><br><br>

    <a href="/contacts">
        <img width="24" height="24" src="/img/go-to-back-icon.svg" alt="go to back icon">

        Back to contact list
    </a>
</body>

</html>