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
        <svg enable-background="new 0 0 32 32" version="1.1" viewBox="0 0 32 32" fill="#ecfeff" width="24px" height="24px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Glyph_NP_no_words">
                <polygon points="12.824,23.357 8.6,19.133 8.244,22.711 9.146,23.614  " />
                <rect height="1.032" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -7.3948 16.5152)" width="11.558" x="10.459" y="16.668" />
                <rect height="1.032" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -6.7998 15.0787)" width="11.558" x="9.023" y="15.232" />
                <rect height="1.031" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -6.2048 13.6422)" width="11.558" x="7.586" y="13.795" />
                <path d="M16,32c8.837,0,16-7.163,16-16c0-8.837-7.163-16-16-16S0,7.163,0,16C0,24.837,7.163,32,16,32z M7.727,17.805L19.055,6.477   c0.751-0.75,1.976-0.749,2.728,0.002l3.724,3.725c0.752,0.752,0.753,1.976,0.002,2.727L14.174,24.264l-6.182,0.433l-0.865-0.864   L7.727,17.805z" />
                <path d="M24.801,12.223c0.361-0.361,0.36-0.95-0.002-1.312l-3.724-3.725c-0.362-0.362-0.951-0.361-1.313-0.002l-1.262,1.262   l5.039,5.039L24.801,12.223z" />
                <rect height="1.032" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -7.9899 17.9518)" width="11.558" x="11.896" y="18.105" />
            </g>
        </svg>
    </a>

    <p><span>Name:</span> <?= $contact['name'] ?></p>
    <p><span>Email:</span> <?= $contact['email'] ?></p>
    <p><span>Phone:</span> <?= $contact['phone'] ?></p>

    <form action="/contacts/<?= $contact['id'] ?>/delete" method="post">
        <label>
            <svg fill="#ecfeff" width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.755,20.283,4,8H20L18.245,20.283A2,2,0,0,1,16.265,22H7.735A2,2,0,0,1,5.755,20.283ZM21,4H16V3a1,1,0,0,0-1-1H9A1,1,0,0,0,8,3V4H3A1,1,0,0,0,3,6H21a1,1,0,0,0,0-2Z" />
            </svg>

            <input type="submit" value="Delete">
        </label>
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