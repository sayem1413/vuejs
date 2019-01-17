<template>
  <!-- banner -->
  <div>
    <div>
      <div class="sap_tabs">
        <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
          <ul class="resp-tabs-list">
            <li class="resp-tab-item">
              <span>Latest Product</span>
            </li>
          </ul>
          <div class="resp-tabs-container">
            <div class="row single-pro">
              <!-- Foreach -->
              <div v-for="product in latestProducts" :key="product.id" class="col-md-3">
                <div class="men-pro-item simpleCart_shelfItem">
                  <div class="men-thumb-item">
                    <img :src="product.image" class="pro-image-front">
                    <img :src="product.image" class="pro-image-back">
                    <div class="men-cart-pro">
                      <div class="inner-men-cart-pro">
                        <router-link :to="`/product/${product.id}`" class="link-product-add-cart">Quick View</router-link>
                      </div>
                    </div>
                    <span class="product-new-top">New</span>
                  </div>
                  <div>
                    <h4>
                      <router-link :to="`/product/${product.id}`">{{product.name}}</router-link>
                    </h4>
                    <div class="info-product-price">
                      <span class="item_price">BDT {{product.price}}</span>
                    </div>
                    <a
                      href="#"
                      @click.prevent="addcart(product.id)"
                      class="item_add single-item hvr-outline-out button2"
                    >Add to cart</a>
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
import ROOT_URL from "../../config";
export default {
  name: "FrontEndHome",
  mounted() {
    this.$store.dispatch("latestProducts");
  },
  computed: {
    latestProducts() {
      return this.$store.getters.allLatestProducts;
    }
  },
  methods: {
    ourimage(img) {
      return "productImage/" + img;
    },
    addcart(id) {
      let url = ROOT_URL + "cart/add/";
      axios
        .get(url + id)
        .then(response => {
          this.$router.push("/cart");
          toast({
            type: "success",
            title: "Cart Added successfully"
          });
        })
        .catch(() => {});
    }
  }
};
</script>

<style scoped>
</style>