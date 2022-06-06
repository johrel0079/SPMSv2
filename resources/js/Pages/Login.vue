<template>
<div class="login-content">
        <div class="jumbotron vertical-center bg-transparent">
            <center>
                <button class="btn bg-transparent" id="btn_love">
                    &nbsp; &nbsp;
                </button>
            </center>
            <br>
            <div class="container login shadow-lg p-3 mb-5 bg-white h-90">
                <div class="card border-0 bg-transparent">
                    <div class="row ">
                        <div class="col-md-4 text-center mt-4">
                            <h3>Spare Parts </h3>
                            <h3>Management System </h3>
                           <img src="assets/image/spm_logo_1.png" style="height:70%; width:90%; " class="rounded">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <br><br>
                                <div class="row">
                                  <div class="col-md-6" style="padding-bottom: 0%; padding-right: 0px; padding-left: 0%">
                                  <img src="assets/image/img_warehouse.png" style="height:70%; width:90%; margin-top: 5rem; ">
                                  </div>
                                  <div class="col-md-6">
                                    <h5 class="text-white text-center">Sign in using your account</h5><br>   
                                    <div class="text-white">Employee Number</div>     
                                    <input type="text" id="txt_employee_no" v-model="employee_number" class="form-control form-control-lg border-0 text-center" style="background-color:#104977; color:white" placeholder="Enter ID Number" onkeypress="">
                                    <br>
                                    <div class="text-white">Password</div>
                                    <input id="txt_password" type="password" v-model="password" class="form-control form-control-lg border-0 text-center" style="background-color:#104977; color:white" placeholder="Enter Password" onkeypress="">
                                    <small class="text-white">Use your barcode scanner, touch screen or keyboard</small>
                                    <br/> <br/>
                                    <button type="button" class="form-control btn btn-lg btn-login" @click="submitLoginForm()" style="background-color:#27B5F5; color:white;"><b-icon icon="upc-scan"></b-icon>&nbsp;<label style="font-family:custom-font-label;">Login</label></button>
                                    <br/> <br/>
                                    <button type="button" class="form-control btn btn-lg btn-guest"  style="background-color:#7F8389; color:white;"><b-icon icon="question-circle-fill"></b-icon>&nbsp;<label style="font-family:custom-font-label;">Guest</label></button>
                                      <br>
                                      <a href="#" style="color:white">Forgot Password?</a> 
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
</div>
</template>

<script>
import {mapActions} from 'vuex';
export default {
    name: "login",
    data() {
      return {
        employee_number: "",
        password: "",
      }
    },
    methods: {
      ...mapActions({
        loginState:'auth/login'
      }),
     async submitLoginForm(){
        var data = {
          employee_number: this.employee_number,
          password: this.password 
        }
        
      await this.$http.get('sanctum/csrf-cookie');  
      await this.$http.post('api/login', data)
      .then((response) => {
        this.loginState(response.data.data);
      }).catch((response) => {
        console.log(response);
      })
      }
    }
}
</script>

<style lang="scss" scope>
.login{
  border-radius:40px; 
  background-image: url(/assets/image/login_bg.png);
  background-size:cover;
}
.vertical-center
  {
   min-height: 100%;
   min-height: 100vh;
   display: flex;
   align-items:center;
  }
  .jumbotron {
    width: 80% !important;
    margin-left: auto;
    margin-right: auto;
  }
.btn-login:hover{
    color: #27B5F5 !important;
    background-color: white !important;
 }
 .bg-transparent {
  background-color:transparent
 }
 h3{
  color:#388BCD; 
  margin-top: 0.3rem;
 }
.login-content{
    background:url(/assets/image/log-bg.jpg) !important;  
    background-size:cover !important; 
    overflow-y:hidden !important;
}

</style>