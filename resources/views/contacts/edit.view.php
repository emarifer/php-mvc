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

    <form action="/contacts/<?= $contact['id'] ?>" method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?= $contact['name'] ?>" autofocus>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= $contact['email'] ?>">
        </div>

        <div>
            <label for="phone">Phone:</label>
            <input type="tel" pattern="[0-9]{3} [0-9]{2} [0-9]{2} [0-9]{2}" name="phone" id="phone" placeholder="123 45 67 89" value="<?= $contact['phone'] ?>">
        </div>

        <div>
            <input type="submit" value="Update">
        </div>
    </form>

    <br><br><br>

    <a href="/contacts/<?= $contact['id'] ?>">
        <img width="24" height="24" src="/img/go-to-back-icon.svg" alt="go to back icon">

        Back to contact details
    </a>
</body>

</html>

<!-- https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/tel -->