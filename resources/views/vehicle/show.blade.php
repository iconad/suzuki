@extends('layouts.app')

@section('content')
<section class="showroom-section">
    @if ($vehicle->iframe)
        <showroom :vid="{{$vehicle->id}}" :spec="{{$vehicle->specfile}}" :brochure="{{$vehicle->brochure}}" iframe="{{$vehicle->iframe}}"></showroom>
    @endif
</section>

    {{-- showroom section --}}


    <section class="vehicle-info section space-y-16 xxl:space-y-24 {{$vehicle->iframe ? ' mt-3' : ''}}">

        {!! $vehicle->html_content !!}




    {{-- ====================== START ======================== --}}
{{--

    <div>
        <img src="/assets/images/vehicles/dzire/image1.png" alt="explore baleno cover" class="w-full">
    </div>


    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800">
        <div class="content">
            <div class="mb-5 text-3xl suzuki-bold capitalize">All that you desire </div>
            <p class="text-lg text-gray-800">
                The Dzire is everything you want in a sedan. The car gets you all the attention you deserve with its elegant styling. Its perfect size makes it excellent to manoeuvre, enhancing your driving experience wherever you go. As you get inside, you will be surrounded by a refined and relaxing atmosphere. With so much to offer, it’s a car that truly fulfills all your desires.
            ​</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
        <div class="order-2 lg:order-1 image-scale-effect-small">
            <img src="/assets/images/vehicles/dzire/image2.png" alt="baleno" class="w-full">
        </div>
        <div class="flex items-center w-full lg:w-4/5 order-1 lg:order-2">
            <div>
                <div class="px-5 text-left lg:px-0 mt-6">
                    <div class="text-3xl suzuki-bold mb-2 capitalize">The size you desire </div>
                    <p class="text-lg text-gray-800">
                        Perfection is what makes something desirable. The Dzire comes in the perfect size. The path to every exciting experience is open for you, because you can manoeuvre the car and park with ease even in tight environment. All, while enjoying the ease of driving.
                    ​</p>
                </div>
            </div>
        </div>
    </div>

    <div>
        <img src="/assets/images/vehicles/dzire/image3.png" alt="baleno" class="w-full">
    </div>


    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-900">
        <div class="mt-5">
            <div class="text-3xl text-gray-800 suzuki-bold capitalize">Everything you desire in a performance</div>
            <p class="text-lg mt-2 text-gray-800">Everything you desire in a performance </div>
                <p class="text-lg text-gray-800">The exceptional performance of the Dzire comes from the combination of its 1.2L engine and “HEARTECT” platform. Experience a drive that you can’t get enough of.</p>
        </div>
    </div>

    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-900 content my-24">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div class="flex items-center w-full">
                <div>
                    <div class="text-3xl text-gray-800 suzuki-bold capitalize">Experience the desire within</div>
                    <p class="text-lg text-gray-800">A sight that excites your senses, awaits you inside. The contemporary and classy design theme complements your modern lifestyle. The styling within its spacious interior fuses every element together, creating a harmonious appeal. The black interior with a touch of silver accents enhances the premium persona of the sedan. Go ahead, let the surroundings induce your desires.</p>
                </div>
            </div>
            <div class="image-scale-effect-small">
                <img src="/assets/images/vehicles/dzire/image4.png" alt="baleno" class="w-full">
            </div>
        </div>
    </div>

    <div class="md:my-24">
        <img src="/assets/images/vehicles/dzire/image5.png" alt="baleno" class="w-full">
    </div>

    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-900 md:mb-24">
        <div class="mt-5">
            <div class="text-3xl text-gray-800 suzuki-bold capitalize">Space that indulges your desire </div>
            <p class="text-lg text-gray-800">The moment you sit inside the Dzire is when an exceptional experience begins. The spacious interior in the front and rear ensures a relaxing drive for everyone as the car drives through the city. Also, amenities for the rear seat make the drive pleasant. The Dzire is the answer, for all your wants. </p>
        </div>
    </div>


    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:mb-24">
        <div class="order-2 lg:order-1 image-scale-effect-small">
            <img src="/assets/images/vehicles/dzire/image6.png" alt="baleno" class="w-full">
        </div>
        <div class="flex items-center w-full lg:w-4/5 order-1 lg:order-2">
            <div class="px-5 text-left lg:px-0">
                <div class="grid grid-cols-1 lg:grid-cols-1">
                    <div>
                        <div class="mt-4">
                            <p class="text-3xl text-gray-800 suzuki-bold">Smartphone Linkage Display Audio (SLDA*) </p>
                            <p class="text-lg text-gray-800">For your entertainment, the Dzire comes with a highly advanced Smartphone Linkage Display Audio, which lets you stay connected to excitement, at every moment. It works with Apple CarPlay for your iPhone, or Android AutoTM or MirrorLinkTM for your compatible smartphone. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <div class="image-scale-effect-small">
            <img src="/assets/images/vehicles/dzire/image7.png" alt="baleno" class="w-full h-full object-cover">
        </div>
        <div class="image-scale-effect-small">
            <img src="/assets/images/vehicles/dzire/image8.png" alt="baleno" class="w-full h-full object-cover">
        </div>
        <div class="image-scale-effect-small">
            <img src="/assets/images/vehicles/dzire/image9.png" alt="baleno" class="w-full h-full object-cover">
        </div>
        <div class="image-scale-effect-small">
            <img src="/assets/images/vehicles/dzire/image10.png" alt="baleno" class="w-full h-full object-cover">
        </div>
        <div class="image-scale-effect-small">
            <img src="/assets/images/vehicles/dzire/image11.png" alt="baleno" class="w-full h-full object-cover">
        </div>
        <div class="image-scale-effect-small">
            <img src="/assets/images/vehicles/dzire/image12.png" alt="baleno" class="w-full h-full object-cover">
        </div>
    </div>


    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-900 md:mt-24 md:mb-12">
        <img src="/assets/images/vehicles/dzire/image13.png" alt="baleno" class="w-full h-full object-cover">
        <div class="mt-5">
            <p class="text-lg text-gray-800">Suzuki makes user safety a priority since the vehicle is equipped as standard with ABS with electronic brake force distribution, front airbags for drivers and passengers.</p>
            <p class="text-lg text-gray-800">Compact on the outside but generous on the inside, the DZIRE is truly a vehicle that overturns conventional wisdom! Succumb to its charms and adopt there, you will not be able to do without it. </p>
        </div>
    </div>

    <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-900 grid grid-cols-1 md:grid-cols-2 gap-3">
        <div>
            <p class="text-3xl text-gray-800 suzuki-bold mb-2">Hill Hold Control </p>
            <img src="/assets/images/vehicles/dzire/image14.png" alt="baleno" class="w-full">
        </div>
        <div>
            <p class="text-3xl text-gray-800 suzuki-bold mb-2">Reverse parking sensors </p>
            <img src="/assets/images/vehicles/dzire/image15.png" alt="baleno" class="w-full">
        </div>
    </div> --}}





    {{-- ====================== END ======================== --}}






    </section>
    {{-- showroom section --}}


    {{-- <spec-broucher></spec-broucher> --}}
@endsection
