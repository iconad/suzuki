<template>
    <div>
        <thumb-image classess="w-10 md:w-32" :image="firstMedia[0].file_name" :id="firstMedia[0].id"></thumb-image>
    </div>
</template>

<script>

    import thumbImage from '../../ThumbImage'

    export default {
        props: ['slide'],
        components: {
            thumbImage
        },
        computed: {
            firstMedia (){
                return this.slide.media.filter(e => {
                    if(e.collection_name === 'logo') {
                        return e
                    }
                })
            }
        }
    }
</script>
