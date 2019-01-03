<template>
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center">Add Product</h3>
            <h4 class="text-center text-success"></h4>

            <hr/>
            <div class="well">
                <form role="form" class="form-horizontal" @click.prevent="addProduct()">
                <div class="form-group">
                    <label for="productName" class="col-sm-2 control-label">Product Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="productName">
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Category Name</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="categoryId">
                            <option>Select Category Name</option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Manufacturer Name</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="manufacturerId">
                            <option>Select Manufacturer Name</option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="productPrice" class="col-sm-2 control-label">Product Price</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="productPrice">
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="productQuantity" class="col-sm-2 control-label">Product Quntity</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="productQuantity">
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="productShortDescription" class="col-sm-2 control-label">Product Short Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="productShortDescription" rows="8"></textarea>
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="productLongDescription" class="col-sm-2 control-label">Product Long Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="productLongDescription" rows="8"></textarea>
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">Product Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="productImage">
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <select class="form-control" name="publicationStatus">
                            <option>Select Publication Status</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
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
                    productPrice:'',
                    productShortDescription:'',
                    productLongDescription:'',
                    productImage:''
                })
            }
        },
        mounted(){
            
        },
        computed:{
            
        },
        methods:{
            
            
        }

    }
</script>

<style scoped>

</style>
