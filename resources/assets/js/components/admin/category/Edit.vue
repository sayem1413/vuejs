<template>
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center">Update Category</h3>
            <h4 class="text-center text-success"></h4>
            <hr/>
            <div class="well">
                <form role="form" class="form-horizontal" @submit.prevent="updateCategory()">
                    <div class="form-group">
                        <label for="categoryName" class="col-sm-2 control-label">Category Name</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                class="form-control"
                                v-model="form.categoryName"
                                name="categoryName"
                                :class="{ 'is-invalid': form.errors.has('categoryName') }"
                            >
                            <has-error :form="form" field="categoryName"></has-error>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categoryDescription" class="col-sm-2 control-label">Category Description</label>
                        <div class="col-sm-10">
                            <textarea
                                class="form-control"
                                v-model="form.categoryDescription"
                                name="categoryDescription"
                                rows="8"
                                :class="{ 'is-invalid': form.errors.has('categoryDescription') }"
                            ></textarea>
                            <has-error :form="form" field="categoryDescription"></has-error>
                            <span class="text-danger"></span>
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
                            <button type="submit" class="btn btn-success btn-block" name="">Update Category Info</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "Edit",
        mounted(){
            axios.get(`/category/edit/${this.$route.params.categoryid}`)
                .then((response)=>{
                    this.form.fill(response.data.categoryById)
                })
        },
        data(){
            return {
                form: new Form({
                    categoryName:'',
                    categoryDescription:'',
                    publicationStatus:''
                })
            }
        },
        methods:{
            updateCategory(){
                axios.post(`/category/update/${this.$route.params.categoryid}`,  this.form)
                    .then((response)=>{
                        this.$router.push('/category/list')
                        toast({
                            type: 'success',
                            title: 'Category Updated successfully'
                        })
                    })
                    .catch(()=>{

                    })
            }
        }
    }
</script>