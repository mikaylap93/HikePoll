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
    <button class='home-button'> <- home </button>
            <div class=title>
                All Hikes
            </div>
            <div id='hike-list' class='hike-list-container'></div>
            <div id="hike-details">
                <hr>
                <h3>Hike Details</h3>
                <p id="hike-name"></p>
                <p id="hike-steepness"></p>
                <p id="hike-miles"></p>
                <p id="hike-recommend"></p>
                <p id="hike-difficulty"></p>
            </div>
</body>
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
                $('#hike-name').text("Name: " + data.name);
                $('#hike-steepness').text("Steepness: " + data.steepness);
                $('#hike-miles').text("Miles: " + data.miles);
                $('#hike-recommend').text("Recommend: " + (data.recommend ? 'Yes' : 'No'));
                $('#hike-difficulty').text("Difficulty: " + (data.difficulty.name))
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
        text-align: center;
        color: #323637;
    }

    .hike-list-container {
        display: grid;
        max-height: 50vh;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    }

    #hike-details {
        display: none;
    }

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

    .title {
        font-size: 48px;
    }
</style>

</html>
