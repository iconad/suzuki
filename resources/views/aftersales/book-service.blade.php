@extends('layouts.app')

@section('content')

<section class="vehicle-info section space-y-16 xxl:space-y-24" id="bladeApp">

    <div class="cover relative">
        <img src="{{asset('assets/images/suzuki-bg.jpg')}}" alt="cover" class="w-full">
        <div class="absolute inset-0 bg-black bg-opacity-25">
            <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800 flex items-end h-full pb-8 md:pb-16 xxl:pb-32">
                <h1 class="suzuki-bold">
                    <span class="text-4xl lg:-mb-3 md:text-6xl lg:text-8xl uppercase block text-white opacity-50 md:opacity-25">Book</span>
                    <span class="text-3xl md:text-5xl lg:text-6xl uppercase block text-white">A Service</span>
                </h1>
            </div>
        </div>
    </div>
    {{-- row --}}


    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800">
        <div class="w-full space-y-10">

            <div class="content text-lg">
                <h2 class="text-3xl suzuki-bold uppercase text-theme-skyblue">SERVICING</h2>
                <p>If your warranty is running out, you can continue protecting your car with a Suzuki Extended Warranty.</p>
                <p>
                    You’ll be able to protect against the cost of future repair and replacement parts with our Extended Warranty, which is designed to give you the flexibility you need. So, for example, you can choose from three levels of cover, a choice of excess level and the option to pay as you go. And, if you decide an Extended Warranty isn’t for you – you’re free to cancel your policy at any time.
                </p>
                <p>
                    Help us making your journey and Suzuki Service Experience a memorable one.
                </p>
                <p>
                    Book an Appointment for all your servicing needs, including Express maintenance & get
                </p>
                <ul>
                    <li> Priority Privileged Services  </li>
                    <li> Extra 5% discount on Published Menu Pricing if booked between Monday to Wednesday for Periodic Maintenance Services </li>
                    <li> Saturday Appointments (Cut off time Wednesday 5 pm) </li>
                    <li> Free End of Warranty Inspection </li>
                    <li> Recall / Product Update Check done in Advance </li>
                </ul>
            </div>

            <div>
                <book-service></book-service>
            </div>





        </div>
    </div>

</section>

@endsection
