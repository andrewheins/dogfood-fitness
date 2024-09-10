<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dogfood Fitness</title>
    @vite('resources/js/app.js') <!-- Include Vite bundle -->
</head>
<body>
    <div id="app">
        <router-view></router-view> <!-- Vue Router will handle component rendering -->
    </div>

    <!-- Pass the current path to Vue -->
    <script>
        window.routePath = "{{ Request::path() }}";  // Pass the current path to Vue
    </script>
</body>
</html>
