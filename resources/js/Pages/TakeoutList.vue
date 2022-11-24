<template>
    <!-- Page content-->
    <div class="container-fluid p-0">
        <div class="main-content main-content-bg">
            <h1 class="content-h1">4. 持ち出し中一覧</h1>
            <div class="table-card table-responsive-sm">
                <table id="takeout_list_table" class="table custom-table-list nowrap">
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
                                    <a type="button" class="delivery-btn" value="登録">使い終り</a>
                                    <a type="button" class="revision-btn" value="登録" data-toggle="modal"
                                        data-target="#reminder">余り</a>
                                    <a type="button" class="copy-content-btn disabled" value="登録">取消</a>
                                </div>
                            </td>
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
                            <td>Rテキストテ…
                                <div class="btn-rev-del">
                                    <a type="button" class="delivery-btn" value="登録">使い終り</a>
                                    <a type="button" class="revision-btn" value="登録" data-toggle="modal"
                                        data-target="#reminder">余り</a>
                                    <a type="button" class="copy-content-btn disabled" value="登録">取消</a>
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
                                <select class="input-border" name="cars" id="cars">
                                    <option value="volvo">Volvo</option>
                                    <option value="saab">Saab</option>
                                    <option value="opel">Opel</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>
                            <div class="form-fields justify-content-center mt-3">
                                <div class="register-label align-items-center" bis_skin_checked="1">数量</div>
                                <input type="text" class="form-control" placeholder="テキスト">
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
                $('#takeout_list_table').DataTable({
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