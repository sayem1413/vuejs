<template>
    <div>
        <hr/>
        <h4 class="text-center text-success"></h4>
        <hr/>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">ID</td>
                    <td>Category Name</td>
                    <td>Category Description</td>
                    <td>publication Status</td>
                    <td>
                        <a href="#" class="btn btn-success">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="#" class="btn btn-danger">
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
           getallCategory(){
               
           }
        },
        methods:{
            deletecategory(id){
               
            }
        }
    }
</script>

<style scoped>
</style>