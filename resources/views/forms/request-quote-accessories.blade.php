@extends('layouts.app')

@section('content')

    <section class="vehicle-info section space-y-16 xxl:space-y-24">

        <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800 mt-16 lg:mt-12">

            <div class="flex flex-wrap lg:flex-no-wrap">
                {{-- <div class="w-full lg:w-auto whitespace-no-wrap bg-gray-200 rounded-xl lg:flex items-center lg:py-64 overflow-x-auto lg:overflow-x-visible scrollbar-none mb-5 lg:mb-0">
                    <x-forms-side-nav />
                </div> --}}
                <div class="w-full flex items-center">
                    <div class="lg:px-12 w-full">
                        <request-quote-accessories></request-quote-accessories>
                    </div>
                </div>
            </div>


        </div>

    </section>

@endsection
