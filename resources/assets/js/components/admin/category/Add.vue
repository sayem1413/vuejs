<template>
  <div class="row">
    <div class="col-lg-12">
      <h3 class="text-center">Add Category</h3>
      <h4 class="text-center text-success"></h4>
      <hr>
      <div class="well">
        <form class="form-horizontal" @submit.prevent="add_category()">
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Category Name</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control"
                v-model="category.name"
                name="name"
              >
              <span class="text-danger"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Category Description</label>
            <div class="col-sm-10">
              <textarea
                class="form-control"
                v-model="category.description"
                name="description"
                rows="8"
              ></textarea>
              <span class="text-danger"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="active" class="col-sm-2 control-label">Publication Status</label>
            <div class="col-sm-5">
              <input type="radio" id="active" value="1" v-model="category.active">
              <label for="one">Published</label>
            </div>
            <div class="col-sm-5">
              <input type="radio" id="active" value="0" v-model="category.active">
              <label for="active">Unpublished</label>
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

import ROOT_URL from '../../../config';

export default {
  name: "Add",
  data: function() {
    return {
      category:{
        name: '',
        description: '',
        active: '',
      }
    };
  },
  methods: {
    add_category() {
      let url = ROOT_URL+"category/save";
      //console.log(url)
      var app = this;
      var newCategory = app.category;
      
      console.log("okk");
      axios
        .post(url, newCategory)
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