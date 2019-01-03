<template>
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center">Edit Manufacturer</h3>
            <h4 class="text-center text-success"></h4>
            <hr/>
            <div class="well">
                <form role="form" class="form-horizontal" @click.prevent="updateManufacturer()">
                    <div class="form-group">
                        <label for="manufacturerName" class="col-sm-2 control-label">Manufacturer Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="manufacturerName">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="manufacturerDescription" class="col-sm-2 control-label">Manufacturer Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="manufacturerDescription" rows="8"></textarea>
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
            
        },
        data(){
            return {
                form: new Form({
                    manufacturerName:'',
                    manufacturerDescription:''
                })
            }
        },
        methods:{
            updateManufacturer(){
                
            }
        }
    }
</script>