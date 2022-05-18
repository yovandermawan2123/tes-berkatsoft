import Products from './pages/Products.vue'
import Customers from './pages/Customers.vue'
import SalesOrder from './pages/SalesOrder.vue'
import Login from './pages/Login.vue'
import Register from './pages/Register.vue'

export default{
    mode: 'history',

    routes: [
   
        {
            path: '/login',
            name: 'login',
            component: Login,
        },
        {
            path: '/products',
            component: Products
        },
        {
            path: '/customers',
            component: Customers
        },
        {
            path: '/salesorders',
            component: SalesOrder
        },

       
        {
            path: '/register',
            name: 'register',
            component: Register
        }
       
    ]
}