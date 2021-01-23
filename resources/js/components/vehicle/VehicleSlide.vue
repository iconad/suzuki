<template>
    <div>
        <div class="absolute inset-x-0 bototm-0 hidden">
            <input type="hidden" :class="`slideTitle${index}`" :value="slide.title"/>
            <input type="hidden" :class="`slideSubTitle${index}`" :value="slide.sub_title" />
            <input type="hidden" :class="`slideSlug${index}`" :value="slide.slug" />
        </div>
        <div class="w-1/3 mx-auto">
            <thumb-image classess="car w-full ml-5 md:ml-12 lg:ml-16" :image="firstMedia[0].file_name" :id="firstMedia[0].id"></thumb-image>

        </div>
    </div>
</template>

<script>

    import thumbImage from '../ThumbImage'

    export default {
        props: ['slide', 'index'],
        components: {
            thumbImage
        },
        computed: {
            firstMedia (){
                return this.slide.media.filter(e => {
                    if(e.collection_name === 'showroom') {
                        return e
                    }
                })
            }
        }
    }
</script>
