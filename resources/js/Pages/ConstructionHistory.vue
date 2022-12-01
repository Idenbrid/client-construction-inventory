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
                                    <div class="field-label">JOB番号入力</div>
                                    <input type="number" id="fname" name="fname" placeholder="テキスト"
                                        class="job-form-control input-border">
                                </div>
                                <button type="button" class="construction-btn">検索</button>
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

                            </tr>
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

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            $(document).ready(function () {
                $('#history_list_table').DataTable({
                    "searching": false,
                    "info": false,
                    "autoWidth": false,
                    "lengthChange": false,
                });
            });
        },
    }
</script>