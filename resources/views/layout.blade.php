<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('thông thái')</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" />
</head>
<body>
    <div class="row">
        <div class="col-12">
            @include('nav')
        </div>
        <div class="col-12 row">
            <div class="col-2">
                <h1>sidebar</h1>
            </div>
            <div class="col-10">
                @yield("contents")
            </div>
        </div>
        <div class="col-12">
            <h1>foooter</h1>
        </div>

</div>

</body>
</html>