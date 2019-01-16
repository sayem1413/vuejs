<template>
  <div class="row">
    <div class="col-lg-12">
      <h3 class="text-center">Edit Manufacturer</h3>
      <h4 class="text-center text-success"></h4>
      <hr>
      <div class="well">
        <form class="form-horizontal" @submit.prevent="updateManufacturer()">
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Manufacturer Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" v-model="manufacturer.name" name="name">
              <span class="text-danger"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Manufacturer Description</label>
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
            <div class="col-sm-5">
              <input type="radio" id="active" value="1" v-model="manufacturer.active">
              <label for="one">Published</label>
            </div>
            <div class="col-sm-5">
              <input type="radio" id="active" value="0" v-model="manufacturer.active">
              <label for="active">Unpublished</label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success btn-block" name>Update Manufacturer Info</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
import ROOT_URL from "../../../config";
export default {
  name: "Edit",
  mounted() {
    let url = ROOT_URL+"manufacturer/edit/";
    axios
      .get(url +this.$route.params.manufacturerid)
      .then(response => {
        //this.form.fill(response.data.manufacturer_by_id)
        this.manufacturer = response.data.manufacturerInfo;
        console.log(response.data.manufacturerInfo);
      })
      .catch(function() {
        alert("Could not load your manufacturer");
      });
  },
  data: function() {
    return {
      manufacturer: {
        name: "",
        description: "",
        active: ""
      }
    };
  },
  methods: {
    updateManufacturer() {
      let url = ROOT_URL+"manufacturer/update/";
      axios
        .post(
          url +this.$route.params.manufacturerid,
          this.manufacturer
        )
        .then(response => {
          this.$router.push("/manufacturer/list");
          toast({
            type: "success",
            title: "Manufacturer Updated successfully"
          });
        })
        .catch(() => {
          alert("Could not save your manufacturer");
        });
    }
  }
};
</script>