<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config("app.name") }}</title>
        <!-- Vendor CSS-->
        <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <style>
            html, body{
                background: #B993D6;  
                background: -webkit-linear-gradient(to right, #8CA6DB, #B993D6);  
                background: linear-gradient(to right, #8CA6DB, #B993D6); 
                /* font-size: 12px; */
            }
            .beautify-container{
                margin-top: 5%;
                padding: 10%;
                background: white;
                border-radius: 20px;
                -webkit-box-shadow: 1px 2px 10px 0px #777676; 
                -moz-box-shadow: 1px 2px 10px 0px #777676;  
                box-shadow: 1px 2px 10px 0px #777676;  
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="beautify-container">
                <h5>Event Calendar</h5>
                <div id="app">
                    <app></app>
                </div>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
        <!-- Jquery JS-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <!-- Vendor JS-->
        <script src="vendor/datepicker/moment.min.js"></script>
        <script src="vendor/datepicker/daterangepicker.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
