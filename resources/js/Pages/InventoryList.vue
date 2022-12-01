<template>
    <!-- Page content-->
    <div class="container-fluid p-0">
        <div class="main-content main-content-bg">
            <h1 class="content-h1">5. 在庫一覧</h1>
            <div class="table-card table-responsive-sm">
                <table id="inventory_list_table" class="table table-striped custom-table-list nowrap">
                    <thead>
                        <tr>
                            <th>発注年月日</th>
                            <th>発注者</th>
                            <th>分類</th>
                            <th>メーカー</th>
                            <th>品名</th>
                            <th>型番</th>
                            <th>数量</th>
                            <th>remaining</th>
                            <th>ジョブ番号</th>
                            <!-- <th>現場名</th> -->
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(order, index) in list" :key="index">
                            <td>{{order.order_date}}</td>
                            <td>{{order.orderer.user_name}}</td>
                            <td>{{order.item.category}}</td>
                            <td>{{order.item.manufacturer}}</td>
                            <td>{{order.item.item_name}}</td>
                            <td>{{order.item.item_number}}</td>
                            <td>{{order.amount}}</td>
                            <td>{{order.remaining}}</td>
                            <td>{{order.job.job_number}}</td>
                            <td>
                                <div class="btn-rev-del ml-0">
                                    <a type="button" class="carryout-btn" value="登録" data-toggle="modal" @click="assignValue(order)"
                                        data-target="#carryout">持出し予約</a>
                                    <a type="button" class="revision-btn" value="登録" data-toggle="modal" @click="getReservedOrders(order.id)"
                                        data-target="#booking-confirmation">予約確認</a>
                                    <a type="button" class="copy-content-btn disabled" value="登録" data-toggle="modal"
                                        data-target="#stockfix">在庫修正</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- carryout Modal -->
            <div class="modal fade" id="carryout" data-backdrop="carryout" data-keyboard="false" tabindex="-1"
                aria-labelledby="carryoutLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <button type="button" @click.prevent="clearForm()" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-fields justify-content-center">
                                <div class="register-label align-items-center">order date</div>
                                <div class="date"><input type="date" id="date" v-model="order.order_date" name="datebirth" class="form-control input-border">
                                </div>
                            </div>
                            <div class="form-fields justify-content-center mt-3">
                                <div class="register-label align-items-center">JOB番号</div>
                                <select class="input-border" name="cars" id="cars" v-model="order.job_number">
                                    <option v-for="site in sites" :value="site">{{site.job_number}}</option>
                                </select>
                                <small>
                                    <span v-if="errors.job_number != null" class="text-danger float-left">
                                        {{errors.job_number[0]}}
                                    </span>
                                </small>
                            </div>
                            <div class="form-fields justify-content-center mt-3">
                                <div class="register-label align-items-center">現場名</div>
                                <input type="text" disabled :value="order.site_name = order.job_number.site_name" class="form-control" placeholder="テキスト">
                            </div>
                            <div class="form-fields justify-content-center mt-3">
                                <div class="register-label align-items-center">発注者（選択）</div>
                                <select class="input-border" v-model="order.client_id" name="cars" id="cars">
                                    <option v-for="user in users" :value="user.id">{{user.user_name}}</option>
                                </select>
                                <small>
                                    <span v-if="errors.client_id != null" class="text-danger float-left">
                                        {{errors.client_id[0]}}
                                    </span>
                                </small>
                            </div>
                            <div class="form-fields justify-content-center mt-3">
                                <div class="register-label align-items-center">数量</div>
                                <input type="text" class="form-control" v-model="order.amount" placeholder="テキスト">
                            </div>
                        </div>
                        <div class="modal-footer border-0 justify-content-center pb-4">
                            <button type="button" @click.prevent="reserveOrder()" class="complete-btn">登録</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- booking-confirmation Modal -->
            <div class="modal fade" id="booking-confirmation" data-backdrop="booking-confirmation" data-keyboard="false"
                tabindex="-1" aria-labelledby="booking-confirmationLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pt-0">
                            <div class="booking-content">
                                <table class="w-100">
                                    <thead>
                                        <tr>
                                            <th>使用年月日</th>
                                            <th>使用者</th>
                                            <th>数量</th>
                                            <th>JOB番号</th>
                                            <th>現場名</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(reserve, index) in reserveOrders" :key="index">
                                            <t>{{reserve.order_date}}</t>
                                            <td>{{reserve.orderer.user_name}}</td>
                                            <td>{{reserve.amount}}</td>
                                            <td>{{reserve.job.job_number}}</td>
                                            <td>
                                                <div class="btn-rev-del">
                                                    <a type="button" class="taking-out-btn" value="登録" @click.prevent="reserveToUsing(reserve)">持ち出し</a>
                                                    <a type="button" class="revision-btn" value="登録">修正</a>
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
            <!--stock-fix Modal -->
            <div class="modal fade" id="stockfix" data-backdrop="stockfix" data-keyboard="false" tabindex="-1"
                aria-labelledby="stockfixLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-fields justify-content-center">
                                <div class="register-label align-items-center">置き場登録</div>
                                <select class="input-border" name="cars" id="cars">
                                    <option value="volvo">Volvo</option>
                                    <option value="saab">Saab</option>
                                    <option value="opel">Opel</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>
                            <div class="form-fields justify-content-center mt-3">
                                <div class="register-label align-items-center">数量</div>
                                <input type="text" class="form-control" placeholder="テキスト">
                            </div>
                        </div>
                        <div class="modal-footer border-0 justify-content-center">
                            <button type="button" class="complete-btn" data-dismiss="modal">在庫登録</button>
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
                list: [],
                record: {
                    order_id: '',
                    amount: '',
                },
                order: {
                    job_number: {},
                    site_name: '',
                    order_date: '',
                    client_id: '',
                    item_id: '',
                    stocker_id: '',
                    amount: '',
                    order_id: '',
                },
                sites: [],
                items: [],
                warehouses: [],
                users: [],
                errors: [],
                reserveOrders: [],
            }
        },
        created() {
            this.getRemainingList();
            this.getWarehouse();
            this.getSettings();
        },
        methods: {
            clearForm(){
                this.record = {
                    order_id: '',
                    amount: '',
                };
                this.order = {
                    job_number: {},
                    site_name: '',
                    order_date: '',
                    client_id: '',
                    item_id: '',
                    stocker_id: '',
                    amount: '',
                    order_id: '',
                };
            },
            assignValue(order){
                this.record.amount = order.remaining
                this.record.order_id = order.id
                this.order.order_id = order.id
                this.order.item_id = order.item.id
                this.order.stocker_id = order.stocker.id
            },
            reserveOrder(){
                if(this.order.amount > this.record.amount ){
                    Swal.fire({
                        icon: 'info',
                        title: 'Amount should be less then remaining amount!',
                    })
                    return false;
                }else{
                    axios.post('/api/reserve-order', this.order)
                    .then((response) => {
                        if (response.data.success == false) {
                            Swal.close()
                            Swal.fire({
                                icon: 'error',
                                title: 'Something went wrong please reload the page and try again. Thanks',
                            })
                            this.record = {
                                warehouse_id: '',
                                order_id: '',
                                amount: '',
                            };
                        } else {
                            Swal.close()
                            Swal.fire({
                                icon: 'success',
                                title: 'Order has been updated successfully.',
                            })
                            this.clearForm();
                            this.getRemainingList();
                            $('#carryout').modal('hide');
                        }
                    })
                    .error((error) => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Something went wrong please reload the page and try again. Thanks',
                        })
                    });
                }
            },
            getReservedOrders(order_id){
                axios.get("/api/get-related-reserve-orders/"+order_id)
                .then((response) => {
                    this.reserveOrders = response.data
                })
            },
            getSettings() {
                axios.get("/api/get-settings")
                .then((response) => {
                    this.sites = response.data.sites
                    this.items = response.data.items
                    this.users = response.data.users
                    this.warehouses = response.data.warehouses
                })
            },
            getWarehouse() {
                axios.get('/api/warehouse')
                .then((res) => {
                    this.warehouse = res.data
                })
            },
            getRemainingList() {
                axios.get("/api/get-remaining-list")
                .then((response) => {
                    this.list = response.data
                    if (this.list.length > 0) {
                        $(document).ready(function () {
                            $('#waiting_list_table').DataTable({
                                "columnDefs": [{
                                    "width": "90px",
                                    "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8],
                                }],

                                "searching": false,
                                "info": false,
                                "autoWidth": false,
                                "lengthChange": false,
                            });
                        });
                    }
                })
            },
            reserveToUsing(reserve){
                axios.post('/api/reserve-to-using', reserve)
                .then((response) => {
                    if (response.data.success == false) {
                        Swal.close()
                        Swal.fire({
                            icon: 'error',
                            title: 'Something went wrong please reload the page and try again. Thanks',
                        })
                    } else {
                        Swal.close()
                        Swal.fire({
                            icon: 'success',
                            title: 'Order has been updated successfully.',
                        })
                        $('#booking-confirmation').modal('hide');
                    }
                })
                .error((error) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Something went wrong please reload the page and try again. Thanks',
                    })
                });
            }
        },
    }
</script>
