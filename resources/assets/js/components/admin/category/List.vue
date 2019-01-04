<template>
    <div>
        <hr/>
        <h4 class="text-center text-success"></h4>
        <hr/>
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
                <tr v-for="(category,index) in getallCategory" :key="category.id">
                    <td scope="row">{{index+1}}</td>
                    <td>{{category.categoryName}}</td>
                    <td>{{category.categoryDescription}}</td>
                    <td><p v-if="category.publicationStatus == 1">Published</p><p v-else>Unpublished</p></td>
                    <td>
                        <router-link :to="`/category/edit/${category.id}`" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></router-link>
                        <a href="#" class="btn btn-danger" @click.prevent = "deleteCategory(category.id)" >
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
        mounted(){
            this.$store.dispatch("allCategory")
        },
        computed:{
           getallCategory(){
               return this.$store.getters.getCategory
           }
        },
        methods:{
            deleteCategory(id){
               axios.get('/category/delete/'+id)
                   .then(()=>{
                       this.$store.dispatch("allCategory")
                       toast({
                           type: 'success',
                           title: 'Category Deleted successfully'
                       })
                   })
                   .catch(()=>{

                   })
            }
        }
    }
</script>

<style scoped>
</style>