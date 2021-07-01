@extends('layouts.app')

@section('content')
<section class="showroom-section">
    {{-- @if ($vehicle->iframe) --}}
        <showroom :vid="{{$vehicle->id}}" :spec="{{$vehicle->specfile}}" :brochure="{{$vehicle->brochure}}" iframe="{{$vehicle->iframe}}"></showroom>
    {{-- @endif --}}
</section>

    {{-- showroom section --}}


    <section class="vehicle-info section space-y-16 xxl:space-y-24 {{$vehicle->iframe ? ' mt-3' : ''}}">

        {!! $vehicle->html_content !!}

    </section>
    {{-- showroom section --}}


    {{-- <spec-broucher></spec-broucher> --}}
@endsection
