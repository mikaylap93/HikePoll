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
    <div class=home-button-container>
        <button class='home-button'> <- Home </button>
    </div>
    <div class=title>
        All Hikes
    </div>
    <div id='hike-list' class='hike-list-container'></div>
    <div id="hike-details">
        <hr>
        <br>
        <div class="detail-title">Hike Details</div>
        <p class="hike-label">Name: <span id="hike-name-data"></span></p>
        <p class="hike-label">Steepness: <span id="hike-steepness-data"></span></p>
        <p class="hike-label">Miles: <span id="hike-miles-data"></span></p>
        <p class="hike-label">Recommend: <span id="hike-recommend-data"></span></p>
        <p class="hike-label">Difficulty: <span id="hike-difficulty-data"></span></p>
    </div>
</body>
<footer class=footer>
    Mikayla Bloomquist 2024
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('hikes.getAll') }}",
            method: 'GET',
            success: function(data) {
                let hikesContainer = $('#hike-list');
                hikesContainer.hide();
                $.each(data,
                    function(index, hike) {
                        hikesContainer.append(
                            '<div><button class=hike-button data-id="' +
                            hike
                            .id + '">' + hike.name +
                            '</button></div>');
                    });

                hikesContainer.fadeIn(1000);
                $('.hike-button').on('click', function() {
                    let hikeId = $(this).data('id');
                    getHikeDetail(hikeId);
                });

                $('.home-button').on('click', function() {
                    window.location.href = "{{ route('hikes.home') }}";
                })
            }
        })
    });

    function getHikeDetail(hikeId) {

        $.ajax({
            url: "/hikes/detail/" + hikeId,
            method: 'GET',
            success: function(data) {
                $('#hike-name-data').hide().text(data.name).fadeIn(1000);
                $('#hike-steepness-data').hide().text(data.steepness).fadeIn(1000);;
                $('#hike-miles-data').hide().text(data.miles).fadeIn(1000);;
                $('#hike-recommend-data').hide().text((data.recommend ? 'Yes' : 'No')).fadeIn(
                    1000);
                $('#hike-difficulty-data').hide().text((data.difficulty.name)).fadeIn(1000);
                $('#hike-details').fadeIn(1000);
            },
            error: function(xhr, status, error) {
                console.error("Error fetching hike details: " + error);
            }
        });

    }
</script>

<style>
    html,
    body {
        height: 100%;
        margin: 0;
        background-color: #BAC9CE;
        font-family: 'Open Sans', Sans;
        color: #323637;
    }

    .hike-list-container {
        display: grid;
        max-height: 40vh;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        margin-left: 25%;
        margin-right: 25%;
        overflow-y: auto;
    }

    #hike-details {
        margin-top: 20px;
        margin-left: 25%;
        margin-right: 25%;
    }

    .hike-button {
        padding: 25px 50px;
        margin: 10px;
        background-color: #16537e;
        color: #FFFFFF;
        border: none;
    }

    .hike-button:hover {
        background-color: #0B293F;
    }

    .home-button {
        padding: 15px 30px;
        margin: 10px;
        background-color: #464A4B;
        color: #FFFFFF;
        border: none;
        float: left;
    }

    .home-button:hover {
        background-color: #323637;
    }

    .home-button-container {
        position: absolute;
        top: 20px;
        left: 20px;
    }

    .title {
        margin-top: 75px;
        margin-bottom: 25px;
        margin-left: 25%;
        margin-left: 25%;
        font-size: 48px;
    }

    .detail-title {
        font-size: 36px;
    }

    .hike-label {
        font-weight: 900;
        font-size: 24px;
    }

    .hike-label span {
        font-weight: 400;
    }

    .footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        text-align: center;
        padding: 15px 0;
        opacity: .3;
    }
</style>

</html>
