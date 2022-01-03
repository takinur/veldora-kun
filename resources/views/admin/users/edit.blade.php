@extends('admin.app')


@section('content')

<div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

    <div class="bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2 md:space-x-20 space-y-10 md:space-y-0">Edit User # {{ $user->id }}
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

            @if($errors->any())
            <div class="center pt-1 pb-4">
                @foreach ($errors->all() as $error)
                <li class="text-red-500">{{$error}}</li>
                @endforeach
            </div>
            @endif


            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <h2 class="text-center uppercase">User ROLE: @foreach ($user->roles as $role )
                    {{ $role->name }}
                    @endforeach</h2>
                <hr />
                <div class="-mx-3 md:flex mb-6 mt-12">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name">
                            Name
                        </label>
                        <input value="{{ $user->name }}"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                            id="name" type="text" name="name">
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="email">
                            Email
                        </label>
                        <input value="{{ $user->email }}"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                            id="email" type="email" name="email">
                    </div>
                </div>
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="phone">
                            Phone
                        </label>
                        <input value="{{ $user->phone }}"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
                            id="phone" type="text" name="phone">
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-state">
                            Approval Status
                        </label>
                        <div class="relative">
                            <select name="approval"
                                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                id="grid-state">
                                @if ($user->approved_at != null)
                                <option selected value="1">Approved</option>
                                <option value="2">Remove Approval</option>
                                @else
                                <option value="1">Approve</option>
                                <option selected value="2">Pending Approval</option>
                                @endif
                            </select>
                        </div>
                    </div>

                </div>
                <button type="submit" class="py-3 px-6 transition duration-200 text-white hover:bg-purple-500  focus:ring-purple-500 focus:bg-purple-700 focus:shadow-sm focus:ring-4 focus:ring-opacity-50 rounded-lg bg-purple-600 shadow-lg block md:inline-block w-full">
                    <span class="inline-block mr-2">Update</span>
                </button>
            </form>

        </div>
    </section>

</div>


@endsection
