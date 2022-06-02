<template>
    <transition name="sidebar-slide">
        <aside class="sidebar" v-if="getShowSidebarStatus">
            <div class="sidebar__menu">
                <label class="sidebar__menu__headline">Main Menu</label>
                <ul class="sidebar__menu__item">
                    <li @click="setSidebarVisibility">
                        <router-link :to="{name:'Dashboard'}" class="item__link">
                        <font-awesome-icon
                            icon="tachometer-alt"
                            size="sm"
                            class="icon"
                        />Dashboard
                        </router-link>
                    </li>
                    <li @click="setSidebarSubMenuVisibility">
                        <font-awesome-icon
                            icon="list"
                            size="sm"
                            class="icon"/>Monitoring
                        <font-awesome-icon
                            icon="angle-right"
                            size="sm"
                            class="icon anchor"
                            pull="right"
                            :class="{ 'anchor--down': getShowSidebarSubMenuStatus }"/>
                            <transition name="sidebar-sub-slide" v-if="getShowSidebarSubMenuStatus">
                                <ul class="sidebar__submenu">
                                    <li  @click="setSidebarVisibility">
                                    <router-link :to="{name:'MasterData'}" class="item__link">
                                        <a>
                                        <font-awesome-icon
                                            icon="list"
                                            size="sm"
                                            class="icon"
                                        />
                                        Master Data
                                        </a>
                                    </router-link>
                                    </li>  
                                </ul>
                            </transition>
                    </li>
                    <li @click="setSidebarSubMenuVisibility">
                        <font-awesome-icon
                            icon="list"
                            size="sm"
                            class="icon"/>Transaction
                        <font-awesome-icon
                            icon="angle-right"
                            size="sm"
                            class="icon anchor"
                            pull="right"
                            :class="{ 'anchor--down': getShowSidebarSubMenuStatus }"/>
                            <transition name="sidebar-sub-slide" v-if="getShowSidebarSubMenuStatus">
                                <ul class="sidebar__submenu">
                                    <li  @click="setSidebarVisibility">
                                        <router-link :to="{name:'PickingMasterlist'}" class="item__link">
                                            <a>
                                            <font-awesome-icon
                                                icon="list"
                                                size="sm"
                                                class="icon"
                                            />
                                            Picking Masterlist
                                            </a>
                                        </router-link>
                                    </li>
                                    <li  @click="setSidebarVisibility">
                                        <router-link :to="{name:'PickingTicketDistribution'}" class="item__link">
                                            <a>
                                            <font-awesome-icon
                                                icon="list"
                                                size="sm"
                                                class="icon"
                                            />
                                            Picking Ticket Distribution
                                            </a>
                                        </router-link>
                                    </li>
                                    <li  @click="setSidebarVisibility">
                                        <router-link :to="{name:'Checking'}" class="item__link">
                                            <a>
                                            <font-awesome-icon
                                                icon="list"
                                                size="sm"
                                                class="icon"
                                            />
                                            Checking
                                            </a>
                                        </router-link>
                                    </li>
                                    <li  @click="setSidebarVisibility">
                                        <router-link :to="{name:'Palletizing'}" class="item__link">
                                            <a>
                                            <font-awesome-icon
                                                icon="list"
                                                size="sm"
                                                class="icon"
                                            />
                                            Palletizing
                                            </a>
                                        </router-link>
                                    </li>
                                    <li  @click="setSidebarVisibility">
                                        <router-link :to="{name:'PartsForDR'}" class="item__link">
                                            <a>
                                            <font-awesome-icon
                                                icon="list"
                                                size="sm"
                                                class="icon"
                                            />
                                            Parts for DR
                                            </a>
                                        </router-link>
                                    </li>
                                    <li  @click="setSidebarVisibility">
                                        <router-link :to="{name:'UpdateDelivery'}" class="item__link">
                                            <a>
                                            <font-awesome-icon
                                                icon="list"
                                                size="sm"
                                                class="icon"
                                            />
                                            Update Delivery
                                            </a>
                                        </router-link>
                                    </li>
                                </ul>
                            </transition>
                    </li>
                    <li @click="setSidebarVisibility">
                        <router-link :to="{name:'Picker Window'}" class="item__link">
                        <font-awesome-icon
                            icon="tachometer-alt"
                            size="sm"
                            class="icon"
                        />Picker Window
                        </router-link>
                    </li>
                    <li @click="setSidebarSubMenuVisibility">
                        <font-awesome-icon
                            icon="users"
                            size="sm"
                            class="icon"
                        />Management
                         <font-awesome-icon
                            icon="angle-right"
                            size="sm"
                            class="icon anchor"
                            pull="right"
                            :class="{ 'anchor--down': getShowSidebarSubMenuStatus }"/>
                            <transition name="sidebar-sub-slide" v-if="getShowSidebarSubMenuStatus">
                                <ul class="sidebar__submenu">
                                    <li  @click="setSidebarVisibility">
                                    <router-link :to="{name:'UserManagement'}" class="item__link">
                                        <a>
                                        <font-awesome-icon
                                            icon="users"
                                            size="sm"
                                            class="icon"
                                        />
                                        User Management
                                        </a>
                                    </router-link>
                                    </li>
                                    <li @click="setSidebarVisibility" >
                                    <router-link :to="{name:'SectionManagement'}" class="item__link">
                                        <a>
                                        <font-awesome-icon
                                            icon="cubes"
                                            size="sm"
                                            class="icon"
                                        />
                                        Section
                                        </a>
                                    </router-link>
                                    </li>
                                    <li  @click="setSidebarVisibility">
                                    <router-link :to="{name:'PositionManagement'}" class="item__link">
                                        <a>
                                        <font-awesome-icon
                                            icon="ring"
                                            size="sm"
                                            class="icon"
                                        />
                                        Position
                                        </a>
                                    </router-link>
                                    </li>
                                     <li  @click="setSidebarVisibility">
                                    <router-link :to="{name:'RoleManagement'}" class="item__link">
                                        <a>
                                        <font-awesome-icon
                                            icon="columns"
                                            size="sm"
                                            class="icon"
                                        />
                                        Role
                                        </a>
                                    </router-link>
                                    </li>
                                </ul>
                                </transition>
                    </li>
                    <li @click="setSidebarVisibility">
                        <router-link to="/reports" class="item__link">
                        <font-awesome-icon
                            icon="envelope"
                            size="sm"
                            class="icon"
                        />Reports
                        </router-link>
                    </li>
                </ul>
            </div>
        </aside>
    </transition>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
    name: 'TheSidebar',
    methods: {
        ...mapActions(["setSidebarVisibility", "setSidebarSubMenuVisibility"]),
    },
    computed: {
        ...mapGetters(["getShowSidebarStatus", "getShowSidebarSubMenuStatus"]),
    },
}
</script>

<style lang="scss">
@import "../assets/sass/alpha/sidebar.scss";
</style>