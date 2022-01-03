<div>
    <div class="form-home" wire:ignore.self>
        <form id="SignupForm">
            {{-- Check for Errors! --}}
            @if ($errors->any())
            <div class="text-red-500 text-bold text-3xl mb-3">Something went wrong! Check below fields!</div>
            @endif
            <fieldset>
                <legend>Your Information</legend>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group require">
                            <label for="Name" class="require">Name</label>
                            <input id="Name" wire:model.defer="state.cname" type="text"
                                class="form-control validate[required]" placeholder="Enter your fullname" />
                            @error('cname')
                            <span class="text-lg text-pink-500 ml-5">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group require">
                            <label for="Phone">Phone</label>
                            <input id="Phone" wire:model.defer="state.cphone" type="text"
                                class="form-control validate[custom[phone],required]"
                                placeholder="Enter your phone number" />
                            @error('cphone')
                            <span class="text-lg text-pink-500 ml-5">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group require">
                            <label for="Email">Email</label>
                            <input id="Email" wire:model.defer="state.cemail" type="email" @unlessrole('admin') @auth
                                value="{{ Auth::user()->email }}" readonly @endauth @endrole
                                class="form-control validate[custom[email],required]"
                                placeholder="Enter your email address" />
                            @error('cemail')
                            <span class="text-lg text-pink-500 ml-5">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group require">
                            <label for="Services" class="require">Services</label>
                            <select id="Services" wire:model.defer='selectedService'
                                class="form-control validate[required]">
                                <option value=""> --Select--</option>
                                @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->service_name }}
                                    &nbsp;&nbsp;&nbsp;-
                                    {{number_format($service->price) }}$ /KG</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group require">
                            <label for="Delivery">Delivery</label>
                            <select id="Delivery" wire:model.defer='selectedDelivery'
                                class="form-control validate[required]">
                                @foreach ($delivery as $der)
                                <option value="{{ $der->id }}">{{ $der->delivery_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group require">
                            <label for="Notification">Notification</label>
                            <select id="Notification" wire:model.defer='selectedNotification'
                                class="form-control validate[required]">
                                @foreach ($notifications as $notify)
                                <option value="{{ $notify->id }}">{{ $notify->notification_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group require">
                            <label for="Address">Address</label>
                            <textarea id="Address" wire:model.defer="state.caddress"
                                class="form-control validate[required]" placeholder="Enter your address"
                                rows="5"></textarea>
                            @error('caddress')
                            <span class="text-lg text-pink-500 ml-5">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Recipient's information</legend>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group require">
                            <label for="Recipient" class="require">Recipient's Name</label>
                            <input id="Recipient" wire:model.defer="state.re_name" type="text"
                                class="form-control validate[required]" placeholder="Enter recipient's name" />
                            @error('re_name')
                            <span class="text-lg text-pink-500 ml-5">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group require">
                            <label for="Phone2">Phone</label>
                            <input id="Phone2" wire:model.defer="state.re_phone" type="text"
                                class="form-control validate[custom[phone],required]"
                                placeholder="Enter recipient's phone" />
                            @error('re_phone')
                            <span class="text-lg text-pink-500 ml-5">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group require">
                            <label for="Email2">Email</label>
                            <input id="Email2" wire:model.defer="state.re_email" type="email"
                                class="form-control validate[custom[email],required]"
                                placeholder="Enter recipient's email" />
                            @error('re_email')
                            <span class="text-lg text-pink-500 ml-5">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group require">
                            <label for="Package" class="require">Package type</label>
                            <select id="Package" wire:model.defer='selectedpkg' class="form-control validate[required]">
                                @foreach ($packageTypes as $pt)
                                <option value="{{ $pt->id }}">{{ $pt->packageType_name }}
                                    @if ($pt->price != 0)
                                    -Extra {{ number_format($pt->price) }}$
                                    @endif
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group require">
                            <label for="Size" class="require">Size</label>
                            <select id="Size" wire:model.defer='selectedSize' class="form-control validate[required]">
                                @foreach ($sizes as $sz)
                                <option value="{{ $sz['value'] }}">
                                    {{ $sz['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group require">
                            <label for="Date" class="require">Date</label>
                            <span class="form-label">Date</span>
                            <input wire:model.defer="state.date" placeholder="DD-MM-YYY" class="form-control"
                                type="date" required>
                            @error('date')
                            <span class="text-lg text-pink-500 ml-5">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group require">
                            <label for="Address2">Delivery to</label>
                            <textarea id="Address2" wire:model.defer="state.re_address"
                                class="form-control validate[required]" placeholder="Enter your adress"
                                rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group marginbot-clear">
                <input id="SaveAccount" wire:click.prevent="AddBooking()" type="button" value="Book now"
                    class="btn btn-primary" />
                <div class="col-md-3">
                    <div wire:loading class="form-btn text-blue-500">
                        Processing...
                    </div>
                </div>
            </div>

        </form>
    </div>


</div>
