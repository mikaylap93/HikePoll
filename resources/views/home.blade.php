<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hike Poll App</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/">

</head>

<body>
    <div class="button-container">
        <div class="title">Welcome to Hike Poll</div>
        <button class=hike-button onclick="location.href='{{ route('hikes.allHikes') }}'">All Hikes</button>
        <button class=hike-button onclick="location.href='{{ route('hikes.createNew') }}'">New Hike</button>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".title").fadeIn(2000);
        $(".hike-button").css("opacity", 0);
        $(".hike-button").fadeTo(2000, 1);
    })
</script>

<style>
    html,
    body {
        height: 100%;
        margin: 0;
        background-color: #BAC9CE;
        font-family: 'Open Sans', Sans;
        text-align: center;
    }

    .title {
        font-size: 72px;
        margin-bottom: 24px;
        display: none;
        color: #323637;
    }

    .hike-button {
        padding: 15px 30px;
        margin: 10px;
        background-color: #16537e;
        color: #FFFFFF;
        border: none;
        display: inline-block;
    }

    .hike-button:hover {
        background-color: #0B293F;
    }

    .button-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }
</style>

</html>
