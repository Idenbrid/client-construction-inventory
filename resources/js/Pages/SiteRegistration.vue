<template>
    <section class="section-registration">
        <div class="container-fluid p-0">
            <div class="main-content main-content-bg">
        
                <div class="advance-master-registration-title">
                    <h5 class="content-h1">JOB番号・現場名登録</h5>
                </div>
                <div class="master-registration-form">           
                        <div class="master-reg-row">                     
                                <div class="master-reg-form">
                                    <div class="account-input-content">
                                        <div class="account-reg-lablel"><label>JOB番号</label></div>
                                        <div class="account-reg-input">
                                        <input class="master-reg-input" v-model="site.job_number" type="text" name="JOB番号" id="JOB番号" placeholder="テキスト">
                                        <small>
                                            <span v-if="errors.job_number != null" class="text-danger float-left">
                                                {{errors.job_number[0]}}
                                            </span>
                                        </small>
                                    </div>
                                    </div>
                                    <div class="account-input-content">
                                        <div class="account-reg-lablel">
                                            <label>現場名</label>
                                        </div>
                                        <div class="account-reg-input">
                                        <input class="master-reg-input" v-model="site.site_name" type="text" name="現場名" id="現場名" placeholder="テキスト">
                                        <small>
                                            <span v-if="errors.site_name != null" class="text-danger float-left">
                                                {{errors.site_name[0]}}
                                            </span>
                                        </small>
                                    </div>
                                    </div>
                                    <div class="register-buttons">
                                    <div v-if="site.id == 0"><a class="register-btn" @click="handleSave()">登録</a></div>
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
                                                <th>JOB番号</th>
                                                <th>現場名</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="f-12-regular" v-for="(site, index) in list" :key="index">
                                                <td>{{index+1}}</td>
                                                <td>{{site.job_number}}</td>
                                                <td>{{site.site_name}}</td>
                                                <td>
                                                    <div class="btn-grouped">
                                                    <a class="btn" @click="deleteSite(site.id)"><i class="fa-solid fa-trash-can delete-icon"></i> </a>
                                                    <a class="btn" @click="editSite(site)"><i class="fa-solid fa-pen-to-square edit-icon"></i></a>
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
    </section>
</template>
<script>
    import axios from "axios";
    export default {
        data() {
            return {
                site: {
                    job_number: '',
                    site_name: '',
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
            editSite(item) {
                this.site.id = item.id;
                this.site.job_number = item.job_number;
                this.site.site_name = item.site_name;
            },
            handleSave() {
                Swal.fire({
                    text: 'Please Wait...',
                    didOpen: () => {
                        Swal.showLoading()
                    },
                })
                axios.post("/api/site", this.site)
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
                                title: 'Site has been registered successfully.',
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
                axios.patch("/api/site/update", this.site)
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
                                title: 'Site has been updated successfully.',
                            })
                            this.getList()
                        }
                    })
            },
            clear() {
                this.site = {
                    job_number: '',
                    site_name: '',
                    id: 0,
                };
                this.errors = [];
            },
            getList() {
                axios.get("/api/site")
                    .then((response) => {
                        this.list = response.data
                    })
            },
            deleteSite(id) {
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
                        axios.delete("/api/site/" + id)
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
                                        'Site not found. Please reload the page and try agian. Thanks',
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
.f-12-regular th , .f-12-regular td{
font-size: 12px;
font-family: NotoSansJP-Regular;
font-weight: 400;
}
</style>
