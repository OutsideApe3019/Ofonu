<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $app }} | {{ $title }}</title>
</head>
<body class="bg-neutral-100">
    <div class="mx-auto w-5/6 mt-20">
        <p class="text-center font-semibold text-3xl">
            {{ $text }}
        </p>
        <div class="mx-auto grid grid-rows-1 grid-cols-1 mt-10">
            <a href="https://github.com/OutsideApe3019/Ofonu" class="bg-neutral-200 p-5 rounded-[15px] border-2 border-neutral-300 text-center" target="_blank">
                Github
            </a>
        </div>
    </div>
</body>
</html>