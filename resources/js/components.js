import Vue from 'vue'

Vue.component(
    "main-navbar",
    require("./components/utilities/MainNavbar.vue").default
);

Vue.component(
    "home-cover-slider",
    require("./components/home/CoverSlider.vue").default
);

Vue.component(
    "take-your-pick",
    require("./components/home/TakeYourPick.vue").default
);

// Forms
Vue.component(
    "newsletter-form",
    require("./components/forms/NewsletterForm.vue").default
);

// Vehicles
Vue.component(
    "showroom",
    require("./components/vehicle/Showroom.vue").default
);

Vue.component(
    "vehicle-explore-more",
    require("./components/vehicle/ExploreMore.vue").default
);

Vue.component(
    "spec-broucher",
    require("./components/forms/SpecBroucher.vue").default
);

Vue.component(
    "get-broucher",
    require("./components/forms/GetBroucher.vue").default
);

Vue.component(
    "get-quote",
    require("./components/forms/GetQuote.vue").default
);

Vue.component(
    "test-drive",
    require("./components/forms/TestDrive.vue").default
);

Vue.component(
    "request-quote-accessories",
    require("./components/forms/RequestQuoteAccessories").default
);

Vue.component(
    "book-service",
    require("./components/forms/BookService.vue").default
);

Vue.component(
    "our-commitment",
    require("./components/forms/OurCommitment.vue").default
);

Vue.component(
    "contact-us",
    require("./components/forms/ContactUs.vue").default
);

