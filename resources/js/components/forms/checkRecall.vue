<template>
    <div>
        <button @click="showModal" class="theme-link-active focus:outline-none active:outline-none text-lg capitalize">Please submit your details to know your car recall status. </button>

        <modal adaptive width="1100" height="auto" scrollable name="recall-modal" class="bg-opacity-25 bg-black relative">
            <div class="bg-white relative p-12 rounded-lg">
                <div class="absolute right-0 top-0 px-4 py-3">
                    <span @click="$modal.hide('newsletter-modal')">
                        <svg class="fill-current w-8 h-8 text-gray-600 hover:text-red-600 focus:outline-none cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                    </span>
                </div>
                <div class="text-base md:text-lg font-semibold text-gray-800 mb-5">Please submit your details to know your car recall status.</div>
                <ValidationObserver v-slot="{ invalid,passes }">
                 <form @submit.prevent="passes(submitForm)">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-10">
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
                            <ValidationProvider name="form.mobile" rules="mobile">
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
                            <ValidationProvider name="form.chassis">
                                <div slot-scope="{ errors }">
                                    <input type="text" v-model="form.chassis" class="form-input-1" name="chassis" placeholder="Chassis Number *">
                                    <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                </div>
                            </ValidationProvider>
                        </div>
                        <div>
                            <ValidationProvider name="form.registration">
                                <div slot-scope="{ errors }">
                                    <input type="text" v-model="form.registration" class="form-input-1" name="registration" placeholder="Registration Number *">
                                    <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                </div>
                            </ValidationProvider>
                        </div>
                        <div v-if="!$apollo.queries.models.loading">
                            <ValidationProvider name="form.model" rules="required">
                                <div slot-scope="{ errors }">
                                    <multiselect v-model="form.model" track-by="title" label="title" placeholder="Model *" :options="models" :searchable="false" :allow-empty="false">
                                        <template slot="singleLabel" slot-scope="{ option }">{{ option.title }}</template>
                                    </multiselect>
                                    <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                </div>
                            </ValidationProvider>
                        </div>
                        <div>
                            <ValidationProvider name="form.hearFrom" rules="required">
                                <div slot-scope="{ errors }">
                                    <multiselect placeholder="Model Year *" v-model="form.year" :options="years"></multiselect>
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
                            value="Check"
                            :disabled="!form.check"
                            :class="[
                                invalid ? 'bg-theme-gray-dark text-gray-800 cursor-not-allowed red-button border-theme-gray-dark hover:bg-theme-gray-dark hover:text-gray-800 hover:border-theme-gray-dark' : 'red-button cursor-pointer',
                                !form.check ? 'bg-theme-gray-dark text-gray-800 cursor-not-allowed red-button border-theme-gray-dark hover:bg-theme-gray-dark hover:text-gray-800 hover:border-theme-gray-dark' :  'red-button cursor-pointer'
                                ]">
                    </div>

                </form>
                </ValidationObserver>
            </div>
        </modal>

    </div>
</template>

<script>

    import Multiselect from 'vue-multiselect'
    import PrettyCheckbox from 'pretty-checkbox-vue/check';

    import { extend,ValidationProvider,ValidationObserver } from 'vee-validate';
    import { required, email, oneOf } from 'vee-validate/dist/rules';

    import gql from 'graphql-tag'
    import vehiclesQuery from "../../../../gql/frontend/vehicles.gql";

    // Add the required rule
    extend('required', {
        ...required,
        message: 'This field is required'
    });

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
    props: ['recall'],
    components: {
        Multiselect,
        ValidationProvider,
        ValidationObserver,
        'p-check': PrettyCheckbox
    },
    data() {
        return {
            form: {
                first_name: null,
                check_for_email: false,
                last_name: null,
                email: null,
                model: null,
                year: null,
                chassis: null,
                registration: null,
                check: false,
                formSubmited: false,
                submitMessage: "Your request has been submitted, You will have a response from our team shortly.",
            },
            titles: ['Mr', 'Mrs'],
            years: ["2016", "2017", "2018", "2019", "2020", "2021"],

            isLoading: false
        }
    },
    methods: {
        submitForm () {
            if(this.form.check){
                this.isLoading = true
                axios.post(`/api/recall`, {
                    first_name: this.form.first_name,
                    last_name: this.form.last_name,
                    email: this.form.email,
                    check_for_email: this.form.check_for_email,
                    mobile: this.form.phone,
                    chassis: this.form.chassis,
                    registration: this.form.registration,
                    model: this.form.model,
                    year: this.form.year,
                    recall_id: this.recall,
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
                        this.$modal.hide('recall-modal');
                    }
                    this.isLoading = false
                })

            }
        },
        showModal () {
            this.$modal.show('recall-modal');
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
    },
}
</script>
