import AdminHome from './components/admin/AdminHome.vue'

import CategoryAdd from './components/admin/category/Add.vue'
import CategoryList from './components/admin/category/List.vue'
import CategoryEdit from './components/admin/category/Edit.vue'

import ManufacturerAdd from './components/admin/manufacturer/Add.vue'
import ManufacturerList from './components/admin/manufacturer/List.vue'
import ManufacturerEdit from './components/admin/manufacturer/Edit.vue'

import ProductAdd from './components/admin/product/Add.vue'
import ProductList from './components/admin/product/List.vue'
import ProductEdit from './components/admin/product/Edit.vue'

export const routes = [
    {
        path:'/',
        component:AdminHome
    },

    {
        path:'/category/add',
        component:CategoryAdd
    },
    {
        path:'/category/list',
        component:CategoryList
    },
    {
        path:'/category/edit/:categoryid',
        component:CategoryEdit
    },

    {
        path:'/manufacturer/add',
        component:ManufacturerAdd
    },
    {
        path:'/manufacturer/list',
        component:ManufacturerList
    },
    {
        path:'/manufacturer/edit/:manufacturerid',
        component:ManufacturerEdit
    },

    {
        path:'/product/add',
        component:ProductAdd
    },
    {
        path:'/product/list',
        component:ProductList
    },
    {
        path:'/product/edit',
        component:ProductEdit
    },
];