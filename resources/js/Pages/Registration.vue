<template>
    <!-- Page content-->
    <div class="container-fluid p-0">
        <div class="main-content main-content-bg">
            <h1 class="content-h1">アカウント登録</h1>
            <div class="gmaccount-reg-content">
                <div class="container-fluid p-0">
                    <div class="master-reg-row">
                        <div class="master-reg-form">
                            <div class="registration-left-content">
                                <div class="account-input-content">
                                    <div class="account-reg-lablel">
                                        <label for="">アカウント名</label>
                                    </div>
                                    <div class="account-reg-input">
                                        <input type="text" name="user_name" v-model="user.user_name" placeholder="テキスト">
                                        <small>
                                            <span v-if="errors.user_name != null" class="text-danger float-left">
                                                {{errors.user_name[0]}}
                                            </span>
                                        </small>
                                    </div>
                                </div>
                                <div class="account-input-content">
                                    <div class="account-reg-lablel"> <label for="">アカウントID</label></div>
                                    <div class="account-reg-input">
                                        <input type="number" name="login_id" v-model="user.login_id" placeholder="123" min="0">
                                        <small>
                                            <span v-if="errors.login_id != null" class="text-danger float-left">
                                                {{errors.login_id[0]}}
                                            </span>
                                        </small>
                                    </div>
                                </div>
                                <div class="account-input-content">
                                    <div class="account-reg-lablel">
                                        <label for="">パスワード</label>
                                    </div>
                                    <div class="account-reg-input">
                                        <input type="password" name="password" v-model="user.login_password"
                                            placeholder="テキスト">
                                        <small>
                                            <span v-if="errors.login_password != null" class="text-danger float-left">
                                                {{errors.login_password[0]}}
                                            </span>
                                        </small>
                                    </div>
                                </div>
                                <div class="account-input-content">
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
                                    <div v-if="user.id == 0"><a class="register-btn" @click="handleRegister()">登録</a>
                                    </div>
                                    <div v-else><a class="update-btn" @click="handleUpdate()">アップデート</a></div>
                                    <div><a class="clear-btn" @click="clear()">削除</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="table-col">
                            <table class="registration-table">
                                <tr class="f-12-regular">
                                    <th>#</th>
                                    <th>アカウント名</th>
                                    <th>アカウントID</th>
                                    <th>権限</th>
                                </tr>
                                <tr class="f-12-regular td-color" v-for="(user, index) in list" :key="index">
                                    <td>{{index+1}}</td>
                                    <td>{{user.user_name}}</td>
                                    <td>{{user.login_id}}</td>
                                    <td>
                                        <div class="btn-grouped">
                                            <a class="btn" @click="deleteUser(user.id)"><i
                                                    class="fa-solid fa-trash-can delete-icon"></i> </a>
                                            <a class="btn" @click="editUser(user)"><i
                                                    class="fa-solid fa-pen-to-square edit-icon"></i></a>
                                        </div>
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
            editUser(item) {
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
                                if (response.data.success == true) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Your data has been deleted.',
                                        'success'
                                    )
                                    this.getList()
                                } else {
                                    if(response.data.message == 'inUse'){
                                        Swal.close()
                                        Swal.fire({
                                            icon: 'info',
                                            title: "User can't delete because User has some orders.",
                                        })
                                    }else{
                                        Swal.close()
                                        Swal.fire(
                                            'Error!',
                                            'User not found. Please reload the page and try agian. Thanks',
                                            'error'
                                        )
                                    }
                                }

                            })
                    }
                })

            },
        },
    }
</script>