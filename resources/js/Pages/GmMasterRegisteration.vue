<template>
    <!-- Page content-->
    <div class="container-fluid p-0">
        <div class="main-content main-content-bg">
            <h1 class="content-h1">発生資材マスタ登録</h1>
            <div class="gmaccount-reg-content">
                <div class="conrainer">
                    <div class="master-reg-row">
                        <div class="master-reg-form">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="master-input-content">

                                        <label for="">分類</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="generated-reg-input">
                                        <input type="text" name="" id="" placeholder="テキスト">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="master-input-content">

                                        <label for="">メーカー</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="generated-reg-input">
                                        <input type="text" name="" id="" placeholder="テキスト">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="master-input-content">

                                        <label for="">品名</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="generated-reg-input">
                                        <input type="text" name="" id="" placeholder="テキスト">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="master-input-content">

                                        <label for="">型番</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="generated-reg-input">
                                        <input type="text" name="" id="" placeholder="テキスト">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="master-input-content">

                                        <label for="">型番</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <ul class="model-no-list">
                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="m" name="m" />
                                                <label class="form-check-label" for="m">m</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="book" name="book" />
                                                <label class="form-check-label" for="book">本</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="male" name="indivual" />
                                                <label class="form-check-label" for="indivual">個</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="box" name="box" />
                                                <label class="form-check-label" for="box">箱</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="bag" name="bag" />
                                                <label class="form-check-label" for="bag">袋</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="tower" name="tower" />
                                                <label class="form-check-label" for="tower">台</label>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="account-reg-buttons mt-3">
                                        <div><button class="register-btn">登録</button></div>
                                        <div><button class="delete-btn">削除</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-col">
                            <table class="registration-table">
                                <tr>

                                    <th>分類</th>
                                    <th>メーカー</th>
                                    <th>品名</th>
                                    <th>型番</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>テキストテキスト…</td>
                                    <td>テキストテキスト…</td>
                                    <td>テキストテキスト…</td>
                                    <td>123456789…</td>
                                    <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

    }
</script>
<style>
    /* ****************** ACCOUNTS REGISTRATION CSS STRAT ************* */
    .delete-btn, .register-btn{
        width: 56px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 2px;
        color: #fff;
    }
    .register-btn{
        background-color: #000000;
        border:1px solid #000000;
    }
    .delete-btn{
        background-color: #BEA000;
        border:1px solid #BEA000;
    }
    .model-no-list {
        display: flex;
        flex-wrap: wrap;
    }

    .master-reg-row {
        display: flex;
        justify-content: space-between;
    }

    .master-reg-form {
        width: 40%;
        margin-right: 15px;
    }

    .table-col {
       width:50%;
    }

    .gmaccount-reg-content {
        background-color: #fff;
        border-radius: 4px;
        box-shadow: 0px 3px 6px var(--black);
        padding: 40px 0px 48px 48px;
    }

    .generated-reg-input input {
        height: 37px;
        width: 100%;
        max-width: 100%;
        padding: 0px 15px;
        color: #00000099;
        border: 1px solid #0000001F;
        border-radius: 4px;
    }

    .master-input-content {
        gap: 30px;
        margin-bottom: 13px;
        display: inline-flex;
        width: 110px    ;
    }

    .registration-left-content {
        display: flex;
        flex-direction: column;
    }

    .registration-table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .registration-table td,
    .registration-table th {
        /* border: 1px solid #ddd; */
        padding: 8px;
        font-size: 12px;
        text-align: center;
    }

    .registration-table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .registration-table tr:hover {
        background-color: #ddd;
    }

    .registration-table th {

        text-align: left;
        background-color: black;
        color: white;
        height: 32px;
        font-size: 12px;
        text-align: center;
    }

    /* ****************** ACCOUNTS REGISTRATION CSS END ************* */
</style>