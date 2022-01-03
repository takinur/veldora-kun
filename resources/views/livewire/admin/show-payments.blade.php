<div>

    @extends('admin.app')
    @section('content')




    <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

        <div class="bg-gray-800 pt-3">
            <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                <h3 class="font-bold pl-2">Payments</h3>
            </div>
        </div>
        <!-- component -->
        <section class="container mx-auto p-6 font-mono">
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                    <table class="w-full overflow-hidden">
                        <thead>
                            <tr
                                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Customer</th>
                                <th class="px-4 py-3">Booking ID</th>
                                <th class="px-4 py-3">Amount</th>
                                <th class="px-4 py-3">Method</th>
                                <th class="px-4 py-3">Transaction</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            @forelse ($data as $row)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-xs border">
                                    <div class="flex items-center">
                                        <div>
                                            <p class="text-sm font-semibold leading-5 text-gray-800">
                                                {{ $row->customer->name }}<br>
                                               <span class=" font-light"> {{ $row->customer->email }} </span>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm border">
                                    <div>
                                        <p class=" text-black capitalize">{{ $row->booking_id}}</p>
                                    </div>

                                </td>
                                <td class="px-4 py-3  text-sm border">
                                    <div>
                                        <p class=" text-black capitalize">{{ $row->amount  }}$
                                        </p>
                                    </div>

                                </td>
                                <td class="px-4 py-3 text-sm border">
                                    <div>
                                        <p class="text-black ">{{ $row->method  }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm border">
                                    <span class="px-2 py-1 leading-tight text-gray-dark">
                                        {{ $row->trx_id }}<br>
                                        {{$row->created_at}}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 border">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold text-black">No Payments Found!</p>

                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-ms font-semibold border">-</td>
                                <td class="px-4 py-3 text-sm border">-</td>
                                <td class="px-4 py-3 text-sm border">-</td>
                                <td class="px-4 py-3 text-sm border">-</td>
                            </tr>
                            @endforelse


                        </tbody>

                    </table>
                    <div class="mt-2 mb-4 mx-2">
                        {{ $data->links() }}
                    </div>

                </div>
            </div>
        </section>

    </div>



    @endsection

</div>
