<template>
  <div>
    <div class="single">
      <div class="container">
        <div
          class="col-md-6 single-right-left animated wow slideInUp animated"
          data-wow-delay=".5s"
          style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;"
        >
          <div class="grid images_3_of_2">
            <div class="flexslider">
              <div class="thumb-image">
                <img
                  :src="singleproduct.image"
                  data-imagezoom="true"
                  class="img-responsive"
                >
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <div
          class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated"
          data-wow-delay=".5s"
          style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;"
        >
          <h3>{{singleproduct.name}}</h3>
          <p>
            <span class="item_price">BDT {{singleproduct.price}}</span>
          </p>
          <div class="rating1">
            <span class="starRating">
              <input id="rating5" type="radio" name="rating" value="5">
              <label for="rating5">5</label>
              <input id="rating4" type="radio" name="rating" value="4">
              <label for="rating4">4</label>
              <input id="rating3" type="radio" name="rating" value="3" checked>
              <label for="rating3">3</label>
              <input id="rating2" type="radio" name="rating" value="2">
              <label for="rating2">2</label>
              <input id="rating1" type="radio" name="rating" value="1">
              <label for="rating1">1</label>
            </span>
          </div>
          <div class="color-quality">
            <div class="color-quality-right">
              <h5>Quality :</h5>
              <select
                id="country1"
                onchange="change_country(this.value)"
                class="frm-field required sect"
              >
                <option value="null">5 Qty</option>
                <option value="null">6 Qty</option>
                <option value="null">7 Qty</option>
                <option value="null">10 Qty</option>
              </select>
            </div>
          </div>
          <div class="occasional">
            <h5>Product Name :</h5>
            <div class="colr ert">
              <label class="radio">
                <input type="radio" name="radio" checked>
                <i></i>
                {{singleproduct.name}}
              </label>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="occasion-cart">
            <a
              href="#"
              @click.prevent="addcart(singleproduct.id)"
              class="item_add hvr-outline-out button2"
            >Add to cart</a>
          </div>
        </div>
        <div class="clearfix"></div>

        <div
          class="bootstrap-tab animated wow slideInUp animated"
          data-wow-delay=".5s"
          style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;"
        >
          <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <div id="myTabContent" class="tab-content">
              <div
                role="tabpanel"
                class="tab-pane fade in active bootstrap-tab-text"
                id="home"
                aria-labelledby="home-tab"
              >
                <h5>Product Brief Description</h5>
                <p>{{singleproduct.long_description}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ROOT_URL from "../../../config";
export default {
  name: "ProductDetails",
  mounted() {
    this.singleProduct();
  },
  computed: {
    singleproduct() {
      return this.$store.getters.productById;
    }
  },
  methods: {
    singleProduct() {
      this.$store.dispatch("productById", this.$route.params.id);
    },
    ourImage(img) {
      return "/productImage/" + img;
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
  },
  watch: {
    $route(to, from) {
      this.singleProduct();
    }
  }
};
</script>
<style scoped>
</style>

