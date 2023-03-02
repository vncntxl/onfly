@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password-confirm"
                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div> --}}
<div class="flex items-center mt-32">
    <div class="w-full max-w-sm m-auto bg-white rounded-2xl p-8">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4 border-b border-black py-2">
                <label class="block text-gray-700 font-extrabold" for="name">
                    Name
                </label>
                {{-- <input
            class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
            id="name"
            type="text"
          /> --}}
                <input id="name" type="text"
                    class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-4 border-b border-black py-2">
                <label class="block text-gray-700 font-bold" for="email">
                    Email
                </label>
                <input id="email" type="email"
                    class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                {{-- <input
            class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
            id="email"
            type="email"
          /> --}}
            </div>
            <div class="mb-4  border-b border-black py-2">
                <label class="block text-gray-700 font-bold" for="password">
                    Password
                </label>
                <input id="password" type="password"
                    class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                {{-- <input
            class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
            id="password"
            type="password"
          /> --}}
            </div>
            <div class="mb-6  border-b border-black py-2">
                <label class="block text-gray-700 font-bold" for="password">
                    Confirm Password
                </label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password"
                        class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                        name="password_confirmation" required autocomplete="new-password">
                </div>
                {{-- <input
              class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
              id="password"
              type="password"
            /> --}}
            </div>
            <div class="flex items-center justify-center">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full"
                    type="submit" style="background-color: #CDBD15">
                    Sign In
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
