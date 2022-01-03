<div>

            <div class="w-full mb-8 overflow-hidden bg-gray-100">
                <div class="w-full overflow-x-auto">
                    <div class="flex flex-wrap mx-4 pt-4">
                        @forelse ($tasks as $task)

                        <!-- Card -->
                        <div class="bg-white p-10 rounded-lg shadow-lg mt-4 mx-auto">
                            <span
                                class="px-2 float-right py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm capitalize">
                                {{ $task->booking->trackStatus->name }}
                            </span>
                            <h1 class="text-xl font-bold">Booking ID#{{ $task->booking->id }}</h1>
                            <!-- Senders Info -->
                            <h2 class="text-lg uppercase font-bold text-gray-700 mt-8">Picked from:</h2>
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
