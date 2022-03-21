<template>
    <div class="container mt-3">
        <the-navbar />
        <router-view></router-view>
    </div>
</template>

<script>
import TheNavbar from '../components/TheNavbar.vue';
    export default {
        name: "App",
        components: {
            TheNavbar,
        },
    }
</script>

<style lang="scss" scoped>
h1{
    font-size: 58px;
}
</style>
