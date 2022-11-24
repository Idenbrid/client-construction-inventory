<template>
    <div class="container-fluid p-0">
        <div class="main-content main-content-bg">

            <div class="advance-master-registration-title">
                <h5 class="content-h1">発注先マスタ登録</h5>
            </div>
            <div class="master-registration-form">

                <div class="master-reg-row">
                    <div class="master-reg-form">
                        <div class="account-input-content">
                            <div class="account-reg-lablel">
                                <label class="f-16-regular mb-0">発注先名称</label>
                            </div>
                            <div class="account-reg-input">
                                <input class="master-reg-input" type="text" name="発注先名称" id="発注先名称"
                                    v-model="record.supplier_name" placeholder="テキスト">
                                <small>
                                    <span v-if="errors.supplier_name != null" class="text-danger float-left">
                                        {{errors.supplier_name[0]}}
                                    </span>
                                </small>
                            </div>

                        </div>
                        <div class="register-buttons">
                            <div v-if="record.id == 0"><a class="register-btn" @click="handleSave()">登録</a></div>
                            <div v-else><a class="update-btn" @click="handleUpdate()">アップデート</a></div>
                            <div><a class="clear-btn" @click="clear()">削除</a></div>
                        </div>
                    </div>
                    <div class="table-col">
                        <div class="master-registration-right-contet">
                            <table class="registration-table">
                                <thead>
                                    <tr class="f-12-regular">
                                        <th>#</th>
                                        <th>発注先</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="f-12-regular" v-for="(item, index) in list" :key="index">
                                        <td>{{index+1}}</td>
                                        <td>{{item.supplier_name}}</td>
                                        <td>
                                            <div class="btn-grouped">
                                                <a class="btn" @click="deleteSupplier(item.id)"><i
                                                        class="fa-solid fa-trash-can delete-icon"></i> </a>
                                                <a class="btn" @click="editSupplier(item)"><i
                                                        class="fas fa-edit edit-icon" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
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
                record: {
                    supplier_name: '',
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
            editSupplier(item) {
                this.record.id = item.id;
                this.record.supplier_name = item.supplier_name;
            },
            handleSave() {
                Swal.fire({
                    text: 'Please Wait...',
                    didOpen: () => {
                        Swal.showLoading()
                    },
                })
                axios.post("/api/supplier", this.record)
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
                                title: 'Supplier has been registered successfully.',
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
                axios.patch("/api/supplier/update", this.record)
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
                                title: 'Supplier has been updated successfully...',
                            })
                            this.getList()
                        }
                    })
            },
            clear() {
                this.record = {
                    supplier_name: '',
                    id: 0,
                };
                this.errors = [];
            },
            getList() {
                axios.get("/api/supplier")
                    .then((response) => {
                        this.list = response.data
                    })
            },
            deleteSupplier(id) {
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
                        axios.delete("/api/supplier/" + id)
                            .then((response) => {
                                if (response.data.success == true) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Your data has been deleted.',
                                        'success'
                                    )
                                    this.getList()
                                } else {
                                    Swal.fire(
                                        'Error!',
                                        'Supplier not found. Please reload the page and try agian. Thanks',
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

</style>