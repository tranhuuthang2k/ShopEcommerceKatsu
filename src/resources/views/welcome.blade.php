<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">        
        <title>SHOP KATSU </title>
          
        <!-- Fonts -->
        
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <!-- Styles -->
        <style>
        </style>
    </head>
    <body>
            
            <div id="app" class="content">
                <router-view>   </router-view>
              
            </div>
        </div>
    </body>
    <script src="{{ url('js/app.js') }}"></script>

</html>
