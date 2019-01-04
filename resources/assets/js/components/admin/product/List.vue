<template>
    <div>
        <hr/>
        <h4 class="text-center text-success"></h4>
        <hr/>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Product Category</th>
                    <th>Product Manufacturer</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Product Short Description</th>
                    <th>Product Long Description</th>
                    <th>Product Image</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">Product Id</td>
                    <td>Product Name</td>
                    <td>Category Name</td>
                    <td>Manufacturer Name</td>
                    <td>TK. Product Price</td>
                    <td>Product Quantity</td>
                    <td>Product Short Description</td>
                    <td>Product Long Description</td>
                    <td>image</td>
                    <td>Publication Status </td>
                    <td>
                        <router-link to="/product/edit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></router-link>
                        <a href="" class="btn btn-danger">
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
           getallProduct(){
               
           }
        },
        methods:{
            deleteProduct(id){
               
            }
        }
    }
</script>

<style scoped>
</style>