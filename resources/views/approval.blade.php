@extends('layouts.backapp')

@section('content')
<!-- component -->
<div class="min-h-screen flex flex-col space-y-4 items-center justify-center bg-gray-100 py-6">

    <div class="relative font-semibold text-2xl pb-4 border-b border-gray-300">
        <h2 class="font-bold"> Waiting for approval! </h2>
    </div>
    <div class="alert flex flex-row items-center bg-blue-200 p-5 rounded border-b-2 border-blue-300">
        <div
            class="alert-icon flex items-center bg-blue-100 border-2 border-blue-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
            <span class="text-blue-500">
                <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
            </span>
        </div>
        <div class="alert-content ml-4">
            <div class="alert-title font-semibold text-lg text-blue-800">
                Info
            </div>
            <div class="alert-description text-md text-dark-500">
                Your account is waiting for our administrator approval ! <br> Please check again later!
            </div>
        </div>
    </div>

</div>
@endsection
