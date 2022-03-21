<template>
    <div>
        <the-navbar />
        <div class="container mt-3">
            <router-view></router-view>
        </div>
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
