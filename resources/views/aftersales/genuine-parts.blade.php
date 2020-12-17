@extends('layouts.app')

@section('content')

<section class="vehicle-info section space-y-16 xxl:space-y-24" id="bladeApp">

    <div class="cover relative">
        <img src="{{asset('assets/images/genuine-parts.webp')}}" alt="cover" class="w-full">
        <div class="absolute inset-0 bg-black bg-opacity-25">
            <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800 flex items-center h-full xxl:pb-48">
                <h1 class="suzuki-bold leading-none md:leading-12 ml-16">
                    <span class="text-4xl md:text-6xl lg:text-6xl uppercase block text-white opacity-50 md:opacity-25 -ml-16">Genuine</span>
                    <span class="text-3xl md:text-5xl lg:text-8xl uppercase block text-white">Parts</span>
                </h1>
            </div>
        </div>
    </div>
    {{-- row --}}


    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800">
        <div class="w-full space-y-10">

            <div class="content text-lg">
                <h2 class="text-3xl suzuki-bold uppercase text-theme-skyblue">SUZUKI GENUINE PARTS</h2>
                <p>Suzuki Genuine Parts are engineered to precise and exacting product quality standards. Using Suzuki Genuine Parts will also ensure your safety is not compromised when you need it the most. Suzuki qualified aftersales personnel have the latest tools and equipment at their disposal to ensure they obtain the right part for the job, and that it will be fitted correctly.</p>
            </div>

            <div>
                <genuine-parts></genuine-parts>
            </div>

        </div>
    </div>

</section>

@endsection
