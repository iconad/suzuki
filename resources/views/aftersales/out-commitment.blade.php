@extends('layouts.app')

@section('content')

<section class="vehicle-info section space-y-16 xxl:space-y-24" id="bladeApp">

    <div class="cover relative">
        <img src="{{asset('assets/images/recall/recall-cover.png')}}" alt="cover" class="w-full">
        <div class="absolute inset-0 bg-black bg-opacity-25">
            <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800 flex items-end h-full pb-8 md:pb-16 xxl:pb-32">
                <h1 class="suzuki-bold leading-none md:leading-12">
                    <span class="text-4xl md:text-6xl lg:text-8xl uppercase block text-white opacity-50 md:opacity-25">OUR</span>
                    <span class="text-3xl md:text-5xl lg:text-6xl uppercase block text-white">COMMITMENT</span>
                </h1>
            </div>
        </div>
    </div>
    {{-- row --}}


    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800">
        <div class="w-full space-y-10">


            <div class="content text-lg">
                <p>
                    Al Rostamani Trading Company (ARTC), a member of Al Rostamani Group which is one of the largest and oldest business conglomerates in the United Arab Emirates. Founded in 1957 with the late Mr. Abdullah Hassan Al Rostamani as Chairman, the group has grown steadfastly and conscientiously over the last 50 years with the guiding principles of commitment, care and vision with genuine concern for the community.
                </p>
                <p>
                    ARTC is the sole authorized distributor of Suzuki automobiles in the UAE which is headquartered in Dubai, was founded in the year 2002 and is now well established and respected in the market. Today, ARTC has representation across the UAE with Sales, Service and Parts outlets able to serve its customers throughout the country.
                </p>
                <p>
                    Suzuki offers a wide range of product lines to satisfy the needs of most new car buyers in terms of quality, safety and value for money. It also efficiently caters to the transportation needs of the business sector as if offers a full range of commercial fleet vehicles suitable for many practical and economical purposes. ARTC takes pride in offering its customers the best possible solutions in Sales, Service and Parts supply.
                </p>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/images/commitment/box1.png')}}" alt="box" class="h-full hover:scale-105 transform transition ease-out duration-500 w-full">
                    <div class="absolute top-0 left-0 p-3">
                        <div class="suzuki-bold text-white text-3xl text-shadow-overlay">PARTNERSHIP</div>
                    </div>
                </div>
                {{-- item --}}
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/images/commitment/box4.png')}}" alt="box" class="h-full hover:scale-105 transform transition ease-out duration-500 w-full">
                    <div class="absolute bottom-0 left-0 p-3">
                        <div class="suzuki-bold text-white text-3xl text-shadow-overlay">COLLABORATION</div>
                    </div>
                </div>
                {{-- item --}}
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/images/commitment/box2.png')}}" alt="box" class="h-full hover:scale-105 transform transition ease-out duration-500 w-full">
                    <div class="absolute bottom-0 right-0 p-3">
                        <div class="suzuki-bold text-white text-3xl text-shadow-overlay">PERFORMANCE</div>
                    </div>
                </div>
                {{-- item --}}
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/images/commitment/box3.png')}}" alt="box" class="h-full hover:scale-105 transform transition ease-out duration-500 w-full">
                    <div class="absolute bottom-0 right-0 p-3">
                        <div class="suzuki-bold text-white text-3xl text-shadow-overlay">SUPPORT</div>
                    </div>
                </div>
                {{-- item --}}
            </div>

            <div class="content text-lg">
                <h2 class="text-3xl suzuki-bold uppercase text-theme-skyblue">MISSION</h2>
                <p>
                    Al Rostamani Group’s mission is to be recognized as a leading successful regional conglomerate with diverse commercial interests and core competencies in select sectors.
                </p>
            </div>

            <div class="content text-lg">
                <h2 class="text-3xl suzuki-bold uppercase text-theme-skyblue">VISION</h2>
                <p>
                    Al Rostamani Group’s vision is to be regarded as a responsible, reliable and respectable business conglomerate and to be the partner of choice for international and regional corporations
                </p>
            </div>

            <div class="content text-lg">
                <h2 class="text-3xl suzuki-bold uppercase text-theme-skyblue">COMMITMENTS</h2>
                <p>
                    True to the company Mission & Vision Values Al Rostamani Trading Company LLC is committed to provide a much focused attitude to deliver the exceptional Customer Service Experience through its network of 6 state of the art Suzuki Service and Parts outlets across the emirates of UAE.
                </p>
                <p>
                    A variety of Services are obtainable to give your Suzuki the attention it deserves to keep you on the move always without facing any unforeseen breakdowns.
                </p>
                <p>
                    You can call us, visit our website or our Suzuki Service and parts locations to know more about the services that we offer.
                </p>
                <p>
                    Furthermore, Al Rostamani Trading Company LLC – Suzuki is committed to provide the below values to meet the high standards expected by Suzuki Owners.
                </p>

                <ul>
                    <li class="font-bold">Quality Service
                        <ul class="font-normal">
                            <li>Suzuki Trained Professional Technician</li>
                            <li>Suzuki Genuine Parts</li>
                            <li>Suzuki prescribed Tools & Equipment</li>
                            <li>Fix it Right First Time (FRFT)</li>
                        </ul>
                    </li>
                    <li class="font-bold">Deliver as Promised
                        <ul class="font-normal">
                            <li>Same Day Delivery Promise for Periodic Maintenance</li>
                            <li>Express Maintenance with Appointments </li>
                        </ul>
                    </li>
                    <li class="font-bold">Highly Transparent & Ethical in business dealings
                        <ul class="font-normal">
                            <li>Competitive Service Charges </li>
                            <li>Explanation of the Job or Invoice for all services and repairs carried out on all visits</li>
                        </ul>
                    </li>
                    <li class="font-bold">Create WOW Experience
                        <ul class="font-normal">
                            <li>Active Delivery </li>
                            <li>Complimentary Wash on All Periodic Maintenance Service Visit</li>
                            <li>Service Reminders </li>
                            <li>Free End of Warranty Inspection </li>
                        </ul>
                    </li>
                    <li class="font-bold">Convenience to the Core
                        <ul class="font-normal">
                            <li>Drop off facility to the nearest Metro/Taxi/Bus stations</li>
                            <li>Fully Equipped Customer Waiting Lounge </li>
                            <li>Same Day delivery & Express Service Facility with appointments</li>
                            <li>Fleet Owners TAT (Turnaround Time) Conscious Service Program</li>
                        </ul>
                    </li>
                    <li class="font-bold">Value for Money
                        <ul class="font-normal">
                            <li>Hassle Free Service Contracts with easy of Payment</li>
                            <li>Cars maintained Periodically as prescribed by Suzuki gains enhanced resale value</li>
                            <li>Exceptional Customer Service Experience</li>
                        </ul>
                    </li>
                </ul>

            </div>

            @php
                if(isset($_GET['register']) && $_GET['register'] == 'yes'){
                    $register = 'yes';
                }else{
                    $register = 'no';
                }
            @endphp


            <div>
                <our-commitment register="{!! $register !!}"></our-commitment>
            </div>


        </div>
    </div>
    {{-- accessories grid --}}
</section>

@endsection
