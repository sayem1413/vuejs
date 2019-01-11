<template>
  <div class="row">
    <div class="col-lg-12">
      <h3 class="text-center">Add Product</h3>
      <h4 class="text-center text-success"></h4>

      <hr>
      <div class="well">
        <form
          role="form"
          class="form-horizontal"
          enctype="multipart/form-data"
          @submit.prevent="addProduct()"
        >
          <div class="form-group">
            <label for="product_name" class="col-sm-2 control-label">Product Name</label>
            <div class="col-sm-10">
              <input
                type="text"
                v-model="form.product_name"
                :class="{ 'is-invalid': form.errors.has('product_name') }"
                name="product_name"
                placeholder="Add New Product"
                class="form-control"
              >
              <has-error :form="form" field="product_name"></has-error>
              <span class="text-danger"></span>
            </div>
          </div>
          <div class="form-group">
            <label for class="col-sm-2 control-label">Category</label>
            <div class="col-sm-10">
              <select
                class="form-control"
                name="category_id"
                :class="{ 'is-invalid': form.errors.has('category_id') }"
                v-model="form.category_id"
              >
                <option :value="null">Select Category</option>
                <option
                  v-for="category in getallCategory"
                  v-show="category.active == 1"
                  :key="category.id"
                  :value="category.id"
                >{{category.categoryName}}</option>
              </select>
              <has-error :form="form" field="category_id"></has-error>
            </div>
          </div>
          <div class="form-group">
            <label for class="col-sm-2 control-label">Manufacturer</label>
            <div class="col-sm-10">
              <select
                class="form-control"
                name="manufacturer_id"
                :class="{ 'is-invalid': form.errors.has('manufacturer_id') }"
                v-model="form.manufacturer_id"
              >
                <option :value="null">Select Manufacturer</option>
                <option
                  v-for="manufacturer in getallManufacturer"
                  v-show="manufacturer.active == 1"
                  :key="manufacturer.id"
                  :value="manufacturer.id"
                >{{manufacturer.manufacturerName}}</option>
              </select>
              <has-error :form="form" field="manufacturer_id"></has-error>
            </div>
          </div>
          <div class="form-group">
            <label for="product_price" class="col-sm-2 control-label">Product Price</label>
            <div class="col-sm-10">
              <input
                type="number"
                v-model="form.product_price"
                :class="{ 'is-invalid': form.errors.has('product_price') }"
                class="form-control"
                name="product_price"
                placeholder="Add product price"
              >
              <span class="text-danger"></span>
              <has-error :form="form" field="product_price"></has-error>
            </div>
          </div>
          <div class="form-group">
            <label for="product_quantity" class="col-sm-2 control-label">Product Quntity</label>
            <div class="col-sm-10">
              <input
                type="number"
                v-model="form.product_quantity"
                :class="{ 'is-invalid': form.errors.has('product_quantity') }"
                class="form-control"
                name="product_quantity"
                placeholder="Add product quantity"
              >
              <span class="text-danger"></span>
              <has-error :form="form" field="product_quantity"></has-error>
            </div>
          </div>
          <div class="form-group">
            <label
              for="product_short_description"
              class="col-sm-2 control-label"
            >Product Short Description</label>
            <div class="col-sm-10">
              <textarea
                v-model="form.product_short_description"
                :class="{ 'is-invalid': form.errors.has('product_short_description') }"
                class="form-control"
                name="product_short_description"
                rows="8"
                placeholder="Add product Short Description"
              ></textarea>
              <span class="text-danger"></span>
              <has-error :form="form" field="product_short_description"></has-error>
            </div>
          </div>
          <div class="form-group">
            <label
              for="product_long_description"
              class="col-sm-2 control-label"
            >Product Long Description</label>
            <div class="col-sm-10">
              <textarea
                v-model="form.product_long_description"
                :class="{ 'is-invalid': form.errors.has('product_long_description') }"
                class="form-control"
                name="product_long_description"
                rows="8"
                placeholder="Add product Long Description"
              ></textarea>
              <span class="text-danger"></span>
              <has-error :form="form" field="product_long_description"></has-error>
            </div>
          </div>
          <div class="form-group">
            <label for="image" class="col-sm-2 control-label">Product Image</label>
            <div class="col-sm-10">
              <input
                @change="changeImage($event)"
                type="file"
                class="form-control"
                name="product_image"
                :class="{ 'is-invalid': form.errors.has('product_image') }"
              >
              <span class="text-danger"></span>
              <img :src="form.product_image" alt width="80" height="80">
              <has-error :form="form" field="product_image"></has-error>
            </div>
          </div>
          <div class="form-group">
            <label for class="col-sm-2 control-label">Publication Status</label>
            <div class="col-sm-10">
              <select
                class="form-control"
                name="active"
                v-model="form.active"
                :class="{ 'is-invalid': form.errors.has('active') }"
              >
                <option :value="null">Select Publication Status</option>
                <option :value="1">Published</option>
                <option :value="0">Unpublished</option>
              </select>
              <has-error :form="form" field="active"></has-error>
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
  data() {
    return {
      form: new Form({
        product_name: "",
        category_id: "",
        manufacturer_id: "",
        product_price: "",
        product_quantity: "",
        product_short_description: "",
        product_long_description: "",
        product_image: ""
      })
    };
  },
  mounted() {
    this.$store.dispatch("allCategory");
    this.$store.dispatch("allManufacturer");
  },
  computed: {
    getallCategory() {
      return this.$store.getters.getCategory;
    },
    getallManufacturer() {
      return this.$store.getters.getManufacturer;
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
          this.form.product_image = event.target.result;
          //  console.log(event.target.result)
        };
        reader.readAsDataURL(file);
      }
    },
    addProduct() {
      //console.log(this.form.product_name);

      axios
        .post("/product/save", this.form)
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
