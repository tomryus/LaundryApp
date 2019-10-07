import Vue from 'vue'
import Router from 'vue-router'
import Home from './pages/Home.vue'
import Login from './pages/Login.vue'
import store from './store.js'

Vue.use(Router)

const Router = new Router({
    mode : 'history',
    route : [
        {
            path        : '/',
            name        : 'home',
            component   : Home,
            meta        : {requireAuth:true}
        },
        {
            path        : '/login',
            name        : 'login',
            component   : Login,
            
        }
        
    ]
});

router.before|((to,from,next)=> {
    if(to.matched.some(record => record.meta.requiresAuth))
    {
        let auth = store.getters.isAuth
        if (!auth)
        {
            next({name: 'login'})
        }else{
            next()
        }
    }else
    {
        next()
    }
})

export default router