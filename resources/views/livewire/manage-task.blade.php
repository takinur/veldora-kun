<div>

            <div class="w-full mb-8 overflow-hidden bg-gray-100">

                <!-- Alert Success -->
                @if (session()->has('message'))
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
                            Success
                        </div>
                        <div class="alert-description text-md text-dark-500">
                           {{ session('message')}}
                        </div>
                    </div>
                </div>
                @endif

                <div class="w-full overflow-x-auto">
                    <div class="flex flex-wrap mx-4 pt-4">
                        @forelse ($tasks as $task)
                        <!-- Exclude Completed -->
                        @if ($task->booking->trackStatus_id == 5 )
                            {{-- Do nothing --}}
                        @elseif ($task->booking->trackStatus_id == 6 )
                        {{-- Do Nothing at all --}}
                        @elseif ($task->booking->trackStatus_id == 7 )
                        {{-- Seriously nothing! --}}
                        @else
                        {{-- Do the thing! --}}

                        <!-- Card -->
                        <div class="bg-white p-10 rounded-lg shadow-lg mt-4 mx-auto">
                            <span
                                class="px-2 float-right py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm capitalize">
                                Assigned
                            </span>
                            <h1 class="text-xl font-bold">Booking ID#{{ $task->booking->id }}</h1>
                            <div class="-mx-3 md:flex">
                                <div class="md:w-full px-3 mt-6">
                                    <label class="block uppercase tracking-wide text-gray-7000 text-xs font-bold mb-2"
                                        for="grid-state">
                                        Update Status:

                                    </label>
                                    <div class="relative">
                                        <select name="tStatus"
                                            wire:change='changeStatus( {{ $task->booking->id }}, $event.target.value)'
                                            class="block appearance-none w-full bg-grey-lighter border border-grey-lighter
                                    text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
                                            <option selected disabled hidden>--Change Status--</option>
                                            @foreach ($tstatus as $st)
                                            <option value="{{ $st->id }}"
                                                {{ $task->booking->trackStatus_id == $st->id ? 'selected="selected"' : '' }}>

                                                {{ $st->name }}
                                                @endforeach
                                        </select>
                                        <div class="bg-gray-400 w-64 h-3 rounded-lg mt-2 overflow-hidden">
                                            <div class="bg-green-400 w-1/2 h-full rounded-lg shadow-md"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Senders Info -->
                            <h2 class="text-lg uppercase font-bold text-gray-700">Pickup Information:</h2>
                            <div class="bg-gray-200 text-base px-6 py-4 ">
                                <div class="capitalize text-gray-600">
                                    <strong> Type:</strong> {{ $task->booking->package->packageType_name}} <br>
                                    <strong> Size:</strong> {{ $task->booking->size}}/kg<br>
                                    <strong> Date:</strong> {{ date( "d-m-Y", strtotime($task->booking->date)) }}<br>
                                    <strong> Delivery:</strong> {{ $task->booking->service->service_name}}<br>
                                </div>

                                <div class="flex items-center pt-3">
                                    <div class="ml-4">
                                        <p class="font-bold">{{ $task->booking->customer->name }}</p>
                                        <p class="text-sm text-gray-700 mt-1">{{ $task->booking->customer->phone }}</p>
                                        <p class="text-sm text-gray-700 mt-1">{{ $task->booking->customer->address }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Recipients Info -->
                            <h2 class="text-lg uppercase font-bold text-gray-700 mt-5">Deliver to:</h2>
                            <div class="bg-gray-200 text-base px-6 py-4 ">
                                <div class="flex items-center pt-3">
                                    <div class="ml-4">
                                        <p class="font-bold">{{ $task->booking->re_name }}</p>
                                        <p class="text-sm text-gray-700 mt-1">{{ $task->booking->re_phone }}</p>
                                        <p class="text-sm text-gray-700 mt-1">{{ $task->booking->re_address }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--End IF statement -->
                        @endif
                        @empty

                        <!-- Card -->
                        <div class="bg-white p-10 rounded-lg shadow-lg mt-4 mx-auto">
                            <span
                                class="px-2 float-right py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm capitalize">
                                Unassigned
                            </span>
                            <h1 class="text-xl font-bold">Tasks</h1>

                            <h2 class="text-lg uppercase font-bold text-gray-700 mt-8">No available tasks!</h2>

                            <h2 class="text-lg uppercase font-bold text-gray-700 mt-8">Come back later for more!</h2>




                        </div>
                        @endforelse

                    </div>
        </section>
    </div>

</div>
