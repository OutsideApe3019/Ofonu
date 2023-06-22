<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $exception->getMessage() }}</title>
</head>

<body>
    <div class="mx-auto w-1/2 mt-20 shadow-xl p-3 rounded-md">
        <div class="pb-2 border-rose-600 border-b-2">
            <p class="font-medium text-center text-2xl break-all">Exception: <span class="font-bold">{{ $exception->getMessage() }}</span> in <span class="font-bold">{{ $exception->getFile() }}</span> at line <span class="font-bold">{{ $exception->getLine() }}</span></p>
        </div>
    </div>
</body>

</html>