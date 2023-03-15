@extends('layouts.app')

@section('content')
<main class="bg-cover bg-center">
    <div>
        <div class="container py-10">
       <span class="text-white font-bold text-4xl "> The most popular tour for your next vacation </span>
       <div class="flex  flex-row">
           <div class="w-96 h-60 bg-black mt-10 rounded-2xl mr-10 px-10 pt-40 flex flex-column">
            <span class="text-white text-lg">Pura Ulun Danu – Danau Beratan</span>
                <div class="flex flex-row">
                    <span class="text-white text-lg mr-5">Bedugul, Bali, Indonesia</span>
                    <img src="{{ asset('/img/star.png') }}" alt="">
                    <span class="text-white mt-1">5.0</span>
                </div>
           </div>
           <div class="w-96 h-60 bg-black mt-10 rounded-2xl mr-10">

           </div>
           <div class="w-96 h-60 bg-black mt-10 rounded-2xl mr-10">

           </div>
       </div>
       <div class="w-full h-60 pr-16 mt-10">
        <div class="bg-black w-full h-60 rounded-2xl px-12 pt-20 flex flex-column">
            <span class="font-black text-4xl" style="color: #FFE247;">Traveling Fun You  Can Do</span>
            <span class="text-white text-xl font-thin">From tourist attractions to places to eat, you’ll want to bookmark these locations</span>
            <button class="text-white w-24 h-10 rounded-lg font-semibold mt-2" style="background-color: #CDBD15;">Read More</button>
        </div>
       </div>
    </div>
    </div>
  </main>
</div>
@endsection
