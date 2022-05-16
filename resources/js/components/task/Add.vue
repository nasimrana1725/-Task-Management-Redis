<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Category</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" v-model="category.title">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control" v-model="category.description">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Assign To</label>
                                    <select v-model="category.assignedTo" class="form-control">
                                        <option value="">select</option>
                                        <template v-for="(user, index) in  RequiredDataList">
                                            <option ></option>
                                            <option :value="user.id">{{user.name}}</option>
                                        </template>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:"add-task",
        data(){
            return {
                category:{
                    title:"",
                    description:"",
                    assignedTo:"",

                    requiredData: []
                },
                RequiredDataList: [],

            }
        },
        methods:{
            create(){
                this.axios.post('/api/task',this.category).then(response=>{
                    this.$router.push({name:"taskList"})
                }).catch(error=>{
                    console.log(error);
                })
            },

            requiredDataListGet: function () {
                const _this = this;
                let URL = baseUrl + '/required_data';
                axios.get(URL).then(response => {
                    this.RequiredDataList = response.data;
                    console.log(RequiredDataList);

                }).catch(function (error) {
                    console.log(error);
                    // _this.RequiredDataList = {};
                    // _this.$toastr('error', 'Whoops..!! something went wrong', 'Error');
                });
            }
        },
        mounted() {
            this.requiredDataListGet();
        }
    }
</script>
