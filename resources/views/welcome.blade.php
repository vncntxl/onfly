<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    </head>
    <style>

    </style>
    <body class="bg-gray-100 h-screen" >
        <header class="bg-white shadow-lg w-full" style="position: fixed;">
            <div class="container mx-auto px-6 py-4">
                <div class="flex items-center justify-between">
                    <a href="/">
                        <img src="img/logo.png" alt="Logo" style="height: 26px">
                    </a>
                    <nav>
                        <a href="/login" class="px-4 py-2 font-bold rounded text-xl" style="color: #CDBD15">Login</a>
                        <a href="/register" class="px-4 py-2 font-light rounded text-xl" style="color: #969696" >Sign Up</a>
                    </nav>
                </div>
            </div>
        </header>
        <main class="bg-cover bg-center h-screen" style="background-image: url('img/background.png');">
            <div class="flex h-full items-center justify-center">
              <div class="flex flex-col items-center justify-center h-screen bg-center bg-cover" style="position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%);">
                <form style="width: 700px; ">
                    <div class="relative">
                        <input type="text" class="px-20 rounded-xl w-full h-16 mb-20" placeholder="Search..." style="outline: none;">
                        <button class="absolute border-r left-0 top-2 bottom-0 pl-5 pr-5 h-12 outline-none border-gray-300 rounded button">
                          <img src="img/explore.png" alt="Button Image" style="width: 25px">
                        </button>
                      </div>
                <div class="text-center text-white text-7xl font-bold tracking-normal mb-4">Search Around</div>
                <div class="text-center text-white text-7xl font-bold tracking-normal mb-5">The World</div>
                <div class="text-center text-white font-light text-2xl">Enjoy your life.</div>
              </div>
            </div>
          </main>
          <a href="/home" src="img/help.png" alt="Help" class="help-button" style="
          position: fixed;
          bottom: 20px;
          right: 20px;
          width: 50px;
          height: 50px;
          background-image: url('path/to/help-icon.png');
          background-size: contain;
          background-repeat: no-repeat;
          cursor: pointer;">
        </div>
    </body>
</html>
