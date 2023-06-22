<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $code }}</title>
</head>

<body>
    <div class="mx-auto w-1/2 mt-20 shadow-xl p-3 rounded-md">
        <div class="pb-2 border-rose-600 border-b-2">
            <h1 class="text-center font-semibold text-3xl">{{ $code }}</h1>
            <h5 class="text-center font-medium text-2xl">{{ $message }}</h5>
        </div>
    </div>
</body>

</html>