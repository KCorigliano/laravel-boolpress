<template>
    <div class="container text-center mt-3">
        <div class="row">
            <div class="card col mb-2 mx-2 p-2" v-for="(post, i) in posts" :key="i">
                <h3>{{post.title}}</h3>
                <p>{{post.content}}</p>
                <p><span>Creato il:</span> {{post.updated_at}}</p>
                <p>{{post.user_id}}</p>
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
                this.posts=response.data.data
            )
        },
    }
</script>

<style lang="scss" scoped>
h1{
    font-size: 58px;
}
</style>
