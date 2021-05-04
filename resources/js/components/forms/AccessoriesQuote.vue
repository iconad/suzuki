<template>
    <div>
        <button @click="showModal" class="red-button">Enquire Now </button>
        <modal adaptive width="1100" height="auto" scrollable name="modal" @before-close="onModalClose" class="bg-opacity-25 bg-black relative">
            <div class="relative p-5 md:p-10">
                <div class="absolute right-0 top-0 px-4 py-3">
                    <span @click="$modal.hide('modal')">
                        <svg class="fill-current w-8 h-8 text-gray-600 hover:text-red-600 focus:outline-none cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                    </span>
                </div>
                <div class="text-xl md:text-3xl suzuki-bold text-gray-900 mb-5"> Request A Quote for Selected items</div>
                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/2 pr-0 pt-5 md:pr-10 ">

                        <accessories-cart v-if="cart.length != 0"></accessories-cart>
                        <div v-else class="flex items-center justify-center w-full h-full">
                            <div class="suzuki-bold text-2xl text-red-600"> Cart is Empty! </div>
                        </div>

                    </div>
                    <div class="w-full md:w-1/2">
                        <ValidationObserver v-slot="{ invalid,passes }">
                            <form @submit.prevent="passes(submitForm)">
                            <div class="flex flex-wrap">
                                <div class="w-full relative">
                                    <ValidationProvider name="form.purchaseType" rules="required">
                                        <div slot-scope="{ errors }">
                                            <multiselect v-model="form.purchaseType" placeholder="Purchase Type *" :options="purchaseTypes"></multiselect>
                                            <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute top-0 p-2 right-0 z-10">{{ errors[0] }}</p>
                                        </div>
                                    </ValidationProvider>
                                </div>
                                <div class="w-full relative">
                                    <ValidationProvider name="form.title" rules="required">
                                        <div slot-scope="{ errors }">
                                            <multiselect v-model="form.title" placeholder="Title *" :options="titles"></multiselect>
                                            <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute top-0 p-2 right-0 z-10">{{ errors[0] }}</p>
                                        </div>
                                    </ValidationProvider>
                                </div>
                                <div class="w-full relative">
                                    <ValidationProvider name="form.first_name" rules="required">
                                        <div slot-scope="{ errors }">
                                            <input type="text" v-model="form.first_name" class="form-input-1" name="first_name" placeholder="First Name *">
                                            <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute top-0 p-2 right-0 z-10">{{ errors[0] }}</p>
                                        </div>
                                    </ValidationProvider>
                                </div>
                                <div class="w-full relative">
                                    <ValidationProvider name="form.last_name" rules="required">
                                        <div slot-scope="{ errors }">
                                            <input type="text" v-model="form.last_name" class="form-input-1" name="last_name" placeholder="Last Name *">
                                            <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute top-0 p-2 right-0 z-10">{{ errors[0] }}</p>
                                        </div>
                                    </ValidationProvider>
                                </div>
                                <div class="w-full relative">
                                    <ValidationProvider name="form.age" rules="required">
                                        <div slot-scope="{ errors }">
                                            <input type="text" v-model="form.age" class="form-input-1" name="age" placeholder="Age *">
                                            <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute top-0 p-2 right-0 z-10">{{ errors[0] }}</p>
                                        </div>
                                    </ValidationProvider>
                                </div>
                                <div class="w-full relative">
                                    <ValidationProvider name="form.mobile" rules="required|mobile">
                                        <div slot-scope="{ errors }">
                                            <input type="text" v-model="form.mobile" class="form-input-1" name="mobile" placeholder="Mobile Number *">
                                            <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute top-0 p-2 right-0 z-10">
                                                <!-- <span v-if="isValidMobileNumber">Must be a valid UAE mobile number. </span> -->
                                                <span>{{ errors[0] }}</span>
                                            </p>
                                        </div>
                                    </ValidationProvider>
                                </div>
                                <div class="w-full relative">
                                    <ValidationProvider name="form.mobile" rules="mobile">
                                        <div slot-scope="{ errors }">
                                            <input type="text" v-model="form.phone" class="form-input-1" name="phone" placeholder="Phone Number *">
                                            <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute top-0 p-2 right-0 z-10">
                                                <!-- <span v-if="isValidMobileNumber">Must be a valid UAE mobile number. </span> -->
                                                <span>{{ errors[0] }}</span>
                                            </p>
                                        </div>
                                    </ValidationProvider>
                                </div>
                                <div class="w-full relative">
                                    <ValidationProvider name="form.email" rules="required|email">
                                        <div slot-scope="{ errors }">
                                            <input type="email" v-model="form.email" class="form-input-1" name="email" placeholder="Email">
                                            <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute top-0 p-2 right-0 z-10">{{ errors[0] }}</p>
                                        </div>
                                    </ValidationProvider>
                                </div>
                                <div class="w-full relative" v-if="!$apollo.queries.branches.loading">
                                    <ValidationProvider name="form.hearFrom" rules="required">
                                        <div slot-scope="{ errors }">
                                            <multiselect placeholder="Nearest showroom you can visit *" v-model="form.showroom" label="title" :options="branches">
                                                <template slot="singleLabel" slot-scope="{ option }">{{ option.title }}</template>
                                            </multiselect>
                                            <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute top-0 p-2 right-0 z-10">{{ errors[0] }}</p>
                                        </div>
                                    </ValidationProvider>
                                </div>
                            </div>
                            <div class="form-element mt-8">
                                <label class="flex items-center text-sm">
                                        <p-check v-model="form.check" class="p-curve p-rotate p-icon" color="danger">
                                            <span>
                                                <svg class="icon w-3 h-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                            </span>
                                        </p-check>
                                    <span
                                    :class="!form.check ? 'text-red-600' : 'text-gray-800'"
                                    class="block mt-1 -ml-3 inline-block">Please confirm you have read and agree to our <a href="http://" class="theme-link">Terms and Conditions</a> *</span>
                                </label>
                            </div>
                            <div class="form-element mb-0 mt-5 text-right">
                                <div v-if="isLoading" class="loader"></div>
                                <template v-else>
                                    <input
                                    v-if="!invalid && cart.length != 0"
                                    type="submit"
                                    value="Submit"
                                    :class="[
                                        cart.length == 0 ? 'bg-theme-gray-dark text-gray-800 cursor-not-allowed red-button border-theme-gray-dark hover:bg-theme-gray-dark hover:text-gray-800 hover:border-theme-gray-dark' : 'red-button',
                                        invalid ? 'bg-theme-gray-dark text-gray-800 cursor-not-allowed red-button border-theme-gray-dark hover:bg-theme-gray-dark hover:text-gray-800 hover:border-theme-gray-dark' : 'red-button',
                                        !form.check ? 'bg-theme-gray-dark text-gray-800 cursor-not-allowed red-button border-theme-gray-dark hover:bg-theme-gray-dark hover:text-gray-800 hover:border-theme-gray-dark' :  'red-button'
                                        ]">
                                    <span v-else class="bg-theme-gray-dark text-gray-800 cursor-not-allowed red-button border-theme-gray-dark hover:bg-theme-gray-dark hover:text-gray-800 hover:border-theme-gray-dark">Submit</span>
                                </template>
                            </div>
                        </form>
                        </ValidationObserver>
                    </div>
                </div>
            </div>
        </modal>
        </div>
</template>

<script>

    import AccessoriesCart from '../accessories/AccessoriesCart'

    import Multiselect from 'vue-multiselect'
    import PrettyCheckbox from 'pretty-checkbox-vue/check';

    import { extend,ValidationProvider,ValidationObserver } from 'vee-validate';
    import { required, email } from 'vee-validate/dist/rules';

    import branchesQuery from "../../../../gql/frontend/branchesbyemail.gql";

    // Add the required rule
    extend('required', {
        ...required,
        message: 'This field is required'
    });

    // Add the required rule
    extend("mobile", {
        validate(value) {
            return /^(?:\+971|00971|0)?(?:50|51|52|55|58|56|2|3|4|6|7|9)\d{7}$/.test(value);
        },
        message: `Must be a valid UAE mobile number`
    });

    // Add the email rule
    extend('email', {
    ...email,
    message: 'This field must be a valid email'
    });

    export default {
        components: {
            AccessoriesCart,
            Multiselect,
            ValidationProvider,
            ValidationObserver,
            'p-check': PrettyCheckbox
        },
        data() {
            return {
                isLoading: false,
                isValidMobileNumber: true,
                titles: ['Mr', 'Mrs'],
                selectedModel: 1,
                form: {
                    first_name: null,
                    last_name: null,
                    title: null,
                    email: null,
                    hear: null,
                    mobile: null,
                    phone: null,
                    emirate: null,
                    check: false,
                    showroom: false,
                    purchaseType: null
                },
                purchaseTypes: ["type 1", "type 2", "type 3"],
            }
        },
        watch: {
            isModalShow (newValue, oldValue) {
                if (newValue) {
                    this.$modal.show('modal');
                    this.$store.commit('isCheckout', true);
                    this.$store.commit('isCart', true);
                }else{
                    this.$store.commit('isCheckout', false);
                    this.$store.commit('isCart', false);
                }
            }
        },
        computed: {
            isModalShow () {
                return this.$store.state.accessoriesQuoteModal
            },
            cart () {
                return this.$store.state.cart
            }
        },
        methods: {
            submitForm () {

                let cart = JSON.stringify(this.cart)

                if(this.form.check){
                    this.isLoading = true
                    axios.post(`/api/accessories-quote`, {
                        title: this.form.title,
                        first_name: this.form.first_name,
                        last_name: this.form.last_name,
                        showroom: this.form.showroom,
                        purchase_type: this.form.purchaseType,
                        cart: cart,
                        tel: this.form.tel,
                        mobile: this.form.mobile,
                        age: this.form.age,
                        email: this.form.email,
                    })
                    .then(response => {
                        this.$emit('updated')
                        this.$swal({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timerProgressBar: true,
                            timer: 3000,
                            icon: "success",
                            title: response.data.wow,
                            text: response.data.message,
                        });
                        if(response.data.wow != 'opps!') {
                            this.form = []
                            this.$modal.hide('modal');
                        }
                        this.isLoading = false
                    })

                }
        },
            showModal () {
                this.$store.commit("accessoriesQuoteModal", true)
            },
            onModalClose () {
                this.$store.commit("accessoriesQuoteModal", false)
            }
        },
        apollo: {
            branches() {
                return {
                    query: branchesQuery,
                    variables: {
                        type: 'parts',
                    },
                    update(data) {
                        return data.branchesByEmail;
                    },
                };
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>
