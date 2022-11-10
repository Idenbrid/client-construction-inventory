<template>
    <!-- Page content-->
    <div class="container-fluid p-0">
        <div class="main-content main-content-bg">
            <h1 class="content-h1">アカウント登録</h1>
            <div class="account-reg-content">
                <div class="conrainer">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="registration-left-content">
                                <div class="d-flex align-items-center account-input-content">
                                    <div class="account-reg-lablel">
                                        <label for="">アカウント名</label>
                                    </div>
                                    <div class="accout-reg-input">
                                        <input type="text" name="" id="" placeholder="テキスト">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center  account-input-content">
                                    <div class="account-reg-lablel"> <label for="">アカウントID</label></div>
                                    <div class="accout-reg-input">
                                        <input type="text" name="" id="" placeholder="テキスト">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center account-input-content">
                                    <div class="account-reg-lablel">
                                        <label for="">ユーザー名</label>
                                    </div>
                                    <div class="accout-reg-input">
                                        <input type="text" name="" id="" placeholder="テキスト">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center account-input-content">
                                    <div class="account-reg-lablel"> <label for="">タイプ</label></div>

                                    <ul class="switch-div">
                                    <li class="switch-btns-registration">
                                        <div class="mr-1">
                                            <input type="radio" class="btn-check" value="jobon" name="options"
                                                id="job-on" autocomplete="on">
                                            <label class="on-radio-btn-reg" for="job-on">Manager</label>
                                           
                                        </div>
                                        <div class="mr-1">
                                            <input type="radio" class="btn-check" value="joboff" name="options"
                                                id="job-off" autocomplete="off">
                                            <label class="off-radio-btn-reg" for="job-off">Normal</label>
                                            
                                        </div>
                                    </li>
                                    </ul>
                                </div>

                                <!-- <div>
                                    <ul class="switch-div">
                                    <li class="switch-btns">
                                        <div class="mr-1">
                                            <input type="radio" class="btn-check" value="jobon" name="options"
                                                id="job-on" autocomplete="on">
                                            <label class="on-radio-btn" for="job-on">ON</label>
                                           
                                        </div>
                                        <div class="mr-1">
                                            <input type="radio" class="btn-check" value="joboff" name="options"
                                                id="job-off" autocomplete="off">
                                            <label class="off-radio-btn" for="job-off">OFF</label>
                                            
                                        </div>
                                    </li>
                                    </ul>
                                </div> -->
                                <div class="account-reg-buttons">
                                    <div><button class="btn btn-success">登録</button></div>
                                    <div><button class="btn btn-danger">削除</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <table class="registration-table">
                                <tr>
                                    <th>#</th>
                                    <th>アカウント名</th>
                                    <th>アカウントID</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>テキストテキストテキスト</td>
                                    <td>テキストテキストテキスト</td>
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