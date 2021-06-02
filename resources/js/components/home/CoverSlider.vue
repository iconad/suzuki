    <template>
        <div class="front-cover">
            <splide :options="options" has-slider-wrapper>

                <splide-slide v-for="(slide, i) in slides" :key="i">
                    <cover-slide :slide="slide" />
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
    import CoverSlide from './CoverSlide.vue'

    export default {
        components: {
            Splide,
            SplideSlide,
            CoverSlide
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
                      src: "https://i.ibb.co/sbh72ps/Suzuksi-ramadan-web-banner-2000x815.jpg",
                      link: ""
                  },
                  {
                      id: 2,
                      name: "slide two",
                      src: "https://suzuki.ae/storage/198/hq9XmFgdhASassGl.jpeg",
                      link: ""
                  },
                  {
                      id: 3,
                      name: "slide three",
                      src: "https://suzuki.ae/storage/199/7toXPLYThpTeaWu8.jpeg",
                      link: ""
                  },
              ],
            }
        },
    }
</script>

<style lang="scss">

@mixin md-max {
    @media only screen and (max-width: 768px) {
        @content;
    }
}

.front-cover {
    .splide__pagination {
        bottom: 10%;
        left: 10%;
        @include md-max {
        bottom: 3%;
        left: 13%;
    }
  }
}
.vehicles-slider {
    .splide__pagination {
        bottom: 0%;
        right: 0%;
        .splide__pagination__page {
            background: #00334C;
            &.is-active {
                background: #00334C;
            }
        }
  }
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
