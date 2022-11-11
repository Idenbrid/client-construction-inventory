<template>
    <section class="section-registration">
        <div class="container">
            <div class="master-registration-content mt-2">
                <div class="master-registration-title">
                    <h5 class="text-white">資材置き場マスタ登録</h5>
                </div>
                <div class="master-registration-form">
                    <div class="container">
                        <div class="row master-reg-row">
                            <div class="col-sm-12 col-md-12 col-lg-6  my-auto mb-4">
                                <div class="master-registration-left-contet">
                                    <div class="master-registration-input-content">
                                        <span>資材置き場名称</span>
                                        <input v-model="record.warehouse_name" class="master-reg-input" type="text" name="資材置き場名称" id="資材置き場名称" placeholder="テキスト">
                                    </div>
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
                                                <th>置き場名称</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in list" :key="index">
                                                <td>{{index+1}}</td>
                                                <td>{{item.warehouse_name}}</td>
                                                <td>
                                                    <a class="btn" @click="deleteWarehouse(item.id)"><i class="fa-solid fa-trash-can delete-icon"></i> </a>
                                                    <a class="btn btn-primary btn-sm" @click="editWarehouse(item)">edit</a>
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
            editWarehouse(item){
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
                axios.post("/api/warehouse/save", this.record)
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
                axios.post("/api/warehouse/update", this.record)
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
                axios.get("/api/warehouse/list")
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
                        axios.get("/api/warehouse/delete/" + id)
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

.master-registration-input-content span {
    margin-right: 30px;
    color: #000000;
    font-size: 16px;
    letter-spacing: 0.15px;
}
.master-reg-input{
    padding: 6.5px  16.5px;
    height: 48px;
    border:1px solid #0000001F;
    border-radius: 4px;
}
    .master-registration-form {
        padding: 12px 0px 12px 0px;
        background: #ffffff;
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
    .register-buttons{
        margin-top: 13px;
    display: flex;
    gap: 10px;
    /* margin-left: 246px; */

    }
    .reg-button{
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
    .clear-button{
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
    @media only screen and (max-width:768px){
        .master-reg-row{
            flex-direction: column;
        }
    }
</style>