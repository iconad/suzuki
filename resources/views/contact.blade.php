@extends('layouts.app')

@section('content')

    <section class="vehicle-info section space-y-16 xxl:space-y-24">

        <div class="cover">
            <img src="{{asset('assets/images/location-cover.jpg')}}" alt="cover" class="w-full">
        </div>

        <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800 mt-16 lg:mt-24">

        <contact-us></contact-us>

        </div>

    </section>

@endsection
