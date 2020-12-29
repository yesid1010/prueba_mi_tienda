import Vue from 'vue';
import Router from 'vue-router'

Vue.use(Router);

export default new Router({
    routes:[
        {
             path      : '/home',
             redirect  : '/categorias'
        },
        {
            path      : '/categorias',
            name      : 'categorias',
            component : require('./pages/Category.vue').default
        },
        {
            path      : '/catalogo',
            name      : 'catalogo',
            component : require('./pages/Catalogo.vue').default
        },
        {
            path      : '/carrito',
            name      : 'carrito',
            component : require('./pages/Cart.vue').default
        },


        {
            path      : '/administrador',
            name      : 'categories',
            component : require('./pages/admin/Category.vue').default
        },
        {
            path      : '/admin/categories',
            name      : 'categories',
            component : require('./pages/admin/Category.vue').default
        },
        {
            path      : '/admin/products',
            name      : 'products',
            component : require('./pages/admin/Product.vue').default
        },
        {
            path      : '/admin/sizes',
            name      : 'sizes',
            component : require('./pages/admin/Size.vue').default
        }
    ],
    mode:"history"
})