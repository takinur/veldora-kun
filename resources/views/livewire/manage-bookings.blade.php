<div>

    <table class="w-full overflow-hidden" wire:ignore.self>

        <div class="flex flex-1 md:w-full justify-center md:justify-center text-white px-2 my-3">
            <span class="relative w-full md:w-1/3 mr-5">
                <input type="search" placeholder="Search" wire:model="search"
                    class="w-full bg-white text-gray-500 transition border focus:outline-none focus:border-gray-400 rounded py-3 px-2 pl-10 appearance-none leading-normal">
                <div class="absolute search-icon" style="top: 1rem; left: .8rem;">
                </div>
            </span>

            @if (session()->has('message'))
            <!-- Alert Success -->
            <div class="bg-green-200 px-6 py-4 mx-2  rounded-md text-lg flex items-center w-3/4 xl:w-2/4">
                <svg viewBox="0 0 24 24" class="text-green-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                    <path fill="currentColor"
                        d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                    </path>
                </svg>
                <span class="text-green-800">{{session('message')}} </span>
            </div>
            <!-- End Alert Success -->
            @endif
        </div>

        <thead>
            <tr
                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Sender Info</th>
                <th class="px-4 py-3">Recipient's Info</th>
                <th class="px-4 py-3">Package Info</th>
                <th class="px-4 py-3">Payment</th>
                <th class="px-4 py-3">Driver</th>
                <th class="px-4 py-3">Tracking</th>
                <th class="px-4 py-3">Actions</th>
            </tr>
        </thead>

        <tbody class="bg-white">
            @forelse ($bookings as $book)
            <tr class="text-gray-700">
                <td class="px-4 py-3 text-xs border">
                    <div class="flex items-center">
                        <div>
                            <div class="text-sm leading-5 text-gray-800">#{{ $book->id }}</div>
                        </div>
                    </div>
                </td>
                <td class="px-4 py-3 text-xs border">
                    <span class="px-2 py-1 font-semibold leading-tight text-gray-darker bg-gray rounded-sm capitalize">
                        {{ $book->bookingStatus->status }}
                    </span>
                </td>
                <td class="px-4 py-3 border">
                    <div>
                        <p class="font-semibold text-black capitalize">{{ $book->customer->name }}</p>
                        <p class="text-xs text-gray-600 capitalize">{{ $book->customer->email}}</p>
                        <p class="text-xs text-gray-600 capitalize">{{ $book->customer->phone }}</p>
                        <p class="text-xs text-gray-600 capitalize">{{ $book->customer->address }}</p>
                    </div>

                </td>
                <td class="px-4 py-3 border">
                    <div>
                        <p class="font-semibold text-black capitalize">{{ $book->re_name  }}</p>
                        <p class="text-xs text-gray-600 capitalize">{{ $book->re_email }}</p>
                        <p class="text-xs text-gray-600 capitalize">{{ $book->re_phone }}</p>
                        <p class="text-xs text-gray-600 capitalize">{{ $book->re_address }}</p>
                    </div>

                </td>
                <td class="px-4 py-3 text-sm border">
                    <div>
                        <p class="text-xs text-gray-600 capitalize">
                            <strong> Type:</strong> {{ $book->package->packageType_name  }}
                        </p>
                        <p class="text-xs text-gray-600 capitalize">
                            <strong> Size:</strong> {{ $book->size  }} KG</p>
                        <p class="text-xs text-gray-600 capitalize">
                            <strong> Service:</strong>
                            <span class="bg-green-100 text-green-700">  {{ $book->service->service_name  }}</span>
                            </p>
                        <p class="text-xs text-gray-600 capitalize">
                            <strong> Date:</strong>{{date( "d-m-Y", strtotime( $book->date ))}}
                        </p>
                    </div>
                </td>
                <td class="px-4 py-3 text-xs border">
                    @if ($book->paid_at == !Null)
                    <span class="px-2 py-1 font-semibold leading-tight text-green-600 bg-dark-100 rounded-sm uppercase">
                        {{$book->price}}
                    </span>
                    @else
                    <span class="px-2 py-1 font-semibold leading-tight text-red-400 bg-dark-100 rounded-sm uppercase">
                        {{ $book->price }}
                    </span>
                    @endif
                    <br> <br>
                    @if ($book->paid_at == !Null)
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">
                        Paid <small class="mt-3">{{ $book->paid_at }} </small>
                    </span>
                    @else
                    <span class="px-4 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm capitalize">
                        Pending
                    </span>
                    @endif
                </td>
                <td class="px-4 py-3 text-xs border">

                    @if ($book->driver != null && !empty($book->trackStatus))
                    <span class="px-5 py-1 font-semibold leading-tight text-gray-darker bg-gray rounded-sm capitalize">
                        {{ $book->driver->user->name}}
                    </span>

                    @elseif ($book->driver != null)

                    <span class="px-5 py-1 font-semibold leading-tight text-gray-darker bg-gray rounded-sm capitalize">
                        {{ $book->driver->user->name}}
                    </span>

                    <div class="relative mt-4">
                        <select name="driver" wire:change='assignDriver({{ $book->id }}, $event.target.value)'
                            class="rounded-full h-10  px-6 appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker"
                            id="grid-state">
                            <option selected disabled hidden>--Change--</option>
                            @foreach ($drivers as $driver)
                            <option value="{{ $driver->id }}">
                                {{ $driver->name }}

                                @endforeach
                        </select>
                    </div>

                    @else

                    <div class="relative">
                        @if(count($drivers) > 1)
                        <select name="driver" wire:change='assignDriver({{ $book->id }}, $event.target.value)'
                            class="rounded-full h-10  px-6 appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker"
                            id="grid-state">

                            <option selected disabled hidden>--Assign--</option>
                            @foreach ($drivers as $driver)
                            <option value="{{ $driver->id }}">
                                {{ $driver->name }}

                                @endforeach
                        </select>
                        @else
                        <span class=" py-1 font-semibold leading-tight text-gray-darker bg-gray rounded-sm capitalize">
                            No available Driver!
                        </span>
                        @endif
                    </div>


                    @endif


                </td>
                <td class="px-4 py-3 border">
                    <div>
                        <p class="font-semibold text-black capitalize">
                            {{ !empty($book->trackStatus) ? $book->trackStatus->name : ''}}
                        </p>
                        <p class="text-xs text-gray-600 capitalize">
                            <a href="{{ '/tracking/'.  $book->track_code}}" target="_blank"> {{ $book->track_code }}
                            </a>
                        </p>
                    </div>

                </td>
                <td class="py-3 px-4 text-center text-xs border">
                    <div class="flex item-center justify-center">
                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <a href="{{ route('bookings.edit', $book->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
                        </div>
                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <a href="#" class="modal-open" wire:click='deleteBooking({{ $book->id }})'>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            <tr class="text-gray-700">
                <td class="px-4 py-3 border">
                    <div class="flex items-center text-sm">
                        <div>
                            <p class="font-semibold text-black">No Booking Found!</p>

                        </div>
                    </div>
                </td>
                <td class="px-4 py-3 text-ms font-semibold border">-</td>
                <td class="px-4 py-3 text-sm border">-</td>
                <td class="px-4 py-3 text-sm border">-</td>
                <td class="px-4 py-3 text-sm border">-</td>
                <td class="px-4 py-3 text-sm border">-</td>
                <td class="px-4 py-3 text-sm border">-</td>
                <td class="px-4 py-3 text-sm border">-</td>
                <td class="px-4 py-3 text-sm border">-</td>
            </tr>
            @endforelse


        </tbody>

    </table>
    <div class="mt-2 mb-4 mx-2">
        {{ $bookings->links() }}
    </div>

    <!--Modal-->
    <div wire:ignore.self
        class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div
                class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
                <span class="text-sm">(Esc)</span>
            </div>

            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Deleting Booking!</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>

                <!--Body-->
                <!--content-->
                <div class="">
                    <!--body-->
                    <div class="text-center p-5 flex-auto justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4 -m-1 flex items-center text-red-500 mx-auto" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        <h2 class="text-xl font-bold py-4 ">Are you sure?</h3>
                            <p class="text-sm text-gray-500 px-8">Do you really want to delete customers booking?
                                This process cannot be undone!</p>
                    </div>
                    <!--footer-->
                    <div class="p-3  mt-2 text-center space-x-4 md:block">
                        <button
                            class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100 modal-close">
                            Cancel
                        </button>
                        <button wire:click.prevent='removeUser()'
                            class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600 modal-close">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        var openmodal = document.querySelectorAll('.modal-open')
  for (var i = 0; i < openmodal.length; i++) {
    openmodal[i].addEventListener('click', function(event){
      event.preventDefault()
      toggleModal()
    })
  }

  const overlay = document.querySelector('.modal-overlay')
  overlay.addEventListener('click', toggleModal)

  var closemodal = document.querySelectorAll('.modal-close')
  for (var i = 0; i < closemodal.length; i++) {
    closemodal[i].addEventListener('click', toggleModal)
  }

  document.onkeydown = function(evt) {
    evt = evt || window.event
    var isEscape = false
    if ("key" in evt) {
      isEscape = (evt.key === "Escape" || evt.key === "Esc")
    } else {
      isEscape = (evt.keyCode === 27)
    }
    if (isEscape && document.body.classList.contains('modal-active')) {
      toggleModal()
    }
  };


  function toggleModal () {
    const body = document.querySelector('body')
    const modal = document.querySelector('.modal')
    modal.classList.toggle('opacity-0')
    modal.classList.toggle('pointer-events-none')
    body.classList.toggle('modal-active')
  }




    </script>






</div>
