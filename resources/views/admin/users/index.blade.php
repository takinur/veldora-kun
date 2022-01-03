@extends('admin.app')

@section('content')

<div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

    <div class="bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2 md:space-x-20 space-y-10 md:space-y-0">USERS
                <a href="{{ route('users.create') }}"
                    class="py-2 px-3 text-sm float-right text-white rounded-lg bg-blue-500 mb-3 shadow-lg block md:inline-block">
                    Add New User
                </a>
            </h3>
        </div>
    </div>
    <!-- component -->
    <section class="container mx-auto p-6 font-mono">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
            <div class="w-full overflow-x-auto">
               @livewire('manage-users-controller')
            </div>
        </div>
    </section>

</div>

<!-- Livewire Component wire-end:WpV8zHF87EtlmATvUQRa -->
</div>

@endsection
