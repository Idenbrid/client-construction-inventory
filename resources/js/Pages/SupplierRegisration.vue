<template>
    <div class="container-fluid p-0">
        <div class="main-content main-content-bg">
        
                <div class="advance-master-registration-title">
                    <h5 class="text-white">発注先マスタ登録</h5>
                </div>
                <div class="advance-master-registration-form">
                    <div class="container">
                        <div class="row master-reg-row">
                            <div class="col-sm-12 col-md-12 col-lg-6  my-auto mb-4">
                                <div class="advance-master-registration-left-contet">
                                    <div class="advance-master-registration-input-content">
                                        <span>発注先名称</span>
                                        <input class="advance-master-reg-input" type="text" name="発注先名称" id="発注先名称" v-model="record.supplier_name"
                                            placeholder="テキスト">
                                    </div>
                                    <small>
                                        <span v-if="errors.supplier_name != null" class="text-danger float-left">
                                            {{errors.supplier_name[0]}}
                                        </span>
                                    </small>
                                </div>
                                <div class="register-buttons">
                                    <div v-if="record.id == 0"><a class="btn btn-success" @click="handleSave()">登録</a></div>
                                    <div v-else><a class="btn btn-success" @click="handleUpdate()">update</a></div>
                                    <div><a class="btn btn-danger" @click="clear()">Clear</a></div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6 mt-4">
                                <div class="master-registration-right-contet">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>発注先</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in list" :key="index">
                                                <td>{{index+1}}</td>
                                                <td>{{item.supplier_name}}</td>
                                                <td>
                                                    <a class="btn" @click="deleteSupplier(item.id)"><i class="fa-solid fa-trash-can delete-icon"></i> </a>
                                                    <a class="btn btn-primary btn-sm" @click="editSupplier(item)">edit</a>
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
            editSupplier(item){
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
    .advance-master-registration-input-content span {
        margin-right: 30px;
        color: #000000;
        font-size: 16px;
        letter-spacing: 0.15px;
    }

    .advance-master-reg-input {
        padding: 6.5px 16.5px;
        height: 48px;
        border: 1px solid #0000001F;
        border-radius: 4px;
    }

    .advance-master-registration-form {
        padding: 12px 0px 12px 0px;
        background: #ffffff;
    }

    .advance-master-registration-content {
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
        padding: 10px 0px;
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
        /* margin-left: 246px; */

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
    }
</style>