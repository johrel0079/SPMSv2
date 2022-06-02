<template>
    <div>
        <!-- This the main container -->
        <the-header></the-header>
        <the-sidebar></the-sidebar>
        <!-- <the-aside></the-aside> -->
        <div class="alpha__container">
            <router-view />
        </div>
        <the-footer></the-footer>
    </div>
</template>

<script>
import TheHeader from './TheHeader.vue';
import TheSidebar from './TheSidebar.vue';
import TheFooter from './TheFooter.vue';
import TheAside from './TheAside.vue';
export default {
    name: "TheContainer",
    components: {
        TheHeader,
        TheSidebar,
        TheFooter,
        TheAside
        
    }
}
</script>

<style lang="scss">
@import "../assets/sass/imports/general";

.alpha__container {
  background: $container;
  width: 100%;
  min-height: 96vh;
  padding: 100px 30px 30px 30px;
  z-index: 20;
}
</style>