@extends('layouts.app')

@section('content')

    <section class="vehicle-info section space-y-16 xxl:space-y-24">

        <div class="cover">
            <img src="{{asset('assets/images/location-cover.jpg')}}" alt="cover" class="w-full">
        </div>
        {{-- row --}}

        <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800">

            <div class="flex items-center justify-between mb-10 md:divide-x divide-y lg:divide-y-0 text-center suzuki-bold text-lg rounded-lg overflow-hidden border">
                @foreach ($branches as $bran)
                <a
                href="/locations/{{$bran->slug}}/{{$type}}"
                class="w-auto lg:w-full block hover:bg-gray-200 {{ $location === $bran->slug ? 'bg-gray-200' : "" }} py-4">
                    {{$bran->title}}
                </a>
                @endforeach
            </div>

            <div class="grid grid-cols-1 gap-10">
                <div class="flex flex-wrap items-center hover:bg-gray-100 border rounded-lg">
                    <div class="w-full p-4 flex items-center">
                        <div>
                            <div class="text-3xl suzuki-bold">{{$branche->$type[0]->title}}</div>
                            <div class="text-base flex items-center mb-3 text-orange-400 ">
                                <span class="mx-px">★</span>
                                <span class="mx-px">★</span>
                                <span class="mx-px">★</span>
                                <span class="mx-px">★</span>
                                <span class="mx-px text-gray-500">★</span>
                                <a href="#" class="theme-link inline-block ml-3 text-blue-500">
                                    63 reviews
                                </a>
                            </div>
                            <div class="info">
                                <table class="w-full" cellpadding="2">
                                    @if ($branche->$type[0]->tel)
                                    <tr>
                                        <td>
                                            <span class="text-lg suzuki-bold">Tel No</span>
                                        </td>
                                        <td>
                                            <span class="text-lg suzuki-bold">{{$branche->$type[0]->tel}}</span>
                                        </td>
                                    </tr>
                                    @endif
                                    @if ($branche->$type[0]->fax)
                                    <tr>
                                        <td>
                                            <span class="text-lg suzuki-bold">Fax No</span>
                                        </td>
                                        <td>
                                            <span class="text-lg suzuki-bold">{{$branche->$type[0]->fax}}</span>
                                        </td>
                                    </tr>
                                    @endif
                                    @if ($branche->$type[0]->open_days)
                                    <tr>
                                        <td colspan="2" class="pt-3">
                                            <span class="text-lg suzuki-bold">
                                                {{ $branche->$type[0]->thursday ? 'Saturday to Wednesday' : "Saturday to Thursday" }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span class="text-lg">{{$branche->$type[0]->open_days}}</span>
                                        </td>
                                    </tr>
                                    @endif
                                    @if ($branche->$type[0]->thursday)
                                    <tr>
                                        <td colspan="2">
                                            <span class="text-lg suzuki-bold"> Thursday </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span class="text-lg">{{$branche->$type[0]->thursday}}</span>
                                        </td>
                                    </tr>
                                    @endif
                                    @if ($branche->$type[0]->friday)
                                    <tr>
                                        <td colspan="2">
                                            <span class="text-lg"><b class="suzuki-bold">Friday</b> {{$branche->$type[0]->friday}}</span>
                                        </td>
                                    </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="w-full relative">
                        <div class="absolute bottom-100 right-0 p-3">
                        <a href="{{$branche->$type[0]->map}}" class="theme-link text-base" target="_blank">Get Directions</a>
                        </div>
                        <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="{{$branche->$type[0]->map}}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div></div>
                    </div>
                </div>
                {{-- box --}}



            </div>
        </div>
        {{-- row --}}


    </section>

@endsection
