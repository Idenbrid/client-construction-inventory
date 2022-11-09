<template>
    <!-- Page content-->
    <div class="container-fluid p-0">
        <div class="main-content main-content-bg">
            <h1 class="content-h1">2.　納品待ち一覧</h1>
            <div class="table-card table-responsive-sm">
                <table id="table_id" class="table table-striped custom-table-list">
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
                            <td>Rテキストテ…
                                <div class="btn-rev-del">
                                    <a type="submit" class="delivery-btn" value="登録" data-toggle="modal"
                                        data-target="#staticBackdrop">納品</a>
                                    <a type="submit" class="revision-btn" value="登録">修正</a>
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
                                <select class="input-border" name="cars" id="cars">
                                    <option value="volvo">Volvo</option>
                                    <option value="saab">Saab</option>
                                    <option value="opel">Opel</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer border-0 justify-content-center">
                            <button type="button" class="complete-btn" data-dismiss="modal">納品済み</button>
                                 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            $(document).ready(function () {
                $('#table_id').DataTable({
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
        },
    }
</script>

<style>

</style>