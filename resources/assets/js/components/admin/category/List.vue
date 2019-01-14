<template>
  <div>
    <hr>
    <h4 class="text-center text-success"></h4>
    <hr>
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Category Name</th>
          <th>Category Description</th>
          <th>Publication Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(category,index) in allcategories" :key="category.id">
          <td scope="row">{{index+1}}</td>
          <td>{{category.category_name}}</td>
          <td>{{category.category_description}}</td>
          <td>
            <p v-if="category.active == 1">Published</p>
            <p v-else>Unpublished</p>
          </td>
          <td>
            <router-link :to="`/category/edit/${category.id}`" class="btn btn-success">
              <span class="glyphicon glyphicon-edit"></span>
            </router-link>
            <a href="#" class="btn btn-danger" @click.prevent="deleteCategory(category.id)">
              <span class="glyphicon glyphicon-trash"></span>
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: "List",
  mounted() {
    this.$store.dispatch("all_category");
  },
  computed: {
    allcategories() {
      return this.$store.getters.allcategories;
    }
  },
  methods: {
    deleteCategory(id) {
      axios
        .get("/category/delete/" + id)
        .then(() => {
          this.$store.dispatch("all_category");
          toast({
            type: "success",
            title: "Category Deleted successfully"
          });
        })
        .catch(() => {});
    }
  }
};
</script>

<style scoped>
</style>