@extends('layouts.app')

@section('content')
    <section class="showroom-section">
        {{-- <showroom :vid="{{$vehicle->id}}" :spec="{{$vehicle->specfile}}" :brochure="{{$vehicle->brochure}}" iframe="{{$vehicle->iframe}}"></showroom> --}}
    </section>
    {{-- showroom section --}}

    <section class="vehicle-info section mt-16 space-y-16 xxl:space-y-24">

        {{-- {!! $vehicle->html_content !!} --}}




    {{-- ====================== START ======================== --}}


    <div>
        <img src="/assets/images/vehicles/ertiga/image1.png" alt="explore baleno cover" class="w-full">
    </div>


    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800">
        <div class="content">
            <div class="mb-5 text-3xl suzuki-bold capitalize">THE NEW ERTIGA</div>
            <p class="text-lg text-gray-800">
                The all-new Ertiga is a stylish and ergonomically designed seven-seater with a powerful and responsive engine. It has space for the driver plus six people, luggage and all the enthusiasm you can muster.
            ​</p>
            <p class="text-lg text-gray-800">
                This Suzuki boasts a long wheelbase, high headroom, ample legroom and careful positioning of the seats to ensure more than enough space for everyone, plus their gear. The foldable seats in the third row free up more packing space for everything you need to take with you. Both the second and third row seats can be adjusted into an array of configurations to accommodate different passenger and luggage needs.
            ​</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
        <div class="order-2 lg:order-1 image-scale-effect-small">
            <img src="/assets/images/vehicles/ertiga/image2.png" alt="baleno" class="w-full">
        </div>
        <div class="flex items-center w-full lg:w-4/5 order-1 lg:order-2">
            <div class="px-5 text-left lg:px-0">
                <div class="mb-5 text-3xl suzuki-bold capitalize">AERODYNAMIC STYLING</div>
                <p class="text-lg text-gray-800">
                    With its stylish aerodynamic shape, the Ertiga needs less energy to move forward, thereby using less fuel.
                ​</p>
                <div class="text-3xl text-gray-800 suzuki-bold capitalize mb-3 mt-5">NEW-GENERATION PLATFORM</div>
                <p class="text-lg text-gray-800">The new Ertiga’s light, continuous frame efficiently absorbs and disperses energy in the event of a collision. Besides greater safety, the HEARTECT frame also contributes to lower fuel consumption and higher driving performance. </p>
            </div>
        </div>
    </div>

    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-900 content">
        <div class="text-3xl text-gray-800 suzuki-bold capitalize">SPACE FOR EVERYONE AND EVERYTHING</div>
        <p class="text-lg text-gray-800">With its long wheelbase, high headroom, ample legroom and careful positioning of seats, the Ertiga offers more than enough space for everyone and their stuff.</p>
    </div>

    <div>
        <img src="/assets/images/vehicles/ertiga/image3.png" alt="baleno" class="w-full">
    </div>

    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-900 content">
        <div class="text-3xl text-gray-800 suzuki-bold capitalize">EVERYONE’S WELCOME</div>
        <p class="text-lg text-gray-800">Whether you’re driving the kids to school in rush-hour traffic, taking the family on a weekend excursion to the zoo, or courtesy transporting guests between hotels and airports, with the new Ertiga, you can really get “All in.”</p>
    </div>

    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-900 content">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div class="flex items-center w-full">
                <div>
                    <div class="text-3xl text-gray-800 suzuki-bold capitalize">PERFORMANCE</div>
                    <p class="text-lg text-gray-800">Once you are on the road in the Ertiga, the responsiveness of the engine is the perfect assurance that the road ahead is well worth the time spent travelling.</p>
                </div>
            </div>
            <div class="image-scale-effect-small">
                <img src="/assets/images/vehicles/ertiga/image4.jpg" alt="baleno" class="w-full">
            </div>
        </div>
    </div>

    <div>
        <img src="/assets/images/vehicles/ertiga/image5.png" alt="baleno" class="w-full">
    </div>

    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-900 content">
        <div class="text-3xl md:text-5xl text-gray-800 suzuki-bold capitalize">Features</div>
        <div class="grid grid-cols-1 lg:grid-cols-1">
            <div class="flex items-center w-full">
                <div>
                    <p class="text-lg text-gray-800 suzuki-bold">REVERSE PARKING SENSORS</p>
                    <p class="text-lg text-gray-800 -mt-5">Keep your cool with ultrasonic sensors on the rear bumper of the GL model to detect obstacles while you park. Warning sounds will help keep you informed of the distance to the obstacle.</p>
                    <p class="text-lg text-gray-800 suzuki-bold">2ND ROW AIR CONDITIONING WITH CONTROLS</p>
                    <p class="text-lg text-gray-800 -mt-5">The rear cabin of the GL model features ceiling-mounted, three-setting, air conditioning for the comfort of all your passengers.</p>
                    <p class="text-lg text-gray-800 suzuki-bold">INFOTAINMENT SYSYTEM</p>
                    <p class="text-lg text-gray-800 -mt-5">The audio system of the GL model features a touch-panel with easy swiping operation and lets you play music from your smartphone through Bluetooth connectivity. It also comes with a USB port, 12V power socket, MP3 with AM/FM radio and steering wheel-mounted controls.</p>
                </div>
            </div>
            <div class="hidden image-scale-effect-small flex items-center h-full justify-center">
                <img src="/assets/images/vehicles/ertiga/image6.png" alt="baleno" class="w-full">
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <div class="image-scale-effect-small">
            <img src="/assets/images/vehicles/ertiga/image6.png" alt="baleno" class="w-full h-full object-cover">
        </div>
        <div class="image-scale-effect-small">
            <img src="/assets/images/vehicles/ertiga/image7.png" alt="baleno" class="w-full h-full object-cover">
        </div>
        <div class="image-scale-effect-small">
            <img src="/assets/images/vehicles/ertiga/image8.png" alt="baleno" class="w-full h-full object-cover">
        </div>
        <div class="image-scale-effect-small">
            <img src="/assets/images/vehicles/ertiga/image9.png" alt="baleno" class="w-full h-full object-cover">
        </div>
        <div class="image-scale-effect-small">
            <img src="/assets/images/vehicles/ertiga/image10.png" alt="baleno" class="w-full h-full object-cover">
        </div>
        <div class="image-scale-effect-small">
            <img src="/assets/images/vehicles/ertiga/image11.png" alt="baleno" class="w-full h-full object-cover">
        </div>
        <div class="image-scale-effect-small">
            <img src="/assets/images/vehicles/ertiga/image12.png" alt="baleno" class="w-full h-full object-cover">
        </div>
        <div class="image-scale-effect-small">
            <img src="/assets/images/vehicles/ertiga/image13.png" alt="baleno" class="w-full h-full object-cover">
        </div>
        <div class="image-scale-effect-small">
            <img src="/assets/images/vehicles/ertiga/image14.png" alt="baleno" class="w-full h-full object-cover">
        </div>
    </div>





    {{-- ====================== END ======================== --}}






    </section>
    {{-- showroom section --}}


    {{-- <spec-broucher></spec-broucher> --}}
@endsection
