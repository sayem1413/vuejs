<template>
  <h2>This is test component</h2>
</template>
<script>
export default {
  created() {
    console.log(this.$route.params.category_id);
  }
};
</script>
