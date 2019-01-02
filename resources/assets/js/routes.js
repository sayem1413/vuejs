import AdminHome from './components/admin/AdminHome.vue'
import CategoryAdd from './components/admin/category/Add.vue'
import CategoryList from './components/admin/category/List.vue'

export const routes = [
    {
        path:'/',
        component:AdminHome
    },
    {
        path:'/category-add',
        component:CategoryAdd
    },
    {
        path:'/category-list',
        component:CategoryList
    },
];