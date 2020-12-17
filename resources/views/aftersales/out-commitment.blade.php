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
                    Commitment to become one of the most trusted car dealerships in the automotive industry by building and sustaining a genuine passion for offering excellent value for money, products and services.To create a customer-focused and integrated network of automotive sales and service facilities that are easily accessible through strategic locations.
                </p>

                <ul class="list-none">
                    <li>To develop high integrity relationships through all communications with customers and employees.</li>
                    <li>To become a benchmark for excellence in every aspect of our business. We are committed to delivering exceptional service and value.</li>
                    <li>To promote personal and professional growth and foster teamwork among the staff.</li>
                    <li>Our commitment to this mission makes our company a place where people want to work and do business.</li>
                </ul>

            </div>

            <div class="content text-lg">
                <h2 class="text-3xl suzuki-bold uppercase text-theme-skyblue">VISION</h2>
                <p>
                    Our vision is to become one of the top 5 Japanese car dealers in the UAE, through setting higher standards in operational excellence, market penetration, customer satisfaction, territorial coverage and community commitment.
                </p>
            </div>

            <div>
                <our-commitment></our-commitment>
            </div>


        </div>
    </div>
    {{-- accessories grid --}}
</section>

@endsection
