<template>
   <div class=" sticky-top">
    <b-navbar
      toggleable="lg"
      class="navbar"
    >
      <!-- <b-navbar-brand href="#">NavBar</b-navbar-brand> -->
      <b-navbar-toggle target="nav-collapse" />

      <b-collapse
        id="nav-collapse"
        is-nav
      >
        <b-navbar-nav>
         <!-- Logo Here -->
        </b-navbar-nav>

        <!-- Right aligned nav items -->
        <b-navbar-nav>
          <b-nav-item class="mr-3">
            Dashboard
          </b-nav-item>

          <b-nav-item-dropdown
          class="mr-3"
            text="Transactions"
            right
          >
            <b-dropdown-item>
              Issuance
            </b-dropdown-item>
            <b-dropdown-item>
              Distribution
            </b-dropdown-item>
             <b-dropdown-item>
              Picking
            </b-dropdown-item>
            <b-dropdown-item>
              Checking and Palletizing
            </b-dropdown-item>
            <b-dropdown-item>
              Parts for DR
            </b-dropdown-item>
            <b-dropdown-item>
              Update Delivery
            </b-dropdown-item>
          </b-nav-item-dropdown>

          <b-nav-item-dropdown
          class="mr-3"
            text="Managements"
            right
          >
            <b-dropdown-item @click="areaCode()">
              Area Code
            </b-dropdown-item>
            <b-dropdown-item>
              Destination
            </b-dropdown-item>
             <b-dropdown-item>
              User
            </b-dropdown-item>
          </b-nav-item-dropdown>

          <b-nav-item-dropdown
          class="mr-3"
            text="User"
            right
          >
            <b-dropdown-item @click="logout()">
              Log out
            </b-dropdown-item>
          </b-nav-item-dropdown>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex';
// import router from '../../../router';
export default {
    methods: {
      ...mapActions('auth', {
        logoutState: 'logout'
      }),
      logout(){
        this.$http.get('api/logout')
        .then((response) => {
            this.logoutState();
        });
      },
      areaCode(){
        this.$router.push({name: 'area-code'});
      }
    }
}
</script>

<style lang="scss" scoped >
nav {
  background: white;
    border-top: 2px solid gray;
    border-bottom: 1px solid  gray;
    a .nav-link{
      color: black !important;
    }
}

nav .navbar-nav{
  display: flex;
  justify-content: space-between;
 
}
</style>