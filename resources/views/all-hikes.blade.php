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
    <H2>
        Hike Names
    </H2>
    <div id='hike-list'></div>
    <div id="hike-details">
        <hr>
        <h3>Hike Details</h3>
        <p id="hike-name"></p>
        <p id="hike-steepness"></p>
        <p id="hike-miles"></p>
        <p id="hike-recommend"></p>
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
                $.each(data,
                    function(index, hike) {
                        hikesContainer.append(
                            '<div><button class=hike-button data-id="' +
                            hike
                            .id + '">' + hike.name +
                            '</button></div>');
                    });
                $('.hike-button').on('click', function() {
                    let hikeId = $(this).data('id');
                    getHikeDetail(hikeId);
                });
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
                $('#hike-details').fadeIn();
            },
            error: function(xhr, status, error) {
                console.error("Error fetching hike details: " + error);
            }
        });

    }
</script>

<style>
    .hike-button {
        padding: 15px 30px;
        margin: 10px;
        background-color: #008000;
        color: #FFFFFF;
        border: none;
    }

    .hike-button:hover {
        background-color: #003300;
    }
</style>


</html>
