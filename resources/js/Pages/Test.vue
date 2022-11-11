<template>
    <section class="section-registration">
        <div class="container">
            <div class="registration-content mt-2">
                <div class="registration-title">
                    <h1 class="text-white">アカウント登録</h1>
                </div>
                <div class="registration-form bg-danger">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <form action="">
                                    <div class="registration-left-content">
                                        <div class="register-input-labels">
                                            <label class="mb-0" for="">アカウント名</label>
                                            <input class="registration-form-input" type="text" name="" id=""
                                                placeholder="テキスト">
                                        </div>
                                        <div class="register-input-labels">
                                            <label class="mb-0" for="">アカウント名</label>
                                            <input class="registration-form-input" type="text" name="" id=""
                                                placeholder="テキスト">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-5">
                                <div class="registration-right-content">
                                    <table id="customers">
                                        <tr>
                                            <th>Company</th>
                                            <th>Contact</th>
                                            <th>Country</th>
                                        </tr>
                                        <tr>
                                            <td>Alfreds Futterkiste</td>
                                            <td>Maria Anders</td>
                                            <td>Germany</td>
                                        </tr>
                                        <tr>
                                            <td>Berglunds snabbköp</td>
                                            <td>Christina Berglund</td>
                                            <td>Sweden</td>
                                        </tr>
                                        <tr>
                                            <td>Centro comercial Moctezuma</td>
                                            <td>Francisco Chang</td>
                                            <td>Mexico</td>
                                        </tr>
                                        <tr>
                                            <td>Ernst Handel</td>
                                            <td>Roland Mendel</td>
                                            <td>Austria</td>
                                        </tr>
                                        <tr>
                                            <td>Island Trading</td>
                                            <td>Helen Bennett</td>
                                            <td>UK</td>
                                        </tr>
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
    .registration-content {
        padding: 24px;
        background-image: url(assets/images/bg-img.png);
    }

    .registration-left-content {
        padding-left: 80px;
    }

    .registration-form {
        padding-top: 12px;
    }

    .register-input-labels label {
        margin-right: 30px;
    }

    .registration-form-input {
        width: 82.5%;
        height: 48px;
    }

    @media only screen and (max-width:425px) {
        .registration-left-content {
            padding-left: 30px;
        }

        .registration-form-input {
            width: 82.5%;
            height: 48px;
        }
    }
</style>