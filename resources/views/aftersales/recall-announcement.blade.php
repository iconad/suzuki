@extends('layouts.app')

@section('content')

<section class="vehicle-info section mt-16 space-y-16 xxl:space-y-24" id="bladeApp">

    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800">


        <div class="space-y-10 border rounded-lg p-10 hover:border-gray-400 hover:shadow transition ease-in-out duration-300 cursor-pointer">
            <div class="flex flex-wrap w-full">
                <div class="w-full md:w-1/2 flex items-center">
                    <div>
                        <a href="" class="theme-link hover:border-transparent text-xs capitalize"> {{$recall->vehicle_type}}</a>
                        <a href="#" class="theme-link hover:border-transparent block suzuki-bold leading-tight my-3 text-4xl text-gray-900">
                            {{$recall->title}}
                        </a>
                        <div class="text-sm text-gray-600">{{date('d M, Y', strtotime($recall->created_at))}}</div>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <a href="#">
                        <img src="{{$recall->getFirstMediaUrl('thumbnail')}}" alt="car" class="w-full">
                    </a>
                </div>
            </div>

            <div class="content text-lg">
                {!! $recall->detail !!}
            </div>

            <div class="mt-5">
                <check-recall-form recall="{{$recall->id}}"></check-recall-form>
            </div>

        </div>

    </div>
    {{-- accessories grid --}}
</section>

@endsection
