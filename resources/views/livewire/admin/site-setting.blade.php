<div>

    <h1 class=" text-5xl uppercase font-semibold text-gray-700"> Services </h1>
    {{-- <button wire:click.prevent=''
                        class="modal-open float-right py-2 px-4 mr-5 text-white rounded-lg bg-black shadow-lg block md:inline-block">Add New</button> --}}
    <table class="w-full overflow-hidden">

        <thead>
            <tr
                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Service Name</th>
                <th class="px-4 py-3">Service Price</th>
                <th class="px-4 py-3 text-center">Action </th>


            </tr>
        </thead>

        <tbody class="bg-white">
            @foreach ($services as $index => $service)
            <tr class="text-gray-700">
                <td class="px-4 py-3 text-xs border">
                    <div class="flex items-center">

                        <div class="text-sm font-semibold leading-5 text-gray-800">#{{ $service['id'] }}
                        </div>

                    </div>
                </td>
                <td class="px-4 py-3 text-sm border">
                    @if ($editedServiceIndex === $index)

                    <input type="text" wire:model.defer='services.{{ $index }}.service_name'>

                    @if($errors->has('services.' .$index . '.service_name' ))
                    <div class="text-red-500"> {{ $errors->first('services.'.$index.'.service_name') }}</div>
                    @endif

                    @else
                    <div class=" cursor-pointer text-black capitalize">{{ $service['service_name']}}</div>

                    @endif

                </td>

                <td class="px-4 py-3 text-sm border">
                    @if ($editedServiceIndex === $index)
                    <input type="text" wire:model.defer='services.{{ $index }}.price'>
                    @if($errors->has('services.' .$index . '.price' ))
                    <div class="text-red-500"> {{ $errors->first('services.'.$index.'.price') }}</div>
                    @endif
                    @else

                    <span class="px-2 py-1 leading-tight text-gray-dark">
                        {{ $service['price']}}$
                    </span>
                    @endif
                </td>
                <td class="px-4 py-3 text-sm border">
                    @if ($editedServiceIndex !== $index)
                    <button wire:click.prevent='editService({{ $index }})'
                        class="py-2 px-4 text-white rounded-lg bg-purple-600 shadow-lg block md:inline-block">Edit</button>
                    @else
                    <button wire:click.prevent='saveService({{ $index }})'
                        class="py-2 px-4 text-white rounded-lg bg-green-400 shadow-lg block md:inline-block">Save</button>
                    <button wire:click.prevent='resetEditMode()'
                        class="py-2 px-4 text-white rounded-lg bg-red-400 shadow-lg block md:inline-block">Cancel</button>
                    @endif

                </td>
            </tr>
            @endforeach

        </tbody>

    </table>

    <h1 class="mt-6 text-5xl uppercase font-semibold text-gray-700"> Package Types </h1>
    <table class="w-full overflow-hidden">

        <thead>
            <tr
                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3"> Price</th>
                <th class="px-4 py-3 text-center">Action</th>
            </tr>
        </thead>

        <tbody class="bg-white">
            @foreach ($packages as $index => $package)
            <tr class="text-gray-700">
                <td class="px-4 py-3 text-xs border">
                    <div class="flex items-center">

                        <div class="text-sm font-semibold leading-5 text-gray-800">#{{ $package['id'] }}
                        </div>

                    </div>
                </td>
                <td class="px-4 py-3 text-sm border">
                    @if ($editedPackageIndex === $index)

                    <input type="text" wire:model.defer='packages.{{ $index }}.packageType_name'>

                    @if($errors->has('packages.' .$index . '.packageType_name' ))
                    <div class="text-red-500"> {{ $errors->first('packages.'.$index.'.packageType_name') }}</div>
                    @endif

                    @else
                    <div class=" cursor-pointer text-black capitalize">{{ $package['packageType_name']}}</div>

                    @endif

                </td>

                <td class="px-4 py-3 text-sm border">
                    @if ($editedPackageIndex === $index)
                    <input type="text" wire:model.defer='packages.{{ $index }}.price'>
                    @if($errors->has('packages.' .$index . '.price' ))
                    <div class="text-red-500"> {{ $errors->first('packages.'.$index.'.price') }}</div>
                    @endif
                    @else

                    <span class="px-2 py-1 leading-tight text-gray-dark">
                        {{ $package['price']}}$
                    </span>
                    @endif
                </td>
                <td class="px-4 py-3 text-sm border">
                    @if ($editedPackageIndex !== $index)
                    <button wire:click.prevent='editPackage({{ $index }})'
                        class="py-2 px-4 text-white rounded-lg bg-purple-600 shadow-lg block md:inline-block">Edit</button>
                    @else

                    <button wire:click.prevent='savePackage({{ $index }})'
                        class="py-2 px-4 text-white rounded-lg bg-green-400 shadow-lg block md:inline-block">Save</button>
                    <button wire:click.prevent='resetEditMode()'
                        class="py-2 px-4 text-white rounded-lg bg-red-400 shadow-lg block md:inline-block">Cancel</button>
                    @endif

                </td>
            </tr>
            @endforeach

        </tbody>

    </table>
{{--
    <div class="mt-8">

        <!-- component -->
        <div class=" bg-gray-100 flex justify-center items-center">
            <div class="container mx-auto bg-indigo-500 rounded-lg p-14">
                @if($errors->any())
                @foreach ($errors->all() as $err )
                <li class="text-black">{{ $err }} </li>
                @endforeach
                @endif
                @if (session()->has('message'))
                <!-- Alert Success -->
                <div class="bg-green-200 px-6 py-4 mx-2  rounded-md text-lg flex items-center w-full">
                    <svg viewBox="0 0 24 24" class="text-green-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                        <path fill="currentColor"
                            d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                        </path>
                    </svg>
                    <span class="text-green-800">{{session('message')}} </span>
                </div>
                <!-- End Alert Success -->
                @endif
                <!-- Stripe -->
                <h1 class="text-white font-extrabold text-2xl"> Stripe API Key </h1>


                <form class="m-4 flex">

                    <input wire:model.defer='strSecrect'
                        class="rounded-l-lg w-full p-4 border-t mr-0 border-b border-l text-gray-800 border-gray-200 bg-white" />
                    <button wire:click.prevent='strConfig()'
                        class="px-8 rounded-r-lg bg-yellow-400  text-gray-800 font-bold p-4 uppercase border-yellow-500 border-t border-b border-r">Save</button>
                </form>
                <!-- MAIL -->
                <h1 class="text-white font-extrabold text-2xl mt-12"> Mail Setting (SMTP) </h1>
                <form class="m-4 flex">
                    <input
                        class="rounded-l-lg w-full p-4 border-t mr-0 border-b border-l text-gray-800 border-gray-200 bg-white"
                        placeholder="your@mail.com" />
                    <button
                        class="px-8 rounded-r-lg bg-yellow-400  text-gray-800 font-bold p-4 uppercase border-yellow-500 border-t border-b border-r">Save</button>
                </form>
            </div>
        </div>

    </div> --}}


    {{--
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




    </script> --}}
</div>
