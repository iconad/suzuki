<template>
    <div>
        <div class="pt-5 py-12 md:py-32 text-center font-bold uppercase italic text-4xl md:text-7xl xxl:text-8xl leading-none mb-5">
            <span class="suzuki-mon font-black">
                <span class="text-theme-darkblue">Take your</span>
                <span class="text-theme-red-500">Pick</span>
            </span>
        </div>

        <splide :options="options">
            <splide-slide class="image-scale-effect relative h-64" v-for="(slide, i) in slides" :key="i">
                <img :src="slide.src" alt="slide.alt" class="w-full h-full object-cover object-center">
                <div class="absolute left-0 top-0 w-full h-full">
                    <div class="absolute left-0 bottom-0 p-5 xxl:p-8 z-10 title">
                        <span class="block italic text-gray-100 text-2xl suzuki-mon xxl:text-3xl uppercase font-black">
                            <img v-if="slide.logo" :src="slide.logo" alt="logo" class="w-7rem">
                            <span v-else>{{slide.name}}</span>
                        </span>
                        <a href class="flex items-center italic text-gray-100 text-base font-semibold hover:text-theme-red">
                            <span>Explore</span>
                            <span><svg class="fill-current w-4 xxl:w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9 13l1 1 6-6-2-1-4 4-4-4-2 1z"/></svg></span>
                        </a>
                    </div>
                </div>
            </splide-slide>
        </splide>

    </div>
</template>

<script>
    import { Splide, SplideSlide } from '@splidejs/vue-splide';
    export default {
        components: {
            Splide,
            SplideSlide,
        },
        data() {
            return {
                options: {
                    rewind : true,
                    perPage : 5,
                    perMove: 1,
                    gap : '1rem',
                    arrows: true,
                    pagination: false,
                    breakpoints: {
                        '1470': {
                            perPage: 5,
                            gap    : '1rem',
                        },
                        '1270': {
                            perPage: 4,
                            gap    : '1rem',
                        },
                        '1000': {
                            perPage: 3,
                            gap    : '1rem',
                        },
                        '740': {
                            perPage: 2,
                            gap    : '1rem',
                        },
                        '580': {
                            perPage: 1,
                            gap    : '0rem',
                        },
                    }
			  },
			  slides:[
                  {
                      id: 1,
                      name: "Baleno",
                      logo: "https://i.ibb.co/Rb3Rzsb/bleno.png",
                      src: "https://i.ibb.co/Gd6Bbsk/suzuki1.webp",
                      link: ""
                  },
                  {
                      id: 2,
                      name: "Swift",
                      logo: "https://i.ibb.co/rQxkyZ1/swift.png",
                      src: "https://i.ibb.co/xD4Vw0D/suzuki8.webp",
                      link: ""
                  },
                  {
                      id: 3,
                      name: "Dzire",
                      logo: "https://i.ibb.co/19Pxmf4/dzire.png",
                      src: "https://i.ibb.co/6cMJSwz/suzuki4.webp",
                      link: ""
                  },
                  {
                      id: 1,
                      name: "Vitara",
                      logo: "https://i.ibb.co/gjXZnqG/vitara.png",
                      src: "https://i.ibb.co/pbXCs0V/suzuki9.webp",
                      link: ""
                  },
                  {
                      id: 2,
                      name: "Jimny",
                      logo: "https://i.ibb.co/sRRMSr8/jimny.png",
                      src: "https://i.ibb.co/3rHyB3Y/suzuki2.webp",
                      link: ""
                  },
                  {
                      id: 3,
                      name: "Ciaz",
                      logo: null,
                      src: "https://i.ibb.co/N3hHHD0/suzuki3.webp",
                      link: ""
                  }
              ],
            }
        }
    }
</script>

<style lang="scss">

</style>
