<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token"  content="{{ csrf_token() }}"/>
        <title> </title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>

{{--        <script>--}}
{{--            // rename myToken as you like--}}
{{--            window.laravel.token =  <?php echo json_encode([--}}
{{--                'csrfToken' => csrf_token(),--}}
{{--            ]); ?>--}}
{{--        </script>--}}
{{--        <script> var token = '<?php csrf_token() ?>'</script>--}}
{{--        <script>--}}
{{--            window.Laravel = {--}}
{{--                csrfToken : token--}}
{{--            };--}}
{{--        </script>--}}
    </head>
    <body>
        <div id="app">
        </div>

        <script> window.baseUrl = '{{url('/')}}';</script>
        <script>

        </script>
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    </body>
</html>
