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
               
                width:500px;
            }

            .logo{
                
            }

            .footer{
                text-align:center;
                font-size:10px;
                margin-bottom: 20px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .header {
                background-color: #F0F0F0;
                border-bottom: solid 1px #b0b0b0;
            }

            .search-result{
                font-size:16px;
                padding:15px;
                
            }

            .results{
                margin-bottom:10px;
            }
            

        </style>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="header">
            <div class="card-body">
                <form class="form-inline" action="/search" method="POST">
                    {{csrf_field()}}
                    <div class="form-group" style="padding-right:30px;">
                        <img src="../images/logo_search.png" style="width:240px;">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" style="width:340px;" placeholder="Search for..." name="search" id="search" required/>
                        <button type="submit" class="btn btn-primary" name="searchButton" id="searchButton" >Search</button>
                    </div>
                    
                </form>
            </div>
        </div>
        <div class="container search-result">
            <div class="row justify-content-center">
                <div class="col-md-8" style="">
                    Search result
                    <br>
                    1,000,000 results were found for the ___
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @foreach($results as $results)
                        <div class="card results">
                            <div class="card-body">
                                <span style="color:red; font-weight:bold;">{{strtoupper($results->title)}}</span>
                                <br>
                                <table style="font-size:14px;">
                                    <tr>
                                        <td><b>Document Type</b></td>
                                        <td>: {{strtoupper($results->document_type)}} - {{$results->document_no}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Subject</b></td>
                                        <td>: {{strtoupper($results->subjects)}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Year Published</b></td>
                                        <td>: {{$results->document_year}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <br>
                                            @if($results->file=="")
                                                DOWNLOAD FILE NOT AVAILABLE
                                            @else
                                                <a href="../upload/{{$results->file}}" target="_blank">
                                                DOWNLOAD FILE
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                                 
                                
                                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container footer">
            3rd Floor Marcos Building, F.I. Ortega Highway Barangay I
            <br>
            City of San Fernando, La Union Philippines - 2016
        </div>
    </body>
</html>
