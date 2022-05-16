<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid col-md-10">
                <router-link to="/" class="navbar-brand" href="#"> </router-link>
                <div class="collapse navbar-collapse">
                    <div class="navbar-nav">
                        <router-link exact-active-class="active" to="/admin/task" class="nav-item nav-link">Task</router-link>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
<!--                <router-link exact-active-class="active" href="/logout" class="nav-item nav-link">Logout</router-link>-->
                <a class="" href="/logout" style="color: #fff !important;text-decoration: none;">
                    <i class="fa fa-sign-out-alt fa-sm fa-fw mr-2" ></i>Logout
                </a>
            </div>
        </nav>
        <div class="container mt-5">
            <router-view></router-view>
        </div>
    </main>
</template>

<script>
    export default {
        name:"App",
        mounted() {

        }
    }
</script>

