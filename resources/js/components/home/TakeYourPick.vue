<template>
    <div>
        <!-- py-12 md:py-24 -->
        <div class="py-12 md:py-24 text-center font-bold uppercase italic text-4xl md:text-7xl xxl:text-8xl leading-none">
            <span class="suzuki-mon font-black">
                <span class="text-theme-darkblue">Take your</span>
                <span class="text-theme-red-500">Pick</span>
            </span>
        </div>

        <splide :options="options" v-if="!$apollo.queries.models.loading" class="takeyourpick" has-slider-wrapper>

            <template v-slot:controls >
                <div class="splide__arrows">
                    <button class="h-32 splide__arrow splide__arrow--next">
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492 492"><path d="M199 246L383 62a27 27 0 000-38L367 8c-6-5-12-8-19-8s-14 3-20 8L109 227a27 27 0 000 38l219 219a27 27 0 0038 0l16-16c11-10 11-28 0-38L199 246z"/></svg>
                    </button>
                    <button class="splide__arrow splide__arrow--prev">
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492 492"><path d="M199 246L383 62a27 27 0 000-38L367 8c-6-5-12-8-19-8s-14 3-20 8L109 227a27 27 0 000 38l219 219a27 27 0 0038 0l16-16c11-10 11-28 0-38L199 246z"/></svg>
                    </button>

                </div>
            </template>

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


@mixin xs-max {
    @media only screen and (max-width: 380px) {
        @content;
    }
}

@mixin sm-max {
    @media only screen and (max-width: 640px) {
        @content;
    }
}

@mixin md-max {
    @media only screen and (max-width: 768px) {
        @content;
    }
}

@mixin lg-max {
    @media only screen and (max-width: 1024px) {
        @content;
    }
}

@mixin xl-max {
    @media only screen and (max-width: 1280px) {
        @content;
    }
}

@mixin max-1450 {
    @media only screen and (max-width: 1450px) {
        @content;
    }
}

@mixin xxl-max {
    @media only screen and (max-width: 1600px) {
        @content;
    }
}


.takeyourpick .splide__arrow {
    width: auto;
    top: -147px;
    @include max-1450 {
        top: -138px;
    }
    @include md-max {
        top: 50%;
    }
}

.takeyourpick .splide__arrow--prev {
    left: inherit;
    right: 22%;
    @include xxl-max {
        right: 17%;
    }
    @include xl-max {
        right: 11%;
    }
    @include lg-max {
        right: 0%;
    }
}

.takeyourpick .splide__arrow--next {
    right: inherit;
    left: 22%;
    @include xxl-max {
        left: 18%;
    }
    @include xl-max {
        left: 12%;
    }
    @include lg-max {
        left: 0%;
    }
}

.takeyourpick .splide__arrow svg {
    width: 60px;
    height: 60px;
    font-weight: bold;
    cursor: pointer;
    @include max-1450 {
        width: 50px;
        height: 50px;
    }
}

</style>
