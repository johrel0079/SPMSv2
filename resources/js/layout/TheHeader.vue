<template>
  <header class="alpha__header">
    <div class="nav__left">
      <!-- MINIMIZED MENU -->
      <span class="menu__min" @click="setSidebarVisibility">
         <!-- @click="setSidebarVisibility" -->
        <font-awesome-icon class="mt-2 mr-3" icon="bars" size="lg" />
      </span>
      <!-- TEMPLATE LOGO -->
       <!-- <router-link to="/load-localstorage/aoGyFhSXqLDC6KRTh7gNCLFC2vXcXDuBBiAX52ciwdACFPhnZonxD0ryPZTP9kWC" class="item__link">
       <img src="/assets/images/FujitsuLogo.png" class="nav__logo" />
       </router-link> -->
      <!-- NAVIGATION MENU -->
      <div class="nav__menus">
        <ul class="menu__default">
          <li class="menu__default__item">
            <router-link :to="{name:'Dashboard'}" class="item__link">Dashboard</router-link>
          </li>
          <!-- <li class="menu__default__item">
            <router-link to="/" class="item__link">Monitoring</router-link>
          </li> -->
          <!-- <li class="menu__default__item">
            <router-link :to="{name:'UserManagement'}" class="item__link">User Management</router-link>
          </li>
          <li class="menu__default__item" >
            <router-link to="/blank" class="item__link">Management</router-link>
          </li> -->
          <li class="menu__default__item">
            <router-link to="/blank" class="item__link">Reports</router-link>
          </li>
          <li class="menu__default__item">
            <router-link to="/" class="item__link">About</router-link>
          </li>
        </ul>
      </div>
    </div>
    <div class="nav__right">
      <!-- USER ACCOUNT INFORMATION (BUTTON) -->
      <div class="account__info">
        <div class="account__info__user">
          <span>John Doe</span>
          <span>Supervisor</span>
        </div>
        <font-awesome-icon
          class="icon__account"
          icon="address-card"
          size="lg"
        />
      </div>
    </div>
  </header>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
export default {
  name: "TheHeader",
  methods: {
    ...mapActions(["setSidebarVisibility"]),
  },
  computed: {
    // ...mapGetters(["getShowDDMenuStatus"]),
  },
};
</script>

<style lang="scss">
@import "../assets/sass/alpha/header.scss";
</style>
