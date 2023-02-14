<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
</head>

<body>
    <div class="max-w-lg mx-auto p-4">
        <h2 class="text-center my-4 text-3xl">formulaire d'inscription</h2>

        <form action="">
            <div class="mb-3">
                <label for="email" class="block">Email</label>
                <input class="mt-1 rounded-lg w-full" type="text" name="email" id="email">
            </div>
            <div>
                <label for="password" class="block">Password</label>
                <input class="mt-1 rounded-lg w-full" type="password" name="password" id="password">
            </div>
            <button class=" mt-4 bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-800 duration-200">S'inscrire</button>
        </form>

    </div>
</body>

</html>