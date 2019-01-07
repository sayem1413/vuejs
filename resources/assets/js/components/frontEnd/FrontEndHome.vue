<template>
        <!-- banner -->
        <div>
            <div>
                
                <div>
                    <div>
                        <ul>
                            <li><span>Latest Product</span></li>
                        </ul>				  	 
                        <div>
                            <div>
                                <!-- Foreach -->
                                <div v-for="product in getLatestProducts" :key="product.id" class="col-md-3">
                                    <div>
                                        <div>
                                            <img :src="ourImage(product.productImage)" alt="image" class="pro-image-front">
                                            <img :src="ourImage(product.productImage)" alt="image" class="pro-image-back">
                                            <div>
                                                <div>
                                                    <a href="#">Quick View</a>
                                                </div>
                                            </div>
                                            <span>New</span>
                                        </div>
                                        <div>
                                            <h4><a href="#">{{product.productName}}</a></h4>
                                            <div>
                                                <span class="item_price">BDT {{product.productPrice}}</span>
                                            </div>
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Foreach -->
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //product-nav -->
</template>

<script>
    export default {
        name: "FrontEndHome",
        mounted(){
            this.$store.dispatch("latestProducts")
            
        },
        computed:{
           getLatestProducts(){
               return this.$store.getters.getLatestProducts
           }
        },
        methods:{
            ourImage(img){
                return "public/productImage/"+img;
            }
        }
    }
</script>

<style scoped>

</style>