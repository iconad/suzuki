<template>
    <div>
        <div class="bg-yellow-400">
            <ValidationObserver v-slot="{ invalid,passes }">
                <form @submit.prevent="passes(submitForm)">
                <div class="grid grid-cols-1 gap-3">
                    <div>
                        <ValidationProvider name="form.first_name" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="text" v-model="form.first_name" class="form-input-1 bg-transparent" name="first_name" placeholder="First Name *">
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div>
                        <ValidationProvider name="form.last_name" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="text" v-model="form.last_name" class="form-input-1 bg-transparent" name="last_name" placeholder="Last Name *">
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div>
                        <ValidationProvider name="form.email" rules="required|email">
                            <div slot-scope="{ errors }">
                                <input type="email" v-model="form.email" class="form-input-1 bg-transparent" name="email" placeholder="Email">
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div>
                        <ValidationProvider name="form.mobile" rules="required|mobile">
                            <div slot-scope="{ errors }">
                                <input type="text" v-model="form.mobile" class="form-input-1 bg-transparent" name="mobile" placeholder="Mobile Number *">
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">
                                    <span>{{ errors[0] }}</span>
                                </p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div v-if="!$apollo.queries.branches.loading">
                        <ValidationProvider name="form.hear" rules="required">
                            <div slot-scope="{ errors }">
                                <multiselect placeholder="Preferred Branch *" class="bg-transparent" v-model="form.showroom" label="title" :options="branches">
                                    <template slot="singleLabel" class="bg-transparrent" slot-scope="{ option }">{{ option.title }}</template>
                                </multiselect>
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
                        class="block mt-1 -ml-3 inline-block text-sm">Please confirm you have read and agree to our <a href="http://" class="theme-link">Terms and Conditions</a> *</span>
                    </label>
                </div>
                <div v-if="isLoading" class="loader"></div>
                <div v-else class="form-element mb-0 mt-5 text-right">
                    <span @click="cancelFinanceQuote" class="theme-link mr-5 cursor-pointer">Cancel</span>
                    <input
                        type="submit"
                        value="Submit"
                        :disabled="!form.check"
                        :class="[
                            invalid ? 'py-1 bg-theme-gray-dark text-gray-800 cursor-not-allowed red-button border-theme-gray-dark hover:bg-theme-gray-dark hover:text-gray-800 hover:border-theme-gray-dark' : 'red-button cursor-pointer',
                            !form.check ? 'py-1 bg-theme-gray-dark text-gray-800 cursor-not-allowed red-button border-theme-gray-dark hover:bg-theme-gray-dark hover:text-gray-800 hover:border-theme-gray-dark' :  'red-button cursor-pointer'
                            ]">
                </div>
            </form>
            </ValidationObserver>
        </div>
    </div>
</template>

<script>

    import Multiselect from 'vue-multiselect'
    import PrettyCheckbox from 'pretty-checkbox-vue/check';

    import { extend,ValidationProvider,ValidationObserver } from 'vee-validate';
    import { required, email, oneOf } from 'vee-validate/dist/rules';

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
    props: ['vehicle', 'duration', 'deposit', 'totol_interest', 'total_payable', 'interest_rate', 'price'],
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
                last_name: null,
                title: null,
                showroom: null,
                email: null,
                mobile: null,
                hearFrom: null,
                check: false,
            },
            titles: ['Mr', 'Mrs'],
            isLoading: false
        }
    },
    methods: {
        cancelFinanceQuote () {
            this.$emit('financel-quote')
        },
        submitForm () {
            if(this.form.check){
                this.isLoading = true
                axios.post(`/api/finance-quote`, {
                    title: this.form.title,
                    first_name: this.form.first_name,
                    last_name: this.form.last_name,
                    mobile: this.form.mobile,
                    email: this.form.email,
                    vehicle: this.vehicle,
                    emirate: this.form.showroom,
                    total_interest: this.total_interest,
                    total_payable: this.total_payable,
                    interest_rate: this.interest_rate,
                    price: this.price,
                    deposit: this.deposit,
                    duration: this.duration,
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
                        this.$emit('financel-quote')
                    }
                    this.isLoading = false
                })

            }
        },
    },
    apollo: {
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
