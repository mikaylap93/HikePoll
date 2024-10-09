<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Hike</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

    <!-- Styles -->
    <style>

    </style>
</head>

<body>
    <form method="POST" action="{{ route('hikes.save') }}">
        @csrf
        <div>
            <div>
                <label> Hike Name </label>
                <input name="hike_name" type=text></input>
            </div>
            <div>
                <label> Miles </label>
                <input name="miles" type=number step="0.1"></input>
            </div>
            <div>
                <label> Steepness </label>
                <input name="steepness" type=range></input>
            </div>
            <div>
                <label>Would Reccomend</label>
                <input name="would_recommend" type=checkbox></input>
            </div>
            <div>
                <input type=submit value="Submit"></input>
            </div>
            <footer>
                Mikayla Bloomquist 2024
            </footer>
        </div>
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script></script>

</html>
