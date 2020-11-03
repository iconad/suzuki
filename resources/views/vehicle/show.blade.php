@extends('layouts.app')

@section('content')
    <section class="showroom-section">
        <showroom></showroom>
    </section>
    {{-- showroom section --}}

    <section class="vehicle-info section mt-16 space-y-16 xxl:space-y-24">

        <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800">
            <div class="detail">
                <p class="text-lg text-gray-800">Can a car embody seemingly opposing qualities? Can a compact combine class-leading roominess with elegant design? The hatchback shattering conventions can: introducing the new Baleno. Come and Get it​</p>
                <div class="my-5 text-3xl suzuki-bold capitalize">Come and get it</div>
            </div>
        </div>

        <div>
            <img src="{{asset('assets/images/explore-cover.webp')}}" alt="explore baleno cover" class="w-full">
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div class="order-2 lg:order-1 image-scale-effect-small">
                <img src="{{asset('assets/images/baleno-1.jpg')}}" alt="baleno" class="w-full">
            </div>
            <div class="flex items-center w-full lg:w-4/5 order-1 lg:order-2">
                <div class="px-5 text-center lg:text-left lg:px-0">
                    <div class="text-5xl suzuki-bold capitalize mb-3">Space joins Style</div>
                    <p class="text-lg text-gray-800">Go places in a touch of luxury with the elegant and dynamic Baleno. Combining style, space, economy and performance in one complete package , the new Baleno hatchback is equipped with all the latest mod-cons and safety features – for a whole lot less than you would expect.</p>
                </div>
            </div>
        </div>

        <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-900 text-center">
            <div>
                <div class="text-5xl suzuki-bold capitalize">Eco Meets Performance</div>
                <p class="text-lg text-gray-800">Convincing with economy and ecology – exciting with performance and agility. The new Baleno does both: experience the connection of high eco efficiency and real driving pleasure.​​ From the moment you set eyes on the Baleno, you’ll know that everything is different now. A new, refined excitement that grabs your heart and won’t let go - a sense of delight that changes your preconception of what a car can be. When you take off in a Baleno, you ride at the vanguard of a thrilling new life.</p>
            </div>
        </div>

        <div>
            <div>
                <img src="{{asset('assets/images/baleno-2.png')}}" alt="baleno" class="w-full">
            </div>
        </div>

        <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-900 text-center">
            <div class="text-5xl suzuki-bold capitalize">Delivering heart-throbbing driving Experience</div>
        </div>

        <img src="http://www.suzuki.ae/SiteAssets/Images/Large/baleno-interior.jpg" alt="image" class="w-full">

        <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-900">
            <p class="text-lg text-gray-800">A lighter car means better handling and improved fuel efficiency or the economy you want and the performance you need. The combined effect is impressive. The Baleno is agile, responsive, and frugal on fuel with a combined consumption of just 19.9 km/l. Fuel consumption will vary due to factors such as vehicle condition, driving style and traffic conditions. The LED daylight running lamps located in the front bumper not only look good, they also increase the Baleno’s visibility – especially from a distance, reducing the likelihood of an accident.</p>
            <img src="http://www.suzuki.ae/SiteAssets/Images/Large/baleno-safety.jpg" alt="image" class="w-full mt-16">

        </div>


        <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-900">
            <p class="text-lg text-gray-800">The Baleno is equipped with a comprehensive range of integrated safety features including; dual, front, side and curtain airbags, Electronic Stability Programme (ESP®),Suzuki’s unique Total Effective Control Technology, ABS with Electronic Brake Distribution, and Brake Assist. To further enhance visibility and safety, included are a reversing camera, LED daytime running lamps and fog lamps.</p>
        </div>

        <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-900">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-end">
                <div class="order-2 lg:order-1 flex lg:flex-none items-center lg:justify-start justify-center">
                    <vehicle-explore-more></vehicle-explore-more>
                </div>
                <div class="order-1 lg:order-2 image-scale-effect-small">
                    <img src="http://www.suzuki.ae/SiteAssets/Images/Large/baleno-silver.jpg" alt="car" class="w-full">
                </div>
            </div>

        </div>
        <div></div>


    </section>
    {{-- showroom section --}}


    <spec-broucher></spec-broucher>
@endsection
