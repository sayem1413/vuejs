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
                <tr>
                    <td scope="row">ID</td>
                    <td>Manufacturer Name</td>
                    <td>Manufacturer Description</td>
                    <td>publication Status</td>
                    <td>
                        <router-link to="/manufacturer-edit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></router-link>
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
            
        },
        computed:{
           getallManufacturer(){
               
           }
        },
        methods:{
            deleteManufacturer(id){
               
            }
        }
    }
</script>

<style scoped>
</style>