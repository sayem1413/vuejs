export default {
    state:{
        category:[],
        manufacturer:[],
        product:[],
        latestproduct:[],
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
        }
    },
    actions:{
        allCategory(context){
            axios.get('/category/manage')
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
        }
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
        }
    }
}