<template>
    <!-- Page content-->
    <div class="container-fluid p-0">
        <div class="main-content main-content-bg">
            <h1 class="content-h1">1.　発注登録</h1>
            <div class="order-reg-card">
                <form class="order-register-form" @submit.prevent="handleOrder()">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-12 p-0">
                                <ul class="switch-div">
                                    <!-- ON OFF BUTTONS-->
                                    <ul class="switch-div on-off-buttons">
                                        <li class="switch-btns">
                                            <div class="mr-1">
                                                <input type="radio" class="btn-check" value="現物" name="options"
                                                    id="classification-on" autocomplete="off">
                                                <label class="on-radio-btn" for="classification-on">ON</label>
                                            </div>
                                            <div class="mr-0">
                                                <input type="radio" class="btn-check" value="信用" name="options"
                                                    id="classification-off" autocomplete="off">
                                                <label class="off-radio-btn" for="classification-off">OFF</label>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- ON OFF BUTTONS END-->
                                    <li class="form-fields">
                                        <div class="register-label align-items-center">JOB番号（選択）</div>
                                        <div class="order-input-field">
                                        <select v-model="order.job_number" class="input-border" name="cars" id="cars">
                                            <option v-for="site in sites" :value="site">{{site.job_number}}</option>
                                        </select>
                                        <small>
                                            <span v-if="errors.job_number != null" class="text-danger float-left">
                                                {{errors.job_number[0]}}
                                            </span>
                                        </small>
                                    </div>
                                    </li>
                                </ul>
                                <ul class="switch-div">
                                    <!-- ON OFF BUTTONS-->
                                    <ul class="switch-div on-off-buttons">
                                        <li class="switch-btns">
                                            <div class="mr-1">
                                                <input type="radio" class="btn-check" value="現物" name="options"
                                                    id="site-name-on" autocomplete="off">
                                                <label class="on-radio-btn" for="site-name-on">ON</label>
                                            </div>
                                            <div class="mr-0">
                                                <input type="radio" class="btn-check" value="信用" name="options"
                                                    id="site-name-off" autocomplete="off">
                                                <label class="off-radio-btn" for="site-name-off">OFF</label>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- ON OFF BUTTONS END-->
                                    <li class="form-fields">
                                        <div class="register-label">現場名（自動入力）</div>
                                        <div class="order-input-field">
                                        <input disabled type="text"
                                            :value="order.site_name = order.job_number.site_name" id="fname"
                                            name="fname" placeholder="テキスト" class="form-control input-border">
                                        <small>
                                            <span v-if="errors.site_name != null" class="text-danger float-left">
                                                {{errors.site_name[0]}}
                                            </span>
                                        </small>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="switch-div">
                                    <!-- ON OFF BUTTONS-->
                                    <ul class="switch-div on-off-buttons">

                                        <li class="switch-btns">
                                            <div class="mr-1">
                                                <input type="radio" class="btn-check" value="現物" name="options"
                                                    id="order-date-on" autocomplete="off">
                                                <label class="on-radio-btn" for="order-date-on">ON</label>
                                            </div>
                                            <div class="mr-0">
                                                <input type="radio" class="btn-check" value="信用" name="options"
                                                    id="order-date-off" autocomplete="off">
                                                <label class="off-radio-btn" for="order-date-off">OFF</label>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- ON OFF BUTTONS END-->
                                    <li class="form-fields ">
                                        <div class="register-label">order date（カレンダー）</div>
                                        <div class="date">
                                            <input type="date" v-model="order.order_date" id="date" name="datebirth"
                                                class="form-control input-border">
                                            <small>
                                                <span v-if="errors.order_date != null" class="text-danger float-left">
                                                    {{errors.order_date[0]}}
                                                </span>
                                            </small>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="switch-div">
                                    <!-- ON OFF BUTTONS-->
                                    <ul class="switch-div on-off-buttons">
                                        <li class="switch-btns">
                                            <div class="mr-1">
                                                <input type="radio" class="btn-check" value="現物" name="options"
                                                    id="order-select-on" autocomplete="off">
                                                <label class="on-radio-btn" for="order-select-on">ON</label>
                                            </div>
                                            <div class="mr-0">
                                                <input type="radio" class="btn-check" value="信用" name="options"
                                                    id="order-select-off" autocomplete="off">
                                                <label class="off-radio-btn" for="order-select-off">OFF</label>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- ON OFF BUTTONS END-->
                                    <li class="form-fields">
                                        <div class="register-label">発注者（選択）</div>
                                        <div class="order-input-field">
                                        <select class="input-border" v-model="order.client_id" name="cars" id="cars">
                                            <option v-for="user in users" :value="user.id">{{user.user_name}}</option>
                                        </select>
                                        <small>
                                            <span v-if="errors.client_id != null" class="text-danger float-left">
                                                {{errors.client_id[0]}}
                                            </span>
                                        </small>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="switch-div">
                                    <!-- ON OFF BUTTONS-->
                                    <ul class="switch-div on-off-buttons">
                                        <li class="switch-btns">
                                            <div class="mr-1">
                                                <input type="radio" class="btn-check" value="現物" name="options"
                                                    id="product-name-on" autocomplete="off">
                                                <label class="on-radio-btn" for="product-name-on">ON</label>
                                            </div>
                                            <div class="mr-0">
                                                <input type="radio" class="btn-check" value="信用" name="options"
                                                    id="product-name-off" autocomplete="off">
                                                <label class="off-radio-btn" for="product-name-off">OFF</label>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- ON OFF BUTTONS END-->
                                    <li class="form-fields">
                                        <div class="register-label">品名（選択）</div>
                                        <div class="order-input-field">
                                        <select class="input-border" v-model="order.item_id" name="cars" id="cars">
                                            <option v-for="item in items" :value="item.id">{{item.item_name}}</option>
                                        </select>
                                        <small>
                                            <span v-if="errors.item_id != null" class="text-danger float-left">
                                                {{errors.item_id[0]}}
                                            </span>
                                        </small>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="switch-div">
                                    <!-- ON OFF BUTTONS-->
                                    <ul class="switch-div on-off-buttons">
                                        <li class="switch-btns">
                                            <div class="mr-1">
                                                <input type="radio" class="btn-check" value="現物" name="options"
                                                    id="warehouse-on" autocomplete="off">
                                                <label class="on-radio-btn" for="warehouse-on">ON</label>
                                            </div>
                                            <div class="mr-0">
                                                <input type="radio" class="btn-check" value="信用" name="options"
                                                    id="warehouse-off" autocomplete="off">
                                                <label class="off-radio-btn" for="warehouse-off">OFF</label>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- ON OFF BUTTONS END-->
                                    <li class="form-fields">
                                        <div class="register-label">warehouses</div>
                                        <div class="order-input-field">
                                        <select class="input-border" v-model="order.stocker_id" name="cars" id="cars">
                                            <option v-for="warehouse in warehouses" :value="warehouse.id">
                                                {{warehouse.warehouse_name}}</option>
                                        </select>
                                        <small>
                                            <span v-if="errors.stocker_id != null" class="text-danger float-left">
                                                {{errors.stocker_id[0]}}
                                            </span>
                                        </small>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="switch-div">
                                    <!-- ON OFF BUTTONS-->
                                    <ul class="switch-div on-off-buttons">
                                        <li class="switch-btns">
                                            <div class="mr-1">
                                                <input type="radio" class="btn-check" value="現物" name="options"
                                                    id="quantity-on" autocomplete="off">
                                                <label class="on-radio-btn" for="quantity-on">ON</label>
                                            </div>
                                            <div class="mr-0">
                                                <input type="radio" class="btn-check" value="信用" name="options"
                                                    id="quantity-off" autocomplete="off">
                                                <label class="off-radio-btn" for="quantity-off">OFF</label>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- ON OFF BUTTONS END-->
                                    <li class="form-fields">
                                        <div class="register-label" bis_skin_checked="1">数量（数字入力）</div>
                                        <div class="order-input-field">
                                        <input type="number" id="fname" v-model="order.amount" name="fname"
                                            placeholder="テキスト" class="form-control input-border">
                                        <small>
                                            <span v-if="errors.amount != null" class="text-danger float-left">
                                                {{errors.amount[0]}}
                                            </span>
                                        </small>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12 m-auto text-right">
                            <input type="submit" class="btn-submit" value="登録">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from "axios";
    export default {
        data() {
            return {
                order: {
                    job_number: {},
                    site_name: '',
                    order_date: '',
                    client_id: '',
                    // supplier_id: '',
                    item_id: '',
                    stocker_id: '',
                    amount: '',
                },
                sites: [],
                items: [],
                // suppliers: [],
                warehouses: [],
                users: [],
                errors: [],
                list: [],
            }
        },
        created() {
            this.getSettings()
            if (this.$route.params.id != '') {
                this.getOrder()
            }
        },
        methods: {
            handleOrder() {
                Swal.fire({
                    text: 'Please Wait...',
                    didOpen: () => {
                        Swal.showLoading()
                    },
                })
                if (this.$route.params.id != '') {
                    axios.patch("/api/order", this.order)
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
                                    title: 'Order has been updated successfully.',
                                })
                                this.$router.push('/waiting-list')
                            }
                        })
                } else {
                    axios.post("/api/order", this.order)
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
                                    title: 'Order has been registered successfully.',
                                })
                            }
                        })
                }
            },
            clear() {
                this.order = {
                    job_number: {},
                    site_name: '',
                    order_date: '',
                    client_id: '',
                    item_id: '',
                    stocker_id: '',
                    amount: '',
                };
                this.errors = [];
            },
            getSettings() {
                axios.get("/api/get-settings")
                    .then((response) => {
                        this.sites = response.data.sites
                        this.items = response.data.items
                        this.users = response.data.users
                        // this.suppliers = response.data.suppliers
                        this.warehouses = response.data.warehouses
                    })
            },
            getOrder() {
                axios.get("/api/order/" + this.$route.params.id)
                    .then((response) => {
                        this.order.id = response.data.id;
                        this.order.job_number = response.data.job;
                        this.order.site_name = response.data.job.site_name;
                        this.order.order_date = response.data.order_date;
                        this.order.client_id = response.data.client_id;
                        this.order.item_id = response.data.item_id;
                        this.order.stocker_id = response.data.stocker_id;
                        this.order.amount = response.data.amount;
                    })
            },
        },
    }
</script>