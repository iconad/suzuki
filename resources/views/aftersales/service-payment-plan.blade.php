@extends('layouts.app')

@section('content')

<section class="vehicle-info section space-y-16 xxl:space-y-24" id="bladeApp">

    <div class="cover relative">
        <img src="{{asset('assets/images/suzuki-bg.jpg')}}" alt="cover" class="w-full">
        <div class="absolute inset-0 bg-black bg-opacity-25">
            <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800 flex items-end h-full pb-8 md:pb-16 xxl:pb-32">
                <h1 class="suzuki-bold">
                    <span class="text-4xl lg:-mb-3 md:text-6xl lg:text-8xl uppercase block text-white opacity-50 md:opacity-25">SERVICE</span>
                    <span class="text-3xl md:text-5xl lg:text-6xl uppercase block text-white">PAYMENT PLAN</span>
                </h1>
            </div>
        </div>
    </div>
    {{-- row --}}


    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800">
        <div class="w-full space-y-10">

            <div class="content text-lg">
                <h2 class="text-3xl suzuki-bold uppercase text-theme-skyblue">SERVICE PAYMENT PLAN</h2>
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

            <div class="content text-lg">
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime autem optio iusto harum incidunt atque porro necessitatibus odio laboriosam, tempore dolores eum facere nesciunt nostrum, itaque, perspiciatis accusantium sapiente? Harum. ipsum dolor sit amet consectetur adipisicing elit. Labore inventore rem quasi corrupti cupiditate molestias, facilis obcaecati vero nam nulla? Repellat neque tempora recusandae perspiciatis cupiditate ea dolores minima deserunt. Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>

            </div>

        </div>
    </div>
    {{-- accessories grid --}}
</section>

@endsection
