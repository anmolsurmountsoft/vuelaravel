<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createStudents'}" class="btn btn-success">Create new Student</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Student list</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="student, index in students">
                        <td>{{ student.name }}</td>
                        <td>{{ student.email }}</td>
                        <td>{{ student.phone }}</td>
                        <td>{{ student.address }}</td>
                        <td>
                            <router-link :to="{name: 'editStudents', params: {id: student.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(student.id, index)">
                                Delete
                            </a>
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
                students: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/students/all',{ headers: {"Authorization" : "Basic YWRtaW5AZXhhbXBsZS5vcmc6QWRtaW5AMTIzNA=="}})
                .then(function (resp) {
                    app.students = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load students");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/students/delete/' + id,{ headers: {"Authorization" : "Basic YWRtaW5AZXhhbXBsZS5vcmc6QWRtaW5AMTIzNA=="}})
                        .then(function (resp) {
                            app.students.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete students");
                        });
                }
            }
        }
    }
</script>
