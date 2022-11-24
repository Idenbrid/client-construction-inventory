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
                            <td>
                                <div class="btn-rev-del ml-0">
                                    <a type="button" class="carryout-btn" value="登録" data-toggle="modal"
                                        data-target="#carryout">持出し予約</a>
                                    <a type="button" class="revision-btn" value="登録" data-toggle="modal"
                                        data-target="#booking-confirmation">予約確認</a>
                                    <a type="button" class="copy-content-btn disabled" value="登録" data-toggle="modal"
                                        data-target="#stockfix">在庫修正</a>
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
                            <td>
                                <div class="btn-rev-del ml-0">
                                    <a type="button" class="carryout-btn" value="登録" data-toggle="modal"
                                        data-target="#carryout">持出し予約</a>
                                    <a type="button" class="revision-btn" value="登録" data-toggle="modal"
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
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-fields justify-content-center">
                                <div class="register-label align-items-center">置き場登録</div>
                                <div class="date"><input type="date" id="date" name="datebirth"
                                        class="form-control input-border">
                                </div>
                            </div>
                            <div class="form-fields justify-content-center mt-3">
                                <div class="register-label align-items-center">使用者</div>
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
                            <div class="form-fields justify-content-center mt-3">
                                <div class="register-label align-items-center">JOB番号</div>
                                <select class="input-border" name="cars" id="cars">
                                    <option value="volvo">Volvo</option>
                                    <option value="saab">Saab</option>
                                    <option value="opel">Opel</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>
                            <div class="form-fields justify-content-center mt-3">
                                <div class="register-label align-items-center">現場名</div>
                                <input type="text" class="form-control" placeholder="テキスト">
                            </div>
                        </div>
                        <div class="modal-footer border-0 justify-content-center pb-4">
                            <button type="button" class="complete-btn" data-dismiss="modal">登録</button>
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
                                        <tr>
                                            <td>2022/10/10</td>
                                            <td>テキストテキスト…</td>
                                            <td>100</td>
                                            <td>123456789…</td>
                                            <td>
                                                テキストテキスト…
                                                <div class="btn-rev-del">
                                                    <a type="button" class="taking-out-btn" value="登録">持ち出し
                                                    </a>
                                                    <a type="button" class="revision-btn" value="登録">修正
                                                    </a>
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
    export default {
        mounted() {
            $(document).ready(function () {
                $('#inventory_list_table').DataTable({
                    "searching": false,
                    "info": false,
                    "autoWidth": false,
                    "lengthChange": false,
                });
            });
        },
    }
</script>