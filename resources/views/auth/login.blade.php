

@extends('layouts.app')

@section('content')
<!-- Start fixed -->
<div class="bg" style="background-image: url({{ asset('images/bg/slide02.jpg') }}); background-size:cover;">
    <div class="login-register-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="login-register" style="max-width: 360px;">
                        <div class="tab-content log-tabs-containt">
                            <div role="tabpanel" class="tab-pane active" id="Login">
                                <p>
                                <div class="soscial-log facebook"> <span>Login
                                        with Email</span></div>
                                </p>

                                @if ($errors->any())
                                <div class="text-danger mb-4"> Sorry these credentials do not match our Records!</div>
                                @else
                                <div class="sparator"><span></span></div>
                                @endif

                                <form method="POST" action="{{ route('login') }}" class="form-horizontal">
                                    @csrf

                                    <div class="form-group">
                                        <div class="col-lg-12 text-left">
                                            <input type="email" name="email" :value="old('email')" required autofocus
                                                class="form-control form-block" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12 text-left">
                                            <input type="password" name="password" required
                                                autocomplete="current-password" class="form-control form-block"
                                                placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12 text-left">
                                            <label for="remember_me" class="flex items-center">
                                                <x-jet-checkbox id="remember_me" name="remember" />
                                                <span class="ml-2">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12 text-center">
                                            <x-jet-button class="btn btn-primary btn-block">
                                                {{ __('Sign in') }}
                                            </x-jet-button>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            @if (Route::has('password.request'))
                                            <a class="text-primary h5" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End fixed -->
@endsection


{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
