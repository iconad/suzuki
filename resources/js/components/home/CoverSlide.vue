    <template>
        <div>
            <!-- <img :src="slide.src" alt="slide.title" class="w-full h-screen-70 lg:h-auto object-cover"> -->
            <!-- <thumb-image v-if="desktop[0]" classess="w-full h-screen-70 lg:h-auto object-cover" :image="desktop[0].file_name" :id="desktop[0].id"></thumb-image> -->
           <picture>
                <source v-if="desktop[0]" media="(min-width:768px)" :srcset="`${publicUrl}/${desktop[0].id}/${desktop[0].file_name}`">
                <source v-if="mobile[0]" media="(max-width:768px)" :srcset="`${publicUrl}/${mobile[0].id}/${mobile[0].file_name}`">
                <img :src="`${publicUrl}/${desktop[0].id}/${desktop[0].file_name}`" :alt="slide.title" class="w-full h-screen-70 md:h-auto xxl:h-screen-80 object-cover">
            </picture>
        </div>
    </template>

<script>
    import thumbImage from '../ThumbImage'
    export default {
        props: ['slide'],
        computed: {
            publicUrl() {
                return this.$store.state.publicUrl;
            },
            desktop (){
                return this.slide.media.filter(e => {
                    if(e.collection_name === 'desktop-home-cover') {
                        return e
                    }
                })
            },

            mobile (){
                return this.slide.media.filter(e => {
                    if(e.collection_name === 'mobile-home-cover') {
                        return e
                    }
                })
            },
        }
    }
</script>
