<template>
  <main>
    <div class="d-flex" id="wrapper">
      
      <Sidebar />
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <Header />
    <router-view></router-view>
    </div>
    </div>
  </main>

</template>
<script>
  import Sidebar from "../Components/Sidebar.vue"
  import Header from "../Components/Header.vue"


  export default {
    components: {
 
      Sidebar,
      Header,
    }
  }
</script>