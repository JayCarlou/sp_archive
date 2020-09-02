<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>SP eArchives</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: arial,sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .search-button{
                background-color: #f2f2f2;
                border: 1px solid #f2f2f2;
                border-radius: 4px;
                color: #5F6368;
                font-family: arial,sans-serif;
                font-size: 14px;
                margin: 11px 4px;
                padding: 0 16px;
                line-height: 27px;
                height: 36px;
                min-width: 54px;
                text-align: center;
                cursor: pointer;
                user-select: none;
                width:150px;
                
            }

            .search-textbox{
                
                width:100%;
            }

            .logo{
                
                margin-top:100px;
            }

            .footer{
                margin:100px;
                font-size:10px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('/jqueryui/jquery-ui.min.css')}}">

        <!-- Script -->
        <script src="{{asset('/jqueryui/jquery-3.5.1.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/jqueryui/jquery-ui.min.js')}}" type="text/javascript"></script>
        
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="logo">
                    <img src="../images/logo.png" style="width:250px">
                </div>
                <div class="card-body">
                    <form action="/search" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" class="form-control search-textbox" name="search" id="search" required/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="float-center search-button" name="searchButton" id="searchButton">Search Content</button>
                            <a href="https://www.sanfernandocity.gov.ph" target="_blank" style="color: #5F6368"><button type="submit" class="float-center search-button">Official Website</a> 
                        </div>
                    </form>
                </div>
                <div class="footer">
                    Developed By: City Government of San Fernando, La Union
                </div>
            </div>
        </div>

        <!-- Script -->
        <script type="text/javascript">

            // CSRF Token
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $(document).ready(function(){

                $( "#search" ).autocomplete({
                    source: function( request, response ) {
                    // Fetch data
                    $.ajax({
                        url:"{{route('search.getKeyword')}}",
                        type: 'post',
                        dataType: "json",
                        data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                        },
                        success: function( data ) {
                        response( data );
                        }
                    });
                    },
                    select: function (event, ui) {
                        // Set selection
                        $('#search').val(ui.item.label); // display the selected text
                        // $('#employeeid').val(ui.item.value); // save selected id to input
                        return false;
                    }
                });

            });
        </script>
    </body>
</html>
