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
                <tr v-for="(product,index) in allpublishedproducts" :key="product.id">
                    <td scope="row">{{index+1}}</td>
                    <td>{{product.product_name}}</td>
                    <td>{{product.category_name}}</td>
                    <td>{{product.manufacturer_name}}</td>
                    <td>{{product.product_price}}</td>
                    <td>{{product.product_quantity}}</td>
                    <td>{{product.product_short_description}}</td>
                    <td>{{product.product_long_description}}</td>
                    <td><img :src="ourImage(product.product_image)" alt="" height="150px" width="150px"></td>
                    <td><p v-if="product.active == 1">Published</p><p v-else>Unpublished</p></td>
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
            this.$store.dispatch("allproducts")
        },
        computed:{
           allpublishedproducts(){
               return this.$store.getters.allproducts
           }
        },
        methods:{
            ourImage(img){
                return "public/productImage/"+img;
            },
            deleteProduct(id){
               axios.get('/product/delete/'+id)
                   .then(()=>{
                       this.$store.dispatch("allproducts")
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