<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Team List</title>
    </head>
    <body>
        <div class="container w-50">
            <div class="w-100 text-end mt-5 mb-3">
                <a href="{{ route('team.create') }}" class="btn btn-sm btn-success fw-bold">+ New Team</a>
            </div>

            <table class="table table-dark table-hover" style="margin: auto">
                <thead>
                    <tr>
                        <th scope="col" class="ps-4">#</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Coins</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($team as $t)
                    <tr>
                        <th scope="row" class="ps-4">{{ $t->id }}</th>
                        <td class="text-center">{{ $t->name }}</td>
                        <td class="text-center">{{ $t->coins }}</td>
                        <td class="text-center">
                            <a href="{{ route('team.show', ['team' => $t->id]) }}" class="btn btn-sm btn-primary">Detail</a>
                            <a href="{{ route('team.edit', ['team' => $t->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('team.destroy', ['team' => $t->id]) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if(session('status'))
                <div class="alert alert-success mt-3">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </body>
</html>