<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Category</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
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
                                <button type="submit" class="btn btn-primary">Update</button>
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
        name:"update-category",
        data(){
            return {
                category:{
                    title:"",
                    description:"",
                    assignedTo:"",
                    _method:"patch"
                },
                RequiredDataList: [],
            }
        },
        mounted(){
            this.showCategory();
                this.requiredDataListGet();
        },
        methods:{
            async showCategory(){
                await this.axios.get(`/api/task/${this.$route.params.id}`).then(response=>{
                    const { title, description } = response.data
                    this.category.title = title
                    this.category.description = description
                }).catch(error=>{
                    console.log(error)
                })
            },
            async update(){
                await this.axios.post(`/api/task/${this.$route.params.id}`,this.category).then(response=>{
                    this.$router.push({name:"taskList"})
                }).catch(error=>{
                    console.log(error)
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
                });
            }
        }
    }
</script>
