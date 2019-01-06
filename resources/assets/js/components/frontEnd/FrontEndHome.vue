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
                                <div class="col-md-3 product-men">
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item">
                                            <img src="#" alt="image" class="pro-image-front">
                                            <img src="#" alt="image" class="pro-image-back">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="#" class="link-product-add-cart">Quick View</a>
                                                </div>
                                            </div>
                                            <span class="product-new-top">New</span>

                                        </div>
                                        <div class="item-info-product ">
                                            <h4><a href="#"></a></h4>
                                            <div class="info-product-price">
                                                <span class="item_price">BDT 15000</span>
                                            </div>
                                            <a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>
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
        <!-- //product-nav -->
</template>

<script>
    export default {
        name: "FrontEndHome"
    }
</script>

<style scoped>

</style>