<template>
	<div class="main-login">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" @submit.prevent="handleLogin()">
					<span class="login100-form-title p-b-49">
						<img src="/assets/images/logo.png" class="login-logo">
					</span>
					<div class="wrap-input100">
						<span class="label-input100">会社ID</span>
						<input class="input100" type="text" name="username" required v-model="user.login_id">
						<small>
							<span v-if="errors.login_id != null" class="text-danger float-left">
								{{errors.login_id[0]}}
							</span>
						</small>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">個人ID(password)</span>
						<input class="input100" type="password" name="password" v-model="user.login_password">
						<small>
							<span v-if="errors.login_password != null" class="text-danger float-left">
								{{errors.login_password[0]}}
							</span>
						</small>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								ログイン
							</button>
						</div>
					</div>
				</form>
				<div>
					<img src="/assets/images/lcm-logo.png" class="lcm-logo">
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	import axios from "axios"

	export default {
		data() {
			return {
				user: {
					login_id: "",
					login_password: ""
				},
				errors: []
			}
		},
		methods: {
			handleLogin() {
				Swal.fire({
					text: 'Please Wait...',
					didOpen: () => {
						Swal.showLoading()
					},
				})
				axios.post("/api/login", this.user)
				.then((response)=>{
					if (response.data.success == false) {
						Swal.close()
						this.errors = response.data.errors
					} else if (response.data.success == 'credentials') {
						Swal.close()
						Swal.fire({
							icon: 'error',
							title: 'Try Again',
							text: 'Credentials Not Match',
						})
					} else {
						Swal.close()
						this.user = {
							login_id: "",
							login_password: ""
						};
						this.errors = [];
						document.location.href = "/order";
					}
				})
			}
		},
	}
</script>