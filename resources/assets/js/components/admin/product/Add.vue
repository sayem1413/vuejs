<template>
  <div class="row">
    <div class="col-lg-12">
      <h3 class="text-center">Add Product</h3>
      <h4 class="text-center text-success"></h4>

      <hr>
      <div class="well">
        <form
          class="form-horizontal"
          enctype="multipart/form-data"
          @submit.prevent="addProduct()"
        >
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Product Name</label>
            <div class="col-sm-10">
              <input
                type="text"
                v-model="product.name"
                name="name"
                placeholder="Add New Product"
                class="form-control"
              >
              <span class="text-danger"></span>
            </div>
          </div>
          <div class="form-group">
            <label for class="col-sm-2 control-label">Category</label>
            <div class="col-sm-10">
              <select
                class="form-control"
                name="category_id"
                v-model="product.category_id"
              >
                <option :value="null">Select Category</option>
                <option
                  v-for="category in allPublishedCategories"
                  v-show="category.active == 1"
                  :key="category.id"
                  :value="category.id"
                >{{category.name}}</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for class="col-sm-2 control-label">Manufacturer</label>
            <div class="col-sm-10">
              <select
                class="form-control"
                name="manufacturer_id"
                v-model="product.manufacturer_id"
              >
                <option :value="null">Select Manufacturer</option>
                <option
                  v-for="manufacturer in allPublishedManufacturers"
                  v-show="manufacturer.active == 1"
                  :key="manufacturer.id"
                  :value="manufacturer.id"
                >{{manufacturer.name}}</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="price" class="col-sm-2 control-label">Product Price</label>
            <div class="col-sm-10">
              <input
                type="number"
                v-model="product.price"
                class="form-control"
                name="price"
                placeholder="Add product price"
              >
              <span class="text-danger"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="quantity" class="col-sm-2 control-label">Product Quntity</label>
            <div class="col-sm-10">
              <input
                type="number"
                v-model="product.quantity"
                class="form-control"
                name="quantity"
                placeholder="Add product quantity"
              >
              <span class="text-danger"></span>
            </div>
          </div>
          <div class="form-group">
            <label
              for="short_description"
              class="col-sm-2 control-label"
            >Product Short Description</label>
            <div class="col-sm-10">
              <textarea
                v-model="product.short_description"
                class="form-control"
                name="short_description"
                rows="8"
                placeholder="Add product Short Description"
              ></textarea>
              <span class="text-danger"></span>
            </div>
          </div>
          <div class="form-group">
            <label
              for="long_description"
              class="col-sm-2 control-label"
            >Product Long Description</label>
            <div class="col-sm-10">
              <textarea
                v-model="product.long_description"
                class="form-control"
                name="long_description"
                rows="8"
                placeholder="Add product Long Description"
              ></textarea>
              <span class="text-danger"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="image" class="col-sm-2 control-label">Product Image</label>
            <div class="col-sm-10">
              <input
                @change="changeImage($event)"
                type="file"
                class="form-control"
                name="image"
              >
              <span class="text-danger"></span>
              <img :src="product.image" alt width="80" height="80">
            </div>
          </div>
          <div class="form-group">
            <label for class="col-sm-2 control-label">Publication Status</label>
            <div class="col-sm-5">
              <input type="radio" id="active" value="1" v-model="product.active">
              <label for="one">Published</label>
            </div>
            <div class="col-sm-5">
              <input type="radio" id="active" value="0" v-model="product.active">
              <label for="active">Unpublished</label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success btn-block" name>Save Product Info</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "New",
  data: function() {
    return {
      product: {
        name: '',
        category_id: '',
        manufacturer_id: '',
        price: '',
        quantity: '',
        short_description: '',
        long_description: '',
        image: '',
        active:'',
      }
    };
  },
  mounted() {
    this.$store.dispatch("allCategory");
    this.$store.dispatch("allManufacturers");
  },
  computed: {
    allPublishedCategories() {
      return this.$store.getters.allCategories;
    },
    allPublishedManufacturers() {
      return this.$store.getters.allManufacturers;
    }
  },
  methods: {
    changeImage(event) {
      let file = event.target.files[0];

      if (file.size > 9048576) {
        swal({
          type: "error",
          title: "Oops...",
          text: "Something went wrong!",
          footer: "<a href>Why do I have this issue?</a>"
        });
      } else {
        let reader = new FileReader();
        reader.onload = event => {
          this.product.image = event.target.result;
          //  console.log(event.target.result)
        };
        reader.readAsDataURL(file);
      }
    },
    addProduct() {
      //console.log(this.form.name);

      axios
        .post("/product/save", this.product)
        .then(response => {
          this.$router.push("/product/list");
          toast({
            type: "success",
            title: "Category Added successfully"
          });
        })
        .catch(() => {});
    }
  }
};
</script>

<style scoped>
</style>
