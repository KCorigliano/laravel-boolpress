<template>
    <div class="container mt-3">
        <router-link class="mx-2" v-for="route in routes" :key="route.path" :to="route.path">{{route.meta.title}}</router-link>
    </div>
</template>

<script>

    export default {
        name: "App",
        components: {},
        data() {
            return {
                routes: []
            }
        },
        mounted() {
            this.routes=this.$router.getRoutes().filter((route) => route.meta.linkText);
        },
    }
</script>

<style lang="scss" scoped>
h1{
    font-size: 58px;
}
</style>
