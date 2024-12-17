<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teams</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Add Teams</h4>
                    </div>
                    <div class="card-body">
                        <form action="/add-teams" method="POST">
                            @csrf
                            @for($i = 1; $i <= 8; $i++)
                                <div class="mb-3">
                                    <label for="team{{ $i }}" class="form-label">Team {{ $i }}</label>
                                    <input type="text" class="form-control" id="team{{ $i }}" name="teams[]" required>
                                </div>
                            @endfor
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">Next</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
