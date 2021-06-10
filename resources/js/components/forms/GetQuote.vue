<template>
    <div>
        <div class="text-xl md:text-3xl suzuki-bold text-gray-900 mb-5"> Get a Quote</div>
            <ValidationObserver v-slot="{ invalid,passes }">
                <form @submit.prevent="passes(submitForm)">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-10">
                    <div class="lg:col-span-2">
                        <div class="block text-lg font-medium text-gray-800 mb-2">Select a model</div>
                        <ValidationProvider name="form.models" rules="required">
                            <div slot-scope="{ errors }">
                                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-7 gap-5 items-center lg:justify-between">
                                    <label
                                    v-for="(model, n) in models"
                                    :key="n"
                                    :class=" selectedModel.id === model.id ? 'border-gray-300 bg-gray-50' : 'border-transparent bg-transparent'"
                                    class="rounded p-2 lg:text-center border w-full">
                                        <input
                                        class="hidden"
                                        type="radio"
                                        v-model="selectedModel"
                                        :value="model"
                                        number>
                                        <span
                                        :class="selectedModel.id === model.id ? 'text-gray-700' : 'text-gray-600'"
                                        class="suzuki-bold cursor-pointer text-2xl uppercase font-medium italic ">
                                        <vehicle-logo :slide="model" class="flex items-center justify-center h-12"></vehicle-logo>
                                        </span>
                                    </label>
                                </div>
                                <p class="text-theme-red-500 mt-1 px-1 text-sm">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div>
                        <ValidationProvider name="form.title" rules="required">
                            <div slot-scope="{ errors }">
                                <multiselect v-model="form.title" :options="titles"></multiselect>
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div class="w-full relative">
                        <ValidationProvider name="form.purchaseType" rules="required">
                            <div slot-scope="{ errors }">
                                <multiselect v-model="form.purchaseType" placeholder="Purchase Type *" :options="purchaseTypes"></multiselect>
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute top-0 p-2 right-0 z-10">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div>
                        <ValidationProvider name="form.first_name" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="text" v-model="form.first_name" class="form-input-1" name="first_name" placeholder="First Name *">
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div>
                        <ValidationProvider name="form.last_name" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="text" v-model="form.last_name" class="form-input-1" name="last_name" placeholder="Last Name *">
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div>
                        <ValidationProvider name="form.age" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="text" v-model="form.age" class="form-input-1" name="age" placeholder="Age *">
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div>
                        <ValidationProvider name="form.mobile" rules="required|mobile">
                            <div slot-scope="{ errors }">
                                <input type="text" v-model="form.mobile" class="form-input-1" name="mobile" placeholder="Mobile Number *">
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">
                                    <!-- <span v-if="isValidMobileNumber">Must be a valid UAE mobile number. </span> -->
                                    <span>{{ errors[0] }}</span>
                                </p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div>
                        <ValidationProvider name="form.mobile" rules="mobile|required">
                            <div slot-scope="{ errors }">
                                <input type="text" v-model="form.phone" class="form-input-1" name="phone" placeholder="Phone Number *">
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">
                                    <!-- <span v-if="isValidMobileNumber">Must be a valid UAE mobile number. </span> -->
                                    <span>{{ errors[0] }}</span>
                                </p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div>
                        <ValidationProvider name="form.email" rules="required|email">
                            <div slot-scope="{ errors }">
                                <input type="email" v-model="form.email" class="form-input-1" name="email" placeholder="Email">
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div>
                        <ValidationProvider name="form.hear" rules="required">
                            <div slot-scope="{ errors }">
                                <multiselect placeholder="Select Emirate" v-model="form.emirate" :options="emirates"></multiselect>
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div v-if="!$apollo.queries.branches.loading">
                        <ValidationProvider name="form.hearFrom" rules="required">
                            <div slot-scope="{ errors }">
                                <multiselect placeholder="Nearest showroom you can visit *" v-model="form.showroom" label="title" :options="branches">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.title }}</template>
                                </multiselect>
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div class="lg:col-span-2 lg:pr-5 lg:w-1/2">
                        <label class="block text-lg font-medium text-gray-800 mb-2">How did you hear about us?</label>
                        <ValidationProvider name="form.hearFrom" rules="required">
                            <div slot-scope="{ errors }">
                                <multiselect v-model="form.hearFrom" :options="hears"></multiselect>
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                </div>
                <div class="form-element mt-8">
                    <label class="flex items-center">
                            <p-check v-model="form.check" class="p-bigger p-curve p-rotate p-icon" color="danger">
                                <span>
                                    <svg class="icon w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </span>
                            </p-check>
                        <span
                        :class="!form.check ? 'text-red-600' : 'text-gray-800'"
                        class="block mt-1 -ml-3 inline-block">Please confirm you have read and agree to our <a href="http://" class="theme-link">Terms and Conditions</a> *</span>
                    </label>
                </div>

                <div class="form-element mt-4">
                    <label class="flex items-center">
                            <p-check v-model="form.check_for_email" class="p-bigger p-curve p-rotate p-icon" color="success">
                                <span>
                                    <svg class="icon w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </span>
                            </p-check>
                        <span
                        class="block mt-1 -ml-3 inline-block">Check this for latest offers, deals and updates. </span>
                    </label>
                </div>

                <div v-if="isLoading" class="loader"></div>
                <div v-else class="form-element mb-0 mt-5 text-right">
                    <input
                        type="submit"
                        value="Submit"
                        :disabled="!form.check"
                        :class="[
                            invalid ? 'bg-theme-gray-dark text-gray-800 cursor-not-allowed red-button border-theme-gray-dark hover:bg-theme-gray-dark hover:text-gray-800' : 'red-button cursor-pointer',
                            !form.check ? 'bg-theme-gray-dark text-gray-800 cursor-not-allowed red-button border-theme-gray-dark hover:bg-theme-gray-dark hover:text-gray-800' :  'red-button cursor-pointer'
                            ]">
                </div>
            </form>
            </ValidationObserver>
        </div>
</template>

<script>

    import Multiselect from 'vue-multiselect'
    import PrettyCheckbox from 'pretty-checkbox-vue/check';

    import { extend,ValidationProvider,ValidationObserver } from 'vee-validate';
    import { required, email } from 'vee-validate/dist/rules';

    import gql from 'graphql-tag'
    import vehiclesQuery from "../../../../gql/frontend/vehicles.gql";
    import branchesQuery from "../../../../gql/frontend/branchesbyemail.gql";
    import vehicleLogo from './vehicleLogo'

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
            Multiselect,
            ValidationProvider,
            ValidationObserver,
            'p-check': PrettyCheckbox,
            vehicleLogo
        },
        data() {
            return {
                isValidMobileNumber: true,
                titles: ['Mr', 'Mrs'],
                selectedModel: 1,
                isLoading: false,
                form: {
                    first_name: null,
                    last_name: null,
                    title: null,
                    email: null,
                    hear: null,
                    mobile: null,
                    phone: null,
                    emirate: null,
                    purchaseType: null,
                    check: false,
                    showroom: false,
                },
                emirates: ["Dubai", "Abu Dhabi", "Sharjah", "Ras al khaimah", "Ajman", "Fujairah", "Umm al Quwain"],
                hears: [
                    "Email",
                    "Friends & Relatives",
                    "Google",
                    "Magazines",
                    "Newspaper - Digital",
                    "Newspaper - Print",
                    "Outdoor ads",
                    "Radio",
                    "Showrooms",
                    "SMS",
                    "Social Media (Facebook; Instagram; TikTok; Youtube)",
                    "Suzuki User",
                    "Web - Internet",
                    "Other Social Media",
                    "Other"
                ],
                purchaseTypes: ["Individual", "Company"],
                showrooms: ["Deira City center", "Abu Dhabi", "shaikh zayed road", "Al Ain", "Sharjah", "Ajman"],
            }
        },
        methods: {
            submitForm () {
                 if(this.form.check){
                    this.isLoading = true
                    axios.post(`/api/get-quote`, {
                        title: this.form.title,
                        first_name: this.form.first_name,
                        last_name: this.form.last_name,
                        hear: this.form.hear,
                        emirate: this.form.emirate,
                        email: this.form.email,
                        model: this.selectedModel,
                        phone: this.form.phone,
                        mobile: this.form.mobile,
                        check_for_email: this.form.check_for_email,
                        hear: this.form.hearFrom,
                        showroom: this.form.showroom,
                        purchase_type: this.form.purchaseType,
                        age: this.form.age,
                    })
                    .then(response => {
                        this.$emit('updated')
                        this.$swal({
                            toast: true,
                            position: 'center',
                            showConfirmButton: false,
                            timer: 3000,
                            title: response.data.wow,
                            text: response.data.message,
                        });
                        if(response.data.wow != 'opps!') {
                            this.form = []
                        }
                        this.isLoading = false
                    })
                }
            }
        },
        apollo: {
            models() {
                return {
                    query: vehiclesQuery,
                    update(data) {
                        this.selectedModel = data.vehicles[0]
                        return data.vehicles;
                    },
                };
            },
            branches() {
                return {
                    query: branchesQuery,
                    variables: {
                        type: 'services',
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
