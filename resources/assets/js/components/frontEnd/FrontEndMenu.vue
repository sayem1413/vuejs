<template>
  <div>
    <div class="ban-top">
      <div class="container">
        <div class="top_nav_left">
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button
                  type="button"
                  class="navbar-toggle collapsed"
                  data-toggle="collapse"
                  data-target="#bs-example-navbar-collapse-1"
                  aria-expanded="false"
                >
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav menu__list">
                  <li class="active menu__item menu__item--current">
                    <router-link to="/" class="dropdown-toggle menu__link">Home
                      <span class="sr-only">(current)</span>
                    </router-link>
                  </li>
                  <li
                    v-for="category in allpublishedcategories"
                    :key="category.id"
                    class="dropdown menu__item"
                  >
                    <router-link
                      v-show="category.active == 1"
                      :to="`/category/${category.id}`"
                      class="dropdown-toggle menu__link"
                    >{{category.name}}</router-link>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
        <div class="top_nav_right">
          <div class="cart box_1">
            <router-link to="/cart">
              <h3>
                <div class="total">
                  <i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
                  <span class="simpleCart_total"></span> (
                  <span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)
                </div>
              </h3>
            </router-link>
            <p>
              <a href="javascript:;" class="simpleCart_empty">Empty Cart</a>
            </p>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "FrontEndMenu",
  mounted() {
    this.$store.dispatch("allpublishedcategories");
  },
  computed: {
    allpublishedcategories() {
      return this.$store.getters.allcategories;
    }
  }
};
</script>
<style scoped>
</style>

