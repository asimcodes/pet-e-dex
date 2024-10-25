<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet-é-dex</title>
    <link rel="icon" href="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMiIgaGVpZ2h0PSIzMiIgZmlsbD0iIzAwMDAwMCIgdmlld0JveD0iMCAwIDI1NiAyNTYiPjxwYXRoIGQ9Ik0yNDAsMTA4YTI4LDI4LDAsMSwxLTI4LTI4QTI4LDI4LDAsMCwxLDI0MCwxMDhaTTcyLDEwOGEyOCwyOCwwLDEsMC0yOCwyOEEyOCwyOCwwLDAsMCw3MiwxMDhaTTkyLDg4QTI4LDI4LDAsMSwwLDY0LDYwLDI4LDI4LDAsMCwwLDkyLDg4Wm03MiwwYTI4LDI4LDAsMSwwLTI4LTI4QTI4LDI4LDAsMCwwLDE2NCw4OFptMjMuMTIsNjAuODZhMzUuMywzNS4zLDAsMCwxLTE2Ljg3LTIxLjE0LDQ0LDQ0LDAsMCwwLTg0LjUsMEEzNS4yNSwzNS4yNSwwLDAsMSw2OSwxNDguODIsNDAsNDAsMCwwLDAsODgsMjI0YTM5LjQ4LDM5LjQ4LDAsMCwwLDE1LjUyLTMuMTMsNjQuMDksNjQuMDksMCwwLDEsNDguODcsMCw0MCw0MCwwLDAsMCwzNC43My03MloiPjwvcGF0aD48L3N2Zz4=">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('cat.index') }}">Pet-é-dex</a>
</nav>
<div class="container mt-4">
    @yield('content')
</div>
</body>
</html>
