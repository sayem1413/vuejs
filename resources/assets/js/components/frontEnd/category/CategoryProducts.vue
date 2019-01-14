<template>
  <div>
    <div class="row single-pro">
      <div v-for="product in categoryproducts" :key="product.id" class="col-md-3 product-men">
        <div class="men-pro-item simpleCart_shelfItem">
          <div class="men-thumb-item">
            <img
              :src="ourImage(product.image)"
              :alt="product.name"
              class="pro-image-front"
            >
            <img
              :src="ourImage(product.image)"
              :alt="product.name"
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
              <router-link :to="`/product/${product.id}`">{{product.name}}</router-link>
            </h4>
            <div class="info-product-price">
              <span class="item_price">BDT {{product.price}}</span>
            </div>
            <a href="#" @click.prevent="addcart(product.id)" class="item_add single-item hvr-outline-out button2">Add to cart</a>
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
    //this.$store.dispatch('allproductsbycategoryid',this.$route.params.categoryId);
    //console.log('mounted!')

    this.allcategoryproducts();
  },
  computed: {
    categoryproducts() {
      console.log(this.$store.getters.allproductsbycategoryid);
      return this.$store.getters.allproductsbycategoryid;
      /* axios.get(`/category-view/${this.$route.params.categoryId}`)
                .then((response)=>{
                    console.log(response.data.publishedCategoryProducts)
                    return response.data.publishedCategoryProducts
                }) */
    }
  },
  methods: {
    allcategoryproducts() {
      this.$store.dispatch("allproductsbycategoryid", this.$route.params.categoryId);
    },
    ourImage(img) {
      return "productImage/" + img;
    },
    addcart(id) {
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
      this.allcategoryproducts();
    }
  }
};
</script>
<style scoped>
</style>

