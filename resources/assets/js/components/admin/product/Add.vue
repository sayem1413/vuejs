<template>
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center">Add Product</h3>
            <h4 class="text-center text-success"></h4>

            <hr/>
            <div class="well">
                <form role="form" class="form-horizontal" enctype="multipart/form-data" @submit.prevent="addProduct()">
                <div class="form-group">
                    <label for="productName" class="col-sm-2 control-label">Product Name</label>
                    <div class="col-sm-10">
                        <input type="text" v-model="form.productName" :class="{ 'is-invalid': form.errors.has('productName') }" name="productName" placeholder="Add New Product" class="form-control" >
                        <has-error :form="form" field="productName"></has-error>
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Category Name</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="categoryId" :class="{ 'is-invalid': form.errors.has('categoryId') }" v-model="form.categoryId">
                            <option :value="null">Select Category Name</option>
                            <option v-for="category in getallCategory" :key="category.id"  :value="category.id">{{category.categoryName}}</option>
                        </select>
                        <has-error :form="form" field="categoryId"></has-error>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Manufacturer Name</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="manufacturerId" :class="{ 'is-invalid': form.errors.has('manufacturerId') }" v-model="form.manufacturerId">
                            <option :value="null">Select Manufacturer Name</option>
                            <option v-for="manufacturer in getallManufacturer" :key="manufacturer.id"  :value="manufacturer.id">{{manufacturer.manufacturerName}}</option>
                        </select>
                        <has-error :form="form" field="manufacturerId"></has-error>
                    </div>
                </div>
                <div class="form-group">
                    <label for="productPrice" class="col-sm-2 control-label">Product Price</label>
                    <div class="col-sm-10">
                        <input type="number" v-model="form.productPrice" :class="{ 'is-invalid': form.errors.has('productPrice') }" class="form-control" name="productPrice" placeholder="Add product price">
                        <span class="text-danger"></span>
                        <has-error :form="form" field="productPrice"></has-error>
                    </div>
                </div>
                <div class="form-group">
                    <label for="productQuantity" class="col-sm-2 control-label">Product Quntity</label>
                    <div class="col-sm-10">
                        <input type="number" v-model="form.productQuantity" :class="{ 'is-invalid': form.errors.has('productQuantity') }" class="form-control" name="productQuantity" placeholder="Add product quantity">
                        <span class="text-danger"></span>
                        <has-error :form="form" field="productQuantity"></has-error>
                    </div>
                </div>
                <div class="form-group">
                    <label for="productShortDescription" class="col-sm-2 control-label">Product Short Description</label>
                    <div class="col-sm-10">
                        <textarea v-model="form.productShortDescription" :class="{ 'is-invalid': form.errors.has('productShortDescription') }" class="form-control" name="productShortDescription" rows="8" placeholder="Add product Short Description"></textarea>
                        <span class="text-danger"></span>
                        <has-error :form="form" field="productShortDescription"></has-error>
                    </div>
                </div>
                <div class="form-group">
                    <label for="productLongDescription" class="col-sm-2 control-label">Product Long Description</label>
                    <div class="col-sm-10">
                        <textarea v-model="form.productLongDescription" :class="{ 'is-invalid': form.errors.has('productLongDescription') }" class="form-control" name="productLongDescription" rows="8" placeholder="Add product Long Description"></textarea>
                        <span class="text-danger"></span>
                        <has-error :form="form" field="productLongDescription"></has-error>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">Product Image</label>
                    <div class="col-sm-10">
                        <input @change = "changeImage($event)" type="file" class="form-control" name="productImage" :class="{ 'is-invalid': form.errors.has('productImage') }">
                        <span class="text-danger"></span>
                        <img :src="form.productImage" alt="" width="80" height="80">
                        <has-error :form="form" field="productImage"></has-error>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <select
                            class="form-control"
                            name="publicationStatus"
                            v-model="form.publicationStatus"
                            :class="{ 'is-invalid': form.errors.has('publicationStatus') }"
                        >
                            <option :value="null">Select Publication Status</option>
                            <option :value="1">Published</option>
                            <option :value="0">Unpublished</option>
                        </select>
                        <has-error :form="form" field="publicationStatus"></has-error>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success btn-block" name="">Save Product Info</button>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "New",
        data(){
            return{
                form: new Form({
                    productName:'',
                    categoryId:'',
                    manufacturerId:'',
                    productPrice:'',
                    productQuantity:'',
                    productShortDescription:'',
                    productLongDescription:'',
                    productImage:''
                })
            }
        },
        mounted(){
            this.$store.dispatch("allCategory")
            this.$store.dispatch("allManufacturer")
        },
        computed:{
            getallCategory(){
                return this.$store.getters.getCategory
            },
            getallManufacturer(){
               return this.$store.getters.getManufacturer
           }
        },
        methods:{
            changeImage(event){
                let file = event.target.files[0];

                 if(file.size>9048576){
                     swal({
                         type: 'error',
                         title: 'Oops...',
                         text: 'Something went wrong!',
                         footer: '<a href>Why do I have this issue?</a>'
                     })
                 }else{
                     let reader = new FileReader();
                     reader.onload = event => {
                         this.form.productImage = event.target.result
                         console.log(event.target.result)
                     };
                     reader.readAsDataURL(file);
                 }

            },
            addProduct(){
                //console.log(this.form.productName);
                
                axios.post("/product/save", this.form)
                    .then(response => {
                        this.$router.push("/product/list");
                        toast({
                            type: "success",
                            title: "Category Added successfully"
                        });
                    })
                    .catch(() => {});
            }
        }

    }
</script>

<style scoped>

</style>
