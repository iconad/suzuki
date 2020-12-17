@extends('layouts.app')

@section('content')

<section class="vehicle-info section mt-16 space-y-16 xxl:space-y-24" id="bladeApp">
    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800">
        <div class="flex justify-center w-full">
            <h1 class="text-3xl flex flex-col leading-tight items-end text-center">
                <span class="block suzuki-bold text-gray-900">Accessorize your</span>
                <img class="h-4" src="{{asset('/assets/images/acc/vitara.png')}}" alt="vitara logo">
                {{-- <span class="uppercase block suzuki-bold italic">Vitara</span> --}}
            </h1>
        </div>
    </div>
    {{-- heading --}}
    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800">
        <accessories-grid></accessories-grid>
    </div>
    {{-- accessories grid --}}
</section>

@endsection
