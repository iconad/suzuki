<template>
    <div class="overflow-hidden relative showroom h-screen md:h-auto">
        <img src="../../../../public/assets/images/bg.jpeg" class="w-full h-screen md:h-auto object-cover object-top" alt="cover">
        <!-- <div class="" v-if="!$apollo.queries.vehicles.loading"> -->
        <div class="absolute left-0 md:left-12vw top-50vw md:top-16vw text-gray-900 leading-none w-full md:w-auto text-center md:text-left">
            <div class="text-4xl md:text-3vw">
                <span>Suzuki</span>
                <span class="suzuki-bold splide-slide-title uppercase" id="slideTitle">Baleno</span>
            </div>
            <div class="text-lg md:text-2vw mt-1 md:mt-5 uppercase text-gray-300 md:text-gray-800 splide-slide-sub-title" id="slideSubTitle">
                <span>Reason</span>
                <span class="suzuki-bold">Finds</span>
                <span>Emotion</span>
            </div>
            <div class="relative z-10">
                <a id="slideSlug" href="/vehicles/baleno" class="red-button mt-2 md:mt-4 text-sm md:text-lg xxl:text-xl px-2 lg:px-4 pb-1 md:pb-0 py-0 xxl:py-1 hover:bg-red-500 hover:text-white">Explore Car</a>
            </div>
        </div>

        <div class="absolute bottom-0 w-full left-0 car-wrapper">
            <splide
            :options="options"
            ref="primary"
            @splide:move="move"
            @splide:moved="moved"
            >
                <splide-slide v-for="(slide,i) in vehicles" :key="i" class="car-splide">
                    <vehicle-slide  :customwidth="customWidth" :slide="slide" :index="i"></vehicle-slide>
                </splide-slide>
            </splide>
        </div>

        <div class="vehicle-splide02-track mt-3 z-10 absolute bottom-24 md:bottom-12 xxl:bottom-32 left-0 w-full flex items-center justify-center vehicles-slider">
            <splide
            :options="secondaryOptions"
            ref="secondary"
            class="flex items-center"
            >
                <splide-slide v-for="(slide,t) in vehicles" :key="t" class="opacity-0 md:opacity-100">
                    <thumb-slide :slide="slide"></thumb-slide>
                </splide-slide>
            </splide>
        </div>
    </div>
</template>

<script>

    // import gql from 'graphql-tag'
    // import vehiclesQuery from "../../../../gql/frontend/vehicles.gql";

    import { Splide, SplideSlide } from '@splidejs/vue-splide';

    import vehicleSlide from './VehicleSlide'
    import thumbSlide from './VehiclesThumbSlide'

    export default {
        props: ['vehicles'],
    components: {
        Splide,
        SplideSlide,
        vehicleSlide,
        thumbSlide
    },
    data() {
        return {
            customWidth: "w-4/5 md:w-1/3",
            options: {
                type: 'loop',
                arrows: false,
                rewind: true,
                gap: '1rem',
                pagination: false,
                lazyLoad: 'nearby',
            },
            secondaryOptions: {
                type        : 'slide',
                rewind      : true,
                gap         : '2rem',
                pagination  : false,
                cover       : true,
                focus       : 'center',
                isNavigation: true,
                updateOnMove: true,
                breakpoints: {
                    '750': {
                        pagination: true
                    }
                }
            },
            count: 0
        }
        },
        mounted() {
            this.$refs.primary.sync( this.$refs.secondary.splide );
        },
        methods: {
            move( splide, newIndex ) {
                let title = document.getElementsByClassName(`slideTitle${newIndex}`)[0].value
                let subTitle = document.getElementsByClassName(`slideSubTitle${newIndex}`)[0].value
                let slug = document.getElementsByClassName(`slideSlug${newIndex}`)[0].value
                document.getElementById('slideTitle').innerHTML = title
                document.getElementById('slideSubTitle').innerHTML = subTitle
                document.getElementById('slideSlug').setAttribute('href', 'vehicles/'+slug)

                // document.querySelectorAll("splide-slide-title").forEach(obj=>obj.classList.remove("focus-in-contract"));
                // document.querySelectorAll("splide-slide-sub-title").forEach(obj=>obj.classList.remove("focus-in-contract"));

                let slideSlideTitle = document.getElementById('slideTitle')
                let slideSlideSubTitle = document.getElementById('slideSubTitle')
                let slideSlideSlug = document.getElementById('slideSlug')

                if(title.toLowerCase() == 'ciaz') {
                    this.customWidth = 'w-4/5 md:w-1/2'
                }else{
                    this.customWidth = 'w-4/5 md:w-1/3'
                }

                slideSlideTitle.classList.add("slide-in-blurred-top");
                slideSlideSubTitle.classList.add("focus-in-contract");

            },
            moved (splide, newIndex) {
                let title = document.getElementById('slideTitle');
                let subTitle = document.getElementById('slideSubTitle');
                let slug = document.getElementById('slideSlug');

                setTimeout(function(){
                    title.classList.remove('slide-in-blurred-top');
                    subTitle.classList.remove('focus-in-contract');
                 }, 500);
            }
        },
        // apollo: {
        //     vehicles() {
        //         return {
        //             query: vehiclesQuery,
        //             update(data) {
        //                 return data.vehicles;
        //             },
        //         };
        //     },
        // }
    }
</script>

<style lang="scss">

@mixin md-max {
    @media only screen and (max-width: 768px) {
        @content;
    }
}

.car-wrapper {
    bottom: 25%;
}
.vehicle-splide02-track #splide02-track {
    li {
        display: flex;
        align-items: center;
        width: 7vw!important;
        height: 45px!important;
        @include md-max {
            width: 17vw!important;
        }
    }
}
.splide__slide {
    background-size: contain!important;
}

.splide__arrows {
    display: none;
}


.vehicle-splide02-track .splide__arrow--prev {
    left: -4em;
}

.vehicle-splide02-track .splide__arrow--next {
    right: -5em;
}

.splide--nav>.splide__track>.splide__list>.splide__slide.is-active {
    border: none!important;
    filter: invert(100%);
    transition: 0.3s;
    transform: scale(1.2);
}
.active-thumb-slide {
    box-shadow:
    0 0 60px 30px #fff,  /* inner white */
    0 0 100px 60px #f0f, /* middle magenta */
    0 0 140px 90px #0ff; /* outer cyan */
}

.focus-in-contract {
	-webkit-animation: focus-in-contract 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	        animation: focus-in-contract 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
}

.text-focus-in {
	-webkit-animation: text-focus-in 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both;
	        animation: text-focus-in 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both;
}

.slide-in-blurred-top {
	-webkit-animation: slide-in-blurred-top 1s cubic-bezier(0.230, 1.000, 0.320, 1.000) both;
	        animation: slide-in-blurred-top 1s cubic-bezier(0.230, 1.000, 0.320, 1.000) both;
}


@-webkit-keyframes slide-in-blurred-top {
  0% {
    -webkit-transform: translateY(-1000px) scaleY(2.5) scaleX(0.2);
            transform: translateY(-1000px) scaleY(2.5) scaleX(0.2);
    -webkit-transform-origin: 50% 0%;
            transform-origin: 50% 0%;
    -webkit-filter: blur(40px);
            filter: blur(40px);
    opacity: 0;
  }
  100% {
    -webkit-transform: translateY(0) scaleY(1) scaleX(1);
            transform: translateY(0) scaleY(1) scaleX(1);
    -webkit-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
    -webkit-filter: blur(0);
            filter: blur(0);
    opacity: 1;
  }
}
@keyframes slide-in-blurred-top {
  0% {
    -webkit-transform: translateY(-1000px) scaleY(2.5) scaleX(0.2);
            transform: translateY(-1000px) scaleY(2.5) scaleX(0.2);
    -webkit-transform-origin: 50% 0%;
            transform-origin: 50% 0%;
    -webkit-filter: blur(40px);
            filter: blur(40px);
    opacity: 0;
  }
  100% {
    -webkit-transform: translateY(0) scaleY(1) scaleX(1);
            transform: translateY(0) scaleY(1) scaleX(1);
    -webkit-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
    -webkit-filter: blur(0);
            filter: blur(0);
    opacity: 1;
  }
}



@-webkit-keyframes focus-in-contract {
  0% {
    letter-spacing: 1em;
    -webkit-filter: blur(12px);
            filter: blur(12px);
    opacity: 0;
  }
  100% {
    -webkit-filter: blur(0px);
            filter: blur(0px);
    opacity: 1;
  }
}
@keyframes focus-in-contract {
  0% {
    letter-spacing: 1em;
    -webkit-filter: blur(12px);
            filter: blur(12px);
    opacity: 0;
  }
  100% {
    -webkit-filter: blur(0px);
            filter: blur(0px);
    opacity: 1;
  }
}


@-webkit-keyframes text-focus-in {
  0% {
    -webkit-filter: blur(12px);
            filter: blur(12px);
    opacity: 0;
  }
  100% {
    -webkit-filter: blur(0px);
            filter: blur(0px);
    opacity: 1;
  }
}
@keyframes text-focus-in {
  0% {
    -webkit-filter: blur(12px);
            filter: blur(12px);
    opacity: 0;
  }
  100% {
    -webkit-filter: blur(0px);
            filter: blur(0px);
    opacity: 1;
  }
}


</style>

