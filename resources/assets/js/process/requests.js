export default {
    state:{
        category:[],
        manufacturer:[]
    },
    getters:{
        getCategory(state){
            return state.category
        },
        getManufacturer(state){
            return state.manufacturer
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
        }
    },
    mutations:{
        categoreis(state,data){
            return state.category = data
        },
        manufacturers(state,data){
            return state.manufacturer = data
        }
    }
}