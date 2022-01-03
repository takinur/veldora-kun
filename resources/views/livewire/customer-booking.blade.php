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

                @forelse ($data as $row)
                @foreach ($row->booking as $booking )
                <div class="bg-white p-10 rounded-lg shadow-lg mt-4 mb-7 mx-auto">
                    <span
                        class="px-2 float-right py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm capitalize">
                        {{ $booking->bookingStatus->status }}
                    </span>
                    <h1 class=" text-base font-bold">Booking ID#{{ $booking->id }}</h1>
                    <div class="w-full">
                        <!-- Payment -->
                        <div class="md:w-full px-3 mt-6">
                            <h4 class="font-semibold">Amount:</h4>
                            @if ($booking->paid_at == !Null)
                            <span
                                class="px-2 py-1 font-semibold leading-tight text-green-600 bg-dark-100 rounded-sm uppercase">
                                {{$booking->price}}
                            </span>
                            @else
                            <span
                                class="px-2 py-1 font-semibold leading-tight text-red-400 bg-dark-100 rounded-sm uppercase">
                                {{ $booking->price }}
                            </span>
                            @endif
                            <br>
                            <!--Paid at -->
                            @if ($booking->paid_at == !Null)
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">
                                Paid at <small class="mt-3">{{ $booking->paid_at }} </small>
                            </span>
                            @else
                            <span
                                class="px-4 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm capitalize">
                                Unpaid!
                            </span>
                            <button wire:click.prevent='makePayment({{ $booking->id }})'
                                class="ml-2 inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-indigo-500 hover:shadow-lg hover:bg-indigo-600 focus:outline-none">
                                Pay
                            </button>

                            @endif
                        </div>
                    </div>
                    <!-- Senders Info -->
                    <h2 class="text-lg uppercase font-bold text-gray-700 mt-5">Basic Information:</h2>
                    <div class="bg-gray-200 text-base px-6 py-4 ">
                        <div class="capitalize text-gray-600">
                            <strong> Type:</strong> {{ $booking->package->packageType_name}} <br>
                            <strong> Size:</strong> {{ $booking->size}}/kg<br>
                            <strong> Date:</strong> {{ date( "d-m-Y", strtotime($booking->date)) }}<br>
                            <strong> Delivery:</strong> {{ $booking->service->service_name}}<br>
                        </div>

                        <div class="flex items-center pt-3">
                            <div class="ml-4">
                                <p class="font-bold">{{ $booking->customer->name }}</p>
                                <p class="text-sm text-gray-700 mt-1">{{ $booking->customer->phone }}</p>
                                <p class="text-sm text-gray-700 mt-1">{{ $booking->customer->address }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Recipients Info -->
                    <h2 class="text-lg uppercase font-bold text-gray-700 mt-5">Deliver to:</h2>
                    <div class="bg-gray-200 text-base px-6 py-4 ">
                        <div class="flex items-center pt-3">
                            <div class="ml-4">
                                <p class="font-bold">{{ $booking->re_name }}</p>
                                <p class="text-sm text-gray-700 mt-1">{{ $booking->re_phone }}</p>
                                <p class="text-sm text-gray-700 mt-1">{{ $booking->re_address }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('trackWithCode', $booking->track_code )  }}" target="_blank"
                        class="inline-block mt-5 ml-10 px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-black rounded-full shadow ripple waves-light hover:shadow-lg focus:outline-none hover:bg-black">
                        Track Booking!
                    </a>
                </div>

                <!--End IF statement -->
                @endforeach
                @empty
                <!-- Card -->
                <div class="bg-white p-10 rounded-lg shadow-lg mt-4 mx-auto">
                    <span
                        class="px-2 float-right py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm capitalize">
                        N/A
                    </span>
                    <h1 class="text-xl font-bold">Tasks</h1>

                    <h2 class="text-lg uppercase font-bold text-gray-700 mt-8">No available bookings!</h2>
                    <a href="/"
                        class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-black rounded-full shadow ripple waves-light hover:shadow-lg focus:outline-none hover:bg-black">
                        Book Now
                    </a>

                </div>
                @endforelse


            </div>
            </section>
        </div>
    </div>
</div>
</div>
