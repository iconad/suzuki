<template>
    <div>
        <!-- py-12 md:py-24 -->
        <div class="pt-5 text-center font-bold uppercase italic text-4xl md:text-7xl xxl:text-8xl leading-none mb-5">
            <span class="suzuki-mon font-black">
                <span class="text-theme-darkblue">Take your</span>
                <span class="text-theme-red-500">Pick</span>
            </span>
        </div>

        <splide :options="options" v-if="!$apollo.queries.models.loading" has-slider-wrapper>
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
                            arrows: true,
                            perPage: 5,
                            gap    : '1rem',
                        },
                        '1270': {
                            arrows: true,
                            perPage: 4,
                            gap    : '1rem',
                        },
                        '1000': {
                            arrows: true,
                            perPage: 3,
                            gap    : '1rem',
                        },
                        '740': {
                            arrows: true,
                            perPage: 2,
                            gap    : '1rem',
                        },
                        '580': {
                            arrows: true,
                            perPage: 1,
                            gap    : '0rem',
                        },
                    }
			  },
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
