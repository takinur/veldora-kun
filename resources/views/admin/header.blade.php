<!--Nav-->
<nav class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">


    <div class="flex flex-wrap items-center">
        <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
            <div class="box-border md:box-content w-48">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/brand/logo-white.png') }}" class="object-contain w-2/3" >
                </a>
            </div>
        </div>

        <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2">
                <span class=""> Wellcome back to Courier in Moscow Admin Panel ! </span>
        </div>

        <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
            <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                <li class="flex-1 md:flex-none md:mr-3">
                    <a class="inline-block py-2 px-4 text-white no-underline" href="{{ route('home') }}">Home</a>
                </li>
                <li class="flex-1 md:flex-none md:mr-3">
                    <a class="inline-block text-white no-underline hover:text-underline py-2 px-4"
                        href="/user/profile">Profile</a>
                </li>
                <li class="flex-1 md:flex-none md:mr-3">
                    <div class="relative inline-block">
                        <!-- Settings Dropdown -->
                        <div class="ml-3 relative">
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())

                                    <button
                                        class="flex text-sm  text-white border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->name }}" /> <span class="text-white ml-2 mt-2">
                                            {{ Auth::user()->name }} </span>
                                    </button>
                                    @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                    @endif
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                    </x-jet-dropdown-link>

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                    @endif

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</nav>


<div class="flex flex-col md:flex-row">

    <div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">

        <div
            class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
            <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                <li class="mr-3 flex-1">
                    <a href="{{ route('dashboard') }}"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ request()->is('dashboard') ? 'border-blue-600' : 'border-gray-800' }} hover:border-pink-500">
                        <i class="fas fa-tasks pr-0 md:pr-3"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base  {{ request()->is('dashboard') ? 'text-white' : 'text-gray-600 md:text-gray-400' }}  block md:inline-block">Dashboard</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ '/users'}}"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ request()->is('users*') ? 'border-blue-600' : 'border-gray-800' }} hover:border-purple-500">
                        <i class="fa fa-user-cog pr-0 md:pr-3"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base {{ request()->is('users*') ? 'text-white' : 'text-gray-600 md:text-gray-400' }} block md:inline-block">Manage
                            Users</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ route('bookings.index') }}"
                        class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ request()->is('bookings*') ? 'border-blue-600' : 'border-gray-800' }} hover:border-red-500">
                        <i class="fa fa-clipboard-list pr-0 md:pr-3"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base {{ request()->is('bookings*') ? 'text-white' : 'text-gray-600 md:text-gray-400' }} block md:inline-block">Bookings</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ '/payments' }}"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ request()->is('payments*') ? 'border-blue-600' : 'border-gray-800' }} hover:border-purple-500">
                        <i class="fa fa-envelope pr-0 md:pr-3"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base {{ request()->is('payments*') ? 'text-white' : 'text-gray-600 md:text-gray-400' }} block md:inline-block">Payments</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ '/messages' }}"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ request()->is('messages*') ? 'border-blue-600' : 'border-gray-800' }} hover:border-purple-500">
                        <i class="fa fa-envelope pr-0 md:pr-3"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base {{ request()->is('messages*') ? 'text-white' : 'text-gray-600 md:text-gray-400' }} block md:inline-block">Messages</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ '/blog_admin' }}"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ request()->is('blog_admin*') ? 'border-blue-600' : 'border-gray-800' }} hover:border-purple-500">
                        <i class="fas fa-chart-area pr-0 md:pr-3"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base {{ request()->is('blog_admin*') ? 'text-white' : 'text-gray-600 md:text-gray-400' }} block md:inline-block">Manage
                            Blog</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ route('setting') }}"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ request()->is('setting*') ? 'border-blue-600' : 'border-gray-800' }} hover:border-purple-500">
                        <i class="fas fa-cogs pr-0 md:pr-3"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base {{ request()->is('setting*') ? 'text-white' : 'text-gray-600 md:text-gray-400' }} block md:inline-block">Setting</span>
                    </a>
                </li>


            </ul>
        </div>


    </div>
