<template>
    <main>
        <div class="d-flex" id="wrapper">

            <Sidebar v-if="is_login" />
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <Header v-if="is_login" />
                <router-view></router-view>
                <Footer />
            </div>
        </div>
    </main>

</template>
<script>
    import Sidebar from "../Components/Sidebar.vue"
    import Header from "../Components/Header.vue"
    import Footer from "../Components/Footer.vue"
    import axios from 'axios';

    export default {
        data() {
            return {
                is_login: $("meta[name='role']").attr("content"),
            }
        },
        components: {
            Sidebar,
            Header,
            Footer,
        }
    }
</script>