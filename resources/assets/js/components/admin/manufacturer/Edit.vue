<template>
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center">Edit Manufacturer</h3>
            <h4 class="text-center text-success"></h4>
            <hr/>
            <div class="well">
                <form role="form" class="form-horizontal" @submit.prevent="updateManufacturer()">
                    <div class="form-group">
                        <label for="manufacturerName" class="col-sm-2 control-label">Manufacturer Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" v-model="form.manufacturerName" name="manufacturerName" :class="{ 'is-invalid': form.errors.has('manufacturerName') }">
                            <has-error :form="form" field="manufacturerName"></has-error>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="manufacturerDescription" class="col-sm-2 control-label">Manufacturer Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" v-model="form.manufacturerDescription" name="manufacturerDescription" rows="8" :class="{ 'is-invalid': form.errors.has('manufacturerDescription') }"></textarea>
                            <has-error :form="form" field="manufacturerDescription"></has-error>
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
                    this.form.fill(response.data.manufacturerById)
                })
        },
        data(){
            return {
                form: new Form({
                    manufacturerName:'',
                    manufacturerDescription:'',
                    publicationStatus: ''
                })
            }
        },
        methods:{
            updateManufacturer(){
                axios.post(`/manufacturer/update/${this.$route.params.manufacturerid}`,  this.form)
                    .then((response)=>{
                        this.$router.push('/manufacturer-list')
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