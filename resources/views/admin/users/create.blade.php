@extends('admin.app')


@section('content')

<div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

    <div class="bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2 md:space-x-20 space-y-10 md:space-y-0">Add New User
                <a href="{{ route('users.index') }}"
                    class="py-2 px-3 text-sm float-right text-white rounded-lg bg-red-500 mb-3 shadow-lg block md:inline-block">
                    Go Back
                </a>
            </h3>
        </div>
    </div>
    <!-- component -->
    <section class="container mx-auto p-2 font-mono">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">

            {{-- @if($errors->any())
            <div class="center pt-1 pb-4">
                @foreach ($errors->all() as $error)
                <li class="text-red-500">{{$error}}</li>
                @endforeach
            </div>
            @endif --}}


            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <hr />
                <div class="-mx-3 md:flex mb-6 mt-12">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <input id="name" class="block mt-1 w-full rounded @error('name') border-red-500 @enderror" type="text"
                            name="name" :value="old('name')" required autofocus autocomplete="name" />
                        @error('name') <span class="text-red-500"> {{ $message }} </span> @enderror
                    </div>
                    <div class="md:w-1/2 px-3">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <input id="email"
                            class="block mt-1 w-full rounded focus:border-indigo-400 @error('email') border-red-500 @enderror"
                            type="email" name="email" :value="old('email')" required />
                        @error('email')<span class="text-red-500"> {{ $message }} </span> @enderror
                    </div>
                </div>
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3">
                        <x-jet-label for="Phone" value="{{ __('Phone') }}" />
                        <input id="phone" class="block mt-1 w-full rounded @error('phone') border-red-500 @enderror" type="text"
                            name="phone" :value="old('phone')" autofocus autocomplete="phone" />
                        @error('phone')<span class="text-red-500"> {{ $message }} </span> @enderror
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-state">
                           User Type:
                        </label>
                        <div class="relative">
                            <select name="role"
                                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker px-4 pr-8 rounded"
                                id="grid-state">
                                <option selected value="admin" >Administrator</option>
                                <option value="driver">Driver/Employee</option>
                                <option value="customer">Customer</option>
                            </select>
                            @error('role')<span class="text-red-500"> {{ $message }} </span> @enderror
                        </div>
                    </div>

                </div>
                <button type="submit" class="py-3 px-6 transition duration-200 text-white hover:bg-purple-500  focus:ring-purple-500 focus:bg-purple-700 focus:shadow-sm focus:ring-4 focus:ring-opacity-50 rounded-lg bg-purple-600 shadow-lg block md:inline-block w-full">
                    <span class="inline-block mr-2">Create</span>
                </button>
            </form>

        </div>
    </section>

</div>


@endsection
