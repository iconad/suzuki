<template>
    <div>
        <div class="landscape-message absolute left bottom-3 w-full p-4 text-center block sm:hidden">
            <span class="bg-white inline-block px-3 py-1 shadow-2xl rounded-full">
                Rotate your screen for better experience
            </span>
        </div>
    </div>
</template>

<script>
    export default {

    }
</script>

<style lang="scss" scoped>

@mixin portrait {
    @media (orientation: portrait) {
        @content;
    }
}
@mixin landscape {
    @media (orientation: landscape) {
        @content;
    }
}

.landscape-message {
    @include landscape {
        display: none;
    }
    @include portrait {
        display: block;
    }
}

</style>
