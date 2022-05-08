<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Equipment Transaction</title>
    </head>
    <body>
        <div class="container w-50">
            <div class="h4 my-4">Equipment Transaction</div>

            <form action="{{ route('process-transaction') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="select-team" class="form-label">Team</label>
                    <select class="form-select mb-3" name="select_team" id="select-team" required>
                        <option selected disabled>-- Select Team --</option>
                        @foreach($team as $t)
                            <option value="{{ $t->id }}">{{ $t->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="select-equipment" class="form-label">Equipment</label>
                    <select class="form-select mb-3" name="select_equipment" id="select-equipment" required>
                        <option selected disabled>-- Select Equipment --</option>
                        @foreach($equipment as $e)
                            <option value="{{ $e->id }}">{{ $e->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="select-transaction" class="form-label">Transaction Type</label>
                    <select class="form-select" name="select_transaction" id="select-transaction" required>
                        <option selected disabled>-- Select Transaction Type --</option>
                        <option value="buy">Buy</option>
                        <option value="sell">Sell</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" class="form-control" id="amount" min="1" value="1" name="amount" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-bold">Submit</button>
            </form>

            @if(session('status'))
                <div class="alert alert-success mt-3">
                    {{ session('status') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger mt-3">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </body>
</html>