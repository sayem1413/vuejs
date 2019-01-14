<template>
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center">Edit Manufacturer</h3>
            <h4 class="text-center text-success"></h4>
            <hr/>
            <div class="well">
                <form role="form" class="form-horizontal" @submit.prevent="updatemanufacturer()">
                    <div class="form-group">
                        <label for="manufacturer_name" class="col-sm-2 control-label">Manufacturer Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" v-model="form.manufacturer_name" name="manufacturer_name" :class="{ 'is-invalid': form.errors.has('manufacturer_name') }">
                            <has-error :form="form" field="manufacturer_name"></has-error>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="manufacturer_description" class="col-sm-2 control-label">Manufacturer Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" v-model="form.manufacturer_description" name="manufacturer_description" rows="8" :class="{ 'is-invalid': form.errors.has('manufacturer_description') }"></textarea>
                            <has-error :form="form" field="manufacturer_description"></has-error>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <select
                                class="form-control"
                                name="active"
                                v-model="form.active"
                                :class="{ 'is-invalid': form.errors.has('active') }"
                            >
                                <option :value="null">Select Publication Status</option>
                                <option :value="1">Published</option>
                                <option :value="0">Unpublished</option>
                            </select>
                            <has-error :form="form" field="active"></has-error>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success btn-block" name="">Update Manufacturer Info</button>
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
            axios.get(`/manufacturer/edit/${this.$route.params.manufacturerid}`)
                .then((response)=>{
                    this.form.fill(response.data.manufacturer_by_id)
                })
        },
        data(){
            return {
                form: new Form({
                    manufacturer_name:'',
                    manufacturer_description:'',
                    active: ''
                })
            }
        },
        methods:{
            updatemanufacturer(){
                axios.post(`/manufacturer/update/${this.$route.params.manufacturerid}`,  this.form)
                    .then((response)=>{
                        this.$router.push('/manufacturer/list')
                        toast({
                            type: 'success',
                            title: 'Manufacturer Updated successfully'
                        })
                    })
                    .catch(()=>{

                    })
            }
        }
    }
</script>