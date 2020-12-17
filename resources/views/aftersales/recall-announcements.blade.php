@extends('layouts.app')

@section('content')

<section class="vehicle-info section space-y-16 xxl:space-y-24" id="bladeApp">

    <div class="cover relative">
        <img src="{{asset('assets/images/recall/recall-cover.png')}}" alt="cover" class="w-full">
        <div class="absolute inset-0 bg-black bg-opacity-25">
            <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800 flex items-end h-full pb-8 md:pb-16 xxl:pb-32">
                <h1 class="suzuki-bold">
                    <span class="text-4xl lg:-mb-3 md:text-6xl lg:text-8xl uppercase block text-white opacity-50 md:opacity-25">RECALL</span>
                    <span class="text-3xl md:text-5xl lg:text-6xl uppercase block text-white">ANNOUNCEMENT</span>
                </h1>
            </div>
        </div>
    </div>
    {{-- row --}}


    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800">
        <div class="w-full space-y-5">

            <div class="flex flex-wrap md:flex-nowrap w-full border rounded-lg p-5 hover:border-gray-400 hover:shadow transition ease-in-out duration-300 cursor-pointer">
                <div class="w-full md:w-1/2">
                    <a href="/after-sales/recall-announcements/announcement">
                        <img src="{{asset('assets/images/recall/baleno-small.png')}}" alt="car" class="w-full">
                    </a>
                </div>
                <div class="w-full flex items-center md:pl-12">
                    <div>
                        <a href="/after-sales/recall-announcements/announcement" class="theme-link hover:border-transparent text-xs"> Passenger Vehicle</a>
                        <a href="/after-sales/recall-announcements/announcement" class="theme-link hover:border-transparent block suzuki-bold leading-tight my-3 text-2xl text-gray-900">Safety Recall Campaign for Suzuki Baleno manufactured in 2017-2018</a>
                        <div class="text-sm text-gray-600">3-11-2020</div>
                    </div>
                </div>
            </div>
            {{-- item --}}

            <div class="flex flex-wrap md:flex-nowrap w-full border rounded-lg p-5 hover:border-gray-400 hover:shadow transition ease-in-out duration-300 cursor-pointer">
                <div class="w-full md:w-1/2">
                    <a href="/after-sales/recall-announcements/announcement">
                        <img src="{{asset('assets/images/recall/ciaz-small.png')}}" alt="car" class="w-full">
                    </a>
                </div>
                <div class="w-full flex items-center md:pl-12">
                    <div>
                        <a href="/after-sales/recall-announcements/announcement" class="theme-link hover:border-transparent text-xs"> Passenger Vehicle</a>
                        <a href="/after-sales/recall-announcements/announcement" class="theme-link hover:border-transparent block suzuki-bold leading-tight my-3 text-2xl text-gray-900">Safety Recall Campaign for Suzuki Caiz manufactured in 2019</a>
                        <div class="text-sm text-gray-600">3-11-2020</div>
                    </div>
                </div>
            </div>
            {{-- item --}}

            <div class="flex flex-wrap md:flex-nowrap w-full border rounded-lg p-5 hover:border-gray-400 hover:shadow transition ease-in-out duration-300 cursor-pointer">
                <div class="w-full md:w-1/2">
                    <a href="/after-sales/recall-announcements/announcement">
                        <img src="{{asset('assets/images/recall/vitara-small.png')}}" alt="car" class="w-full">
                    </a>
                </div>
                <div class="w-full flex items-center md:pl-12">
                    <div>
                        <a href="/after-sales/recall-announcements/announcement" class="theme-link hover:border-transparent text-xs"> Passenger Vehicle</a>
                        <a href="/after-sales/recall-announcements/announcement" class="theme-link hover:border-transparent block suzuki-bold leading-tight my-3 text-2xl text-gray-900">Safety Recall Campaign for Suzuki Vitara manufactured in 2018-2020</a>
                        <div class="text-sm text-gray-600">3-11-2020</div>
                    </div>
                </div>
            </div>
            {{-- item --}}

            <div class="flex flex-wrap md:flex-nowrap w-full border rounded-lg p-5 hover:border-gray-400 hover:shadow transition ease-in-out duration-300 cursor-pointer">
                <div class="w-full md:w-1/2">
                    <a href="/after-sales/recall-announcements/announcement">
                        <img src="{{asset('assets/images/recall/swift-small.png')}}" alt="car" class="w-full">
                    </a>
                </div>
                <div class="w-full flex items-center md:pl-12">
                    <div>
                        <a href="/after-sales/recall-announcements/announcement" class="theme-link hover:border-transparent text-xs"> Passenger Vehicle</a>
                        <a href="/after-sales/recall-announcements/announcement" class="theme-link hover:border-transparent block suzuki-bold leading-tight my-3 text-2xl text-gray-900">Safety Recall Campaign for Suzuki Swift manufactured in 2017-2018</a>
                        <div class="text-sm text-gray-600">3-11-2020</div>
                    </div>
                </div>
            </div>
            {{-- item --}}


        </div>
    </div>
    {{-- accessories grid --}}
</section>

@endsection
