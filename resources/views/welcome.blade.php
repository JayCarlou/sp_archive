<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
                border-radius: 30px;
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
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="logo">
                    <img src="../images/spearchive.png">
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control search-textbox" name="search" id="search" required/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="float-center search-button" name="searchButton" id="searchButton">Search Content</button>
                        <a href="https://www.sanfernandocity.gov.ph" target="_blank" style="color: #5F6368"><button type="submit" class="float-center search-button">Official Website</a> 
                    </div>
                </div>
                <div class="footer">
                    Developed By: City Government of San Fernando, La Union
                </div>
            </div>
        </div>
    </body>
</html>
