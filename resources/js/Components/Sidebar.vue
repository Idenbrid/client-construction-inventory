<template>
    <div class="sidebar" id="sidebar-wrapper">
        <div class="sidebar-heading"><svg class="svg-inline--fa fa-home fa-w-20 mr-2" aria-hidden="true"
                focusable="false" data-prefix="fa" data-icon="home" role="img" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512" data-fa-i2svg="">
                <path fill="currentColor"
                    d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z">
                </path>
            </svg><!-- <i class="fa fa-home" aria-hidden="true"></i> --> メインメニュー</div>
        <div class="list-group list-group-flush">
            <router-link to="/order" class=" list-group-item-dk">1.　発注登録</router-link>
            <router-link to="/waiting-list" class="list-group-item-dk">2.　納品待ち一覧</router-link>
            <router-link to="#" class="list-group-item-dk">3.　納品済み一覧</router-link>
            <router-link to="#" class="list-group-item-dk">4.　持ち出し中一覧</router-link>
            <router-link to="#" class="list-group-item-dk">5.　在庫一覧</router-link>
            <router-link to="#" class="list-group-item-dk">工事履歴</router-link>
        </div>
        <div class="sidebar-heading" v-if="is_login == 'manager'">
            <svg class="svg-inline--fa fa-cog fa-w-16 mr-2" aria-hidden="true" focusable="false" data-prefix="fa"
                data-icon="cog" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                <path fill="currentColor"
                    d="M487.4 315.7l-42.6-24.6c4.3-23.2 4.3-47 0-70.2l42.6-24.6c4.9-2.8 7.1-8.6 5.5-14-11.1-35.6-30-67.8-54.7-94.6-3.8-4.1-10-5.1-14.8-2.3L380.8 110c-17.9-15.4-38.5-27.3-60.8-35.1V25.8c0-5.6-3.9-10.5-9.4-11.7-36.7-8.2-74.3-7.8-109.2 0-5.5 1.2-9.4 6.1-9.4 11.7V75c-22.2 7.9-42.8 19.8-60.8 35.1L88.7 85.5c-4.9-2.8-11-1.9-14.8 2.3-24.7 26.7-43.6 58.9-54.7 94.6-1.7 5.4.6 11.2 5.5 14L67.3 221c-4.3 23.2-4.3 47 0 70.2l-42.6 24.6c-4.9 2.8-7.1 8.6-5.5 14 11.1 35.6 30 67.8 54.7 94.6 3.8 4.1 10 5.1 14.8 2.3l42.6-24.6c17.9 15.4 38.5 27.3 60.8 35.1v49.2c0 5.6 3.9 10.5 9.4 11.7 36.7 8.2 74.3 7.8 109.2 0 5.5-1.2 9.4-6.1 9.4-11.7v-49.2c22.2-7.9 42.8-19.8 60.8-35.1l42.6 24.6c4.9 2.8 11 1.9 14.8-2.3 24.7-26.7 43.6-58.9 54.7-94.6 1.5-5.5-.7-11.3-5.6-14.1zM256 336c-44.1 0-80-35.9-80-80s35.9-80 80-80 80 35.9 80 80-35.9 80-80 80z">
                </path>
            </svg><!-- <i class="fa fa-cog mr-3" aria-hidden="true"></i> -->設定</div>
        <div class="list-group list-group-flush" v-if="is_login == 'manager'">
            <router-link to="/account-registration" class="list-group-item-dk">アカウント登録</router-link>
            <router-link to="/generated-material-master-registration" class="list-group-item-dk">発生資材マスタ登録</router-link>
            <router-link to="/master-registration" class="list-group-item-dk">資材置き場マスタ登録</router-link>
            <router-link to="/supplier-regisration" class="list-group-item-dk">発注先マスタ登録</router-link>
            <router-link to="/site-registration" class="list-group-item-dk">JOB番号・現場名登録</router-link>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return{
				is_login : $("meta[name='role']").attr("content"),
            } 
        }
    }
</script>

<style>

</style>