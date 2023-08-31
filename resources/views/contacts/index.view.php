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
        <h1 class="text-center text-3xl font-bold mt-36 mb-6">
            <?= $description ?>
        </h1>
    </header>

    <main class="pl-32">
        <div class="w-[600px]">
            <a class="flex gap-3 text-indigo-600 font-medium" href="/contacts/create">
                Create Contact
                <img class="w-5" src="/img/create-contact-icon.svg" alt="create contact icon">
            </a>

            <ul class="list-disc pl-8 my-6">
                <?php foreach ($contacts['data'] as $contact) : ?>
                    <li class="text-amber-700 hover:text-amber-500">
                        <a href="/contacts/<?= $contact['id'] ?>">
                            <?= $contact['name'] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <!-- Pagination: https://tailwindui.com/components/application-ui/navigation/pagination -->
            <div class="mt-16 flex items-center justify-between border-t border-gray-200 bg-slate-600 px-4 py-3 sm:px-6 rounded-lg">
                <div class="flex flex-1 justify-between sm:hidden">
                    <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                    <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
                </div>
                <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-200">
                            Showing
                            <span class="font-medium">
                                <?= $contacts['from'] ?>
                            </span>
                            to
                            <span class="font-medium">
                                <?= $contacts['to'] ?>
                            </span>
                            of
                            <span class="font-medium">
                                <?= $contacts['total'] ?>
                            </span>
                            results
                        </p>
                    </div>
                    <div>
                        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                            <!-- go back button -->
                            <a href="<?= $contacts['prev_page_url'] ?>" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                </svg>
                            </a>

                            <!-- pagination links -->
                            <?php for ($i = 1; $i <= $contacts['last_page']; $i++) : ?>
                                <a href="/contacts?page=<?= $i ?>" class="<?= $contacts['current_page'] === $i ? 'relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600' : 'relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0' ?> ">
                                    <?= $i ?>
                                </a>
                            <?php endfor; ?>
                            <!-- <a href="#" aria-current="page" class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">1</a> -->
                            <!-- <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a> -->

                            <!-- go forward button -->
                            <a href="<?= $contacts['next_page_url'] ?>" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </main>
</body>

</html>