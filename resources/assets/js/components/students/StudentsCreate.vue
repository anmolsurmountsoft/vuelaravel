<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Create new user</div>
            <div class="panel-body">
                <form v-on:submit.prevent="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Student name</label>
                            <input type="text" v-model="student.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Student email</label>
                            <input type="text" v-model="student.email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">User Phone Number</label>
                            <input type="text" v-model="student.phone" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">User Address</label>
                            <input type="text" v-model="student.address" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>




<script>
    export default {
        data: function () {
            return {
                student: {
                    name: '',
                    email: '',
                    phone : '',
                    address : ''
                }
            }
        },
        methods: {
            saveForm() {
                var app = this;
                var newStudent = app.student;
                axios.post('/api/students/create', newStudent,{ headers: {"Authorization" : "Basic YWRtaW5AZXhhbXBsZS5vcmc6QWRtaW5AMTIzNA=="}})
                    .then(function (resp) {
                        app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your student");
                    });
            }
        }
    }
</script>
