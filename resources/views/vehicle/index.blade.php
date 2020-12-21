@extends('layouts.app')

@section('content')
    <section class="showroom-section">
        <vehicles-slider :vehicles="{{$vehicles}}">></vehicles-slider>
    </section>
@endsection
