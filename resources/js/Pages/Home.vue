<template>
    <!-- Page content-->
    <div class="container-fluid p-0">
        <div class="main-content main-content-bg">
            <h1 class="content-h1">1.　発注登録</h1>
            <div class="order-reg-card">

                <form class="order-register-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 p-0">
                                <ul class="switch-div">
                                    <li class="switch-btns">
                                        <h2 class="order-reg-h2"> 入力内容固定</h2>
                                    </li>
                                    <li class="form-fields">

                                    </li>
                                </ul>
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
                                    <li class="form-fields">
                                        <div class="register-label align-items-center">JOB番号（選択）</div>

                                        <select class="input-border" name="cars" id="cars">
                                            <option value="volvo">Volvo</option>
                                            <option value="saab">Saab</option>
                                            <option value="opel">Opel</option>
                                            <option value="audi">Audi</option>
                                        </select>
                                    </li>
                                </ul>
                                <ul class="switch-div">
                                    <li class="switch-btns">
                                        <div class="mr-1">
                                            <input type="radio" class="btn-check" value="現物" name="options" id="現物"
                                                autocomplete="off">
                                            <label class="on-radio-btn" for="現物">ON</label>
                                        </div>
                                        <div class="mr-0">
                                            <input type="radio" class="btn-check" value="信用" name="options" id="信用"
                                                autocomplete="off">
                                            <label class="off-radio-btn" for="信用">OFF</label>
                                        </div>
                                    </li>

                                    <li class="form-fields">
                                        <div class="register-label">現場名（自動入力）</div>
                                        <input type="text" id="fname" name="fname" placeholder="テキスト"
                                            class="form-control input-border">
                                    </li>
                                </ul>
                                <ul class="switch-div">
                                    <li class="switch-btns">
                                        <div class="mr-1">
                                            <input type="radio" class="btn-check" value="現物" name="options"
                                                id="date-birth-on" autocomplete="off">
                                            <label class="on-radio-btn" for="date-birth-on">ON</label>
                                        </div>
                                        <div class="mr-0">
                                            <input type="radio" class="btn-check" value="信用" name="options"
                                                id="date-birth-off" autocomplete="off">
                                            <label class="off-radio-btn" for="date-birth-off">OFF</label>
                                        </div>
                                    </li>

                                    <li class="form-fields ">
                                        <div class="register-label">生年月日（カレンダー）</div>
                                        <div class="date">
                                            <input type="date" id="date" name="datebirth"
                                                class="form-control input-border">
                                        </div>
                                    </li>
                                </ul>
                                <ul class="switch-div">
                                    <li class="switch-btns">
                                        <div class="mr-1">
                                            <input type="radio" class="btn-check" value="現物" name="options"
                                                id="order-party-on" autocomplete="off">
                                            <label class="on-radio-btn" for="order-party-on">ON</label>
                                        </div>
                                        <div class="mr-0">
                                            <input type="radio" class="btn-check" value="信用" name="options"
                                                id="order-party-off" autocomplete="off">
                                            <label class="off-radio-btn" for="order-party-off">OFF</label>
                                        </div>
                                    </li>

                                    <li class="form-fields">
                                        <div class="register-label">発注者（選択）</div>
                                        <select class="input-border" name="cars" id="cars">
                                            <option value="volvo">Volvo</option>
                                            <option value="saab">Saab</option>
                                            <option value="opel">Opel</option>
                                            <option value="audi">Audi</option>
                                        </select>
                                    </li>
                                </ul>
                                <ul class="switch-div">
                                    <li class="switch-btns">
                                        <div class="mr-1">
                                            <input type="radio" class="btn-check" value="現物" name="options"
                                                id="classification-on" autocomplete="off">
                                            <label class="on-radio-btn" for="classification-on">ON</label>
                                        </div>
                                        <div class="mr-0">
                                            <input type="radio" class="btn-check" value="信用" name="options"
                                                id="classification-off" autocomplete="off">
                                            <label class="off-radio-btn" for="classification-off">OFF</label>
                                        </div>
                                    </li>

                                    <li class="form-fields">
                                        <div class="register-label">分類（選択）</div>
                                        <select class="input-border" name="cars" id="cars">
                                            <option value="volvo">Volvo</option>
                                            <option value="saab">Saab</option>
                                            <option value="opel">Opel</option>
                                            <option value="audi">Audi</option>
                                        </select>
                                    </li>
                                </ul>
                                <ul class="switch-div">
                                    <li class="switch-btns">
                                        <div class="mr-1">
                                            <input type="radio" class="btn-check" value="現物" name="options"
                                                id="product-on" autocomplete="off">
                                            <label class="on-radio-btn" for="product-on">ON</label>
                                        </div>
                                        <div class="mr-0">
                                            <input type="radio" class="btn-check" value="信用" name="options"
                                                id="product-off" autocomplete="off">
                                            <label class="off-radio-btn" for="product-off">OFF</label>
                                        </div>
                                    </li>

                                    <li class="form-fields">
                                        <div class="register-label">品名（選択）</div>
                                        <select class="input-border" name="cars" id="cars">
                                            <option value="volvo">Volvo</option>
                                            <option value="saab">Saab</option>
                                            <option value="opel">Opel</option>
                                            <option value="audi">Audi</option>
                                        </select>
                                    </li>
                                </ul>
                                <ul class="switch-div">
                                    <li class="switch-btns">

                                    </li>

                                    <li class="form-fields">
                                        <div class="register-label">型番（選択）</div>
                                        <select class="input-border" name="cars" id="cars">
                                            <option value="volvo">Volvo</option>
                                            <option value="saab">Saab</option>
                                            <option value="opel">Opel</option>
                                            <option value="audi">Audi</option>
                                        </select>
                                    </li>
                                </ul>
                                <ul class="switch-div">
                                    <li class="switch-btns">

                                    </li>
                                    <li class="form-fields">
                                        <div class="register-label" bis_skin_checked="1">数量（数字入力）</div>
                                        <input type="text" id="fname" name="fname" placeholder="テキスト"
                                            class="form-control input-border">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12 m-auto text-right">
                            <input type="submit" class="btn-submit" value="登録">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</template>