@extends('layouts.app')

@section('content')

<section class="vehicle-info section space-y-16 xxl:space-y-24" id="bladeApp">

    <div class="cover relative">
        <img src="{{asset('assets/images/suzuki-bg.jpg')}}" alt="cover" class="w-full">
        <div class="absolute inset-0 bg-black bg-opacity-25">
            <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800 flex items-end h-full pb-8 md:pb-16 xxl:pb-32">
                <h1 class="suzuki-bold leading-none md:leading-12">
                    <span class="text-3xl md:text-5xl lg:text-6xl uppercase block text-white">Warranty</span>
                </h1>
            </div>
        </div>
    </div>
    {{-- row --}}


    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800">
        <div class="w-full space-y-10">

            <div class="content text-lg">
                <h2 class="text-3xl suzuki-bold uppercase text-theme-skyblue">Warranty</h2>
                <p>If your warranty is running out, you can continue protecting your car with a Suzuki Extended Warranty.</p>
                <p>
                    You’ll be able to protect against the cost of future repair and replacement parts with our Extended Warranty, which is designed to give you the flexibility you need. So, for example, you can choose from three levels of cover, a choice of excess level and the option to pay as you go. And, if you decide an Extended Warranty isn’t for you – you’re free to cancel your policy at any time.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/images/service/service1.png')}}" alt="box" class="h-full hover:scale-105 transform transition ease-out duration-300 w-full">
                    <div class="absolute hidden top-0 left-0 p-3">
                        <div class="suzuki-bold text-white text-3xl text-shadow-overlay">PARTNERSHIP</div>
                    </div>
                </div>
                {{-- item --}}
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/images/service/service4.png')}}" alt="box" class="h-full hover:scale-105 transform transition ease-out duration-300 w-full">
                    <div class="absolute hidden bottom-0 left-0 p-3">
                        <div class="suzuki-bold text-white text-3xl text-shadow-overlay">COLLABORATION</div>
                    </div>
                </div>
                {{-- item --}}
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/images/service/service2.png')}}" alt="box" class="h-full hover:scale-105 transform transition ease-out duration-300 w-full">
                    <div class="absolute hidden bottom-0 right-0 p-3">
                        <div class="suzuki-bold text-white text-3xl text-shadow-overlay">PERFORMANCE</div>
                    </div>
                </div>
                {{-- item --}}
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/images/service/service3.png')}}" alt="box" class="h-full hover:scale-105 transform transition ease-out duration-300 w-full">
                    <div class="absolute hidden bottom-0 right-0 p-3">
                        <div class="suzuki-bold text-white text-3xl text-shadow-overlay">SUPPORT</div>
                    </div>
                </div>
                {{-- item --}}
            </div>


        </div>
    </div>
    {{-- accessories grid --}}
</section>

@endsection
