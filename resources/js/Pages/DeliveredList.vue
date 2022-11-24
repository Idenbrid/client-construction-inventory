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
                        <tr>
                            <td>2022/12/24</td>
                            <td>小田切健太郎</td>
                            <td>テキストテ...</td>
                            <td>テキストテ...</td>
                            <td>テキストテ...</td>
                            <td>123456789…</td>
                            <td>123456789…</td>
                            <td>123456789…</td>
                            <td>テキストテ…</td>
                            <td>123456789…</td>
                            <td>
                                <div class="btn-rev-del">
                                    <a type="button" class="taking-btn" value="登録">持ち出し</a>
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
    export default {
        mounted() {
            $(document).ready(function () {
                $('#delivered_list_table').DataTable({               
                    "searching": false,
                    "info": false,
                    "autoWidth": true,
                    "lengthChange": false,
                });
            });
        },
    }
</script>