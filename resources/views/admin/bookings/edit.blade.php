@extends('admin.app')


@section('content')

<div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

    <div class="bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2 md:space-x-20 space-y-10 md:space-y-0">Edit Booking # {{ $booking->id }}
                <a href="{{ route('bookings.index') }}"
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

            <form action="{{ route('bookings.update', $booking->id) }}" method="POST" id="bookingForm">
                @csrf
                @method('PUT')
                <div class="-mx-3 md:flex mb-8">
                    <div class="md:w-1/2 px-3">
                        <label class="block font-extrabold uppercase bg-green-100 tracking-wide text-green-700 text-xs mb-2"
                            for="grid-state">
                            Booking Status
                        </label>
                        <div class="relative">
                            <select name="bookStatus"
                                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                id="grid-state">
                                @foreach ($bookStatus as $sr)
                                <option value="{{ $sr->id }}"
                                    {{ $booking->bookingstatus_id == $sr->id ? 'selected="selected"' : '' }}>
                                    {{ $sr->status }}
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name">
                            Date
                        </label>
                        <input value="{{date( "d-m-Y", strtotime( $booking->date )) }}"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4"
                            id="name" type="text" placeholder="Y-M-D" name="date">
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase  text-red-400 tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-state ">
                            Payment Status
                        </label>
                        <div class="relative">
                            <select name="payment"
                                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                id="grid-state">
                                @if ($booking->paid_at != null)
                                <option selected value="1">Paid</option>
                                <option value="2">Unpaid</option>
                                @else
                                <option value="1">Paid</option>
                                <option selected value="2">Unpaid</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-red-400 text-xs font-bold mb-2" for="name">
                            Price
                        </label>
                        <input value="{{ $booking->price }}"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4"
                            id="name" type="text" name="price">
                        <input type="text" class="hidden" value="{{ $booking->price }}" name="currentPrice" id=""
                            hidden>
                        {{-- <small> Customer will recieve Email for updated Payment! </small> --}}
                    </div>
                </div>
                <hr class="divide-green-300 border-1 border-green-400" />

                <div class="-mx-3 md:flex mb-6 mt-12">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name">
                            Sender Name
                        </label>
                        <input value="{{ $customer->name }}"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                            id="name" type="text" name="cname">
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="email">
                            Sender Email
                        </label>
                        <input value="{{ $customer->email }}"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                            id="email" type="email" name="cemail">
                    </div>
                </div>
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="phone">
                            Sender Phone
                        </label>
                        <input value="{{ $customer->phone }}"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
                            id="phone" type="text" name="cphone">
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="phone">
                            Sender Address
                        </label>
                        <input value="{{ $customer->address }}"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
                            id="phone" type="text" name="caddress">
                    </div>
                </div>
                <hr class="divide-green-300 border-1 border-green-400" />


                <div class="-mx-3 md:flex mb-6 mt-8">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name">
                            recipients Name
                        </label>
                        <input value="{{ $booking->re_name }}"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                            id="name" type="text" name="re_name">
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="email">
                            recipients Email
                        </label>
                        <input value="{{ $booking->re_email }}"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                            id="email" type="email" name="re_email">
                    </div>
                </div>
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="phone">
                            recipients Phone
                        </label>
                        <input value="{{ $booking->re_phone }}"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
                            id="phone" type="text" name="re_phone">
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="phone">
                            recipients Address
                        </label>
                        <input value="{{ $booking->re_address }}"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
                            id="phone" type="text" name="re_address">
                    </div>
                </div>

                <hr class="divide-green-300 border-1 border-green-400" />

                <div class="-mx-3 md:flex mb-8">
                    <div class="md:w-1/2 px-3 mt-6">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-state">
                            Service Type
                        </label>
                        <div class="relative">
                            <select name="service"
                                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                id="grid-state">
                                @foreach ($services as $sr)
                                <option value="{{ $sr->id }}"
                                    {{ $booking->service_id == $sr->id ? 'selected="selected"' : '' }}>
                                    {{ $sr->service_name }}
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="md:w-1/2 px-3 mt-6">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-state">
                            Delivery Type
                        </label>
                        <div class="relative">
                            <select name="delivery"
                                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                id="grid-state">
                                @foreach ($delivery as $sr)
                                <option value="{{ $sr->id }}"
                                    {{ $booking->delivery_id == $sr->id ? 'selected="selected"' : '' }}>
                                    {{ $sr->delivery_name }}
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="md:w-1/2 px-3 mt-6">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-state">
                            Package Type
                        </label>
                        <div class="relative">
                            <select name="pkgtype"
                                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                id="grid-state">
                                @foreach ($packageTypes as $sr)
                                <option value="{{ $sr->id }}"
                                    {{ $booking->package_id == $sr->id ? 'selected="selected"' : '' }}>
                                    {{ $sr->packageType_name }}
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="md:w-1/2 px-3 mt-6">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-state">
                            Size
                        </label>
                        <div class="relative">
                            <select name="size"
                                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                id="grid-state">

                                @foreach ($sizes as $sz)
                                <option value="{{ $sz['value'] }}"
                                    {{ $booking->size == $sz['value'] ? 'selected="selected"' : '' }}>
                                    {{ $sz['name'] }}
                                    @endforeach


                            </select>
                        </div>
                    </div>
                    <div class="md:w-1/2 px-3 mt-6">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-state">
                            Notification
                        </label>
                        <div class="relative">
                            <select name="notify"
                                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                id="grid-state">
                                @foreach ($notifications as $sr)
                                <option value="{{ $sr->id }}"
                                    {{ $booking->notification_id == $sr->id ? 'selected="selected"' : '' }}>
                                    {{ $sr->notification_name }}
                                    @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="py-3 px-6 transition duration-200 text-white hover:bg-purple-500  focus:ring-purple-500 focus:bg-purple-700 focus:shadow-sm focus:ring-4 focus:ring-opacity-50 rounded-lg bg-purple-600 shadow-lg block md:inline-block w-full">
                    <span class="inline-block mr-2">Update</span>
                </button>

            </form>

        </div>
    </section>

</div>


@endsection
