<template>
    <div class="card col-3 mx-2 mb-2">
        <h3 class="border-bottom">{{title}}</h3>
        <p>{{content}}</p>
        <div class="d-flex">
            <span class="tags" v-for="(tag,i) in tags" :key="i"><a href="#">#{{tag.name}}</a></span>
        </div>
        <p class="fst-italic border-top mt-2">{{userName.name}}</p>
        <router-link :to="{name:'posts.show', params: { post: post.id}}">Dettagli</router-link>
    </div>
</template>

<script>
export default {
    props:{
        title: String,
        content:String,
        tags: Array,
        userName: Object,
        post: Object
    },
    data() {
        return {
            routes: []
        }
    },
    mounted() {
        this.routes=this.$router.getRoutes().filter((route) => route.component == "Show")
    },
}
</script>

<style lang="scss" scoped>
.tags{
    margin-right: 15px;
}
</style>