<template>
    <div class="container mt-3">
        <div class="row mb-4 text-center">
            <h1>Lista dei post</h1>
        </div>
        <div class="row">
            <div class="card col-3 mb-2 mx-2 p-4" v-for="(post, i) in posts" :key="i">
                <h3 class="border-bottom">{{post.title}}</h3>
                <p>{{post.content}}</p>
                <div class="d-flex justify-content-between">
                    <span v-for="(tag,i) in post.tags" :key="i"><a href="#">#{{tag.name}}</a></span>
                </div>
                <p class="fst-italic border-top mt-2">{{post.user.name}}</p>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <button
              class="btn btn-secondary"
              @click="changePage(pagination.current_page - 1)"
            >Prev
            </button>
            <span class="mx-2">
             {{ pagination.current_page }} su {{ pagination.last_page }}
            </span>
            <button
              class="btn btn-secondary"
              @click="changePage(pagination.current_page + 1)"
            >Next
            </button>
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
            this.changePage();
        },
        methods: {
            async changePage(page = 1) {
                if (page < 1) {
                    page = 1;
                }
                if (page > this.pagination.last_page) {
                    page = this.pagination.last_page;
                }
                const result = await axios.get("/api/posts?page=" + page);
                    this.pagination = result.data;
                    this.posts = result.data.data;
            },
        },
    }
</script>

<style lang="scss" scoped>
h1{
    font-size: 58px;
}
</style>
