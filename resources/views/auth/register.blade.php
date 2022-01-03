@extends('layouts.app')

@section('content')


<style>
    .stv-radio-buttons-wrapper {
        clear: both;
        display: inline-block;
    }

    .stv-radio-button {
        position: absolute;
        left: -9999em;
        top: -9999em;
    }

    .stv-radio-button+label {
        float: left;
        padding: 0.5em 1em;
        cursor: pointer;
        border: 1px solid #72288f;
        margin-right: -1px;
        color: #fff;
        background-color: #428bca;
    }

    .stv-radio-button+label:first-of-type {
        border-radius: 0.7em 0 0 0.7em;
    }

    .stv-radio-button+label:last-of-type {
        border-radius: 0 0.7em 0.7em 0;
    }

    .stv-radio-button:checked+label {
        background-color: #3277b3;
    }
</style>

<!-- Start fixed -->
<div class="bg" style="background-image: url({{ asset('images/bg/slide01.jpg') }}); background-size:cover;">
    <div class="login-register-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="login-register" style="max-width: 360px;">
                        <div class="tab-content log-tabs-containt">
                            <div role="tabpanel" class="tab-pane active" id="Login">
                                <h2>Sign UP </h2>
                                @if ($errors->any())
                                <div class="text-danger h4 mb-4"> Please check below Errors!</div>
                                @endif
                                <form method="POST" action="{{ route('register') }}" class="form-horizontal">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-lg-12 text-left">
                                            <input name="name" :value="old('name')" required autofocus
                                                autocomplete="name" class="form-control form-block" placeholder="Name">
                                            @error('name')
                                            <div class="text-danger mb-4 ml-4">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12 text-left">
                                            <input type="email" name="email" :value="old('email')" required autofocus
                                                class="form-control form-block" placeholder="Email">
                                            @error('email')
                                            <div class="text-danger mb-4 ml-4">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12 text-left">
                                            <input name="phone" :value="old('phone')" required autofocus
                                                autocomplete="phone" class="form-control form-block"
                                                placeholder="Phone">
                                            @error('phone')
                                            <div class="text-danger mb-4 ml-4">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12 text-left">
                                            <input type="password" name="password" required autocomplete="new-password"
                                                class="form-control form-block" placeholder="Password">
                                            @error('password')
                                            <div class="text-danger mb-4 ml-4">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12 text-left">
                                            <input name="password_confirmation" type="password" required
                                                autocomplete="new-password" class="form-control form-block"
                                                placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12 text-left">
                                            <div class="mx-auto justify-content-center align-items-center text-center">
                                                <div class="stv-radio-buttons-wrapper mt-5">
                                                    <h3 class="text-center text-2xl font-bold"> Join as: </h3>
                                                    <input type="radio" class="stv-radio-button" name="role"
                                                        value="customer" id="button1" checked />
                                                    <label for="button1">Customer</label>

                                                    <input type="radio" class="stv-radio-button" name="role"
                                                        value="driver" id="button2" />
                                                    <label for="button2">Driver</label>
                                                </div>
                                                @error('role')
                                                <div class="text-danger mb-4 ml-4">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-12 text-center">
                                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="terms">
                                                    I agree to the <a href="{{ route('terms.show') }}"
                                                        class="text-primary"> terms of service
                                                    </a> and
                                                    <a href="{{ route('policy.show') }}" class="text-primary"> privacy
                                                        policy </a>
                                                </label>
                                            </div>
                                            @error('terms')
                                            <span class="text-danger mb-4 ml-4">
                                                You must agree to Terms and Privacy Policy!
                                            </span>
                                            @enderror

                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12 text-center">
                                            <x-jet-button class="btn btn-primary btn-block">
                                                {{ __('Register') }}
                                            </x-jet-button>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <a class="text-primary h5" href="{{ route('login') }}">
                                                {{ __('Already registered?') }} </a>

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

    <style>
        .stv-radio-buttons-wrapper {
            clear: both;
            display: inline-block;
        }

        .stv-radio-button {
            position: absolute;
            left: -9999em;
            top: -9999em;
        }

        .stv-radio-button+label {
            float: left;
            padding: 0.5em 1em;
            cursor: pointer;
            border: 1px solid #72288f;
            margin-right: -1px;
            color: #fff;
            background-color: #428bca;
        }

        .stv-radio-button+label:first-of-type {
            border-radius: 0.7em 0 0 0.7em;
        }

        .stv-radio-button+label:last-of-type {
            border-radius: 0 0.7em 0.7em 0;
        }

        .stv-radio-button:checked+label {
            background-color: #3277b3;
        }
    </style>

    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <input id="name" class="block mt-1 w-full rounded @error('name') border-red-500 @enderror" type="text"
                    name="name" :value="old('name')" required autofocus autocomplete="name" />
                @error('name') {{ $message }} @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <input id="email"
                    class="block mt-1 w-full rounded focus:border-indigo-400 @error('email') border-red-500 @enderror"
                    type="email" name="email" :value="old('email')" required />
                @error('email') {{ $message }} @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="Phone" value="{{ __('Phone') }}" />
                <input id="phone" class="block mt-1 w-full rounded @error('phone') border-red-500 @enderror" type="text"
                    name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                @error('phone') {{ $message }} @enderror
            </div>

            <div class="mt-4 ">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <input id="password" class="block mt-1 w-full rounded @error('password') border-red-500 @enderror"
                    type="password" name="password" required autocomplete="new-password" />
                @error('password')
                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                </span> @enderror

            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <input id="password_confirmation" class="block mt-1 w-full rounded" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mx-auto justify-content-center align-items-center text-center">
                <div class="stv-radio-buttons-wrapper mt-5">
                    <h3 class="text-center text-2xl font-bold"> Join as: </h3>
                    <input type="radio" class="stv-radio-button" name="role" value="customer" id="button1" checked />
                    <label for="button1">Customer</label>

                    <input type="radio" class="stv-radio-button" name="role" value="driver" id="button2" />
                    <label for="button2">Driver</label>
                </div>
                @error('role')
                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                </span>
                @enderror



            </div>

            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms" />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of
                                Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy
                                Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                    @error('terms')
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        You must agree to Terms and Privacy Policy!
                    </span>
                    @enderror

                </x-jet-label>
            </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>

    </x-jet-authentication-card>
</x-guest-layout> --}}
