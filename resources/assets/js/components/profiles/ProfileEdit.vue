
<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Edit Profile</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Name</label>
                            <input type="text" v-model="profile.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Email</label>
                            <input type="text" v-model="profile.email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Password</label>
                            <input type="text" v-model="profile.password" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.profileId = id;
            axios.get('/api/v1/profile/' + id)
                .then(function (resp) {
                    app.profile = resp.data;
                })
                .catch(function () {
                    alert("Could not load your profile")
                });
        },
        data: function () {
            return {
                profileId: null,
                profile: {
                    name: '',
                    email: '',
                    password: '',
                }
            }
        },
        methods: {
            saveForm() {
                var app = this;
                var newProfile = app.profile;
                axios.patch('/api/v1/profile/' + app.profileId, newProfile)
                    .then(function (resp) {
                        app.$router.replace('/profile');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your profile");
                    });
            }
        }
    }
</script>
