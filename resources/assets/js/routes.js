import AdminHome from './components/admin/AdminHome.vue'
import CategoryAdd from './components/admin/category/Add.vue'

export const routes = [
    {
        path:'/',
        component:AdminHome
    },
    {
        path:'/category-add',
        component:CategoryAdd
    },
];