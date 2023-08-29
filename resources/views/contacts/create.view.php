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

    <form action="/contacts" method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required autofocus>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div>
            <label for="phone">Phone:</label>
            <input type="tel" pattern="[0-9]{3} [0-9]{2} [0-9]{2} [0-9]{2}" name="phone" id="phone" placeholder="123 45 67 89" required>
            <!-- https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/tel -->
        </div>

        <div>
            <input type="submit" value="Create">
        </div>
    </form>

    <br><br><br>

    <a href="/contacts">
        <svg fill="#ecfeff" height="24px" width="24px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve">
            <path id="XMLID_6_" d="M165,0C74.019,0,0,74.019,0,165s74.019,165,165,165s165-74.019,165-165S255.981,0,165,0z M205.606,234.394
c5.858,5.857,5.858,15.355,0,21.213C202.678,258.535,198.839,260,195,260s-7.678-1.464-10.606-4.394l-80-79.998
c-2.813-2.813-4.394-6.628-4.394-10.606c0-3.978,1.58-7.794,4.394-10.607l80-80.002c5.857-5.858,15.355-5.858,21.213,0
c5.858,5.857,5.858,15.355,0,21.213l-69.393,69.396L205.606,234.394z" />
        </svg>

        Back to contact list
    </a>
</body>

</html>