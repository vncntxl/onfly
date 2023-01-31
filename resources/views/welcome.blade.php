<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="welcome.css" />.
    <title>Onfly</title>
    <style>
        body {
          background-image: url(/img/background.jpg);
          background-size: cover;
          height: 100vh;
        }
      </style>
</head>
{{-- <header class="bg-white p-6 flex justify-between items-center">
    <div class="flex items-center">
        <img src="logo.png" alt="logo" class="w-12">
        <h1 class="ml-4 text-lg font-medium">Your Website Name</h1>
    </div>
    <div class="flex items-center">
        <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Login</a>
        <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 ml-4">Sign Up</a>
    </div>
</header> --}}
<body class="flex items-center justify-center">
    <form class="bg-white rounded-lg p-10 mt-10">
      <h2 class="text-2xl font-bold mb-4">Find your next destination</h2>
      <input type="text" class="w-full border border-gray-400 p-2 mb-4" placeholder="Search for a place or address">
      <button class="bg-blue-500 text-white rounded-full p-2">Search</button>
    </form>
  </body>
</html>
