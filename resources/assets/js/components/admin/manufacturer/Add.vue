<template>
  <div class="row">
    <div class="col-lg-12">
      <h3 class="text-center">Add Manufacturer</h3>
      <h4 class="text-center text-success"></h4>

      <hr>
      <div class="well">
        <form class="form-horizontal" @submit.prevent="addManufacturer()">
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Manufacturer Name</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control"
                v-model="manufacturer.name"
                name="name"
              >
              <span class="text-danger"></span>
            </div>
          </div>
          <div class="form-group">
            <label
              for="description"
              class="col-sm-2 control-label"
            >Manufacturer Description</label>
            <div class="col-sm-10">
              <textarea
                class="form-control"
                v-model="manufacturer.description"
                name="description"
                rows="8"
              ></textarea>
              <span class="text-danger"></span>
            </div>
          </div>
          <div class="form-group">
            <label for class="col-sm-2 control-label">Publication Status</label>
            <div class="col-sm-10">
              <input type="checkbox" id="active" value="1" v-model="manufacturer.active">
              <label for="checkbox">Published</label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success btn-block" name>Save Manufacturer Info</button>
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
      manufacturer: {
        name: '',
        description: '',
        active: '',
      }
    };
  },
  methods: {
    addManufacturer() {
      let url = ROOT_URL+"manufacturer/save";
      console.log("okk");
      var app = this;
      var newManufacturer = app.manufacturer;
      axios
        .post(url, newManufacturer)
        .then(response => {
          this.$router.push("/manufacturer/list");
          toast({
            type: "success",
            title: "Manufacturer Added successfully"
          });
        })
        .catch(() => {});
    }
  }
};
</script>

<style scoped>

</style>