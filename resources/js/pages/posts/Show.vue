<template>
    <div>
        <h1>{{posts.title}}</h1>
    </div>
</template>

<script>
export default {
     data() {
        return {
            post:[],
        }
    },
    mounted() {
        this.postsFiller();
    },
    methods: {
        async postsFiller() {
            const result = await axios.get("/api/posts/" + this.$route.params.post);
            console.log(result)
        },
    },
}
</script>