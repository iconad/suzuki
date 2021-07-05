    <template>
        <div class="front-cover">

            <splide v-if="!$apollo.queries.slides.loading" :options="options" has-slider-wrapper>
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

    import gql from 'graphql-tag'
    import sliderQuery from "../../../../gql/frontend/slider.gql";

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
			  hello:[
                  {
                      id: 1,
                      name: "slide one",
                      src: "https://i.ibb.co/6Yg3tJh/test-cover.jpg",
                      link: ""
                  },
                  {
                      id: 2,
                      name: "slide two",
                      src: "https://i.ibb.co/BGh6LX5/test-cover-1.jpg",
                      link: ""
                  },
                  {
                      id: 3,
                      name: "slide three",
                      src: "https://i.ibb.co/VM607xF/test-cover-2.jpg",
                      link: ""
                  },
              ],
            }
        },
        apollo: {
            slides() {
                return {
                    query: sliderQuery,
                    update(data) {
                        return data.slides;
                    },
                };
            },
        }

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
