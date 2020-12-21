@extends('layouts.app')

@section('content')

    <section class="vehicle-info section mt-16 space-y-16 xxl:space-y-24">

        <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-800">
            <div class="content">
                <p class="text-xl text-gray-800 suzuki-bold">
                    PURPOSE IN THE MAKING
                ​</p>

                <p class="text-lg text-gray-800">
                    Like its predecessors, the new Jimny remains a small, lightweight 4WD vehicle. Its unique dimensions mean the Jimny can manoeuvre where larger vehicles don’t dare to go. Its light weight keeps it going strong over mud, through sand, and up steep slippery slopes where heavier vehicles tend to get stuck.
                ​</p>

            </div>
        </div>

        <div>
            <img src="/assets/images/explore-cover.webp" alt="explore baleno cover" class="w-full">
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div class="order-2 lg:order-1 image-scale-effect-small">
                <img src="/assets/images/baleno-1.jpg" alt="baleno" class="w-full">
            </div>
            <div class="flex items-center w-full lg:w-4/5 order-1 lg:order-2">
                <div class="px-5 text-center lg:text-left lg:px-0 content">
                    <div class="text-3xl md:text-5xl text-gray-800 suzuki-medium capitalize mb-3">POWERED BY PURPOSE</div>
                    <p class="text-lg text-gray-800"><span class="suzuki-bold">New 1.5l engine:</span> The new 1.5l engine generates strong torque over a wide rpm range for powerful off-road performance. Small and lightweight, it also delivers high fuel efficiency.</p>
                    <p class="text-lg text-gray-800"><span class="suzuki-bold">Brake LSD Traction control:</span>  If two wheels diagonal from each other lose grip while you’re travelling over slippery surfaces, this feature is designed to automatically brake the slipping wheels and redistribute torque to the other two wheels.</p>
                    <p class="text-lg text-gray-800"><span class="suzuki-bold">Hill Descent Control:</span> Automatically apply the brakes with the push of a button to maintain a fixed decent speed while you concentrate on steering without using the brake pedal or clutch.</p>
                </div>
            </div>
        </div>

        <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-900 text-center">
            <div class="content">
                <p class="text-3xl md:text-5xl text-gray-800 suzuki-medium capitalize mb-3">RIGID LADDER FRAME CHASSIS</p>
                <p class="text-lg text-gray-800">From the very first generation, the Jimny has always featured a ladder frame that offers a solid foundation for serious off-road performance.</p>
            </div>
        </div>

        <div>
            <div>
                <img src="/assets/images/baleno-2.png" alt="baleno" class="w-full">
            </div>
        </div>

        <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-900 text-center">
            <div class="text-3xl md:text-5xl text-gray-800 suzuki-medium capitalize mb-4">LINK RIGID AXLE SUSPENSION WITH COIL SPRINGS</div>
            <p class="text-lg text-gray-800">The new Jimny has full-width rigid axles in both the front and rear to ensure superior grip on diverse surfaces. When an obstacle pushes one wheel up, the axle presses the other wheel down.</p>
        </div>

        <img src="http://www.suzuki.ae/SiteAssets/Images/Large/baleno-interior.jpg" alt="image" class="w-full">

        <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-900 content">
            <div class="text-3xl md:text-5xl text-gray-800 suzuki-medium capitalize">4WD WITH LOW RANGE TRANSFER GEAR</div>
            <p class="text-lg text-gray-800">Part-time 4WD allows switching between 4WD, for optimal off-road performance, and 2WD for better fuel economy and enhanced cornering on paved roads.</p>
            <p class="text-2xl text-gray-800 suzuki-medium capitalize">AMPLE BODY ANGLES AND CLEARANCE</p>
            <p class="text-lg text-gray-800">The Jimny can climb over obstacles and steep hills without scraping its bumpers or underbody, thanks to an ample approach angle, ramp break over angle, departure angle, as well as plenty of ground clearance.</p>
            <p class="text-2xl text-gray-800 suzuki-medium capitalize">READY FOR ANYTHING</p>
            <p class="text-lg text-gray-800">Expand your rear storage area by folding the back seats. Flat across, the expanded space allows crosswise storage of wide items. Screw holes provide support for optional accessories like luggage bars and utility hooks. Convenient pockets and trays keep your smartphone and gadgets within reach. USB and accessory sockets are close by to connect and power your devices.</p>
            <img src="http://www.suzuki.ae/SiteAssets/Images/Large/baleno-safety.jpg" alt="image" class="w-full mt-16">

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div class="order-2 lg:order-1 image-scale-effect-small">
                <img src="/assets/images/baleno-1.jpg" alt="baleno" class="w-full">
            </div>
            <div class="flex items-center w-full lg:w-4/5 order-1 lg:order-2">
                <div class="px-5 text-center lg:text-left lg:px-0">
                    <div class="text-3xl md:text-5xl text-gray-800 suzuki-medium capitalize">STEADY ON</div>
                    <p class="text-lg text-gray-800">The new Jimny comes with a range of protective advances to keep you safe out in the wild or in the city.</p>
                </div>
            </div>
        </div>

        <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-900 content">
            <div class="text-3xl md:text-5xl text-gray-800 suzuki-medium capitalize">BRAKE LSD TRACTION CONTROL</div>
            <p class="text-lg text-gray-800">If two wheels diagonal from each other lose grip while you’re travelling over slippery surfaces, this feature is designed to automatically brake the slipping wheels and redistribute torque to the other two wheels.</p>
            <img src="http://www.suzuki.ae/SiteAssets/Images/Large/baleno-safety.jpg" alt="image" class="w-full mt-16">

        </div>

        <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 text-gray-900">
            <div class="text-3xl md:text-5xl text-gray-800 suzuki-medium capitalize mb-3">HILL HOLD CONTROL</div>
            <div class="content">
                <p class="text-lg text-gray-800">This feature helps prevent backward rolling even on bumpy and uneven hills, so you can focus on controlling acceleration.</p>
            </div>

        </div>



    </section>
    {{-- showroom section --}}


    {{-- <spec-broucher></spec-broucher> --}}
@endsection
