<template>
    <div>
        <hr/>
        <h4 class="text-center text-success"></h4>
        <hr/>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Manufacturer Name</th>
                    <th>Manufacturer Description</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(manufacturer,index) in allmanufacturers" :key="manufacturer.id">
                    <td scope="row">{{index+1}}</td>
                    <td>{{manufacturer.manufacturer_name}}</td>
                    <td>{{manufacturer.manufacturer_description}}</td>
                    <td><p v-if="manufacturer.active == 1">Published</p><p v-else>Unpublished</p></td>
                    <td>
                        <router-link :to="`/manufacturer/edit/${manufacturer.id}`" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></router-link>
                        <a href="#" class="btn btn-danger" @click.prevent = "deletemanufacturer(manufacturer.id)" >
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "List",
        mounted(){
            this.$store.dispatch("allmanufacturers")
        },
        computed:{
           allmanufacturers(){
               return this.$store.getters.allmanufacturers
           }
        },
        methods:{
            deletemanufacturer(id){
               axios.get('/manufacturer/delete/'+id)
                   .then(()=>{
                       this.$store.dispatch("allmanufacturers")
                       toast({
                           type: 'success',
                           title: 'Manufacturer Deleted successfully'
                       })
                   })
                   .catch(()=>{

                   })
            }
        }
    }
</script>

<style scoped>
</style>