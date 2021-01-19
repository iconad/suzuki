<template>
    <div>
        <img src="/assets/images/loader.gif" :class="width" alt="loader">
    </div>
</template>
<script>
export default {
    props: ['width']
}
</script>
