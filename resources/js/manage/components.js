import Vue from 'vue'

Vue.component(
    "main-side-navbar",
    require("./components/MainSideNavbar.vue").default
);

Vue.component(
    "delete-record",
    require("./components/DeleteRecord.vue").default
);
