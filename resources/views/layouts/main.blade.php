<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMKN 7 Batam</title>

    @vite('resources/css/app.css')

    <style>
        input {
            caret-color: #fff;
        }
    </style>
</head>

<body>
    <div class="w-screen h-screen bg-[#1E1E1E] overflow-hidden">
        <div class="relative rounded mx-auto bg-[#242421] w-[376px] h-[790px] text-white overflow-hidden">
            @yield('content-box')
        </div>
    </div>

    <script src="https://kit.fontawesome.com/ef4cce5f3f.js" crossorigin="anonymous"></script>
</body>

</html>
