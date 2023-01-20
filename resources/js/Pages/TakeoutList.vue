<template>
    <!-- Page content-->
    <div class="container-fluid p-0">
        <div class="main-content main-content-bg">
            <h1 class="content-h1">4. 持ち出し中一覧</h1>
            <div class="table-card table-responsive-sm">
                <table id="waiting_list_table" class="table custom-table-list nowrap">

                    <thead>
                        <tr>
                            <th>使用日</th>
                            <th>発注者</th>
                            <th>分類</th>
                            <th>メーカー</th>
                            <th>品名</th>
                            <th>型番</th>
                            <th>数量</th>
                            <th>ジョブ番号</th>
                            <th>現場名</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(order, index) in list" :key="index">
                            <td>{{ dateTime(order.updated_at) }}</td>
                            <td>{{order.orderer.user_name}}</td>
                            <td>{{order.item.category}}</td>
                            <td>{{order.item.manufacturer}}</td>
                            <td>{{order.item.item_name}}</td>
                            <td>{{order.item.item_number}}</td>
                            <td>{{order.amount}}</td>
                            <td>{{order.job.job_number}}</td>
                            <td>{{order.job.site_name}}</td>
                            <!-- <td>{{order.stocker.warehouse_name}}</td> -->
                            <td class="d-flex" style="width:max-content">
                                <div class="btn-rev-del" v-if="order.status != 'used'">
                                    <a type="button" @click="allUsed(order.id)" class="delivery-btn" value="登録">使い終り</a>
                                    <a type="button" @click.prevent="record.order_id = order.id" class="revision-btn" value="登録" data-toggle="modal" data-target="#reminder">余り</a>
                                    <a type="button" class="copy-content-btn disabled" @click="cancleOrder(order.id)" value="登録">取消</a>
                                </div>
                                <div class="btn-rev-del" v-else>
                                    <a class="delivery-btn">持ち出し完了</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="reminder" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="reminderLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-fields justify-content-center">
                                <div class="register-label align-items-center" bis_skin_checked="1">置き場登録</div>
                                <select class="input-border" v-model="record.warehouse_id" name="cars" id="cars">
                                    <option v-for="house in warehouse" :value="house.id">{{house.warehouse_name}}</option>
                                </select>
                            </div>
                            <div class="form-fields justify-content-center mt-3">
                                <div class="register-label align-items-center" bis_skin_checked="1">数量</div>
                                <input type="text" class="form-control" v-model="record.amount" placeholder="テキスト">
                            </div>
                        </div>
                        <div class="modal-footer border-0 justify-content-center">
                            <button type="button" @click.prevent="saveRemaining()" class="complete-btn">納品済み</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from "axios";
    import moment from 'moment';

    export default {
        data() {
            return {
                list: [],
                warehouse: [],
                record: {
                    warehouse_id: '',
                    order_id: '',
                    amount: '',
                }
            }
        },
        created() {
            this.getUsedList();
            this.getWarehouse();
        },
        methods: {
            dateTime(value) {
                return moment(value).format('YYYY-MM-DD');
            },
            cancleOrder(id){
                axios.get('/api/cancle-move-to-delivered/' + id)
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
                        this.getUsedList();
                    }
                })
                .error((error) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Something went wrong please reload the page and try again. Thanks',
                    })
                });
            },
            saveRemaining(){
                axios.post('/api/save-remaining', this.record)
                .then((response) => {
                    if (response.data.success == false) {
                        if(response.data.message == 'amount'){
                            Swal.close()
                            Swal.fire({
                                icon: 'info',
                                title: 'Amount should be less then ordered amount!',
                            })
                        }else{
                            Swal.close()
                            Swal.fire({
                                icon: 'error',
                                title: 'Please Select required information.',
                            })
                        }
                    } else {
                        Swal.close()
                        Swal.fire({
                            icon: 'success',
                            title: 'Order has been updated successfully.',
                        })
                        this.record = {
                            warehouse_id: '',
                            amount: '',
                        };
                        this.getUsedList();
                        $('#reminder').modal('hide');
                    }
                })
                .error((error) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Something went wrong please reload the page and try again. Thanks',
                    })
                });
            },
            allUsed(id) {
                axios.get('/api/all-used/' + id)
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
                        this.getUsedList();
                    }
                })
                .error((error) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Something went wrong please reload the page and try again. Thanks',
                    })
                });
            },
            getWarehouse() {
                axios.get('/api/warehouse')
                    .then((res) => {
                        this.warehouse = res.data
                    })
            },
            getUsedList() {
                axios.get("/api/get-orders-used-using")
                .then((response) => {
                    this.list = response.data
                    if(this.list.length > 0){
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
            }
        },
    }
</script>