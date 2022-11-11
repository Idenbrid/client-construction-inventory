<template>
    <!-- Page content-->
    <div class="container-fluid p-0">
        <div class="main-content main-content-bg">
            <h1 class="content-h1">アカウント登録</h1>
            <div class="account-reg-content">
                <div class="conrainer">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="registration-left-content">
                                <div class="d-flex align-items-center account-input-content">
                                    <div class="account-reg-lablel">
                                        <label for="">アカウント名</label>
                                    </div>
                                    <div class="accout-reg-input">
                                        <input type="text" name="user_name" v-model="user.user_name" placeholder="テキスト">
                                        <small>
                                            <span v-if="errors.user_name != null" class="text-danger float-left">
                                                {{errors.user_name[0]}}
                                            </span>
                                        </small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center  account-input-content">
                                    <div class="account-reg-lablel"> <label for="">アカウントID</label></div>
                                    <div class="accout-reg-input">
                                        <input type="text" name="login_id" v-model="user.login_id" placeholder="テキスト">
                                        <small>
                                            <span v-if="errors.login_id != null" class="text-danger float-left">
                                                {{errors.login_id[0]}}
                                            </span>
                                        </small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center account-input-content">
                                    <div class="account-reg-lablel">
                                        <label for="">Password</label>
                                    </div>
                                    <div class="accout-reg-input">
                                        <input type="password" name="password" v-model="user.login_password"
                                            placeholder="テキスト">
                                        <small>
                                            <span v-if="errors.login_password != null" class="text-danger float-left">
                                                {{errors.login_password[0]}}
                                            </span>
                                        </small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center account-input-content">
                                    <div class="account-reg-lablel"> <label for="">タイプ</label></div>
                                    <ul class="switch-div">
                                        <li class="switch-btns-registration">
                                            <div class="mr-1">
                                                <input type="radio" class="btn-check" value="manager"
                                                    v-model="user.type" name="type" id="job-on" autocomplete="on">
                                                <label class="on-radio-btn-reg" for="job-on">管理者</label>
                                            </div>
                                            <div class="mr-1">
                                                <input type="radio" class="btn-check" value="normal" v-model="user.type"
                                                    name="type" id="job-off" autocomplete="off">
                                                <label class="off-radio-btn-reg" for="job-off">一般</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="account-reg-buttons">
                                    <div v-if="user.id == 0"><a class="btn btn-success" @click="handleRegister()">登録</a></div>
                                    <div v-else><a class="btn btn-success" @click="handleUpdate()">update</a></div>
                                    <div><a class="btn btn-danger" @click="clear()">Clear</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <table class="registration-table">
                                <tr>
                                    <th>#</th>
                                    <th>アカウント名</th>
                                    <th>アカウントID</th>
                                    <th>action</th>
                                </tr>
                                <tr v-for="(user, index) in list" :key="index">
                                    <td>{{index+1}}</td>
                                    <td>{{user.user_name}}</td>
                                    <td>{{user.login_id}}</td>
                                    <td>
                                        <a class="btn" @click="deleteUser(user.id)"><i class="fa-solid fa-trash-can delete-icon"></i> </a>
                                        <a class="btn btn-primary btn-sm" @click="editUser(user)">edit</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from "axios";
    export default {
        data() {
            return {
                user: {
                    user_name: "",
                    login_id: "",
                    login_password: "",
                    type: "normal",
                    id: 0,
                },
                errors: [],
                list: [],
            }
        },
        created() {
            this.getList()
        },
        methods: {
            editUser(item){
                this.user.id = item.id;
                this.user.login_id = item.login_id;
                this.user.type = item.type;
                this.user.user_name = item.user_name;
            },
            handleRegister() {
                Swal.fire({
                    text: 'Please Wait...',
                    didOpen: () => {
                        Swal.showLoading()
                    },
                })
                axios.post("/api/user/register", this.user)
                    .then((response) => {
                        if (response.data.success == false) {
                            Swal.close()
                            this.errors = response.data.errors
                        } else {
                            Swal.close()
                            this.clear()
                            this.errors = [];
                            Swal.fire({
                                icon: 'success',
                                title: 'User has been registered successfully.',
                            })
                            this.getList()
                        }
                    })
            },
            handleUpdate() {
                Swal.fire({
                    text: 'Please Wait...',
                    didOpen: () => {
                        Swal.showLoading()
                    },
                })
                axios.post("/api/user/update", this.user)
                    .then((response) => {
                        if (response.data.success == false) {
                            Swal.close()
                            this.errors = response.data.errors
                        } else {
                            Swal.close()
                            this.clear()
                            this.errors = [];
                            Swal.fire({
                                icon: 'success',
                                title: 'User has been updated successfully...',
                            })
                            this.getList()
                        }
                    })
            },
            clear() {
                this.user = {
                    user_name: "",
                    id: 0,
                    login_id: "",
                    login_password: "",
                    type: "normal",
                };
                this.errors = [];
            },
            getList() {
                axios.get("/api/user/list")
                .then((response) => {
                    this.list = response.data
                })
            },
            deleteUser(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.get("/api/user/delete/" + id)
                        .then((response) => {
                            if(response.data.success == true){
                                Swal.fire(
                                    'Deleted!',
                                    'Your data has been deleted.',
                                    'success'
                                )
                                this.getList()
                            }else{
                                Swal.fire(
                                    'Error!',   
                                    'User not found. Please reload the page and try agian. Thanks',
                                    'error'
                                )
                            }
                            
                        })
                    }
                })
                
            },
        },
    }
</script>
<style>
    /* ****************** ACCOUNTS REGISTRATION CSS STRAT ************* */
    .registration-table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .registration-table td,
    .registration-table th {
        /* border: 1px solid #ddd; */
        padding: 8px;
        font-size: 12px;
        text-align: center;
    }

    .registration-table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .registration-table tr:hover {
        background-color: #ddd;
    }

    .registration-table th {

        text-align: left;
        background-color: black;
        color: white;
        height: 32px;
        font-size: 12px;
        text-align: center;
    }
    .delete-icon{
        color: red;
        font-size: 16px;
    }
    .account-reg-lablel{
        width: 96px;
    }
    /* ****************** ACCOUNTS REGISTRATION CSS END ************* */
</style>