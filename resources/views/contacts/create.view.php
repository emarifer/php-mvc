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
    <link rel="stylesheet" href="/css/output.css">
</head>

<body>
    <header>
        <h1 class="text-center text-3xl font-bold mt-36">
            <?= $description ?>
        </h1>
    </header>

    <main>
        <form class="m-16 w-fit md:w-[400px] mx-auto bg-zinc-800 p-8 rounded-xl flex flex-col gap-3" action="/contacts" method="post">
            <label class="text-violet-500" for="name">Name:</label>
            <input class="rounded-md focus:outline-none focus:ring focus:ring-blue-400 w-56 md:w-full text-xl px-4 py-2 bg-slate-700" type="text" name="name" id="name" required autofocus>

            <label class="text-violet-500" for="email">Email:</label>
            <input class="rounded-md focus:outline-none focus:ring focus:ring-blue-400 w-56 md:w-full text-xl px-4 py-2 bg-slate-700" type="email" name="email" id="email" required>

            <label class="text-violet-500" for="phone">Phone:</label>
            <input class="rounded-md focus:outline-none focus:ring focus:ring-blue-400 w-56 md:w-full text-xl px-4 py-2 bg-slate-700" type="tel" pattern="[0-9]{3} [0-9]{2} [0-9]{2} [0-9]{2}" name="phone" id="phone" placeholder="123 45 67 89" required>
            <!-- https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/tel -->

            <div>
                <input class="bg-sky-600 hover:bg-sky-400 rounded-md text-xl px-4 py-2" type="submit" value="Create">
            </div>
        </form>
    </main>

    <footer class="w-fit md:w-[400px] mx-auto text-indigo-600">
        <a class="flex gap-4" href="/contacts">
            <img class="w-5" src="/img/go-to-back-icon.svg" alt="go to back icon">

            Back to contact list
        </a>
    </footer>

</body>

</html>