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
                <tr v-for="(manufacturer,index) in getallManufacturer" :key="manufacturer.id">
                    <td scope="row">{{index+1}}</td>
                    <td>{{manufacturer.manufacturerName}}</td>
                    <td>{{manufacturer.manufacturerDescription}}</td>
                    <td><p v-if="manufacturer.publicationStatus == 1">Published</p><p v-else>Unpublished</p></td>
                    <td>
                        <router-link :to="`/manufacturer/edit/${manufacturer.id}`" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></router-link>
                        <a href="#" class="btn btn-danger" @click.prevent = "deleteManufacturer(manufacturer.id)" >
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
            this.$store.dispatch("allManufacturer")
        },
        computed:{
           getallManufacturer(){
               return this.$store.getters.getManufacturer
           }
        },
        methods:{
            deleteManufacturer(id){
               axios.get('/manufacturer/delete/'+id)
                   .then(()=>{
                       this.$store.dispatch("allManufacturer")
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