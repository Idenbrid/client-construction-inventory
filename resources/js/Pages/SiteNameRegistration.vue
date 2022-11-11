<template>
    <!-- Page content-->
        <div class="container-fluid p-0">
            <div class="main-content main-content-bg">
              
                    <div class="advance-master-registration-title">
                        <h5 class="text-white">JOB番号・現場名登録</h5>
                    </div>
                    <div class="advance-master-registration-form">
                            <div class="master-reg-row">
                                <div class="col-sm-12 col-md-12 col-lg-6 job-registeration-col">
                                  
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
                                   
                             
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 mt-4 p-0">
                                    <div class="master-registration-right-contet">
                                        <table class="w-100"> 
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
</template>

<script>
    export default {

    }
</script>

<style>
.job-registeration-col{
    display: flex;
    justify-content: center;
    align-items: center;
}
.master-reg-row {
    display: flex;
    justify-content: space-between;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}
.advance-master-registration-input-content{
    margin-bottom: 13px;
}
    .advance-master-registration-input-content span {
        color: #000000;
        font-size: 16px;
        letter-spacing: 0.15px;
        display: inline-block;
        width: 100px;
        margin-bottom: 13px;
    }

    .advance-master-reg-input {
        padding: 0px 20px;
        height: 37px;
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
        display: flex;
        gap: 10px;
        justify-content: flex-end;

    }

    .reg-button {
    border: 1px solid #BEA000;
    border-radius: 2px;
    width: 56px;
    height: 30px;
    font-size: 12px;
    font-family: NotoSansJP-Medium;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #BEA000;
    color: #fff;

    }

    .clear-button {
    border: 1px solid #000;
    border-radius: 2px;
    width: 56px;
    height: 30px;
    font-size: 12px;
    font-family: NotoSansJP-Medium;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #000000;
    color: #ffffff;
    }

    @media only screen and (max-width:768px) {
        .master-reg-row {
            flex-direction: column;
        }
    }
</style>