<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add this in your layout file -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Your App</title>
    @livewireStyles
</head>
<body>
    <div>
        @yield('content')
    </div>
    @livewireScripts
</body>
</html>
