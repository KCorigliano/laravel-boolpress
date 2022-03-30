<template>
    <div class="card p-2">
        <div class="d-flex align-items-center border-bottom mb-2">
            <span class="back-btn btn-secondary"><a href="/"><</a></span>
            <h1 class="text-center offset-5">{{post.title}}</h1>
        </div>
        <p>Content:</p>
        <h4 class="border-bottom mx-4 pb-2">{{post.content}}</h4>
        <p class="mt-2">Creato da: {{post.user.name}}</p>
    </div>
</template>

<script>
export default {
     data() {
        return {
            post:{},
        }
    },
    methods: {
        async postsFiller() {
            const result = await axios.get("/api/posts/" + this.$route.params.post);
            this.post = result.data;
            console.log(this.post)
        },
    },
    mounted() {
        this.postsFiller();
    },
}
</script>

<style lang="scss" scoped>
h1{
    justify-self: center;
    justify-items: center;
}
p{
    font-style: italic;
}
.back-btn{
    padding: 3px 13px;
    border-radius: 5px;
    cursor: pointer;
    a{
        font-size: 18px;
        color: white;
        font-weight: bold;
        &:hover{
            text-decoration: none;
        }
    }
}
</style>