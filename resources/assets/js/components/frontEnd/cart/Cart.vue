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
                        <tr v-for="cart in getCartList" :key="cart.id">
                            <td>
                                <div>
                                    <form @submit.prevent = "deleteProductCart(cart.rowId)">
                                        <button type="submit" class="btn btn-danger" >
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="invert">{{cart.name}}</td>
                            <td class="invert">
                                <div class="quantity"> 
                                    <form>
                                        <div class="input-group">
                                            <input type="number" name="qty" class="form-control" :value="cart.qty">
                                            <span class="input-group-btn"></span>
                                            <button type="submit" name="btn" class="btn btn-primary">
                                                <span class="glyphicon glyphicon-upload"></span>
                                            </button>
                                        </div>
                                    </form>
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
                        <a href=""><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
                        <!-- php code ->
                            $customerId = Session::get('customerId');
                            $shippingId = Session::get('shippingId');
                            if($customerId!=null && $shippingId!=null){
                        -->
                        <a href=""><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>
                            <!-- php code -> } else if($customerId!=null){ -->
                        <!-- <a href="#checkout/shipping"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a> -->
                            <!-- php code -> } else { -->
                        <!-- <a href="#checkout"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a> -->
                        <!-- php code -> } -->
                    </div>
                    <div class="hidden">{{totall = 0}}</div>
                    <div v-for="cart in getCartList" :key="cart.id" class="hidden">{{ totall += cart.qty*cart.price}}</div>
                    <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                        <h4>Shopping basket</h4>
                        
                        <ul>
                            <li>Total: {{totall}}</li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Cart',
    mounted(){
        this.$store.dispatch("allCartProducts")
    },
    computed:{
        getCartList(){
            return this.$store.getters.getCartProducts
        }
    },
    methods:{
        deleteProductCart(id){
            console.log(id)
            axios.get('/cart/delete/'+id)
                .then(()=>{
                    this.$store.dispatch("allCartProducts")
                    toast({
                        type: 'success',
                        title: 'Cart Product Deleted successfully'
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

