<template>
  <div class="row">
    <div class="col-lg-12">
      <h3 class="text-center">Add Category</h3>
      <h4 class="text-center text-success"></h4>
      <hr>
      <div class="well">
        <form role="form" class="form-horizontal" @submit.prevent="add_category()">
          <div class="form-group">
            <label for="category_name" class="col-sm-2 control-label">Category Name</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control"
                v-model="form.category_name"
                name="category_name"
                :class="{ 'is-invalid': form.errors.has('category_name') }"
              >
              <has-error :form="form" field="category_name"></has-error>
              <span class="text-danger"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="category_description" class="col-sm-2 control-label">Category Description</label>
            <div class="col-sm-10">
              <textarea
                class="form-control"
                v-model="form.category_description"
                name="category_description"
                rows="8"
                :class="{ 'is-invalid': form.errors.has('category_description') }"
              ></textarea>
              <has-error :form="form" field="category_description"></has-error>
              <span class="text-danger"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="active" class="col-sm-2 control-label"></label>
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
              <button type="submit" class="btn btn-success btn-block">Save Category Info</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: "Add",
  data() {
    return {
      form: new Form({
        category_name: "",
        category_description: "",
        active: ""
      })
    };
  },
  methods: {
    add_category() {
      console.log("okk");
      axios
        .post("/category/save", this.form)
        .then(response => {
          this.$router.push("/category/list");
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