<template>
    <!-- banner -->
        <div class="banner-grid">
            <div id="visual">
                
                <div class="sap_tabs">
                    <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                        <ul class="resp-tabs-list">
                            <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Latest Product</span></li>
                        </ul>				  	 
                        <div class="resp-tabs-container">
                            <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                                <!-- Foreach -->
<<<<<<< HEAD
                                <div v-for="product in getLatestProducts" :key="product.id" class="col-md-3 product-men">
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item">
                                            <img :src="`public/productImage/${product.productImage}`" alt="image" class="pro-image-front">
                                            <img :src="`public/productImage/${product.productImage}`" alt="image" class="pro-image-back">
=======
                                <div class="col-md-3 product-men">
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item">
                                            <img :src="`frontEnd/images/w3.png`" alt="image" class="pro-image-front">
                                            <img :src="`frontEnd/images/w3.png`" alt="image" class="pro-image-back">
>>>>>>> 1d6aafad38d36499c1fbaf2ee1493ac21f5e7aaf
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="#" class="link-product-add-cart">Quick View</a>
                                                </div>
                                            </div>
                                            <span class="product-new-top">New</span>
<<<<<<< HEAD
                                        </div>
                                        <div class="item-info-product ">
                                            <h4><a href="#">{{product.productName}}</a></h4>
                                            <div class="info-product-price">
                                                <span class="item_price">BDT {{product.productPrice}}</span>
=======

                                        </div>
                                        <div class="item-info-product ">
                                            <h4><a href="#"></a></h4>
                                            <div class="info-product-price">
                                                <span class="item_price">BDT 15000</span>
>>>>>>> 1d6aafad38d36499c1fbaf2ee1493ac21f5e7aaf
                                            </div>
                                            <a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Foreach -->
<<<<<<< HEAD
=======
                                
>>>>>>> 1d6aafad38d36499c1fbaf2ee1493ac21f5e7aaf
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
<<<<<<< HEAD
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
=======
        name: "FrontEndHome"
>>>>>>> 1d6aafad38d36499c1fbaf2ee1493ac21f5e7aaf
    }
</script>

<style scoped>

</style>