<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>{{ $team->name }}</title>
    </head>
    <body>
        <div class="container text-center p-5">
            <div class="h5">Ini adalah halaman detail dari <span class="fw-bold">{{ $team->name }}</span> yang memiliki <span class="fw-bold">{{ $team->coins }}</span> coins</div>
        </div>
    </body>
</html>