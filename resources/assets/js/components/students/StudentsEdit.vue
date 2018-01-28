<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Create new Student</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
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
                            <label class="control-label">Student Phone Number</label>
                            <input type="text" v-model="student.phone" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Student address</label>
                            <input type="text" v-model="student.address" class="form-control">
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
            app.studentId = id;
            axios.get('/api/students/edit/' + id,{ headers: {"Authorization" : "Basic YWRtaW5AZXhhbXBsZS5vcmc6QWRtaW5AMTIzNA=="}})
                .then(function (resp) {
                    app.student = resp.data;
                })
                .catch(function () {
                    alert("Could not load your student")
                });
        },
        data: function () {
            return {
                studentId: null,
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
                axios.post('/api/students/update/' + app.studentId, newStudent,{ headers: {"Authorization" : "Basic YWRtaW5AZXhhbXBsZS5vcmc6QWRtaW5AMTIzNA=="}})
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your Student");
                    });
            }
        }
    }
</script>
