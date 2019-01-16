import ROOT_URL from '../config';
export default {
    state:{
        category:[],
        manufacturer:[],
        product:[],
        latestProduct:[],
        productsByCategoryId:[],
        productById:[],
        cartProduct:[]
    },
    getters:{
        allCategories(state){
            return state.category
        },
        allManufacturers(state){
            return state.manufacturer
        },
        allProducts(state){
            return state.product
        },
        allLatestProducts(state){
            // console.log(state.latestProduct)
            return state.latestProduct
        },
        allProductsByCategoryId(state){
            console.log(state.productsByCategoryId)
            return state.productsByCategoryId
        },
        productById(state){
            // console.log(state.productById)
            return state.productById
        },
        cartProducts(state){
            // console.log(state.cartProduct)
            return state.cartProduct
        }
    },
    actions:{
        allCategory(context){
            let url = ROOT_URL+"category/manage";
            axios.get(url)
                .then((response)=>{
                    context.commit('categoreis',response.data.categories)
                })
        },
        allPublishedCategories(context){
            let url = ROOT_URL+"published/categories";
            axios.get(url)
                .then((response)=>{
                    context.commit('categoreis',response.data.categories)
                })
        },
        allManufacturers(context){
            let url = ROOT_URL+"manufacturer/manage";
            axios.get(url)
                .then((response)=>{
                    context.commit('manufacturers',response.data.manufacturers)
                })
        },
        allProducts(context){
            let url = ROOT_URL+"product/manage";
            axios.get(url)
                .then((response) => {
                    context.commit('products',response.data.products)
                })
        },
        latestProducts(context){
            let url = ROOT_URL+"latest/products";
            axios.get(url)
                .then((response) => {
                    context.commit('latestProducts',response.data.latestPublishedProducts)
                })
        },
        allProductsByCategoryId(context,payload){
            let url = ROOT_URL+"category-view/";
            axios.get(url+payload)
                .then((response)=>{
                    console.log(response.data.categoryWiseProducts)
                    context.commit('productsByCategory',response.data.categoryWiseProducts)
                })
        },
        productById(context,payload){
            let url = ROOT_URL+"product-details/";
            axios.get(url+payload)
                .then((response)=>{
                    // console.log(response.data)
                    context.commit('productById',response.data.productInfo)
                })
        },
        allCartProducts(context){
            let url = ROOT_URL+"cart/show";
            axios.get(url)
                .then((response) => {
                    //console.log(response.data.cartInfo)
                    context.commit('cartProducts',response.data.cartInfo)
                })
        },
    },
    mutations:{
        categoreis(state,data){
            return state.category = data
        },
        manufacturers(state,data){
            return state.manufacturer = data
        },
        products(state,data){
            return state.product = data
        },
        latestProducts(state,data){
            return state.latestProduct = data
        },
        productsByCategory(state,payload){
            return state.productsByCategoryId = payload
        },
        productById(state,payload){
            return state.productById = payload
        },
        cartProducts(state,payload){
            return state.cartProduct = payload
        }
    }
}