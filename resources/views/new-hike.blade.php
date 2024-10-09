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
    <form id="hike-form">
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

    .form-wrapper {
        padding: 20px;
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

    #popup-content {}

    #popup-background {
        z-index: 10;
        display: none;
        position: fixed;
        background-color: ##16537e;
    }
</style>

</html>
