<template>
  <section class="footer-nav-section">
            <div class="d-flex justify-content-between footer-nav-tab">
                <ul class="d-flex top-nav-pills flex-wrap">
                    <li class="footer-nav-item"><router-link to="/order" class="footer-links">発注登録</router-link></li>
                    <li class="footer-nav-item"><router-link to="/waiting-list" class="footer-links">納品待ち一覧</router-link></li>
                    <li class="footer-nav-item"><router-link to="/delivered-list" class="footer-links">納品済み一覧</router-link></li>
                    <li class="footer-nav-item"><router-link to="/takeout-list" class="footer-links">持ち出し中一覧</router-link></li>
                    <li class="footer-nav-item"><router-link to="/inventory-list" class="footer-links">在庫一覧</router-link></li>
                    <li class="footer-nav-item"><router-link to="/construction-history" class="footer-links">工事履歴</router-link></li>
                 
                </ul>
            </div>
        </section>
</template>

<script>
export default {

}
</script>

<style>

</style>