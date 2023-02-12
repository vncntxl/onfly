@extends('layouts.app')

@section('content')
<main class="bg-cover bg-center" style="background-image: url('img/background.png');">
    <div class="flex h-full items-center justify-center">
      <div class="flex flex-col items-center justify-center h-screen bg-center bg-cover" style="position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%);">
        <form style="width: 700px;" action="{{ route('search') }}" method="get">
            {{ csrf_field() }}
            <div class="relative">
                <input type="text" class="px-20 rounded-xl w-full h-16 mb-20" placeholder="Search..." style="outline: none;" name="query">
                <button type="submit" class="absolute border-r left-0 top-2 bottom-0 pl-5 pr-5 h-12 outline-none border-gray-300 rounded button">
                  <img src="img/explore.png" alt="Button Image" style="width: 25px">
                </button>
              </div>
        </form>
        <div class="text-center text-white text-7xl font-bold tracking-normal mb-3">Search Around</div>
        <div class="text-center text-white text-7xl font-bold tracking-normal mb-4">The World</div>
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
@endsection
