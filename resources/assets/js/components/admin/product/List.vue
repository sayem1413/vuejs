<template>
  <div>
    <hr>
    <h4 class="text-center text-success"></h4>
    <hr>
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
        <tr v-for="(product,index) in allPublishedProducts" :key="product.id">
          <td scope="row">{{index+1}}</td>
          <td>{{product.name}}</td>
          <td>{{product.category_name}}</td>
          <td>{{product.manufacturer_name}}</td>
          <td>{{product.price}}</td>
          <td>{{product.quantity}}</td>
          <td>{{product.short_description}}</td>
          <td>{{product.long_description}}</td>
          <td>
            <img :src="product.image" alt height="150px" width="150px">
          </td>
          <td>
            <p v-if="product.active == 1">Published</p>
            <p v-else>Unpublished</p>
          </td>
          <td>
            <router-link :to="`/product/edit/${product.id}`" class="btn btn-success">
              <span class="glyphicon glyphicon-edit"></span>
            </router-link>
            <a href class="btn btn-danger" @click.prevent="deleteProduct(product.id)">
              <span class="glyphicon glyphicon-trash"></span>
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import ROOT_URL from "../../../config";
export default {
  name: "List",
  mounted() {
    this.$store.dispatch("allProducts");
  },
  computed: {
    allPublishedProducts() {
      return this.$store.getters.allProducts;
    }
  },
  methods: {
    ourImage(img) {
      return "productImage/" + img;
    },
    deleteProduct(id) {
      let url = ROOT_URL + "product/delete/";
      axios
        .get(url + id)
        .then(() => {
          this.$store.dispatch("allProducts");
          toast({
            type: "success",
            title: "Product Deleted successfully"
          });
        })
        .catch(() => {});
    }
  }
};
</script>

<style scoped>
</style>