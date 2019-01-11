<template>
  <div>
    <div class="row single-pro">
      <div v-for="product in categoryProducts" :key="product.id" class="col-md-3 product-men">
        <div class="men-pro-item simpleCart_shelfItem">
          <div class="men-thumb-item">
            <img
              :src="ourImage(product.product_image)"
              :alt="product.productName"
              class="pro-image-front"
            >
            <img
              :src="ourImage(product.product_image)"
              :alt="product.product_name"
              class="pro-image-back"
            >
            <div class="men-cart-pro">
              <div class="inner-men-cart-pro">
                <router-link :to="`/product/${product.id}`" class="link-product-add-cart">Quick View</router-link>
              </div>
            </div>
            <span class="product-new-top">New</span>
          </div>
          <div class="item-info-product">
            <h4>
              <router-link :to="`/product/${product.id}`">{{product.product_name}}</router-link>
            </h4>
            <div class="info-product-price">
              <span class="item_price">BDT {{product.product_price}}</span>
            </div>
            <a href="#" @click.prevent="addCart(product.id)" class="item_add single-item hvr-outline-out button2">Add to cart</a>
          </div>
        </div>
      </div>
      <div></div>
    </div>
  </div>
</template>
<script>
export default {
  name: "CategoryProducts",
  mounted() {
    //this.$store.dispatch('getProductsByCatId',this.$route.params.categoryId);
    //console.log('mounted!')

    this.categoryProduct();
  },
  computed: {
    categoryProducts() {
      console.log(this.$store.getters.getAllProductsByCategoryId);
      return this.$store.getters.getAllProductsByCategoryId;
      /* axios.get(`/category-view/${this.$route.params.categoryId}`)
                .then((response)=>{
                    console.log(response.data.publishedCategoryProducts)
                    return response.data.publishedCategoryProducts
                }) */
    }
  },
  methods: {
    categoryProduct() {
      this.$store.dispatch("getProductsByCatId", this.$route.params.categoryId);
    },
    ourImage(img) {
      return "public/productImage/" + img;
    },
    addCart(id) {
      axios
        .get("/cart/add/" + id)
        .then(response => {
          this.$router.push("/cart");
          toast({
            type: "success",
            title: "Cart Added successfully"
          });
        })
        .catch(() => {});
    }
  },
  watch: {
    $route(to, from) {
      this.categoryProduct();
    }
  }
};
</script>
<style scoped>
</style>

