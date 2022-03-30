<template>
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-center">
            <router-link class="nav-links" 
            v-for="route in routes" 
            :key="route.path" 
            :to="route.path"
            >
                {{route.meta.title}}
            </router-link>
            <a class="nav-links" href="/login" v-if="!user">Login</a>
            <a class="nav-links" href="/admin/post" v-else>{{user.name}}</a>
        </div>
    </div>
</template>

<script>

    export default {
        name: "App",
        components: {},
        data() {
            return {
                routes: [],
                user: null,
            }
        },
        mounted() {
            this.routes=this.$router.getRoutes().filter((route) => route.meta.linkText);
            this.catchUser();
        },
        methods: {
            async catchUser(){
                await axios.get("/api/user/").then(resp => {
                    this.user=resp.data;
                    console.log(resp.data)
                    localStorage.setItem("user", JSON.stringify(resp.data));
                    window.dispatchEvent(new CustomEvent('storedUserChanged'));
                })
            }
        },
    }
</script>

<style lang="scss" scoped>
.container-fluid{
    width: 100%;
    height: 75px;
    text-align: center;
    background-color: #5a6268;
    .d-flex{
        align-items: center;
        .nav-links{
            margin-right: 15px;
            font-size: 24px;
            text-decoration: none;
            color: whitesmoke;
            line-height: 75px;
            &:hover{
                filter: brightness(70%);
            }
        }
    }
}
</style>
