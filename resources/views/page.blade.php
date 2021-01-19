@extends('layouts.app')

@section('content')

<section class="vehicle-info section {{$page->media->count() != 0 ? 'space-y-16 xxl:space-y-24' : 'space-y-8' }} " id="bladeApp">

    @if ($page->media->count() != 0)
    <div class="cover relative">
        <img src="{{ $cover }}" alt="cover" class="w-full">
        <div class="absolute inset-0 bg-black bg-opacity-25">
            <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800 flex items-center h-full pt-8 md:pt-32 xxl:pt-64">
                <h1 class="suzuki-bold leading-none md:leading-12 ml-16">
                    @php
                        $first_word = explode(' ',trim($page->title));
                    @endphp
                    <span class="text-4xl md:text-6xl lg:text-6xl uppercase block text-white opacity-50 md:opacity-25 -ml-16">{{$first_word[0]}}</span>
                    <span class="text-3xl md:text-5xl lg:text-6xl uppercase block text-white">{{substr(strstr($page->title," "), 1)}}</span>
                </h1>
            </div>
        </div>
    </div>
    {{-- row --}}
    @else
    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800 mt-24">
        <h1 class="suzuki-bold leading-none md:leading-12">
            <span class="text-4xl md:text-6xl lg:text-4xl capitalize block">{{$page->title}}</span>
        </h1>
    </div>
    @endif

    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800">
        {!! $page->body !!}
    </div>

    {{-- accessories grid --}}
</section>

@endsection
