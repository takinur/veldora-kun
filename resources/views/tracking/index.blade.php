@extends('layouts.app')

@section('content')


<!-- Start contain wrapp -->
<div class="section padding-bot50" id="customSection">
    <div class="container">
        <h1 class="font-bold"> Track your Service </h1>
        <div class="row">
            <!-- Start Form -->
            <form method="GET" action="{{ route('search') }}">
                <div class="p-8 w-4/5 ml-14">
                    <div class="bg-white flex items-center rounded-full shadow-xl ">
                        <input
                            class="rounded-l-full w-full py-4 px-6 text-gray-700 text-lg leading-tight focus:outline-none"
                            id="search" type="text" name="search" placeholder="Tracking Code">
                        <div class="p-4">
                            <button
                                class="bg-blue-500 text-white rounded-full p-2 hover:bg-blue-400 focus:outline-none w-12 h-12 flex items-center justify-center">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12 col-sm-7">
            <div class=" flex-wrap place-content-center">
                @if($bstatus != null)
                <span
                    class="px-2 text-4xl py-1 font-semibold ml-14 leading-tight text-green-700 bg-green-200 rounded-sm uppercase">
                    {{$bstatus}}
                </span>
                @endif
                @if (session()->has('status'))
                <span
                    class="px-2 text-4xl py-1 font-semibold ml-14 leading-tight text-red-700 bg-red-200 rounded-sm capitalize">
                    Not Found! Please re-check the tracking code!
                </span>
                @endif
            </div>
            <!--Start Status -->
            <div class="container bg-gray-200 mx-auto w-full h-full">
                <div class="relative wrap overflow-hidden p-10 h-full">
                    <div class="border-2-2 absolute border-dashed border-blue-500 h-full border" style="left: 5.8%">
                    </div>

                    @forelse ($history as $hist)
                    <!--Start Status -->
                    <div class="mb-8 flex justify-between items-center w-full">
                        <div class="order-2 w-6/12"></div>
                        <div class="z-20">
                            <div
                                class="my-4 rounded-full h-10 w-10 flex items-center bg-indigo-300 ring-4 ring-indigo-400 ring-opacity-30">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div class="order-1 bg-gray-300 rounded-lg shadow-xl w-5/12 px-6 py-4">
                            <div class="flex flex-row">
                                <h3 class="mb-3 font-bold text-gray-800 text-xl">{{ $hist->trackingStatus->name }}</h3>
                            </div>

                            <p class="text-base leading-snug tracking-wide text-gray-900 text-opacity-100">
                                {{ $hist->created_at }}<br> {{ $hist->user->name }}</p>
                        </div>
                    </div>
                    <!--End Status -->
                    @empty
                    @if ($bstatus != null)
                    <div class="mb-8 flex justify-between items-center w-full">
                        <div class="order-2 w-6/12"></div>
                        <div class="z-20">
                            <div
                                class="my-4 rounded-full h-10 w-10 flex items-center bg-red-300 ring-4 ring-red-400 ring-opacity-30">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20"
                                    fill="red">
                                    <path fill-rule="evenodd"
                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="order-1 bg-red-200 rounded-lg shadow-xl w-5/12 px-6 py-4">
                            <div class="flex flex-row">
                                <h3 class="mb-3 font-bold text-gray-800 text-xl">N/A</h3>
                            </div>

                            <p class="text-base leading-snug tracking-wide text-gray-900 text-opacity-100">Additional Information not available!</p>
                        </div>
                    </div>
                    @endif
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
@parent
<style>
    #customSection {
        background-color: rgba(229, 231, 235);
    }

    #search {
        border: none;
    }

    #search:focus {
        border: none;
    }
</style>
@endsection
