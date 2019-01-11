<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="well lead text-center text-success">You have to register or
            <router-link to="/login">login</router-link>(if registerd) to complete your order.
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="well box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Register</h3>
            </div>
            <!-- box header -->
            <!-- form start -->
            <form role="form" class="form-horizontal" @submit.prevent="register()">
              <div class="form-group">
                <label for>First Name</label>
                <input
                  type="text"
                  v-model="form.firstName"
                  :class="{ 'is-invalid': form.errors.has('firstName') }"
                  name="firstName"
                  class="form-control"
                  placeholder="first name"
                >
              </div>
              <div class="form-group">
                <label for>Last Name</label>
                <input
                  type="text"
                  v-model="form.lastName"
                  :class="{ 'is-invalid': form.errors.has('lastName') }"
                  name="lastName"
                  class="form-control"
                  placeholder="last name"
                >
              </div>
              <div class="form-group">
                <label for>Email</label>
                <input
                  type="email"
                  v-model="form.email"
                  :class="{ 'is-invalid': form.errors.has('email') }"
                  name="email"
                  class="form-control"
                  placeholder="email"
                >
              </div>
              <div class="form-group">
                <label for>Password</label>
                <input
                  type="password"
                  v-model="form.password"
                  :class="{ 'is-invalid': form.errors.has('password') }"
                  name="password"
                  class="form-control"
                >
              </div>
              <div class="form-group">
                <label for>Address</label>
                <textarea
                  name="address"
                  v-model="form.address"
                  :class="{ 'is-invalid': form.errors.has('address') }"
                  class="form-control"
                  placeholder="Enter your Address"
                ></textarea>
              </div>
              <div class="form-group">
                <label for>Mobile Number</label>
                <input
                  type="text"
                  v-model="form.phoneNumber"
                  :class="{ 'is-invalid': form.errors.has('phoneNumber') }"
                  name="phoneNumber"
                  class="form-control"
                >
              </div>
              <div class="form-group">
                <label for>District Name</label>
                <select
                  type="text"
                  v-model="form.districtName"
                  :class="{ 'is-invalid': form.errors.has('districtName') }"
                  name="districtName"
                  class="form-control"
                >
                  <option value="0" selected>Dhaka</option>
                  <option value="1">Narayangonj</option>
                  <option value="2">Gazipur</option>
                  <option value="3">Savar</option>
                  <option value="com">Comilla</option>
                  <option value="chi">Chittagonj</option>
                  <option value="raj">Rajshahi</option>
                </select>
                <has-error :form="form" field="districtName"></has-error>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
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
  name: "Register",

  data() {
    return {
      form: new Form({
        firstName: "",
        lastName: "",
        email: "",
        password: "",
        address: "",
        phoneNumber: "",
        districtName: ""
      })
    };
  },
  methods: {
    register() {
      axios
        .post("/checkout/sign-up", this.form)
        .then(response => {
          toast({
            type: "success",
            title: "Registration successfully"
          });
        })
        .catch(() => {});
    }
  }
};
</script>


<style scoped>
</style>
