@extends('layouts.main')

@section('title', $page->name)
@section('description', $page->description)

{{-- title, description, content(optional), count(optional) --}}
@section('content')

    <section class="min-h-screen relative py-15 flex flex-col items-center about-page">

        <div
            class="h-[450px] w-[calc(100%+100px)] bg-blue-100 absolute -top-20 -left-10 z-10 flex flex-col items-center justify-center rotate-[-5deg]">
        </div>

        <div class="flex flex-col items-center z-20 pt-5 pb-7">
            <h1 class="text-4xl font-bold text-slate-600 text-center pb-3">{{ $page->name }}</h1>
            <p class="text-slate-400 text-center w-[80%] md:w-[60%] xl:w-[50%] mx-auto min-w-44">{{ $page->description }}</p>
        </div>



        <div class="w-full md:w-3/4 lg:w-3/4 rounded-lg shadow-lg p-6 z-20 bg-slate-400">

            <ol class="flex items-center w-full mb-4 sm:mb-5 ml-0 sm:ml-20 pt-10 pb-5">
                <li id="step1"
                    class="flex w-full items-center text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block">
                    <div
                        class="flex items-center justify-center w-10 h-10 bg-blue-300 rounded-full lg:h-12 lg:w-12 shrink-0">
                        <ion-icon class="my-auto block text-2xl" name="layers"></ion-icon>
                    </div>
                </li>
                <li id="step2"
                    class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block">
                    <div
                        class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 shrink-0">
                        <ion-icon class="my-auto block text-2xl text-blue-400" name="time"></ion-icon>
                    </div>
                </li>
                <li id="step3"
                    class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block">
                    <div
                        class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 shrink-0">
                        <ion-icon class="my-auto block text-2xl text-blue-400" name="clipboard"></ion-icon>
                    </div>
                </li>
                <li id="step4" class="flex items-center w-full">
                    <div
                        class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 shrink-0">
                        <ion-icon class="my-auto block text-2xl text-blue-400" name="checkmark-done-circle"></ion-icon>
                    </div>
                </li>
            </ol>


            <div id="stepContent1" class=" sm:mx-20">
                <form action="#" class="bg-salte-600">
                    <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Service & Date</h3>
                    <div class="grid gap-4 mb-4 sm:grid-cols-3">
                        <div>
                            <label for="service"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service</label>
                            <select name="service" id="service"
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">Select Service</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                            <input type="date" name="date" id="date"
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="with"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">With</label>
                            <select name="with" id="with"
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">Select</option>

                            </select>
                        </div>
                    </div>
                </form>

                <div class="bg-gray-300 border border-gray-200 rounded-md p-4 mt-10 mb-4">
                    <p class="text-gray-600 text-sm">Please select service, date and provider then click on the Find
                        Appointments button.</p>
                </div>
                <div class="flex justify-end">
                    @auth
                        <button id="check" onclick="goToStep(2)"
                            class="bg-sky-500 hover:bg-sky-600 text-white font-medium px-8 py-2 rounded-md transition-colors">
                            CHECK AVAILABILITY
                        </button>
                    @endauth
                    @guest
                        <button
                            class="bg-gray-500 hover:bg-gray-500 mr-2 text-white font-medium px-8 py-2 rounded-md transition-colors">
                            CHECK AVAILABILITY
                        </button>
                        <a href="{{ route('login') }}"
                            class="inline-block bg-sky-500 hover:bg-sky-600 text-white font-medium px-8 py-2 rounded-md transition-colors">
                            Login
                        </a>
                    @endguest
                </div>
            </div>



            <div id="stepContent2" class="hidden sm:mx-20">
                <div class="bg-salte-600">
                    <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Select Time Slot</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-6" id="timeSlots">
                        {{-- <div class="flex flex-col border border-slate-600 items-center w-full p-4 rounded-lg">
                            <h3 class="text-slate-800 text-center w-full text-2xl font-semibold pt-2">10:00 AM</h3>
                            <span class="text-slate-600">(to 11:00 AM)</span>

                            <button
                                class="bg-green-700 hover:bg-green-600 transition-all px-6 py-1 text-lg text-white rounded mt-4 cursor-pointer">Select</button>
                        </div> --}}
                    </div>

                    <div class="flex justify-between pt-4 border-t border-slate-300">
                        <button onclick="goToStep(1)"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-6 py-2 rounded-md transition-colors">
                            BACK
                        </button>
                        <button id="continue" onclick="goToStep(3)"
                            class="bg-sky-500 hover:bg-sky-600 text-white font-medium px-6 py-2 rounded-md transition-colors">
                            CONTINUE
                        </button>
                    </div>
                </div>
            </div>

            <div id="stepContent3" class="hidden sm:mx-20">
                <h3 class="mb-6 text-lg font-medium leading-none text-gray-900 dark:text-white">Confirm Your Details</h3>

                <div class="bg-slate-500 rounded-lg p-6 mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="font-medium text-gray-200">Service:</span>
                            <span class="text-gray-100" id="preview_title">General Consultation</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="font-medium text-gray-200">Date:</span>
                            <span class="text-gray-100" id="preview_date">10/03/2025</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="font-medium text-gray-200">Time:</span>
                            <span class="text-gray-100" id="preview_time">09:00 AM</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="font-medium text-gray-200">Provider:</span>
                            <span class="text-gray-100" id="preview_name">Dr. Sarah Johnson</span>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between pt-4 border-t border-slate-300">
                    <button onclick="goToStep(2)"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-6 py-2 rounded-md transition-colors">
                        BACK
                    </button>
                    <button id="confirm" onclick="goToStep(4)"
                        class="bg-sky-500 hover:bg-sky-600 text-white font-medium px-6 py-2 rounded-md transition-colors">
                        CONFIRM BOOKING
                    </button>
                </div>
            </div>

            <div id="stepContent4" class="hidden text-center py-12 sm:mx-20">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Thank You!</h2>
                <p class="text-gray-600 mb-2">Your appointment has been successfully booked.</p>
                {{-- <p class="text-gray-600 mb-8">A confirmation email has been sent to your email address.</p> --}}

                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 max-w-md mx-auto">
                    <p class="text-sm text-gray-700">
                    <p class="font-semibold">Appointment Details:</p><span id="confirm_msg"></span>
                    </p>
                </div>

                <a href="{{ route('profile') }}"
                    class="inline-block mt-8 bg-sky-500 hover:bg-sky-600 text-white font-medium px-8 py-3 rounded-md transition-colors">
                    Go To Profile
                </a>
            </div>

        </div>
        </div>


        <script>
            function goToStep(step) {
                for (let i = 1; i <= 4; i++) {
                    document.getElementById('stepContent' + i).classList.add('hidden');
                }

                if (step == 1) {
                    // Step 1
                    const step1 = document.querySelector('#step1')
                    step1.classList.remove('after:border-blue-300')
                    step1.classList.add('after:border-blue-100')

                    const step1_div = document.querySelector('#step1 div')
                    step1_div.classList.remove('bg-blue-100')
                    step1_div.classList.add('bg-blue-300')

                    // Step 2
                    const step2 = document.querySelector('#step2')
                    step2.classList.remove('after:border-blue-300')
                    step2.classList.add('after:border-blue-100')

                    const step2_div = document.querySelector('#step2 div')
                    step2_div.classList.remove('bg-blue-300')
                    step2_div.classList.add('bg-blue-100')

                    // Step 3
                    const step3 = document.querySelector('#step3')
                    step3.classList.remove('after:border-blue-300')
                    step3.classList.add('after:border-blue-100')

                    const step3_div = document.querySelector('#step3 div')
                    step3_div.classList.remove('bg-blue-300')
                    step3_div.classList.add('bg-blue-100')

                    // Step 4

                    const step4_div = document.querySelector('#step4 div')
                    step4_div.classList.remove('bg-blue-300')
                    step4_div.classList.add('bg-blue-100')
                }

                if (step == 2) {
                    // Step 1
                    const step1 = document.querySelector('#step1')
                    step1.classList.remove('after:border-blue-100')
                    step1.classList.add('after:border-blue-300')

                    const step1_div = document.querySelector('#step1 div')
                    step1_div.classList.remove('bg-blue-100')
                    step1_div.classList.add('bg-blue-300')

                    // Step 2
                    const step2 = document.querySelector('#step2')
                    step2.classList.remove('after:border-blue-300')
                    step2.classList.add('after:border-blue-100')

                    const step2_div = document.querySelector('#step2 div')
                    step2_div.classList.remove('bg-blue-100')
                    step2_div.classList.add('bg-blue-300')

                    // Step 3
                    const step3 = document.querySelector('#step3')
                    step3.classList.remove('after:border-blue-300')
                    step3.classList.add('after:border-blue-100')

                    const step3_div = document.querySelector('#step3 div')
                    step3_div.classList.remove('bg-blue-300')
                    step3_div.classList.add('bg-blue-100')

                    // Step 4

                    const step4_div = document.querySelector('#step4 div')
                    step4_div.classList.remove('bg-blue-300')
                    step4_div.classList.add('bg-blue-100')
                }

                if (step == 3) {
                    // Step 1
                    const step1 = document.querySelector('#step1')
                    step1.classList.remove('after:border-blue-100')
                    step1.classList.add('after:border-blue-300')

                    const step1_div = document.querySelector('#step1 div')
                    step1_div.classList.remove('bg-blue-100')
                    step1_div.classList.add('bg-blue-300')

                    // Step 2
                    const step2 = document.querySelector('#step2')
                    step2.classList.remove('after:border-blue-100')
                    step2.classList.add('after:border-blue-300')

                    const step2_div = document.querySelector('#step2 div')
                    step2_div.classList.remove('bg-blue-100')
                    step2_div.classList.add('bg-blue-300')

                    // Step 3
                    const step3 = document.querySelector('#step3')
                    step3.classList.remove('after:border-blue-300')
                    step3.classList.add('after:border-blue-100')

                    const step3_div = document.querySelector('#step3 div')
                    step3_div.classList.remove('bg-blue-100')
                    step3_div.classList.add('bg-blue-300')

                    // Step 4

                    const step4_div = document.querySelector('#step4 div')
                    step4_div.classList.remove('bg-blue-300')
                    step4_div.classList.add('bg-blue-100')
                }

                if (step == 4) {
                    // Step 1
                    const step1 = document.querySelector('#step1')
                    step1.classList.remove('after:border-blue-100')
                    step1.classList.add('after:border-blue-300')

                    const step1_div = document.querySelector('#step1 div')
                    step1_div.classList.remove('bg-blue-100')
                    step1_div.classList.add('bg-blue-300')

                    // Step 2
                    const step2 = document.querySelector('#step2')
                    step2.classList.remove('after:border-blue-100')
                    step2.classList.add('after:border-blue-300')

                    const step2_div = document.querySelector('#step2 div')
                    step2_div.classList.remove('bg-blue-100')
                    step2_div.classList.add('bg-blue-300')

                    // Step 3
                    const step3 = document.querySelector('#step3')
                    step3.classList.remove('after:border-blue-100')
                    step3.classList.add('after:border-blue-300')

                    const step3_div = document.querySelector('#step3 div')
                    step3_div.classList.remove('bg-blue-100')
                    step3_div.classList.add('bg-blue-300')

                    // Step 4

                    const step4_div = document.querySelector('#step4 div')
                    step4_div.classList.remove('bg-blue-100')
                    step4_div.classList.add('bg-blue-300')
                }

                document.getElementById('stepContent' + step).classList.remove('hidden');

                const progressPercentage = ((step - 1) / 3) * 100;
                document.getElementById('progressBar').style.width = progressPercentage + '%';

                for (let i = 1; i <= 4; i++) {
                    const circle = document.getElementById('step' + i);
                    const label = document.getElementById('step' + i + 'Label');

                    if (i <= step) {
                        circle.classList.remove('bg-gray-300', 'text-gray-500');
                        circle.classList.add('bg-sky-500', 'text-white');
                        if (label) {
                            label.classList.remove('text-gray-400');
                            label.classList.add('text-gray-700');
                        }
                    } else {
                        circle.classList.remove('bg-sky-500', 'text-white');
                        circle.classList.add('bg-gray-300', 'text-gray-500');
                        if (label) {
                            label.classList.remove('text-gray-700');
                            label.classList.add('text-gray-400');
                        }
                    }
                }
            }
        </script>

        <script>

            const fetchUrl = `{{ url('/api/appointment') }}`;

            document.addEventListener('DOMContentLoaded', function() {
                const service = document.getElementById('service');
                const date = document.getElementById('date');
                const withSelect = document.getElementById('with');
                const timeSlots = document.getElementById('timeSlots');

                date.addEventListener('change', function() {
                    localStorage.setItem('selectedDate', date.value);
                });

                service.addEventListener('change', function() {
                    withSelect.innerHTML = '<option value="">Loading...</option>';

                    const serviceId = service.value;
                    if (!serviceId) {
                        withSelect.innerHTML = '<option value="">Select</option>';
                        return;
                    }
                    localStorage.setItem('selectedServiceId', serviceId);
                    fetch(`${fetchUrl}/service/${serviceId}`)
                        .then(response => response.json())
                        .then(data => {
                            withSelect.innerHTML = '<option value="">Select</option>';
                            data.forEach(item => {
                                const option = document.createElement('option');
                                option.value = item.id;
                                option.textContent = item.name;
                                withSelect.appendChild(option);
                            });
                        })
                        .catch(() => {
                            withSelect.innerHTML = '<option value="">Select</option>';
                        });
                });

                withSelect.addEventListener('change', function() {
                    const consultainId = withSelect.value;
                    localStorage.setItem('selectedConsultainId', consultainId);
                });

                document.getElementById('check').addEventListener('click', function() {
                    const serviceId = localStorage.getItem('selectedServiceId');
                    const consultainId = localStorage.getItem('selectedConsultainId');
                    const selectedDate = localStorage.getItem('selectedDate');

                    if (!serviceId || !consultainId || !selectedDate) {
                        alert('Please select service, date, and provider.');
                        return;
                    }

                    fetch(
                            `${fetchUrl}/consultain/${consultainId}?date=${localStorage.getItem('selectedDate')}`
                        )
                        .then(response => response.json())
                        .then(data => {
                            timeSlots.innerHTML = '';
                            data.forEach(slot => {
                                const slotDiv = document.createElement('div');
                                slotDiv.className =
                                    'flex flex-col border border-slate-300 items-center w-full p-4 rounded-lg';

                                const timeH3 = document.createElement('h3');
                                timeH3.className =
                                    'text-slate-200 text-center w-full text-2xl font-semibold pt-2';
                                timeH3.innerHTML = '<h1 class="flex gap-1"><ion-icon class="text-2xl font-bold mt-1" name="time-outline"></ion-icon>' + new Date('1970-01-01T' + slot.start_time)
                                    .toLocaleTimeString('en-US', {
                                        hour: '2-digit',
                                        minute: '2-digit',
                                        hour12: true
                                    }) + '</h1>';


                                const span = document.createElement('span');
                                span.className = 'text-slate-300';
                                span.textContent = `(to ${new Date('1970-01-01T' + slot.end_time)
                                    .toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true })})`;

                                const button = document.createElement('button');
                                button.className =
                                    'bg-blue-500 hover:bg-blue-600 transition-all px-6 py-1 text-lg text-white rounded mt-4 cursor-pointer select-button';
                                button.textContent = 'Select';
                                button.addEventListener('click', selectTimeSlot);
                                button.setAttribute('slot_id', slot.id);

                                const buttonDisabled = document.createElement('button');
                                buttonDisabled.className =
                                    'bg-gray-500 transition-all px-6 py-1 text-lg text-white rounded mt-4 cursor-default select-button';
                                buttonDisabled.textContent = 'Unavailable';
                                buttonDisabled.disabled = true;

                                slotDiv.appendChild(timeH3);
                                slotDiv.appendChild(span);
                                if (!slot.is_booked) {
                                    slotDiv.appendChild(button);
                                } else {
                                    slotDiv.appendChild(buttonDisabled);
                                }

                                timeSlots.appendChild(slotDiv);
                            });
                        })
                        .catch(() => {
                            // Handle error
                        });

                });

                function selectTimeSlot(event) {
                    const buttons = document.querySelectorAll('.select-button');
                    buttons.forEach(btn => {
                        btn.classList.remove('bg-blue-500');
                        btn.classList.add('bg-blue-600');
                    });

                    const button = event.target;
                    // button.classList.remove('bg-green-700');
                    // button.classList.add('bg-green-600');

                    localStorage.setItem('selectedSlotId', button.getAttribute('slot_id'));
                }

                document.getElementById('continue').addEventListener('click', function() {
                    const serviceId = localStorage.getItem('selectedServiceId');
                    const consultainId = localStorage.getItem('selectedConsultainId');
                    const selectedDate = localStorage.getItem('selectedDate');
                    const slotId = localStorage.getItem('selectedSlotId');

                    if (!serviceId || !consultainId || !selectedDate || !slotId) {
                        alert('Please select a time slot.');
                        return;
                    }

                    fetch(
                            `${fetchUrl}/preview?service_id=${serviceId}&consultain_id=${consultainId}&date=${selectedDate}&slot_id=${slotId}`
                        )
                        .then(response => response.json())
                        .then(data => {
                            // Update confirmation step with fetched data
                            document.querySelector('#preview_title').textContent = data
                                .service.title;
                            document.querySelector('#preview_date')
                                .textContent = new Date(data.date).toLocaleDateString();
                            document.querySelector('#preview_time')
                                .textContent = new Date('1970-01-01T' + data.time_slot.start_time)
                                .toLocaleTimeString([], {
                                    hour: '2-digit',
                                    minute: '2-digit',
                                    hour12: true
                                }) + ' - ' + new Date('1970-01-01T' + data.time_slot.end_time)
                                .toLocaleTimeString([], {
                                    hour: '2-digit',
                                    minute: '2-digit',
                                    hour12: true
                                });
                            document.querySelector('#preview_name')
                                .textContent = data.consultain.name;

                        })
                        .catch(() => {
                            alert('Error fetching appointment details. Please try again.');
                        });
                });

                document.getElementById('confirm').addEventListener('click', function() {
                    const serviceId = localStorage.getItem('selectedServiceId');
                    const consultainId = localStorage.getItem('selectedConsultainId');
                    const selectedDate = localStorage.getItem('selectedDate');
                    const slotId = localStorage.getItem('selectedSlotId');

                    if (!serviceId || !consultainId || !selectedDate || !slotId) {
                        alert('Please complete all selections before confirming.');
                        return;
                    }

                    fetch(
                            `${fetchUrl}/confirm?service_id=${serviceId}&consultain_id=${consultainId}&date=${selectedDate}&slot_id=${slotId}`
                        )
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);

                            if (data.status === 200) {
                                document.querySelector('#confirm_msg').innerHTML = data.message;
                            } else {
                                alert('Error confirming appointment. Please try again.');
                            }
                        })
                        .catch(() => {
                            alert('Error confirming appointment. Please try again.');
                        });
                });
            });
        </script>
    </section>
@endsection
