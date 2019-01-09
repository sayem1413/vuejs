export default {
    state:{
        category:[],
        manufacturer:[],
        product:[],
        latestproduct:[],
        productsbycategoryid:[],
        productbyid:[],
        cartproduct:[]
    },
    getters:{
        getCategory(state){
            return state.category
        },
        getManufacturer(state){
            return state.manufacturer
        },
        getPrduct(state){
            return state.product
        },
        getLatestProducts(state){
            console.log(state.latestproduct)
            return state.latestproduct
        },
        getAllProductsByCategoryId(state){
            console.log(state.productsbycategoryid)
            return state.productsbycategoryid
        },
        getproductbyid(state){
            console.log(state.productbyid)
            return state.productbyid
        },
        getCartProducts(state){
            console.log(state.cartproduct)
            return state.cartproduct
        }
    },
    actions:{
        allCategory(context){
            axios.get('/category/manage')
                .then((response)=>{
                    context.commit('categoreis',response.data.categories)
                })
        },
        allPublishedCategory(context){
            axios.get('/published/categories')
                .then((response)=>{
                    context.commit('categoreis',response.data.categories)
                })
        },
        allManufacturer(context){
            axios.get('/manufacturer/manage')
                .then((response)=>{
                    context.commit('manufacturers',response.data.manufacturers)
                })
        },
        allProduct(context){
            axios.get('/product/manage')
                .then((response) => {
                    context.commit('products',response.data.products)
                })
        },
        latestProducts(context){
            axios.get('/latest/products')
                .then((response) => {
                    context.commit('latestproducts',response.data.latestPublishedProducts)
                })
        },
        getProductsByCatId(context,payload){
            axios.get('/category-view/'+payload)
                .then((response)=>{
                    console.log(response.data)
                    context.commit('productsByCategory',response.data.publishedCategoryProducts)
                })
        },
        getProductById(context,payload){
            axios.get('/product-details/'+payload)
                .then((response)=>{
                    console.log(response.data)
                    context.commit('productById',response.data.productById)
                })
        },
        allCartProducts(context){
            axios.get('/cart/show')
                .then((response) => {
                    console.log(response.data)
                    context.commit('cartproducts',response.data.cartProducts)
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
        latestproducts(state,data){
            return state.latestproduct = data
        },
        productsByCategory(state,payload){
            return state.productsbycategoryid = payload
        },
        productById(state,payload){
            return state.productbyid = payload
        },
        cartproducts(state,payload){
            return state.cartproduct = payload
        }
    }
}