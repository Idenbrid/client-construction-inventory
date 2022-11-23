<template>
  <div class="container">
    <div class="col-md-8 mx-auto p-5">
      <h1 class="display-4">THIS IS TEST</h1>
      <form @submit.prevent="login">
        <input class="p-2 border w-100" type="email" v-model="email" name="email" id="">
        <br> <br>
        <input class="p-2 border w-100"  type="password" v-model="password" name="password" id="">
        <br> <br>
        <button class="btn btn-primary" type="submit">Submit</button>
        <div>{{userDetail.body}}</div>
      </form>
    </div>
  </div>
</template>
<script>
  import axios from 'axios'
  export default {
    data() {
      return {
        email: '',
        password: '',
        userDetail: {}
      }
    },
    methods: {
      async login() {
        if (this.email != '' && this.password != '') {
          let result = await axios.get(
            `https://jsonplaceholder.typicode.com/posts/1`
          )
          this.userDetail = result.data
          localStorage.setItem("user", JSON.stringify(result.data))
          localStorage.getItem("user")
        } else {
          alert('Please fill ')
        }
      },
    }
  }
</script>
<script>
export default{
  data(){},
  methods:{},
  created(){},
  mounted(){},
  computed(){}
}



</script>
<style>
</style>