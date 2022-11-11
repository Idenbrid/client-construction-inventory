<template>
    <section class="section-registration">
        <div class="container">
            <div class="advance-master-registration-content mt-2">
                <div class="advance-master-registration-title">
                    <h5 class="text-white">JOB番号・現場名登録</h5>
                </div>
                <div class="advance-master-registration-form">
                    <div class="container">
                        <div class="row master-reg-row">
                            <div class="col-sm-12 col-md-12 col-lg-6  my-auto mb-4">
                                <div class="advance-master-registration-left-contet">
                                    <div class="advance-master-registration-input-content">
                                        <span>JOB番号</span>
                                        <input class="advance-master-reg-input" type="text" name="" id=""
                                            placeholder="テキスト">
                                    </div>
                                    <div class="advance-master-registration-input-content">
                                        <span>現場名</span>
                                        <input class="advance-master-reg-input" type="text" name="" id=""
                                            placeholder="テキスト">
                                    </div>
                                </div>
                                <div class="register-buttons">
                                    <div class="reg-btn">
                                        <button class="reg-button">登録</button>
                                    </div>
                                    <div class="clear-btn">
                                        <button class="clear-button">
クリア</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6 mt-4">
                                <div class="master-registration-right-contet">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>クリア</th>
                                                <th>クリア</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>12345678901234567890</td>
                                                <td>テキストテキストテキスト</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>12345678901234567890</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>12345678901234567890</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>12345678901234567890</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>12345678901234567890</td>
                                            </tr>
                                            
                                            <tr>
                                                <td>1</td>
                                                <td>12345678901234567890</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>12345678901234567890</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>12345678901234567890</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>12345678901234567890</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {

    }
</script>

<style>
    .advance-master-registration-input-content span {
        margin-right: 30px;
        color: #000000;
        font-size: 16px;
        letter-spacing: 0.15px;
    }

    .advance-master-reg-input {
        padding: 6.5px 16.5px;
        height: 48px;
        border: 1px solid #0000001F;
        border-radius: 4px;
    }

    .advance-master-registration-form {
        padding: 12px 0px 12px 0px;
        background: #ffffff;
    }

    .advance-master-registration-content {
        padding: 24px;
        background-image: url(assets/images/bg-img.png);
    }

    thead tr th {
        width: 130px;
        text-align: center;
        background: black;
        color: #ffffff;
        font-size: 12px;
        padding: 8px 0px;
    }

    tbody tr {
        margin: 12px auto !important;
    }

    tbody tr td {
        text-align: center;
        /* text-align: left; */
        font-size: 12px;
        letter-spacing: 0px;
        color: #000000;
        opacity: 1;
        padding: 10px 0px;
    }

    tbody tr td:nth-child(2) {
        width: 430px;
        text-align: center;
    }

    /* BUTTONS  */
    .register-buttons {
        margin-top: 13px;
        display: flex;
        gap: 10px;
        /* margin-left: 246px; */

    }

    .reg-button {
        border: none;
        border-radius: 5px;
        padding: 0px;
        width: 56px;
        height: 30px;
        font-size: 12px;
        font-family: NotoSansJP-Medium;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        background: #BEA000;

    }

    .clear-button {
        border: none;
        border-radius: 5px;
        padding: 0px;
        width: 56px;
        height: 30px;
        font-size: 12px;
        font-family: NotoSansJP-Medium;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        background: #000000;
        color: #ffffff;
    }

    @media only screen and (max-width:768px) {
        .master-reg-row {
            flex-direction: column;
        }
    }
</style>