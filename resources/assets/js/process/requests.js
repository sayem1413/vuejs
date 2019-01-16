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
            axios.get('/category/manage')
                .then((response)=>{
                    context.commit('categoreis',response.data.categories)
                })
        },
        allPublishedCategories(context){
            axios.get('/published/categories')
                .then((response)=>{
                    context.commit('categoreis',response.data.categories)
                })
        },
        allManufacturers(context){
            axios.get('/manufacturer/manage')
                .then((response)=>{
                    context.commit('manufacturers',response.data.manufacturers)
                })
        },
        allProducts(context){
            axios.get('/product/manage')
                .then((response) => {
                    context.commit('products',response.data.products)
                })
        },
        latestProducts(context){
            axios.get('/latest/products')
                .then((response) => {
                    context.commit('latestProducts',response.data.latestPublishedProducts)
                })
        },
        allProductsByCategoryId(context,payload){
            axios.get('/category-view/'+payload)
                .then((response)=>{
                    console.log(response.data.categoryWiseProducts)
                    context.commit('productsByCategory',response.data.categoryWiseProducts)
                })
        },
        productById(context,payload){
            axios.get('/product-details/'+payload)
                .then((response)=>{
                    // console.log(response.data)
                    context.commit('productById',response.data.productInfo)
                })
        },
        allCartProducts(context){
            axios.get('/cart/show')
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