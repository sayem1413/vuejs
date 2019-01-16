<template>
  <div>
    <div class="checkout">
      <div class="container">
        <h3>My Shopping Bag</h3>
        <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
          <table class="timetable_sub">
            <thead>
              <tr>
                <th>Remove</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Product Name</th>
                <th>Price</th>
              </tr>
            </thead>
            <!-- php code -> $total = 0; -->
            <!-- foreach -->
            <tr v-for="(cart,index) in cartProducts" :key="cart.id">
              <td>
                <div>
                  <a
                    href
                    @click.prevent="deleteCartProduct(cart.rowId)"
                    type="submit"
                    class="btn btn-danger"
                  >
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>
              </td>
              <td class="invert">{{cart.name}}</td>
              <td class="invert">
                <div class="quantity">
                  <div class="input-group">
                    <input
                      type="number"
                      name="qty"
                      class="form-control"
                      :value="cartProducts[index].qty"
                      @change="qty=$event.target.value"
                    >
                    <span class="input-group-btn"></span>
                    <button
                      type="submit"
                      @click="updateCartProduct(cart.rowId)"
                      class="btn btn-primary"
                    >
                      <span class="glyphicon glyphicon-upload"></span>
                    </button>
                  </div>
                </div>
              </td>
              <td class="invert">TK. {{cart.price}}</td>
              <td class="invert">TK. {{cart.price * cart.qty}}</td>
            </tr>
            <!-- php code -> $total = $total + $itemTotal -->
            <!-- foreach -->
          </table>
        </div>
        <div class="checkout-left">
          <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
            <router-link to="/" ><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</router-link>
            <!-- php code ->
                            $customerId = Session::get('customerId');
                            $shippingId = Session::get('shippingId');
                            if($customerId!=null && $shippingId!=null){
            -->
            <router-link to="/register" >
              <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout
            </router-link>
            <!-- php code -> } else if($customerId!=null){ -->
            <!-- <a href="#checkout/shipping"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a> -->
            <!-- php code -> } else { -->
            <!-- <a href="#checkout"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a> -->
            <!-- php code -> } -->
          </div>
          <div class="hidden">{{totall = 0}}</div>
          <div
            v-for="cart in cartProducts"
            :key="cart.id"
            class="hidden"
          >{{ totall += cart.qty*cart.price}}</div>
          <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
            <h4>Shopping basket</h4>
            <ul>
              <li>
                <h5>Total: {{totall}}</h5>
              </li>
            </ul>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Cart",
  data() {
    return {
      qty: 1
    };
  },
  mounted() {
    this.$store.dispatch("allCartProducts");
  },
  computed: {
    cartProducts() {
      //console.log(this.$store.getters.cartProducts)
      return this.$store.getters.cartProducts;
    }
  },
  methods: {
    deleteCartProduct(id) {
      //   console.log(id);
      axios
        .get("/cart/delete/" + id, this.form)
        .then(() => {
          this.$store.dispatch("allCartProducts");
          toast({
            type: "success",
            title: "Cart Product Deleted successfully"
          });
        })
        .catch(() => {});
    },
    updateCartProduct(id) {
      //   console.log(this.dataQty);
      axios
        .patch("/cart/update/" + id, { qty: this.qty })
        .then(() => {
          this.$store.dispatch("allCartProducts");
          toast({
            type: "success",
            title: "Cart Product updated successfully"
          });
        })
        .catch(() => {});
    }
  }
};
</script>
<style scoped>
</style>