<template>
    <div>
        <div class="pt-5 py-12 md:py-24 text-center font-bold uppercase italic text-4xl md:text-7xl xxl:text-8xl leading-none mb-5">
            <span class="suzuki-mon font-black">
                <span class="text-theme-darkblue">Take your</span>
                <span class="text-theme-red-500">Pick</span>
            </span>
        </div>

        <splide :options="options" v-if="!$apollo.queries.models.loading">
            <splide-slide class="image-scale-effect" v-for="(slide, i) in models" :key="i">
                <take-your-pick-slide :slide="slide" />
            </splide-slide>
        </splide>

    </div>
</template>

<script>

    import gql from 'graphql-tag'
    import vehiclesQuery from "../../../../gql/frontend/vehicles.gql";

    import { Splide, SplideSlide } from '@splidejs/vue-splide';
    import TakeYourPickSlide from './TakeYourPickSlide'
    export default {
        components: {
            Splide,
            SplideSlide,
            TakeYourPickSlide
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
                            arrows: false,
                            perPage: 2,
                            gap    : '1rem',
                        },
                        '580': {
                            arrows: false,
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
        },
        apollo: {
            models() {
                return {
                    query: vehiclesQuery,
                    update(data) {
                        this.selectedModel = data.vehicles[0]
                        return data.vehicles;
                    },
                };
            },
        }
    }
</script>

<style lang="scss">

</style>
