<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Attandance</div>
                    <form :action="apiroute" method="post">
                            <input type="hidden" name="_token" :value="csrf">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Mark Attendance</th>
                                <th scope="col">Attendance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="student in students" :key="student.id">
                                    <td>{{ student.first_name }}</td>
                                    <td>{{ student.last_name }}</td>
                                    <td>
                                        <select :name="student.id">
                                            <option name="" value=""></option>
                                            <option value="present">Present</option>
                                            <option value="absent">Absent</option>
                                        </select>
                                    </td>
                                    <td>
                                        <p v-if="student.attendance == 'present'" class="btn btn-success">Present</p>
                                        <p v-else class="btn btn-danger">Absent</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit">Mark Attendance</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {

            // get api route from props
            const apiUrl = this._props.apiroute;

            // gets all students
            axios.get(apiUrl).then(res=>{
                if(res.status==200){
                    //save response to student array
                    this.students=res.data;
                }
                }).catch(err=>{
                    console.log(err)
                });

            // sanity check to see if component mounted
            console.log('Component mounted.')
        },
        data() {
            return{
                students: [],
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        props:['apiroute']
    }
</script>
