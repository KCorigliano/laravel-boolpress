import Vue from "vue";
import VueRouter from "vue-router";
import Home from "./pages/Home.vue"
import Contacts from "./pages/Contacts.vue"
import PostShow from "./pages/PostShow.vue"

Vue.use(VueRouter);

const router = new VueRouter({
    routes:[
        {path:"/", component: Home, name:"home.index", meta: {title: "Homepage", linkText: "Home"}},
        {path:"/contacts", component: Contacts, name:"contacts.index", meta: {title: "Contacts", linkText: "Contacs"}},
        {path:"/post/:post", component: PostShow, name:"PostShow", meta: {title: "Dettagli Post"}},
    ]
});

router.beforeEach((to, from, next) =>{
    document.title=to.meta.title;
    next();
})

export default router;