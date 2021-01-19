@extends('layouts.app')

@section('content')
    <section class="showroom-section">
        <showroom :vid="{{$vehicle->id}}" :spec="{{$vehicle->specfile}}" :brochure="{{$vehicle->brochure}}" iframe="{{$vehicle->iframe}}"></showroom>
    </section>
    {{-- showroom section --}}

    <section class="vehicle-info section mt-16 space-y-16 xxl:space-y-24">

        {!! $vehicle->html_content !!}


        <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-900">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-end">
                <div class="order-2 lg:order-1 flex lg:flex-none items-center lg:justify-start justify-center mb-5">
                    <vehicle-explore-more></vehicle-explore-more>
                </div>
                <div class="order-1 lg:order-2 image-scale-effect-small">
                    <img src="/assets/images/baleno-silver.jpg" alt="car" class="w-full">
                </div>
            </div>

        </div>
        <div></div>


    </section>
    {{-- showroom section --}}


    {{-- <spec-broucher></spec-broucher> --}}
@endsection
