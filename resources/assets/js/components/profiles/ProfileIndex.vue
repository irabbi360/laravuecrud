<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">My Profile</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="profile, index in profiles">
                        <td>{{ profile.name }}</td>
                        <td>{{ profile.email }}</td>
                        <td>{{ profile.password }}</td>
                        <td>
                            <router-link :to="{name: 'editProfile', params: {id: profile.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                profiles: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/profile')
                .then(function (resp) {
                    app.profiles = resp.data;
                    console.log(resp, 'helloooo');
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load profiles");
                });
        },
    }
</script>