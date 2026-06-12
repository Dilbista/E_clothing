<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'E_clothing')</title>
    @include('frondend.layouts.navbar')

</head>

<body>

    @include('frondend.layouts.header')


    <main>
        @include('frondend.home')
    </main>

    @include('frondend.layouts.footer')

</body>

</html>