<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Round {{ $round }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-warning text-white text-center">
                        <h4>Round {{ $round }}: Select Winners</h4>
                    </div>
                    <div class="card-body">
                        <form action="/select-winners" method="POST">
                            @csrf
                            <input type="hidden" name="round" value="{{ $round }}">

                            <!-- Select Winners -->
                            <div class="mb-3">
                                <label class="form-label">Select {{ $requiredWinners }} Winners:</label>
                                <div class="form-check">
                                    @foreach($teams as $team)
                                        <input class="form-check-input" type="checkbox" name="winners[]" value="{{ $team->id }}" id="team{{ $team->id }}">
                                        <label class="form-check-label" for="team{{ $team->id }}">{{ $team->name }}</label><br>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Wild Card Entry (For Round 3) -->
                            @if($wildCardEntry)
                                <div class="mb-3">
                                    <label class="form-label">Add Wild Card Teams:</label>
                                    @for($i = 1; $i <= 2; $i++)
                                        <input type="text" class="form-control mb-2" name="wild_card_teams[]" placeholder="Wild Card Team {{ $i }}">
                                    @endfor
                                </div>
                            @endif

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Next</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
