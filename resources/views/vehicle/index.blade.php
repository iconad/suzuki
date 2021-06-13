@extends('layouts.app')

@section('content')
    <section class="showroom-section relative">
        <vehicles-slider :vehicles="{{$vehicles}}"></vehicles-slider>
        {{-- <landscape-message></landscape-message> --}}
    </section>
@endsection
