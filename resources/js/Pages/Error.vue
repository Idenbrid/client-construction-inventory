<template>
    <div class="error text-center">
        <div class="bubble"></div>
        <div class="error-title">
            <h1 class="display-1">Page Not Found</h1>
           <router-link class="btn btn-back-home" to="/">Back to home</router-link>
        </div>
    </div>
</template>
<style>
.error-title h1{
color: #F4DA83;
}
    .error {
        background: linear-gradient(#000, #F4DA83);
        background-image: url(/assets/images/bottom-banner-background-image.png);
        background-repeat: no-repeat;
        background-size: cover;
        overflow: hidden;
        height: 100vh;
        padding: 100px;
    }
    .btn-back-home {
        background: linear-gradient(#F4DA83, #BEA000);
        /* padding: 10px 50px; */
        border: none;
        border-radius: 20px;
        box-shadow: 0 30px 15px rgba(0, 0, 0, 0.15);
        outline: none;
        color: #FFF;
        text-transform: uppercase;
        cursor: pointer;
        margin-top: 100px;
        height: 50px;
        width: 160px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 60px auto;
    }
</style>