<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Equipment</title>
    </head>
    <body>
        <div class="container w-50">
            <p class="h5 fw-bold text-center my-4">Equipment bertipe {{ $equipmentType->id }}. {{ $equipmentType->name }}</p>

            <table class="table table-dark table-hover" style="margin: auto">
                <thead>
                    <tr>
                        <th scope="col" class="ps-4">#</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Buy Price</th>
                        <th scope="col" class="text-center">Sell Price</th>
                        <th scope="col" class="text-center">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($equipmentType->equipments as $e)
                    <tr>
                        <th scope="row" class="ps-4">{{ $e->id }}</th>
                        <td class="text-center">{{ $e->name }}</td>
                        <td class="text-center">{{ $e->buy_price }}</td>
                        <td class="text-center">{{ $e->sell_price }}</td>
                        <td class="text-center">{{ $e->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>