@extends('layouts.app')

@section('content')

<section class="vehicle-info section space-y-16 xxl:space-y-24" id="bladeApp">

    <div class="cover relative">
        <img src="{{asset('assets/images/business-solutions/cover.webp')}}" alt="cover" class="w-full">
        <div class="absolute inset-0 bg-black bg-opacity-25">
            <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800 flex items-center h-full pt-8 md:pt-32 xxl:pt-64">
                <h1 class="suzuki-bold leading-none md:leading-12 ml-16">
                    <span class="text-4xl md:text-6xl lg:text-6xl uppercase block text-white opacity-50 md:opacity-25 -ml-16">Business</span>
                    <span class="text-3xl md:text-5xl lg:text-6xl uppercase block text-white">Solutions</span>
                </h1>
            </div>
        </div>
    </div>
    {{-- row --}}


    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800">
        <div class="w-full space-y-10">

            <div class="content text-lg">
                <h2 class="text-3xl suzuki-bold text-center uppercase text-theme-skyblue">SUZUKI OFFER ALL YOU NEED FOR YOUR BUSINESS.</h2>
                <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-10">
                    <div class="text-lg w-full h-full flex items-center">
                        <div>
                            <div class="text-2xl suzuki-bold -mb-3 uppercase text-theme-skyblue">SUZUKI BUSINESS SOLUTIONS</div>
                            <p>
                                You’ll be able to protect against the cost of future repair and replacement parts with our Extended Warranty, which is designed to give you the flexibility you need. So, for example, you can choose from three levels of cover, a choice of excess level and the option to pay as you go. And, if you decide an Extended Warranty isn’t for you – you’re free to cancel your policy at any time.
                            </p>
                        </div>
                    </div>
                    <div class="w-full">
                        <img src="{{asset('assets/images/business-solutions/5.webp')}}" alt="cover" class="w-full">
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/images/business-solutions/1.webp')}}" alt="box" class="h-full hover:scale-105 transform transition ease-out duration-500 w-full">
                    <div class="absolute top-0 left-0 p-3 w-full text-center">
                        <img src="{{asset('assets/images/business-solutions/swift.png')}}" alt="car name" class="mx-auto mt-16 lg:mt-8">
                    </div>
                </div>
                {{-- item --}}
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/images/business-solutions/2.webp')}}" alt="box" class="h-full hover:scale-105 transform transition ease-out duration-500 w-full">
                    <div class="absolute top-0 left-0 p-3 w-full text-center">
                        <img src="{{asset('assets/images/business-solutions/ertiga.png')}}" alt="car name" class="mx-auto mt-16 lg:mt-8">
                    </div>
                </div>
                {{-- item --}}
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/images/business-solutions/3.webp')}}" alt="box" class="h-full hover:scale-105 transform transition ease-out duration-500 w-full">
                    <div class="absolute top-0 left-0 p-3 w-full text-center">
                        <img src="{{asset('assets/images/business-solutions/baleno.png')}}" alt="car name" class="mx-auto mt-16 lg:mt-8">
                    </div>
                </div>
                {{-- item --}}
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/images/business-solutions/4.webp')}}" alt="box" class="h-full hover:scale-105 transform transition ease-out duration-500 w-full">
                    <div class="absolute top-0 left-0 p-3 w-full text-center">
                        <img src="{{asset('assets/images/business-solutions/ciaz.png')}}" alt="car name" class="mx-auto mt-16 lg:mt-8">
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
