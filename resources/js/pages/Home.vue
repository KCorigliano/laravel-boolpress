<template>
    <div>
        <div class="mb-4 text-center">
            <h1>Lista dei post</h1>
            <div class="d-flex card-row justify-content-center">
                <post-card
                    v-for="post, i in posts"
                    :key="i"
                    :title="post.title"
                    :content="post.content"
                    :tags="post.tags"
                    :userName="post.user"
                    :post="post"
                />
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
        
    </div>
</template>

<script>
import axios from "axios";
import PostCard from './posts/PostCard.vue';

export default {
    components:{
        PostCard
    },
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
.card-row{
    flex-wrap: wrap;
}
</style>