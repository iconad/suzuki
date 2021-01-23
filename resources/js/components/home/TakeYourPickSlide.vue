<template>
    <div class="relative h-64">
        <thumb-image classess="w-full h-64 object-cover object-center" :image="firstMedia[0].file_name" :id="firstMedia[0].id"></thumb-image>
        <div class="absolute left-0 top-0 w-full h-full">
            <div class="absolute left-0 bottom-0 p-5 xxl:p-8 z-10 title">
                <span class="block italic text-gray-100 text-2xl suzuki-mon xxl:text-3xl uppercase font-black">
                    <thumb-image v-if="firstMediaLogo[0]" classess="w-7rem" :image="firstMediaLogo[0].file_name" :id="firstMediaLogo[0].id"></thumb-image>
                    <span v-else>{{slide.title}}</span>
                </span>
                <a :href="`/vehicles/${slide.slug}`" class="cursor-pointer flex items-center italic text-gray-100 text-base font-semibold hover:text-theme-red">
                    <span>Explore</span>
                    <span><svg class="fill-current w-4 xxl:w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9 13l1 1 6-6-2-1-4 4-4-4-2 1z"/></svg></span>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    import thumbImage from '../ThumbImage'
    export default {
        props: ['slide'],
        components: {
            thumbImage
        },
        computed: {
            firstMedia (){
                return this.slide.media.filter(e => {
                    if(e.collection_name === 'thumbnail') {
                        return e
                    }
                })
            },
            firstMediaLogo (){
                return this.slide.media.filter(e => {
                    if(e.collection_name === 'logo') {
                        return e
                    }
                })
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
