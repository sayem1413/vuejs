<template>
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center">Add Category</h3>
            <h4 class="text-center text-success"></h4>
            <hr/>
            <div class="well">
                <form role="form" class="form-horizontal" @click.prevent="addCategory()">
                    <div class="form-group">
                        <label for="categoryName" class="col-sm-2 control-label">Category Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="categoryName">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categoryDescription" class="col-sm-2 control-label">Category Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="categoryDescription" rows="8"></textarea>
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
                            <button type="submit" class="btn btn-success btn-block" name="">Save Category Info</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Add",
        data(){
            return {
                form: new Form({
                    categoryName:'',
                    categoryDescription:'',

                })
            }
        },
        methods:{
            addCategory(){
                
            }
        }
    }
</script>

<style scoped>

</style>