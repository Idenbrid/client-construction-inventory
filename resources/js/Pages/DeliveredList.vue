<template>
    <!-- Page content-->
    <div class="container-fluid p-0">
        <div class="main-content main-content-bg">
            <h1 class="content-h1">3.　納品済み一覧</h1>
            <div class="table-card table-responsive-sm">
                <table id="delivered_list_table" class="table table-striped custom-table-list nowrap">
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
                            <th>置き場番号</th>
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
                            <td>{{order.stocker.warehouse_name}}</td>
                            <td>
                                <div class="btn-rev-del">
                                    <a type="button" @click="moveToUse(order.id)" class="taking-btn" value="登録">持ち出し</a>
                                    <!-- <a v-if="order.status == 'using'" type="button" @click="moveToUse(order.id)" class="taking-btn" value="登録">持ち出し</a>
                                    <a v-else class="taking-btn" >持ち出し完了</a> -->
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
            this.getDeliveryList();
            this.getWarehouse();
        },
        methods: {
            moveToUse(id) {
                axios.get('/api/move-to-use-list/' + id )
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
                            this.getDeliveryList();
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
            getDeliveryList() {
                axios.get("/api/orders/" + "deliverd")
                    .then((response) => {
                        this.list = response.data
                        if(this.list.length){
                            $(document).ready(function () {
                                $('#waiting_list_table').DataTable({
                                    "columnDefs": [{
                                        className: "order_date",
                                        "targets": [10]
                                    }],
                                    "searching": false,
                                    "info": false,
                                    "autoWidth": true,
                                    "lengthChange": false,
                                });
                            });
                        }
                    })
            }
        },
    }
</script>