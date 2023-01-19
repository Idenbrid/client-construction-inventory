<template>
    <!-- Page content-->
    <div class="container-fluid p-0">
        <div class="main-content main-content-bg">
            <h1 class="content-h1">工事履歴</h1>
            <div class="table-card">
                <div class="container job-top-search">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-8 mx-auto">
                            <div class="job-form-fields">
                                <div class="job-search-field">
                                    <!-- <div class="field-label">JOB番号入力</div> -->
                                    <div class="field-label">サイト名を入力</div>
                                    <!-- <input type="number" v-model="jobNo" id="fname" name="fname" placeholder="テキスト" class="job-form-control input-border"> -->
                                    <input type="text" v-model="site_name"  name="site_name" placeholder="テキスト" class="job-form-control input-border">
                                </div>
                                <button @click.prevent="searchJob()" type="button" class="construction-btn">検索</button>
                                <button @click.prevent="getAllOrders()" type="button" class="construction-btn" style="width: fit-content">検索をリセット</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table id="history_list_table" class="table table-striped custom-table-list nowrap">
                        <thead>
                            <tr>
                                <th>発注年月日</th>
                                <th>発注者</th>
                                <th>分類</th>
                                <th>メーカー</th>
                                <th>品名</th>
                                <th>型番</th>
                                <th>数量</th>
                                <th>JOB番号</th>
                                <th>現場名</th>
                                <th>置き場番号</th>

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
                            </tr>
                        </tbody>
                    </table>
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
                jobNo: '',
                site_name: '',
            }
        },
        created() {
            this.getAllOrders()
        },
        methods: {
            getAllOrders() {
                axios.get("api/all-orders")
                .then((response) => {
                    this.jobNo = '';
                    this.list = response.data
                    if(this.list.length > 0 ){
                        $(document).ready(function () {
                            $('#history_list_table').DataTable({
                                "searching": false,
                                "info": false,
                                "autoWidth": false,
                                "lengthChange": false,
                            });
                        });
                    }
                })
            },
            searchJob(){
                axios.get('api/job-search/' + this.site_name)
                .then((response) => {
                    this.list = response.data
                })
            }
        },
    }
</script>