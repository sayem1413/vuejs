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
        allcategories(state){
            return state.category
        },
        allmanufacturers(state){
            return state.manufacturer
        },
        allproducts(state){
            return state.product
        },
        all_latest_products(state){
            // console.log(state.latestproduct)
            return state.latestproduct
        },
        allproductsbycategoryid(state){
            // console.log(state.productsbycategoryid)
            return state.productsbycategoryid
        },
        productbyid(state){
            // console.log(state.productbyid)
            return state.productbyid
        },
        cart_products(state){
            // console.log(state.cartproduct)
            return state.cartproduct
        }
    },
    actions:{
        all_category(context){
            axios.get('/category/manage')
                .then((response)=>{
                    context.commit('categoreis',response.data.categories)
                })
        },
        allpublishedcategories(context){
            axios.get('/published/categories')
                .then((response)=>{
                    context.commit('categoreis',response.data.categories)
                })
        },
        allmanufacturers(context){
            axios.get('/manufacturer/manage')
                .then((response)=>{
                    context.commit('manufacturers',response.data.manufacturers)
                })
        },
        allproducts(context){
            axios.get('/product/manage')
                .then((response) => {
                    context.commit('products',response.data.products)
                })
        },
        latestproducts(context){
            axios.get('/latest/products')
                .then((response) => {
                    context.commit('latestproducts',response.data.latest_published_products)
                })
        },
        allproductsbycategoryid(context,payload){
            axios.get('/category-view/'+payload)
                .then((response)=>{
                    // console.log(response.data)
                    context.commit('productsbycategory',response.data.published_category_products)
                })
        },
        productbyid(context,payload){
            axios.get('/product-details/'+payload)
                .then((response)=>{
                    // console.log(response.data)
                    context.commit('productById',response.data.product_by_id)
                })
        },
        all_cart_products(context){
            axios.get('/cart/show')
                .then((response) => {
                    // console.log(response.data)
                    context.commit('cartproducts',response.data.cart_products)
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
        productsbycategory(state,payload){
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