<template>
    <div>
        <thumb-image v-if="firstMediaLogo[0]" classess="w-7rem invert-logo" :class="classes" :image="firstMediaLogo[0].file_name" :id="firstMediaLogo[0].id"></thumb-image>
        <span v-else>{{slide.title}}</span>
    </div>
</template>

<script>

    import thumbImage from '../ThumbImage'

    export default {
        props: ['slide', 'classes'],
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
        },

    }
</script>

<style lang="scss" scoped>

</style>
