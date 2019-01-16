<template>
  <div>
    <hr>
    <h4 class="text-center text-success"></h4>
    <hr>
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Manufacturer Name</th>
          <th>Manufacturer Description</th>
          <th>Publication Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(manufacturer,index) in allManufacturers" :key="manufacturer.id">
          <td scope="row">{{index+1}}</td>
          <td>{{manufacturer.name}}</td>
          <td>{{manufacturer.description}}</td>
          <td>
            <p v-if="manufacturer.active == 1">Published</p>
            <p v-else>Unpublished</p>
          </td>
          <td>
            <router-link :to="`/manufacturer/edit/${manufacturer.id}`" class="btn btn-success">
              <span class="glyphicon glyphicon-edit"></span>
            </router-link>
            <a href="#" class="btn btn-danger" @click.prevent="deletemanufacturer(manufacturer.id)">
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
    this.$store.dispatch("allManufacturers");
  },
  computed: {
    allManufacturers() {
      return this.$store.getters.allManufacturers;
    }
  },
  methods: {
    deletemanufacturer(id) {
      let url = ROOT_URL + "manufacturer/delete/";
      axios
        .get(url + id)
        .then(() => {
          this.$store.dispatch("allManufacturers");
          toast({
            type: "success",
            title: "Manufacturer Deleted successfully"
          });
        })
        .catch(() => {});
    }
  }
};
</script>

<style scoped>
</style>