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
            text="Monitoring"
            right>
            <b-dropdown-item @click="masterData()">
              Masterdata
            </b-dropdown-item>
          </b-nav-item-dropdown>

          <b-nav-item-dropdown
          class="mr-3"
            text="Transactions"
            right
          >
            <b-dropdown-item @click="ticketIssuance()">
              Issuance
            </b-dropdown-item>
            <b-dropdown-item @click="distribution()">
              Distribution
            </b-dropdown-item>
             <b-dropdown-item @click="picking()">
              Picking
            </b-dropdown-item>
            <b-dropdown-item @click="checkingAndPalletizing()">
              Checking and Palletizing
            </b-dropdown-item>
            <b-dropdown-item @click="partsForDR()">
              Parts for DR
            </b-dropdown-item>
            <b-dropdown-item @click="updateDelivery()">
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
      },
      masterData(){
        this.$router.push({name: 'monitoring/master-data'});
      },
      ticketIssuance(){
        this.$router.push({name: 'transactions/ticket-issuance'});
      },
      distribution(){
        this.$router.push({name: 'transactions/distribution'});
      },
      picking(){
        this.$router.push({name: 'transactions/picking'});
      },
      checkingAndPalletizing(){
        this.$router.push({name: 'transactions/checking-and-palletizing'});
      },
      partsForDR(){
        this.$router.push({name: 'transactions/parts-for-dr'});
      },
      updateDelivery(){
        this.$router.push({name: 'transactions/update-delivery'});
      },
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