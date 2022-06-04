<template>
    <div class="main_body">
        <b-container fluid>
            <div class="jumbotron vertical-center d-flex justify-content-center" style="background-color:transparent;">
                <div class="shadow-lg p-3 mb-5 h-100" style="border-radius:10px; background-image: url(images/redbkg.jpg); background-size:cover;">
                    <div class="card border-0" style="background:transparent">
                        <b-row>
                            <b-col class="d-flex justify-content-center">
                                 <!-- <b-img :src="'images/avatar.png'" class="image__pc"></b-img> -->
                            </b-col>
                        </b-row>
                        <b-row class="d-flex justify-content-center">
                            <b-form
                                id="form-login"
                                class="form__login"
                                 method="post"
                                @submit.prevent="submitLoginForm">
                                <div class="form__login__group">
                                    <input name="employee_number" 
                                        v-model="employee_number" 
                                        autocomplete="on" 
                                        required
                                        placeholder="Employee Number"/>
                                    <b-form-invalid-feedback
                                        id="employee_number-feedback">
                                    </b-form-invalid-feedback>
                                </div>
                                <div class="form__login__group">
                                    <input  
                                        name="password" 
                                        v-model="password" 
                                        required
                                        placeholder="Password"/>
                                </div>
                                   <button id="btn-login" type="submit" class="login__btn__ok">
                                  Continue
                                </button>
                            </b-form>
                        </b-row>
                        
                        <!-- <b-img :src="'images/group_image.png'" class="image__bottom"></b-img> -->
                       <!-- <b-img :src="'images/image2.png'" class="image__bottom" style="left: 20%; height:150px"></b-img> -->
                    </div>
                    <div class="img">
                       <!-- <b-img :src="'images/group_image.png'" class="image__bottom"></b-img> -->
                    </div>
                     <!-- <b-img :src="'images/group_image.png'" class="image__bottom"></b-img> -->
                </div>
            </div>
        </b-container>
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

<style lang="scss">

    .main_body {
        width: 100%;
        height: 100vh;
        background-color: #f8fafc;
    }

     .image__pc{
        width: 15%;
        /* height: 15%; */
        /* left: 15%; */
        /* top: 10%; */
        opacity: 0;
        position: inherit;
        animation: fadeIn 1s;
        animation-fill-mode: forwards;
    }

    .image__bottom{
        width: 61%;
        /* height: 15%; */
        // left: 65%; 
        /* top: 10%; */
        opacity: 0;
        position: relative;
        animation: fadeIn 1s;
        animation-fill-mode: forwards;
        float: right;
        padding-top: 1rem;
        // position:absolute; 
        top: 100px; 
        left: 221px; 
        // z-index: 3;
    }

    .vertical-center
        {
            min-height: 100%;
            min-height: 100vh;
            display: flex;
            /* align-items:center; */
        }

    .left__pane {
        width: 100%;
        height: 100%;
        position: relative;
        background-color: beige;
    }

  .form__login {
  // display: block;
//   text-align: left;
  padding: 20px 0px 0px 0px;
  font-family: PoppinsRegular;
  &__group {
    label {
      color: white;
      display: block;
      font-size: 20px;
      margin-bottom: 5px;
    }
    input {
      margin-bottom: 20px;
      border: 0;
      border-radius: 5px;
      outline: none;
      width: 100%;
      height: 40px;
      padding: 21px;
    }
  }

  .login__btn__ok {
    border: 0;
    border-radius: 20px;
    padding: 10px 20px 10px 20px;
    width: 100%;
    background: linear-gradient(160deg, #ff4f5a, #d0242f);
    color: white;
    outline: none;
    transition: all 0.3s;
  }

  .login__btn__ok:hover {
    background: linear-gradient(160deg, #ef7a81, #e25059);
  }

  .login__btn__ok:active {
    font-size: 15px;
  }

  .login__btn__cancel {
    border: 0;
    border-radius: 20px;
    padding: 10px;
    width: 100px;
    background: transparent;
    color: white;
    outline: none;
    transition: 1s;
  }
  .login__btn__cancel:hover {
    color: #ff9393;
  }
}

</style>