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
                <tr v-for="(product,index) in getallProduct" :key="product.id">
                    <td scope="row">{{index+1}}</td>
                    <td>{{product.productName}}</td>
                    <td>{{product.categoryName}}</td>
                    <td>{{product.manufacturerName}}</td>
                    <td>{{product.productPrice}}</td>
                    <td>{{product.productQuantity}}</td>
                    <td>{{product.productShortDescription}}</td>
                    <td>{{product.productLongDescription}}</td>
                    <td><img :src="ourImage(product.productImage)" alt="" height="150px" width="150px"></td>
                    <td><p v-if="product.publicationStatus == 1">Published</p><p v-else>Unpublished</p></td>
                    <td>
                        <router-link :to="`/product/edit/${product.id}`" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></router-link>
                        <a href="" class="btn btn-danger" @click.prevent = "deleteProduct(product.id)" >
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
            this.$store.dispatch("allProduct")
        },
        computed:{
           getallProduct(){
               return this.$store.getters.getPrduct
           }
        },
        methods:{
            ourImage(img){
                return "public/productImage/"+img;
            },
            deleteProduct(id){
               axios.get('/product/delete/'+id)
                   .then(()=>{
                       this.$store.dispatch("allProduct")
                       toast({
                           type: 'success',
                           title: 'Product Deleted successfully'
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