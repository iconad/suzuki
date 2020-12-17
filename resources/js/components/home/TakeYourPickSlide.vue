<template>
    <div class="relative h-64">
        <img :src="slide.src" alt="slide.alt" class="w-full h-full object-cover object-center">
        <div class="absolute left-0 top-0 w-full h-full">
            <div class="absolute left-0 bottom-0 p-5 xxl:p-8 z-10 title">
                <span class="block italic text-gray-100 text-2xl suzuki-mon xxl:text-3xl uppercase font-black">
                    <img v-if="slide.logo" :src="slide.logo" alt="logo" class="w-7rem">
                    <span v-else>{{slide.name}}</span>
                </span>
                <a href class="flex items-center italic text-gray-100 text-base font-semibold hover:text-theme-red">
                    <span>Explore</span>
                    <span><svg class="fill-current w-4 xxl:w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9 13l1 1 6-6-2-1-4 4-4-4-2 1z"/></svg></span>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['slide']
    }
</script>

<style lang="scss" scoped>

</style>
