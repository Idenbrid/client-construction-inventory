<template>
    <section class="section-registration">
        <div class="container-fluid p-0">
            <div class="main-content main-content-bg">

                <div class="master-registration-title">
                    <h5 class="text-white">資材置き場マスタ登録</h5>
                </div>
                <div class="master-registration-form">

                    <div class="row master-reg-row">
                        <div class="col-sm-12 col-md-12 col-lg-6 master-form-col">
                            <div class="master-registration-left-content">
                                <div class="master-registration-input-content">
                                    <span>資材置き場名称</span>
                                    <input v-model="record.warehouse_name" class="master-reg-input" type="text"
                                        name="資材置き場名称" id="資材置き場名称" placeholder="テキスト">
                                    <small>
                                        <span v-if="errors.warehouse_name != null" class="text-danger float-left">
                                            {{errors.warehouse_name[0]}}
                                        </span>
                                    </small>
                                </div>
                                <div class="register-buttons">
                                <div v-if="record.id == 0"><a class="register-btn" @click="handleSave()">登録</a>
                                </div>
                                <div v-else><a class="update-btn" @click="handleUpdate()">アップデート</a></div>
                                <div><a class="clear-btn" @click="clear()">削除</a></div>
                            </div>
                            </div>
                            
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="master-registration-right-contet">
                                <table class="registration-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>置き場名称</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, index) in list" :key="index">
                                            <td>{{index+1}}</td>
                                            <td>{{item.warehouse_name}}</td>
                                            <td>
                                                <div class="btn-grouped">
                                                <a class="btn" @click="deleteWarehouse(item.id)"><i
                                                        class="fa-solid fa-trash-can delete-icon"></i> </a>
                                                <a class="btn" @click="editWarehouse(item)"><i class="fas fa-edit" aria-hidden="true"></i></a>
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
                record: {
                    warehouse_name: '',
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
            editWarehouse(item) {
                this.record.id = item.id;
                this.record.warehouse_name = item.warehouse_name;
            },
            handleSave() {
                Swal.fire({
                    text: 'Please Wait...',
                    didOpen: () => {
                        Swal.showLoading()
                    },
                })
                axios.post("/api/warehouse", this.record)
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
                                title: 'Warehouse has been registered successfully.',
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
                axios.patch("/api/warehouse/update", this.record)
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
                                title: 'Warehouse has been updated successfully...',
                            })
                            this.getList()
                        }
                    })
            },
            clear() {
                this.record = {
                    warehouse_name: '',
                    id: 0,
                };
                this.errors = [];
            },
            getList() {
                axios.get("/api/warehouse")
                    .then((response) => {
                        this.list = response.data
                    })
            },
            deleteWarehouse(id) {
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
                        axios.delete("/api/warehouse/" + id)
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
                                        'Warehouse not found. Please reload the page and try agian. Thanks',
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
.master-registration-left-content{
    display: inline-block;
}
    .master-registration-input-content span {
        margin-right: 30px;
        color: #000000;
        font-size: 16px;
        letter-spacing: 0.15px;
    }

    .master-reg-input {
        padding: 6.5px 16.5px;
        height: 48px;
        border: 1px solid #0000001F;
        border-radius: 4px;
        width: 219px;
    }

    .master-registration-form {
        background-color: #fff;
        border-radius: 4px;
        box-shadow: 0px 3px 6px var(--black);
        padding: 40px 0px 48px 48px;
    }

    .master-registration-content {
        padding: 24px;
        background-image: url(assets/images/bg-img.png);
    }

    thead tr th {
        width: 130px;
        text-align: center;
        background: black;
        color: #ffffff;
        font-size: 12px;
        padding: 8px 0px;
    }

    tbody tr {
        margin: 12px auto !important;
    }

    tbody tr td {
        text-align: center;
        /* text-align: left; */
        font-size: 12px;
        letter-spacing: 0px;
        color: #000000;
        opacity: 1;
    }

    tbody tr td:nth-child(2) {
        width: 430px;
        text-align: center;
    }

    /* BUTTONS  */
    .register-buttons {
        margin-top: 13px;
        display: flex;
        gap: 10px;
        justify-content: flex-end;

    }

    .reg-button {
        border: none;
        border-radius: 5px;
        padding: 0px;
        width: 56px;
        height: 30px;
        font-size: 12px;
        font-family: NotoSansJP-Medium;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        background: #BEA000;

    }

    .clear-button {
        border: none;
        border-radius: 5px;
        padding: 0px;
        width: 56px;
        height: 30px;
        font-size: 12px;
        font-family: NotoSansJP-Medium;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        background: #000000;
        color: #ffffff;
    }

    @media only screen and (max-width:768px) {
        .master-reg-row {
            flex-direction: column;
        }
        .master-registration-form{
            padding: 40px 8px 48px 8px;
        }
    }
</style>