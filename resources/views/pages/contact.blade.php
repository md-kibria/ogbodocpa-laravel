<x-page :title="$page->name" :description="$page->description" :keywords="$page->seo_keywords" :seodes="$page->seo_description">
    <div class="card-body py-5">
        <p class="w-1/2 text-center mx-auto"></p>

        <div class="flex flex-wrap">
            <form action="{{ route('message.store') }}" method="POST"
                class="w-full lg:w-1/2 px-5 lg:border-r border-gray-300">
                @csrf
                <div class="space-y-4">
                    <b class="text-gray-400 text-sm font-semibold">Available 24/7</b>
                    <h2 class="text-2xl text-gray-600 font-semibold">Get In Touch</h2>
                    <div>
                        <input type="text" name="name" id="firstNameinput" placeholder="Enter your name"
                            class="w-full border @error('name') border-red-300 @else border-gray-300 @enderror rounded px-2 py-1.5">
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="email" id="email" placeholder="Enter your email address"
                            class="w-full border @error('email') border-red-300 @else border-gray-300 @enderror rounded px-2 py-1.5">
                        @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <textarea name="message" id="message" placeholder="Enter your message" cols="30" rows="6"
                            class="w-full border @error('message') border-red-300 @else border-gray-300 @enderror rounded px-2 py-1.5"></textarea>
                        @error('message')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- reCAPTCHA --}}
                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}

                    @if ($errors->has('g-recaptcha-response'))
                        <span class="text-red-500 text-sm">{{ $errors->first('g-recaptcha-response') }}</span>
                    @endif
                    <div>
                        <button type="submit"
                            class="w-full bg-blue-400 hover:bg-blue-300 text-white py-2 rounded cursor-pointer">Submit</button>
                    </div>
                </div>
            </form>

            <div class="w-full lg:w-1/2 px-5 pt-10 lg:pt-0 flex flex-col justify-center space-y-3">


                <div class="flex items-center space-x-4">
                    <div class="flex items-center justify-center border border-gray-500 rounded-full h-9 w-9">
                        <ion-icon name="location-outline" class="text-2xl text-gray-500"></ion-icon>
                    </div>
                    <div class="flex-grow text-gray-600">
                        <h3 class="text-xl font-semibold mb-0.5">Location</h3>
                        <p class="border-b border-gray-300 text-sm pb-0.5">
                            {{ $info->address ? $info->address : '' }}</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="flex items-center justify-center border border-gray-500 rounded-full h-9 w-9">
                        <ion-icon name="call-outline" class="text-2xl text-gray-500"></ion-icon>
                    </div>
                    <div class="flex-grow text-gray-600">
                        <h3 class="text-xl font-semibold mb-0.5">Phone Number</h3>
                        <a href="tel:{{ $info->phone ? $info->phone : '' }}"
                            class="block border-b border-gray-300 text-sm pb-0.5 text-gray-600">{{ $info->phone ? $info->phone : '' }}</a>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="flex items-center justify-center border border-gray-500 rounded-full h-9 w-9">
                        <ion-icon name="print-outline" class="text-2xl text-gray-500"></ion-icon>
                    </div>
                    <div class="flex-grow text-gray-600">
                        <h3 class="text-xl font-semibold mb-0.5">Fax Number</h3>
                        <span
                            class="block border-b border-gray-300 text-sm pb-0.5 text-gray-600">{{ $info->fax }}</span>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center justify-center border border-gray-500 rounded-full h-9 w-9">
                        <ion-icon name="time-outline" class="text-2xl text-gray-500"></ion-icon>
                    </div>
                    <div class="flex-grow text-gray-600">
                        <h3 class="text-xl font-semibold mb-0.5">Business Hours</h3>
                        <span
                            class="block border-b border-gray-300 text-sm pb-0.5 text-gray-600">{{ $info->business_hours }}</span>
                    </div>
                </div>
                {{-- <div class="flex items-center space-x-4">
                    <div class="flex items-center justify-center border border-gray-500 rounded-full h-9 w-9">
                        <ion-icon name="mail-outline" class="text-2xl text-gray-500"></ion-icon>
                    </div>
                    <div class="flex-grow text-gray-600">
                        <h3 class="text-xl font-semibold mb-0.5">Email Address</h3>
                        <a href="mailto:{{ $info->email ? $info->email : '' }}"
                            class="block border-b border-gray-300 text-sm pb-0.5 text-gray-600">{{ $info->email ? $info->email : '' }}</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</x-page>
