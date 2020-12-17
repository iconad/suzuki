    <template>
        <div>
            <img :src="slide.src" alt="slide.name" class="w-full h-screen-50 lg:h-screen-80 object-cover">
        </div>
    </template>

<script>
    export default {
        props: ['slide'],
        components: {
            Splide,
        },
    }
</script>
