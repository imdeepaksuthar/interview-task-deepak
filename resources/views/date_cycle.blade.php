<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Fonts -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wild Tiger</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
       .output {
            color: green;
            font-size: 30px;
            text-align: center;
       }
    </style>
</head>
<body>
    <h1 class="text-center pt-4">Get Second and Fourth Saturdays of a Custom Year Cycle</h1>
    <div class="container table-responsive py-5">
        <!-- Display success message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display validation error messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('processYearCycle') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="date" class="form-label">Select Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @if(isset($saturdays))
        <div>
            <h3 class="mt-4">Second and Fourth Saturdays:</h3>
            <ul>
                @foreach($saturdays as $saturday)
                    <li>{{ $saturday }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</body>
</html>
