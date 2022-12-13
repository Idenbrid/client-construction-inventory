<template>
    <!-- Page content-->
    <div class="container-fluid p-0">
        <div class="main-content main-content-bg">
            <h1 class="content-h1">2.　納品待ち一覧</h1>
            <div class="table-card table-responsive-sm">
                <table id="waiting_list_table" class="table table-striped custom-table-list">
                    <thead>
                        <tr>
                            <th>発注年月日</th>
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
                            <td>{{order.order_date}}</td>
                            <td>{{order.orderer.user_name}}</td>
                            <td>{{order.item.category}}</td>
                            <td>{{order.item.manufacturer}}</td>
                            <td>{{order.item.item_name}}</td>
                            <td>{{order.item.item_number}}</td>
                            <td>{{order.amount}}</td>
                            <td>{{order.job.job_number}}</td>
                            <td>{{order.job.site_name}}</td>
                            <td>
                                <div class="btn-rev-del">
                                    <a type="button" class="delivery-btn" @click.prevent="record.order_id = order.id" value="登録" data-toggle="modal" data-target="#staticBackdrop">納品</a>
                                    <router-link :to="{ name: 'Home', params: { id: order.id }}" type="submit" class="revision-btn" value="登録">修正</router-link>
                                    <a type="button" class="copy-content-btn disabled" value="登録">内容コピー</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <select class="input-border" v-model="record.warehouse_id" id="cars">
                                    <option v-for="house in warehouse" :value="house.id">{{house.warehouse_name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer border-0 justify-content-center">
                            <button @click.prevent="moveToDelivery()" type="button" class="complete-btn">納品済み</button>
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
                warehouse: [],
                record: {
                    warehouse_id: '',
                    order_id: '',
                }
            }
        },
        created() {
            this.getWaitingList();
            this.getWarehouse();
        },
        methods: {
            moveToDelivery(){
                axios.post('/api/move-to-delivery-list', this.record)
                .then((response) => {
                    if (response.data.success == false) {
                        Swal.close()
                        Swal.fire({
                            icon: 'error',
                            title: 'Something went wrong',
                        })
                    } else {
                        Swal.close()
                        Swal.fire({
                            icon: 'success',
                            title: 'Order has been updated successfully.',
                        })
                        this.record = {
                            warehouse_id: '',
                            order_id: '',
                        };
                        this.getWaitingList();
                        $('#staticBackdrop').modal('hide')
                    }
                })
                .error((error) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Something went wrong please reload the page and try again. Thanks',
                    })
                });
            },
            getWarehouse(){
                axios.get('/api/warehouse')
                .then((res) => {
                    this.warehouse = res.data
                })
            },
            getWaitingList(){
                axios.get("/api/orders/"+"ordered")
                .then((response) => {
                    this.list = response.data
                    if(this.list.length > 0){
                        $(document).ready(function () {
                            $('#waiting_list_table').DataTable({
                                "responsive": {
                                    breakpoints: [{
                                            name: 'desktop',
                                            width: Infinity
                                        },
                                        {
                                            name: 'tablet',
                                            width: 1024
                                        },
                                        {
                                            name: 'phone',
                                            width: 320
                                        }
                                    ]
                                },
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

<style>

</style>