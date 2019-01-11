<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div
            class="well lead text-center text-success"
          >You have to <router-link to="/register" >register</router-link> or login (if registerd) to complete your order.</div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="well box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Login</h3>
            </div>
            <!-- box header -->
            <!-- form start -->
            <form>
              <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="email">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Login"
};
</script>


<style scoped>
</style>
