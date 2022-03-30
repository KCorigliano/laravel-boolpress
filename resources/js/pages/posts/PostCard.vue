<template>
    <div class="card mb-4">
        <h3 class="border-bottom p-2">{{title}}</h3>
        <p class="text-start">Contenuto:</p>
        <p>{{content}}</p>
        <div class="text-start" v-if="tags != 0">
            <p>Tags:</p>
            <div class="d-flex px-4">
                <span class="btn-secondary tags" v-for="(tag,i) in tags" :key="i">{{tag.name}}</span>
            </div>
        </div>
        <p class="border-top mt-2">{{userName.name}}</p>
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
.card{
    width: calc((100% / 2) - 5px);
}
.tags{
    margin-right: 15px;
    padding: 2px 15px;
    border-radius: 5px 15px;
    font-size: 10px;
}
.text-start{
    text-align: start;
    padding-left: 15px;
    font-style: italic;
}
</style>