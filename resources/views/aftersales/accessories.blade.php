@extends('layouts.app')

@section('content')

<section class="vehicle-info section mt-16 space-y-16 xxl:space-y-24" id="bladeApp">
    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800">

        @if ($accessory_cover)
        <div class="cover mb-16">
            <img src="{{$accessory_cover}}" class="w-full h-20rem object-cover object-center" alt="Accessory Cover">
        </div>
        @endif

        <div class="flex justify-center w-full">
            <h1 class="text-3xl flex flex-col leading-tight items-end text-center">
                <span class="block suzuki-bold text-gray-900 capitalize">Accessorize your</span>
                <img src="{{$logo}}" class="bg-gray-500 p-1 rounded h-5" alt="vehicle logo">

                {{-- <span class="uppercase block suzuki-bold italic">{{$vehicle->logo}}</span> --}}
            </h1>
        </div>
    </div>

    {{-- heading --}}
    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800" style="margin-top: 60px;">
        <accessories-grid :vname="{{ json_encode($vehicle->title) }}" :media="{{ json_encode($brochure) }}" :vid="{{ json_encode($vehicle->id) }}"></accessories-grid>
    </div>
    {{-- accessories grid --}}
</section>

@endsection
