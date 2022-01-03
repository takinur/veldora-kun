<div>
    <!-- component -->
    <style>
        .form-radio {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
            display: inline-block;
            vertical-align: middle;
            background-origin: border-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            flex-shrink: 0;
            border-radius: 100%;
            border-width: 2px;
        }

        .form-radio:checked {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
            border-color: transparent;
            background-color: currentColor;
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
        }

        @media not print {
            .form-radio::-ms-check {
                border-width: 1px;
                color: transparent;
                background: inherit;
                border-color: inherit;
                border-radius: inherit;
            }
        }

        .form-radio:focus {
            outline: none;
        }

        .form-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23a0aec0'%3e%3cpath d='M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z'/%3e%3c/svg%3e");
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
            background-repeat: no-repeat;
            padding-top: 0.5rem;
            padding-right: 2.5rem;
            padding-bottom: 0.5rem;
            padding-left: 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            background-position: right 0.5rem center;
            background-size: 1.5em 1.5em;
        }

        .form-select::-ms-expand {
            color: #a0aec0;
            border: none;
        }

        @media not print {
            .form-select::-ms-expand {
                display: none;
            }
        }

        @media print and (-ms-high-contrast: active),
        print and (-ms-high-contrast: none) {
            .form-select {
                padding-right: 0.75rem;
            }
        }
    </style>
    <div class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center px-5 pb-10 pt-16">

        <div class="w-full mx-auto rounded-lg bg-white shadow-lg p-5 text-gray-700" style="max-width: 600px">
            {{-- Check for stripe session ERROR! --}}
            @if(Session::has('stripe_error'))
            <div class="alert flex flex-row items-center bg-red-200 p-5 rounded border-b-2 border-red-300">
                <div
                    class="alert-icon flex items-center bg-red-100 border-2 border-red-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                    <span class="text-red-500">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </div>
                <div class="alert-content ml-4">
                    <div class="alert-title font-semibold text-4xl text-red-800">
                        Something went Wrong!
                    </div>
                    <div class="alert-description text-xl text-red-600">
                        {{ Session::get('stripe_error') }}
                    </div>
                </div>
            </div>

            @endif
            {{-- Check for Validation ERROR! --}}
            @if($errors->any())
            <div class="alert flex flex-row items-center bg-red-200 p-5 rounded border-b-2 border-red-300">
                <div
                    class="alert-icon flex items-center bg-red-100 border-2 border-red-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                    <span class="text-red-500">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </div>
                <div class="alert-content ml-4">
                    <div class="alert-title font-semibold text-4xl text-red-800">
                        Something Went wrong!
                    </div>
                    <div class="alert-description text-xl text-red-600">
                        @foreach ($errors->all() as $err )
                        {{ $err }}<br>
                        @endforeach
                    </div>
                </div>
            </div>

            @endif
            {{-- Check for session Success! --}}
            @if(Session::has('status'))
            <div class=" h-1/3">
                <div class="alert flex flex-row items-center bg-green-200 p-5 rounded border-b-2 border-green-300">
                    <div
                        class="alert-icon flex items-center bg-green-100 border-2 border-green-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                        <span class="text-green-500">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="alert-content ml-4">
                        <div class="alert-title font-semibold text-3xl text-green-800">
                            {{ Session::get('status')['successMessage'] }}
                        </div>
                        <div class="alert-description text-2xl text-green-600">
                            Tracking Code: <a class=" text-2xl" href="tracking/{{ Session::get('status')['code'] }}">
                                {{ Session::get('status')['code'] }} </a>
                        </div>
                    </div>
                </div>
                {{-- Redirect to Home Page after 10 Sec --}}
                {{-- @php
                $url1=$_SERVER['HTTP_HOST'];
                header("Refresh: 10; URL=$url1");
                @endphp --}}
            </div>
            @else
            @if($payment_mode != false)

            <div class="w-full pt-1 pb-5">
                <div
                    class="bg-indigo-500 text-white overflow-hidden rounded-full w-20 h-20 -mt-16 mx-auto shadow-lg flex justify-center items-center">
                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                </div>
            </div>
            <div class="mb-10">
                <h1 class="text-center font-bold text-xl uppercase">Secure payment info</h1>
            </div>
            <div class="mb-3 flex -mx-2">
                <div class="px-2">
                    <label for="type1" class="flex items-center cursor-pointer">
                        <input type="radio" wire:model='payment_method' value="card"
                            class="form-radio h-5 w-5 text-indigo-500" name="type" id="type1">
                        <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-8 ml-3">
                    </label>
                </div>
                <div class="px-2">
                    <label for="type2" class="flex items-center cursor-pointer">
                        <input type="radio" wire:model='payment_method' value="paypal"
                            class="form-radio h-5 w-5 text-indigo-500" name="type" id="type2">
                        <img src="https://www.sketchappsources.com/resources/source-image/PayPalCard.png"
                            class="h-8 ml-3">
                    </label>
                </div>
            </div>

            @if ($payment_method == 'card')
            <!-- Debit/Credit Card -->
            <div class="mb-3">
                <label class="font-bold text-md mb-2 ml-1">Name on card</label>
                <div>
                    <input wire:model.defer='card_name'
                        class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                        placeholder="John Smith" type="text" />
                </div>
            </div>
            <div class="mb-3">
                <label class="font-bold text-md mb-2 ml-1">Card number</label>
                <div>
                    <input wire:model.defer='card_num'
                        class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                        placeholder="0000 0000 0000 0000" type="text" />
                </div>
            </div>
            <div class="mb-3 -mx-2 flex items-end">
                <div class="px-2 w-1/3">
                    <label class="font-bold text-md mb-2 ml-1">Expiration month</label>
                    <div>
                        <select wire:model.defer='exp_month'
                            class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                            @foreach ($months as $month)
                            <option value="{{ $month['value'] }}">{{ $month['name'] }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="px-2 w-1/3">
                    <label class="font-bold text-md mb-2 ml-1">Expiration year</label>
                    <select wire:model.defer='exp_year'
                        class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                        @foreach ($years as $year )
                        <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="px-2 w-1/3">
                    <label class="font-bold text-md mb-2 ml-1">CVC/CVV</label>
                    <div>
                        <input wire:model.defer='cvc'
                            class="w-32 px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                            placeholder="000" type="text" />
                    </div>
                </div>
            </div>
            <div style="margin-top: 3em">
                <button wire:click.prevent='makePayment()'
                    class="block mt-5 w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">
                    <i class="fa fa-lock" aria-hidden="true"></i> PAY NOW {{ !empty($booking) ? $booking->price : '0'
                    }}$</button>
                <div class="content-center justify-center w-full max-w-xs mx-auto mt-4 pl-32 py-2">
                    <div wire:loading style="border-top-color:transparent"
                        class="w-16 h-16 border-4 border-blue-400 border-dotted rounded-full animate-spin">
                    </div>
                </div>
            </div>
            @elseif ($payment_method == 'paypal')
            {{-- Execute Paypal --}}

            <h3>Pay with Paypal

            </h3>
            <!-- Set up a container element for the button -->
            <div id="paypal-button-container"></div>

            <!-- Include the PayPal JavaScript SDK -->
            <script src="https://www.paypal.com/sdk/js?client-id={{config('paypal.sandbox.client_id')}}&currency=USD">
            </script>

            <script>
                // Render the PayPal button into #paypal-button-container
                paypal.Buttons({
         // Call your server to set up the transaction
                     createOrder: function(data, actions) {
                        return fetch('/api/paypal/order/create', {
                            method: 'POST',
                            body:JSON.stringify({
                                'booking_id': "6",
                                'user_id' : "2",
                                'amount' :100,
                            })
                        }).then(function(res) {
                            //res.json();
                            return res.json();
                        }).then(function(orderData) {
                            //console.log(orderData);
                            return orderData.id;
                        });
                    },

                    // Call your server to finalize the transaction
                    onApprove: function(data, actions) {
                        return fetch('/api/paypal/order/capture' , {
                            method: 'POST',
                            body :JSON.stringify({
                                orderId : data.orderID,
                                payment_gateway_id: $("#payapalId").val(),
                                user_id: "6",
                            })
                        }).then(function(res) {
                           // console.log(res.json());
                            return res.json();
                        }).then(function(orderData) {

                            // Successful capture! For demo purposes:
                          //  console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                            var transaction = orderData.purchase_units[0].payments.captures[0];
                            iziToast.success({
                                title: 'Success',
                                message: 'Payment completed',
                                position: 'topRight'
                            });
                        });
                    }

                }).render('#paypal-button-container');
            </script>

            @else
            <h4 class="text-red-500"> Sorry no Payment Method Found!</h4>
            @endif
        </div>
    </div>
    @else
    <div class=" justify-center text-center content-center">
        <a href="/" class="btn btn-primary"> Go back to Home</a>
    </div>
    @endif
    @endif
</div>

</div>
