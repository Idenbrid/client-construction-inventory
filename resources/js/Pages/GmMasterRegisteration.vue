<template>
    <!-- Page content-->
    <div class="container-fluid p-0">
        <div class="main-content main-content-bg">
            <h1 class="content-h1">発生資材マスタ登録</h1>
            <div class="gmaccount-reg-content">
                <div class="conrainer">
                    <div class="master-reg-row">
                        <div class="master-reg-form">
                            <div class="row mb-3 align-items-center">
                                <div class="col-md-4">
                                    <div class="master-input-content">
                                        <label for="">分類</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="generated-reg-input">
                                        <input v-model="item.category" type="text" name="分類" id="分類" placeholder="テキスト">
                                    </div>
                                    <small>
                                        <span v-if="errors.category != null" class="text-danger float-left">
                                            {{errors.category[0]}}
                                        </span>
                                    </small>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="master-input-content">
                                        <label for="">メーカー</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="generated-reg-input">
                                        <input v-model="item.manufacturer" type="text" name="メーカー" id="メーカー"
                                            placeholder="テキスト">
                                    </div>
                                    <small>
                                        <span v-if="errors.manufacturer != null" class="text-danger float-left">
                                            {{errors.manufacturer[0]}}
                                        </span>
                                    </small>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="master-input-content">
                                        <label for="">品名</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="generated-reg-input">
                                        <input v-model="item.item_name" type="text" name="品名" id="品名"
                                            placeholder="テキスト">
                                    </div>
                                    <small>
                                        <span v-if="errors.item_name != null" class="text-danger float-left">
                                            {{errors.item_name[0]}}
                                        </span>
                                    </small>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="master-input-content">
                                        <label for="">型番</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="generated-reg-input">
                                        <input v-model="item.item_number" type="text" name="型番" id="型番"
                                            placeholder="テキスト">
                                    </div>
                                    <small>
                                        <span v-if="errors.item_number != null" class="text-danger float-left">
                                            {{errors.item_number[0]}}
                                        </span>
                                    </small>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="master-input-content">
                                        <label for="">単位</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <ul class="model-no-list">
                                        <li>
                                            <div class="form-check">
                                                <input v-model="item.unit" type="radio" value="m"
                                                    class="form-check-input" id="m" name="m" />
                                                <label class="form-check-label" for="m">m</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input v-model="item.unit" type="radio" value="本"
                                                    class="form-check-input" id="book" name="book" />
                                                <label class="form-check-label" for="book">本</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input v-model="item.unit" type="radio" value="個"
                                                    class="form-check-input" id="male" name="indivual" />
                                                <label class="form-check-label" for="indivual">個</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input v-model="item.unit" type="radio" value="箱"
                                                    class="form-check-input" id="box" name="box" />
                                                <label class="form-check-label" for="box">箱</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input v-model="item.unit" type="radio" value="袋"
                                                    class="form-check-input" id="bag" name="bag" />
                                                <label class="form-check-label" for="bag">袋</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input v-model="item.unit" type="radio" value="台"
                                                    class="form-check-input" id="tower" name="tower" />
                                                <label class="form-check-label" for="tower">台</label>
                                            </div>
                                        </li>
                                        <small>
                                            <span v-if="errors.unit != null" class="text-danger float-left">
                                                {{errors.unit[0]}}
                                            </span>
                                        </small>
                                    </ul>
                                    <div class="account-reg-buttons">

                                        <div v-if="item.id == 0"><a class="register-btn" @click="handleSave()">登録</a>
                                        </div>
                                        <div v-else><a class="update-btn" @click="handleUpdate()">アップデート</a></div>
                                        <div><a class="clear-btn" @click="clear()">削除</a></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="table-col">
                            <table class="registration-table">
                                <tr>
                                    <th>Sr.</th>
                                    <th>分類</th>
                                    <th>メーカー</th>
                                    <th>品名</th>
                                    <th>型番</th>
                                    <th></th>
                                </tr>
                                <tr v-for="(item, index) in list" :key="index">
                                    <td>{{index+1}}</td>
                                    <td>{{item.category}}</td>
                                    <td>{{item.manufacturer}}</td>
                                    <td>{{item.item_name}}</td>
                                    <td>{{item.item_number}}</td>
                                    <td>
                                        <div class="btn-grouped">
                                            <a class="btn" @click="deleteItem(item.id)"><i
                                                    class="fa-solid fa-trash-can delete-icon"></i> </a>
                                            <a class="btn " @click="editItem(item)"><i class="fas fa-edit"></i></a>
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
                item: {
                    category: '',
                    manufacturer: '',
                    item_name: '',
                    item_number: '',
                    unit: '',
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
            editItem(item) {
                this.item.id = item.id;
                this.item.category = item.category;
                this.item.manufacturer = item.manufacturer;
                this.item.item_name = item.item_name;
                this.item.item_number = item.item_number;
                this.item.unit = item.unit;
            },
            handleSave() {
                Swal.fire({
                    text: 'Please Wait...',
                    didOpen: () => {
                        Swal.showLoading()
                    },
                })
                axios.post("/api/item", this.item)
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
                                title: 'Item has been registered successfully.',
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
                axios.patch("/api/item/update", this.item)
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
                                title: 'Item has been updated successfully...',
                            })
                            this.getList()
                        }
                    })
            },
            clear() {
                this.item = {
                    category: '',
                    manufacturer: '',
                    item_name: '',
                    item_number: '',
                    unit: '',
                    id: 0,
                };
                this.errors = [];
            },
            getList() {
                axios.get("/api/item")
                    .then((response) => {
                        this.list = response.data
                    })
            },
            deleteItem(id) {
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
                        axios.delete("/api/item/" + id)
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
                                        'Item not found. Please reload the page and try agian. Thanks',
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
    /* input[name="bag"] {
	accent-color: red;
} */
    .master-input-content label {
        margin-bottom: 8px;
    }

    .btn-grouped .btn {
        padding: 0px;
    }

    .btn-grouped {
        display: flex;
        gap: 10px;
        justify-content: center;
    }

    .delete-btn,
    .register-btn {
        width: 56px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 2px;
        color: #fff;
    }

    .clear-btn {
        background-color: #000000;
        border: 1px solid #000000;
        color: #fff;
        width: 71px;
        height: 42px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .clear-btn:hover,
    .register-btn:hover {
        text-decoration: none;
        color: #fff;
    }

    .register-btn {
        background-color: #BEA000;
        border: 1px solid #BEA000;
        color: #fff;
        width: 71px;
        height: 42px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .update-btn:hover {
        text-decoration: none;
        color: #fff;
    }

    .update-btn {
        background-color: #2F9456;
        border: 1px solid #2F9456;
        color: #fff;
        width: 110px;
        height: 42px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .model-no-list {
        display: flex;
        flex-wrap: wrap;
    }

    .master-reg-row {
        display: flex;
        justify-content: space-between;
    }

    .master-reg-form {
        width: 40%;

    }

    .table-col {
        width: 50%;
    }

    .gmaccount-reg-content {
        background-color: #fff;
        border-radius: 4px;
        box-shadow: 0px 3px 6px var(--black);
        padding: 40px 0px 48px 48px;
    }

    .generated-reg-input input {
        height: 37px;
        width: 100%;
        max-width: 100%;
        padding: 0px 15px;
        color: #00000099;
        border: 1px solid #0000001F;
        border-radius: 4px;
    }

    .master-input-content {
        gap: 30px;

        display: inline-flex;
        width: 110px;
    }

    .registration-left-content {
        display: flex;
        flex-direction: column;
    }

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

    .account-reg-buttons {
        margin-top: 20px;
    }

    @media screen and (max-width: 768px) {
        .master-reg-row {
            flex-direction: column;
        }

        .table-col {
            width: 100%;
        }

        .master-reg-form {
            width: 100%;
            margin-bottom: 45px;
        }

        .gmaccount-reg-content {
            padding: 40px 8px 48px 8px;
        }

    }

    /* ****************** ACCOUNTS REGISTRATION CSS END ************* */
</style>