<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dogfood Fitness</title>
    @vite('resources/js/app.js') <!-- Link to the Vite-compiled assets -->
</head>
<body>
    <div id="app">
        <header-component></header-component> <!-- Global Header -->
        <router-view></router-view> <!-- Vue Router will handle page content -->
        <footer-component></footer-component> <!-- Global Footer -->
    </div>
</body>
</html>
