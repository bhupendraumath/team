<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-success text-white text-center">
                        <h4>We Have a Winner!</h4>
                    </div>
                    <div class="card-body text-center">
                        <h1 class="display-4">{{ $winner->name }}</h1>
                        <p class="text-muted">Congratulations to the winning team!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
