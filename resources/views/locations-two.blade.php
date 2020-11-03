@extends('layouts.app')

@section('content')

    <section class="vehicle-info section space-y-16 xxl:space-y-24">

        <div class="cover">
            <img src="{{asset('assets/images/location-cover.jpg')}}" alt="cover" class="w-full">
        </div>
        {{-- row --}}

        <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

                <div class="flex flex-wrap sm:flex-no-wrap items-center hover:bg-gray-100 border rounded-lg overflow-hidden hover:shadow-lg transition ease-linear duration-300">
                    <div class="w-full p-4 flex items-center">
                        <div>
                            <div class="text-3xl suzuki-bold">Abu Dhabi</div>
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
                                    <tr>
                                        <td>
                                            <span class="text-lg suzuki-bold">Tel No</span>
                                        </td>
                                        <td>
                                            <span class="text-lg suzuki-bold">+971 2 674 0991</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="text-lg suzuki-bold">Fax No</span>
                                        </td>
                                        <td>
                                            <span class="text-lg suzuki-bold">+971 2 674 0992</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="pt-3">
                                            <span class="text-lg suzuki-bold">Saturday to Thursday</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span class="text-base">8:00 am to 1:00 pm / 4:00 pm to 8:00pm</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span class="text-base"><b class="suzuki-bold">Friday</b> Open every Friday from 4:00 pm to 8:00pm</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <img src="{{asset('assets/images/maps/abudhabi.png')}}" alt="map" class="w-full sm:w-20rem h-20rem object-cover ">
                    </div>
                </div>
                {{-- box --}}

                <div class="flex flex-wrap sm:flex-no-wrap items-center hover:bg-gray-100 border rounded-lg overflow-hidden hover:shadow-lg transition ease-linear duration-300">
                    <div class="w-full p-4 flex items-center">
                        <div>
                            <div class="text-3xl suzuki-bold">Al Ain</div>
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
                                    <tr>
                                        <td>
                                            <span class="text-lg suzuki-bold">Tel No</span>
                                        </td>
                                        <td>
                                            <span class="text-lg suzuki-bold">+971 3 761 9556</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="text-lg suzuki-bold">Fax No</span>
                                        </td>
                                        <td>
                                            <span class="text-lg suzuki-bold">+971 3 761 0642</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="pt-3">
                                            <span class="text-lg suzuki-bold">Saturday to Thursday</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span class="text-base">8:00 am to 1:00 pm   /   4:00 pm to 7:30 pm</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span class="text-base"><b class="suzuki-bold">Friday</b> Closed</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <img src="{{asset('assets/images/maps/alain.png')}}" alt="map" class="w-full sm:w-20rem h-20rem object-cover ">
                    </div>
                </div>
                {{-- box --}}

                <div class="flex flex-wrap sm:flex-no-wrap items-center hover:bg-gray-100 border rounded-lg overflow-hidden hover:shadow-lg transition ease-linear duration-300">
                    <div class="w-full p-4 flex items-center">
                        <div>
                            <div class="text-3xl suzuki-bold">Deira</div>
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
                                    <tr>
                                        <td>
                                            <span class="text-lg suzuki-bold">Tel No</span>
                                        </td>
                                        <td>
                                            <span class="text-lg suzuki-bold">+971 4 295 5907</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="text-lg suzuki-bold">Fax No</span>
                                        </td>
                                        <td>
                                            <span class="text-lg suzuki-bold">+971 4 295 5908</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="pt-3">
                                            <span class="text-lg suzuki-bold">Saturday to Thursday</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span class="text-base">8:00 am to 8:00 pm</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span class="text-base"><b class="suzuki-bold">Friday</b> Open every Friday from 4:00 pm to 8:00 pm </span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <img src="{{asset('assets/images/maps/deira.png')}}" alt="map" class="w-full sm:w-20rem h-20rem object-cover ">
                    </div>
                </div>
                {{-- box --}}

                <div class="flex flex-wrap sm:flex-no-wrap items-center hover:bg-gray-100 border rounded-lg overflow-hidden hover:shadow-lg transition ease-linear duration-300">
                    <div class="w-full p-4 flex items-center">
                        <div>
                            <div class="text-3xl suzuki-bold">Ras Al Khaimah</div>
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
                                    <tr>
                                        <td>
                                            <span class="text-lg suzuki-bold">Tel No</span>
                                        </td>
                                        <td>
                                            <span class="text-lg suzuki-bold">+971 7 235 1611</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="text-lg suzuki-bold">Fax No</span>
                                        </td>
                                        <td>
                                            <span class="text-lg suzuki-bold">+971 7 235 1523</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="pt-3">
                                            <span class="text-lg suzuki-bold">Saturday to Thursday</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span class="text-base">8:00 am to 1:00 pm   /   4:00 pm to 7:30 pm</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span class="text-base"><b class="suzuki-bold">Friday</b> Closed</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <img src="{{asset('assets/images/maps/ras.png')}}" alt="map" class="w-full sm:w-20rem h-20rem object-cover ">
                    </div>
                </div>
                {{-- box --}}

                <div class="flex flex-wrap sm:flex-no-wrap items-center hover:bg-gray-100 border rounded-lg overflow-hidden hover:shadow-lg transition ease-linear duration-300">
                    <div class="w-full p-4 flex items-center">
                        <div>
                            <div class="text-3xl suzuki-bold">Sharjah</div>
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
                                    <tr>
                                        <td>
                                            <span class="text-lg suzuki-bold">Tel No</span>
                                        </td>
                                        <td>
                                            <span class="text-lg suzuki-bold">+971 6 574 4212</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="text-lg suzuki-bold">Fax No</span>
                                        </td>
                                        <td>
                                            <span class="text-lg suzuki-bold">+971 6 574 8381</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="pt-3">
                                            <span class="text-lg suzuki-bold">Saturday to Thursday</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span class="text-base">8:00 am to 1:00 pm   /   4:00 pm to 7:30 pm</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span class="text-base"><b class="suzuki-bold">Friday</b> Closed</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <img src="{{asset('assets/images/maps/sharjah.png')}}" alt="map" class="w-full sm:w-20rem h-20rem object-cover ">
                    </div>
                </div>
                {{-- box --}}

                <div class="flex flex-wrap sm:flex-no-wrap items-center hover:bg-gray-100 border rounded-lg overflow-hidden hover:shadow-lg transition ease-linear duration-300">
                    <div class="w-full p-4 flex items-center">
                        <div>
                            <div class="text-3xl suzuki-bold">Sheikh Zayed Road</div>
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
                                    <tr>
                                        <td>
                                            <span class="text-lg suzuki-bold">Tel No</span>
                                        </td>
                                        <td>
                                            <span class="text-lg suzuki-bold">+971 4 347 0008</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="text-lg suzuki-bold">Fax No</span>
                                        </td>
                                        <td>
                                            <span class="text-lg suzuki-bold">+971 4 347 7120</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="pt-3">
                                            <span class="text-lg suzuki-bold">Saturday to Thursday</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span class="text-base">8:30 am to 8:30 pm</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span class="text-base"><b class="suzuki-bold">Friday</b> Open every Friday from 4:00 PM to 8:00 PM</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <img src="{{asset('assets/images/maps/zayed.png')}}" alt="map" class="w-full sm:w-20rem h-20rem object-cover ">
                    </div>
                </div>
                {{-- box --}}


            </div>
        </div>
        {{-- row --}}


    </section>

@endsection
