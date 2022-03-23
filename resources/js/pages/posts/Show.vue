<template>
    <div class="card p-2">
        <h1 class="text-center">{{post.title}}</h1>
        <h4>{{post.content}}</h4>
        <p>Creato da: {{post.user.name}}</p>
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
p{
    font-style: italic;
}
</style>