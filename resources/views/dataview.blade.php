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
</head>
<body>
    <h1 class="text-center pt-4">MySql Query Result</h1>
    @isset($results)
    <div class="container table-responsive py-5">
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                @php
                    $array = (array) $results[0];                    ;
                @endphp
                @foreach($array as $key => $value)
                    <th scope="col">{{ $key }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
                @foreach ($results as $key=>$item)
                    <tr>
                    <td>{{ $key+1 }}</td>
                    @foreach ((array) $item as $k=>$itemnew)
                            <td>{{ $item->$k }}</td>
                    @endforeach
                    </tr>
                @endforeach
        </tbody>
    </table>
    </div>
    @endisset


    @isset($resultsTwo)
        <div class="container table-responsive py-5">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    @php
                        $array = (array) $resultsTwo[0];                    ;
                    @endphp
                    @foreach($array as $key => $value)
                        <th scope="col">{{ $key }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                    @foreach ($resultsTwo as $key=>$item)
                        <tr>
                        <td>{{ $key+1 }}</td>
                        @foreach ((array) $item as $k=>$itemnew)
                                <td>{{ $item->$k }}</td>
                        @endforeach
                        </tr>
                    @endforeach
            </tbody>
        </table>
        </div>
    @endisset

<p class="text-center">Here is the data retrieved from the database in table format.</p>

</body>
</html>
