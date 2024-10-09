<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>New Hike</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

    <!-- Styles -->
    <style>

    </style>
</head>

<body>
    <div class='home-button-container'>
        <button class='home-button'> <- home </button>
    </div>
    <div class=title>
        New Hike
    </div>
    <form id="hike-form"method="POST">
        @csrf
        <div class="form-wrapper">
            <div>
                <label> Hike Name </label>
                <input name="hike_name" type=text></input>
            </div>
            <div>
                <label> Miles </label>
                <input name="miles" type=number step="0.1"></input>
            </div>
            <label>Difficulty:</label>
            <div>
                <input type="radio" id="easy" name="difficulty" value="easy">
                <label for="easy">Easy</label>
            </div>
            <div>
                <input type="radio" id="medium" name="difficulty" value="medium">
                <label for="medium">Medium</label>
            </div>
            <div>
                <input type="radio" id="hard" name="difficulty" value="hard">
                <label for="hard">Hard</label>
            </div>
            <div>
                <input type="radio" id="insane" name="difficulty" value="insane">
                <label for="insane">Insane</label>
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
                <input class=submit-button type=submit value="Submit"></input>
            </div>
            <footer>
                Mikayla Bloomquist 2024
            </footer>
        </div>
    </form>

    <div id=popup-background>
        <div id=popup-content>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.home-button').on('click', function() {
            window.location.href = "{{ route('hikes.home') }}";
        })
        $('#hike-form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('hikes.save') }}",
                method: 'POST',
                data: $(this).serialize(),
                success: function() {
                    $('#popup-content').text('Success!');
                    $('#popup-background').show();
                    setTimeout(() => {
                        $('#popup-background').hide();
                        window.location.href = "{{ route('hikes.allHikes') }}";
                    }, 1000);
                },
                error: function() {
                    $('#popup-content').text('Error!');
                    $('#popup-background').show();
                    setTimeout(() => {
                        $('#popup-background').hide();
                    }, 1000);
                }
            });
        });
    });
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

    .form-wrapper>div {
        margin-bottom: 20px;
    }

    .submit-button {
        padding: 15px 30px;
        margin: 10px;
        background-color: #16537e;
        color: #FFFFFF;
        border: none;
    }

    .submit-button:hover {
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

    #popup-content {}

    #popup-background {
        z-index: 10;
        display: none;
        position: fixed;
        background-color: ##16537e;
    }

    .title {
        margin-top: 100px;
        font-size: 48px;
    }
</style>

</html>
