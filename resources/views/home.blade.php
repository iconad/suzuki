@extends('layouts.app')

@section('content')
    <section class="front-cover">
        <home-cover-slider></home-cover-slider>
    </section>
    {{-- front cover --}}

    <section class="take-your-pick">
        <take-your-pick></take-your-pick>
    </section>

    <section class="explore-the-exciting pt-8">
        <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 heading  mb-6">
            <div class="hidden text-6xl lg:text-8xl text-theme-red-500 font-bold uppercase leading-none">
                <span class="flex items-end">
                    <span class="md:-mb-2">explore</span>
                    <span class="text-2xl lg:text-4xl mb-2 md:mb-0">the exciting</span>
                </span>
                <span class="flex items-start">
                    <span class="text-3xl lg:text-5xl">world of</span>
                    <span class="text-theme-skyblue -mt-2">suzuki</span>
                </span>
            </div>
            <div>
                <img src="{{asset('assets/images/explore-the-exciting.webp')}}" alt="explore the exciting word of suzuki" class="w-20rem md:w-30rem lg:w-40rem">
            </div>
        </div>
        {{-- heading --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4">
            <div class="relative bg-theme-blue-500 h-screen-50 lg:h-40rem xxl:h-50rem lg:col-span-2 lg:row-span-2 overflow-hidden">
                <div class="p-12 absolute left-0 top-0 w-full z-10">
                    <div class="uppercase text-xl md:text-4xl xxl:text-5xl leading-none text-gray-100 font-light">
                        <span class="block font-medium">suzuki <span class="suzuki-bold">virtual</span></span>
                        <span class="block font-medium">showroom</span>
                    </div>
                    <div class="mt-3">
                        <a href="/vehicles" class="red-button xxl:text-2xl px-3 py-1 hover:bg-white hover:border-white">Explore Now</a>
                    </div>
                </div>
                {{-- absolute left-0 bottom-0 -ml-12 lg:-ml-24 -mb-12 lg:-mb-2 xxl:-mb-48 w-full h-auto --}}
                <div class="absolute left-0 bottom-0 w-full h-auto image-scale-effect-small">
                    <img src="{{asset('assets/images/vehicles/baleno-blue-2.webp')}}" alt="Baleno" class="-mb-16 sm:-mb-24 md:-mb-48 lg:-mb-24 -ml-8 w-full object-cover h-full">
                </div>
            </div>
            <div onclick="location.href='/test-drive';" class="cursor-pointer bg-theme-gray h-screen-50 lg:h-20rem xxl:h-25rem flex flex-col items-center justify-around image-scale-effect-small">
                <div>
                    <span class="text-center w-full text-3xl capitalize font-medium">let's drive</span>
                </div>
                <div class="car-effect-left-right">
                    <img src="{{asset('assets/images/vehicles/swift.webp')}}" alt="swift" class="w-3/4">
                </div>
            </div>
            <div onclick="location.href='/get-a-quote';" class="cursor-pointer bg-theme-red-500 h-screen-50 lg:h-20rem xxl:h-25rem relative overflow-hidden image-scale-effect-small">
                <div class="flex flex-col items-center justify-around lg:justify-end absolute left-0 top-0 w-full h-full">
                    <div class="absolute left-0 top-0 w-full pt-10">
                        <span class="z-10 relative block text-center text-gray-200 lg:mb-5 w-full text-3xl capitalize font-medium">
                            <span class="block text-sm">Reach out</span>
                            <span class="block">To Us</span>
                        </span>
                    </div>
                    <div>
                        <img src="{{asset('assets/images/vehicles/swift-red.png')}}" alt="swift" class="mb-10 sm:mb-0 w-full">
                    </div>
                </div>
            </div>
            <div onclick="location.href='/after-sales/genuine-parts';" class="cursor-pointer bg-theme-skyblue h-screen-50 lg:h-20rem xxl:h-25rem flex items-center justify-center">
                <div class="capitalize text-center text-gray-100 font-light">
                    <div class="text-4xl leading-tight">
                        <span class="block">suzuki</span>
                        <span class="block">genuine parts</span>
                    </div>
                    <div>
                        <a href="/after-sales/genuine-parts" class="trasn-button border-gray-100 border-2 mt-5 inline-block px-8 rounded py-1 text-base hover:text-theme-skyblue hover:bg-white hover:border-white transition ease-linear duration-200 hover:font-medium">Explore Parts</a>
                    </div>
                </div>
            </div>
            <div onclick="location.href='/after-sales/book-service';" class="cursor-pointer bg-white h-screen-50 lg:h-20rem xxl:h-25rem relative">
                <div class="flex flex-col items-center justify-end absolute left-0 top-0 w-full h-full">
                    <div>
                        <span class="text-center text-gray-900 mb-5 w-full text-3xl capitalize font-medium">
                            <span class="block text-sm">Book A</span>
                            <span class="block">Car Service</span>
                        </span>
                    </div>
                    <div>
                        <img src="{{asset('assets/images/vehicles/engine.webp')}}" alt="engine" class="w-48 xxl:w-64 mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- explore the exciting --}}

    <section class="explore-cover">
        <a href="/vehicles/baleno"><img src="{{asset('assets/images/explore-cover.webp')}}" alt="explore baleno cover" class="w-full"></a>
    </section>
    {{-- explore cover --}}


    <section class="md:max-w-screen-xl mx-auto px-5 xxl:px-0 py-8 md:py-32 reviews hidden">
        <div class="mb-5">
            <div class="text-3xl uppercase font-semibold text-gray-900">what our customers say</div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-10">
            <div class="border rounded text-center">
                <div class="bg-gray-100 text-gray-900 py-24 px-16 ">
                    <div class="text-sm mt-3 relative">
                        <div class="text-5xl text-gray-500 leading-none absolute right-100 bottom-100">❝</div>
                        <div class="text-5xl text-gray-500 leading-none absolute left-100 top-100">❞</div>
                        <p class="text-sm text-gray-900">Mr. Mohammad Abu Tair from the Suzuki Sheikh Zayed Showroom, has made my purchase experience seamless and clear as crystal. He has great conviction and dilligence.</p>
                    </div>
                </div>
                <div>
                    <div class="w-32 h-32 border bg-white flex items-center justify-center rounded-full mx-auto -mt-16">
                        <img src="{{asset('assets/images/ajman.webp')}}" alt="ajman logo" class="w-24 mx-auto">
                    </div>
                    <div class="pt-2 pb-10">
                        <div class="text-2xl flex items-center justify-center mb-3 text-orange-400">
                            <span class="mx-px">★</span>
                            <span class="mx-px">★</span>
                            <span class="mx-px">★</span>
                            <span class="mx-px">★</span>
                            <span class="mx-px">★</span>
                        </div>
                        <div class="text-base suzuki-bold leading-none text-gray-700">Government of Ajman</div>
                    </div>
                </div>
            </div>
            {{-- reivew --}}
            <div class="border rounded text-center">
                <div class="bg-gray-100 text-gray-900 py-24 px-16 ">
                    <div class="text-sm mt-3 relative">
                        <div class="text-5xl text-gray-500 leading-none absolute right-100 bottom-100">❝</div>
                        <div class="text-5xl text-gray-500 leading-none absolute left-100 top-100">❞</div>
                        <p class="text-sm text-gray-900">Mr. Mohammad Abu Tair from the Suzuki Sheikh Zayed Showroom, has made my purchase experience seamless and clear as crystal. He has great conviction and dilligence.</p>
                    </div>
                </div>
                <div>
                    <div class="w-32 h-32 border bg-white flex items-center justify-center rounded-full mx-auto -mt-16">
                        <img src="{{asset('assets/images/ajman.webp')}}" alt="ajman logo" class="w-24 mx-auto">
                    </div>
                    <div class="pt-2 pb-10">
                        <div class="text-2xl flex items-center justify-center mb-3 text-orange-400">
                            <span class="mx-px">★</span>
                            <span class="mx-px">★</span>
                            <span class="mx-px">★</span>
                            <span class="mx-px">★</span>
                            <span class="mx-px">★</span>
                        </div>
                        <div class="text-base suzuki-bold leading-none text-gray-700">Government of Ajman</div>
                    </div>
                </div>
            </div>
            {{-- reivew --}}
            <div class="border rounded text-center">
                <div class="bg-gray-100 text-gray-900 py-24 px-16 ">
                    <div class="text-sm mt-3 relative">
                        <div class="text-5xl text-gray-500 leading-none absolute right-100 bottom-100">❝</div>
                        <div class="text-5xl text-gray-500 leading-none absolute left-100 top-100">❞</div>
                        <p class="text-sm text-gray-900">Mr. Mohammad Abu Tair from the Suzuki Sheikh Zayed Showroom, has made my purchase experience seamless and clear as crystal. He has great conviction and dilligence.</p>
                    </div>
                </div>
                <div>
                    <div class="w-32 h-32 border bg-white flex items-center justify-center rounded-full mx-auto -mt-16">
                        <img src="{{asset('assets/images/ajman.webp')}}" alt="ajman logo" class="w-24 mx-auto">
                    </div>
                    <div class="pt-2 pb-10">
                        <div class="text-2xl flex items-center justify-center mb-3 text-orange-400">
                            <span class="mx-px">★</span>
                            <span class="mx-px">★</span>
                            <span class="mx-px">★</span>
                            <span class="mx-px">★</span>
                            <span class="mx-px">★</span>
                        </div>
                        <div class="text-base suzuki-bold leading-none text-gray-700">Government of Ajman</div>
                    </div>
                </div>
            </div>
            {{-- reivew --}}
        </div>
    </section>
    {{-- reviews --}}


    <section class="keep-you-posted py-12 md:py-32 md:bg-gray-200">
        <div class="md:max-w-screen-xl mx-auto px-5 xxl:px-0">
            <div class="flex justify-center ">
                <div class="text-4xl md:text-5xl lg:text-7xl italic uppercase suzuki-mon font-black leading-none text-right">
                    <div class="text-gray-900">Keeping you</div>
                    <div class="md:-mr-10 -mt-1 md:-mt-3 text-theme-red-500">posted</div>
                </div>
            </div>
            {{-- heading --}}


            {{-- {!! $post1['caption'] !!} --}}

            <div class="instagram mt-24">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                    @isset($instafeed)
                        @foreach ($instafeed->slice(0, 4) as $item)
                        <div class="bg-gray-100 border rounded overflow-hidden md:bg-transparent">
                            <div>
                                @if ($item['type'] === 'image')
                                    <div> <img class="w-full h-48 object-cover" src="{{ $item['url'] }}" alt="insta feed"> </div>
                                @endif
                            </div>
                            <div class="info p-3 md:bg-white">
                                <div class="text-sm text-gray-800 font-medium">
                                    {{ Str::limit($item['caption'], 250) }}
                                </div>
                                <div class="mt-3">
                                    <a target="_blank" href="{{ $item['permalink'] }}" class="text-theme-blue-500 text-sm theme-link suzuki-bold">Read More</a>
                                </div>
                            </div>
                        </div>
                        {{-- inst --}}
                        @endforeach
                    @endisset


                </div>

                <div class="mt-10 text-center md:text-left">
                    <newsletter-form></newsletter-form>
                </div>
            </div>
            {{-- instagram --}}

        </div>
    </section>
    {{-- keep you posted --}}




@endsection
