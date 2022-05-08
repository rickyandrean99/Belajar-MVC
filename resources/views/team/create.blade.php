<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Create New Team</title>
    </head>
    <body>
        <div class="container w-50 pt-5">
            <a href="/team" class="btn btn-dark fw-bold mb-5"><- Back</a>

            <form action="{{ route('team.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="team-name" class="form-label">Team name</label>
                    <input type="text" class="form-control" id="team-name" placeholder="Input new team.." name="team_name">
                </div>
                <div class="mb-3">
                    <label for="team-coins" class="form-label">Coins amount</label>
                    <input type="number" class="form-control" id="team-coins" min="0" value="0" name="team_coin">
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-bold">Submit</button>
            </form>

            @if(session('status'))
                <div class="alert alert-success mt-3">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </body>
</html>