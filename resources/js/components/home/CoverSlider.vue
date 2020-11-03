<template>
    <div>
        <splide :options="options" has-slider-wrapper>

            <splide-slide v-for="(slide, i) in slides" :key="i">
                <img :src="slide.src" alt="slide.name" class="w-full h-screen-80 object-cover">
            </splide-slide>

            <template v-slot:controls>
                <div class="splide__progress">
                    <div class="splide__progress__bar bg-theme-red"></div>
                </div>
            </template>
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
                    perPage : 1,
                    gap : '0rem',
                    autoplay : "10000",
                    pauseOnHover: true,
                    arrows: false,
                    pagination: "slider"
			  },
			  slides:[
                  {
                      id: 1,
                      name: "slide one",
                      src: "https://i.ibb.co/3SYDYJj/cover.jpg",
                      link: ""
                  },
                  {
                      id: 2,
                      name: "slide two",
                      src: "https://i.ibb.co/Tc8d8wL/cover-2.jpg",
                      link: ""
                  },
                  {
                      id: 3,
                      name: "slide three",
                      src: "https://i.ibb.co/B6c7FKf/cover-1.jpg",
                      link: ""
                  },
              ],
            }
        },
    }
</script>

<style lang="scss">
.splide__pagination {
    bottom: 10%;
    left: 10%;
}
.splide__pagination__page {
    width: 15px;
    height: 15px;
    margin: 4px;
    opacity: 0.7;
    border-radius: 0px;
    &.is-active {
        opacity: 1;
    }
}
</style>
