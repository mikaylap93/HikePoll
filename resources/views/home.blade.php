<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hike Poll App</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

    <!-- Styles -->
    <style>

    </style>
</head>

<body>
    <div class="button-container">
        <h1>Welcome to Hike Poll</h1>
        <button class=hike-button onclick="location.href='{{ route('hikes.allHikes') }}'">All Hikes</button>
        <button class=hike-button onclick="location.href='{{ route('hikes.createNew') }}'">New Hike</button>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script></script>

<style>
    .hike-button {
        padding: 15px 30px;
        margin: 10px;
        background-color: #16537e;
        color: #FFFFFF;
        border: none;
    }

    .hike-button:hover {
        background-color: #0B293F;
    }
</style>

</html>
