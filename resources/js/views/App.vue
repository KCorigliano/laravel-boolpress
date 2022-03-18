<template>
    <div class="container mt-3">
        <div class="row mb-4 text-center">
            <h1>Lista dei post</h1>
        </div>
        <div class="row">
            <div class="card col mb-2 mx-2 p-4" v-for="(post, i) in posts" :key="i">
                <h3 class="border-bottom">{{post.title}}</h3>
                <p>{{post.content}}</p>
                <div class="d-flex justify-content-between">
                    <span v-for="(tag,i) in post.tags" :key="i"><a href="#">#{{tag.name}}</a></span>
                </div>
                <p class="fst-italic border-top mt-2">{{post.user.name}}</p>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

    export default {
        name: "App",
        components: {},
        data() {
            return {
                posts:[],
                pagination:{},
            }
        },
        mounted() {
            axios.get('http://127.0.0.1:8000/api/posts').then(response=>
                this.posts=response.data.data,
                this.pagination=response.data
            )
        },
    }
</script>

<style lang="scss" scoped>
h1{
    font-size: 58px;
}
</style>
