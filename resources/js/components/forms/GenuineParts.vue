<template>
    <div>
        <div v-if="!isFormSend">
            <div class="text-xl md:text-2xl suzuki-bold text-gray-900 mb-5">Request a Quote – Genuine Parts</div>
            <div v-if="formSubmited" class="message h-screen-50 flex items-center justify-center">
                <p class="text-green-600 text-xl"> {{submitMessage}} </p>
            </div>
            <ValidationObserver v-else v-slot="{ invalid,passes }">
                <form @submit.prevent="passes(submitForm)">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                    <div class="lg:col-span-2">
                        <div class="block text-lg font-medium text-gray-800 mb-2">Select A Model</div>
                        <ValidationProvider name="form.models" rules="required">
                            <div slot-scope="{ errors }">
                                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-7 gap-5 items-center lg:justify-between">
                                    <label
                                    v-for="(model, n) in models"
                                    :key="n"
                                    :class=" selectedModel === model.title ? 'border-gray-300 bg-gray-50' : 'border-transparent bg-transparent'"
                                    class="rounded p-2 lg:text-center border w-full">
                                        <input
                                        class="hidden"
                                        type="radio"
                                        v-model="selectedModel"
                                        :value="model.title"
                                        number>
                                        <span
                                        :class="selectedModel === model.title ? 'text-gray-700' : 'text-gray-600'"
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
                                <multiselect placeholder="Title *" v-model="form.title" :options="titles"></multiselect>
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
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
                        <ValidationProvider name="form.hear" rules="required">
                            <div slot-scope="{ errors }">
                                <multiselect placeholder="Select Emirate" v-model="form.emirate" :options="emirates"></multiselect>
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div v-if="!$apollo.queries.branches.loading">
                        <ValidationProvider name="form.showroom" rules="required">
                            <div slot-scope="{ errors }">
                                <multiselect placeholder="Nearest showroom you can visit *" v-model="form.showroom" label="title" :options="branches">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.title }}</template>
                                </multiselect>
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div>
                        <ValidationProvider name="form.vin" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="text" v-model="form.vin" class="form-input-1" name="vin" placeholder="Car Registration Number & VIN *">
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div>
                        <ValidationProvider name="form.part" rules="required">
                            <div slot-scope="{ errors }">
                                <multiselect placeholder="Select Part *" v-model="form.part" :options="parts"></multiselect>
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div class="lg:col-span-2">
                        <textarea type="text" rows="3" v-model="form.detail" class="form-input-1" name="vin" placeholder="Enter the details for the part required *"></textarea>
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
                <div class="form-element mb-0 mt-5 text-right">
                    <div v-if="isLoading" class="loader"></div>
                    <input
                        v-else
                        type="submit"
                        value="Submit"
                        :disabled="invalid"
                        :class="invalid ? 'bg-theme-gray-dark text-gray-800 cursor-not-allowed red-button border-theme-gray-dark hover:bg-theme-gray-dark hover:text-gray-800 hover:border-theme-gray-dark' : 'red-button'">
                        <p v-if="checkError == 0 && !form.check" class="text-center text-theme-red-500 mt-1 px-1 text-base font-medium">You must agree to our terms & conditions.</p>
                </div>
            </form>
            </ValidationObserver>
        </div>
        <div class="h-64 flex items-center justify-center text-lg text-green-600" v-else>
            We have recived your request for the test drive. Shortly you will get a call from one of our member.
        </div>
    </div>
</template>

<script>

    import gql from 'graphql-tag'
    import vehiclesQuery from "../../../../gql/frontend/vehicles.gql";
    import branchesQuery from "../../../../gql/frontend/branchesbyemail.gql";
    import vehicleLogo from './vehicleLogo'

    import Multiselect from 'vue-multiselect'
    import PrettyCheckbox from 'pretty-checkbox-vue/check';

    import DatePicker from 'v-calendar/lib/components/date-picker.umd'

    import { extend,ValidationProvider,ValidationObserver } from 'vee-validate';
    import { required, email } from 'vee-validate/dist/rules';


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
            vehicleLogo,
            ValidationProvider,
            ValidationObserver,
            'p-check': PrettyCheckbox,
            'v-date-picker': DatePicker

        },
        data() {
            return {
                isValidMobileNumber: true,
                titles: ['Mr', 'Mrs'],
                selectedModel: null,
                isLoading: false,
                isFormSend: false,
                checkError: 2,
                formSubmited: false,
                submitMessage: "Your request has been submitted, You will have a response from our team shortly.",
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
                    date: new Date(),
                    stype: false,
                    year: false,
                    vin: null,
                    part: false,
                    detail: null,
                    model: null
                },
                parts: ["part 1", "part 2", "part 3", "part 4"],
                emirates: ["Dubai", "Abu Dhabi", "Sharjah", "Ras al khaimah", "Ajman", "Fujairah", "Umm al Quwain"],
                showrooms: ["Deira City center", "Abu Dhabi", "shaikh zayed road", "Al Ain", "Sharjah", "Ajman"],
            }
        },
        methods: {
            submitForm () {
                 if(this.form.check){
                    this.isLoading = true
                    this.checkError = 1
                    axios.post(`/api/geniune-parts`, {
                        first_name: this.form.first_name,
                        last_name: this.form.last_name,
                        title: this.form.title,
                        email: this.form.email,
                        mobile: this.form.mobile,
                        tel: this.form.phone,
                        age: this.form.age,
                        emirate: this.form.emirate,
                        showroom: this.form.showroom,
                        date: this.form.date,
                        vin: this.form.vin,
                        year: this.form.year,
                        part: this.form.part,
                        detail: this.form.detail,
                        model: this.selectedModel
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
                        }
                        this.isLoading = false
                        this.isFormSend = true
                        this.formSubmited = true
                    })
                }else{
                    this.checkError = 0
                }
            }
        },
        apollo: {
            models() {
                return {
                    query: vehiclesQuery,
                    update(data) {
                        return data.vehicles;
                    },
                };
            },
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
