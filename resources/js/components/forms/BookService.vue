<template>
    <div>
        <div v-if="!isFormSend">
            <div class="mb-5 text-3xl suzuki-bold uppercase text-theme-skyblue"> Book Service</div>
            <div v-if="formSubmited" class="message h-screen-50 flex items-center justify-center">
                <p class="text-green-600 text-xl"> {{submitMessage}} </p>
            </div>
            <ValidationObserver v-else v-slot="{ invalid,passes }">
                <form @submit.prevent="passes(submitForm)">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-10">
                    <div>
                        <ValidationProvider name="form.title" rules="required">
                            <div slot-scope="{ errors }">
                                <multiselect placeholder="Title *" v-model="form.title" :options="titles"></multiselect>
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
                    <div v-if="!$apollo.queries.models.loading">
                        <ValidationProvider name="form.model" rules="required">
                            <div slot-scope="{ errors }">
                                <multiselect v-model="form.model" track-by="title" label="title" placeholder="Car Model" :options="models" :searchable="false" :allow-empty="false">
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
                    <div>
                        <ValidationProvider name="form.hearFrom" rules="required">
                            <div slot-scope="{ errors }">
                                <multiselect placeholder="Service Type *" v-model="form.stype" :options="services"></multiselect>
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div>
                        <ValidationProvider name="form.hearFrom" rules="required">
                            <div slot-scope="{ errors }">

                                <v-date-picker color="red" is-expanded v-model="form.date">
                                    <template v-slot="{ inputValue, inputEvents }">
                                        <input
                                        class="form-input-1"
                                        :value="inputValue"
                                        v-on="inputEvents"
                                        />
                                    </template>
                                </v-date-picker>

                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div v-if="!$apollo.queries.branches.loading">
                        <ValidationProvider name="form.hearFrom" rules="required">
                            <div slot-scope="{ errors }">
                                <multiselect placeholder="Preferred Branch *" v-model="form.showroom" label="title" :options="branches">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.title }}</template>
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


                <div class="form-element mb-0 mt-5 text-right">
                    <div v-if="isLoading" class="loader"></div>
                    <input
                        v-else
                        type="submit"
                        value="Submit"
                        :disabled="invalid"
                        :class="invalid ? 'bg-theme-gray-dark text-gray-800 cursor-not-allowed red-button border-theme-gray-dark hover:bg-theme-gray-dark hover:text-gray-800' : 'red-button'">
                </div>
                <p v-if="checkError == 0 && !form.check" class="text-center text-theme-red-500 mt-1 px-1 text-base font-medium">You must agree to our terms & conditions.</p>

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
            ValidationProvider,
            ValidationObserver,
            'p-check': PrettyCheckbox,
            'v-date-picker': DatePicker

        },
        data() {
            return {
                isValidMobileNumber: true,
                titles: ['Mr', 'Mrs'],
                selectedModel: 1,
                checkError: 2,
                isLoading: false,
                isFormSend: false,
                formSubmited: false,
                submitMessage: "Your request has been submitted, You will have a response from our team shortly.",
                form: {
                    first_name: null,
                    last_name: null,
                    title: null,
                    email: null,
                    mobile: null,
                    phone: null,
                    emirate: null,
                    check: false,
                    showroom: false,
                    date: new Date(),
                    stype: false,
                    year: false,
                    purchaseType: null,
                    model: null
                },
                services: ["service 1", "service 2", "service 3", "service 4"],
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
                years: ["2016", "2017", "2018", "2019", "2020", "2021"],
                showrooms: ["Deira City center", "Abu Dhabi", "shaikh zayed road", "Al Ain", "Sharjah", "Ajman"],
            }
        },
        methods: {
            submitForm () {
                 if(this.form.check){
                    this.isLoading = true
                    this.checkError = 1
                    axios.post(`/api/book-service`, {
                        title: this.form.title,
                        first_name: this.form.first_name,
                        last_name: this.form.last_name,
                        showroom: this.form.showroom,
                        emirate: this.form.emirate,
                        email: this.form.email,
                        model: this.form.model.title,
                        mobile: this.form.mobile,
                        tel: this.form.phone,
                        date: this.form.date,
                        check_for_email: this.form.check_for_email,
                        year: this.form.year,
                        purchase_type: this.form.purchaseType,
                        service_type: this.form.stype,
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
