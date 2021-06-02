<template>
    <div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-16">
            <div class="text-lg">
                <div class="mb-5">
                    <div class="text-xl suzuki-bold mb-2">Customer Support & <br> Roadside Assistance</div>
                    <div><a href="tel:06 574 4212" class="theme-link hover:border-none">06 574 4212</a></div>
                    <div><a href="mailto:info@suzuki.ae" class="theme-link hover:border-none">sales@suzuki.ae</a></div>
               </div>
               <div class="mb-5">
                    <div class="text-xl suzuki-bold mb-2">Manager</div>
                    <div><a href="tel:06 574 4212" class="theme-link hover:border-none">06 574 4212</a></div>
                    <div><a href="mailto:info@suzuki.ae" class="theme-link hover:border-none">sales@suzuki.ae</a></div>
               </div>
               <div class="mb-5">
                    <div class="text-xl suzuki-bold mb-2">Sales</div>
                    <div><a href="tel:06 574 4212" class="theme-link hover:border-none">06 574 4212</a></div>
                    <div><a href="mailto:info@suzuki.ae" class="theme-link hover:border-none">sales@suzuki.ae</a></div>
               </div>
            </div>

            <div class="text-lg">
               <div class="mb-5">
                    <div class="text-xl suzuki-bold mb-2">Book a Test Drive</div>
                    <div class="text-base">Visit our <a href="/test-drive" class="theme-link text-theme-red-500">Book a test drive</a> page to book your appointment online.</div>
                    <div><a href="mailto:info@suzuki.ae" class="theme-link hover:border-none">sales@suzuki.ae</a></div>
               </div>
               <div class="mb-5">
                    <div class="text-xl suzuki-bold mb-2">Get a Quote</div>
                    <div class="text-base">Visit our <a href="/get-a-quote" class="theme-link text-theme-red-500">get a quote</a> page to book your appointment online.</div>
                    <div><a href="mailto:info@suzuki.ae" class="theme-link hover:border-none">sales@suzuki.ae</a></div>
               </div>
            </div>

            <div class="text-lg">
               <div class="mb-5">
                    <div class="text-xl suzuki-bold mb-2">Book a Service</div>
                    <div class="text-base">Visit our <a href="/book-a-service" class="theme-link text-theme-red-500">Book a service</a> page to book your appointment online.</div>
                    <div><a href="mailto:info@suzuki.ae" class="theme-link hover:border-none">sales@suzuki.ae</a></div>
               </div>
               <div class="mb-5">
                    <div class="text-xl suzuki-bold mb-2">Get a Quote <br> For Accessories</div>
                    <div class="text-base">Visit our <a href="/get-a-quote" class="theme-link text-theme-red-500">get a quote</a> page to book your appointment online.</div>
                    <div><a href="mailto:info@suzuki.ae" class="theme-link hover:border-none">sales@suzuki.ae</a></div>
               </div>
            </div>

        </div>


        <div class="flex flex-wrap">
            <div v-if="isFormSubmit" class="w-full h-64 flex items-center justify-center">
                <div class="h-64 flex items-center justify-center text-lg text-green-600 select-none">
                    We have recived your request for the test drive. Shortly you will get a call from one of our member.
                </div>
            </div>
            <div v-else class="w-full">
                <div class="text-xl md:text-3xl suzuki-bold text-gray-900 mb-5"> Submit a Question or Comment</div>
                <ValidationObserver v-slot="{ invalid,passes }">
                    <form @submit.prevent="passes(submitForm)">
                        <div class="grid grid-cols-1 gap-10 lg:gap-10">
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 items-end">
                                <div class="relative">
                                    <ValidationProvider name="form.title" rules="required">
                                        <div slot-scope="{ errors }">
                                            <multiselect placeholder="Title *" v-model="form.title" :options="titles"></multiselect>
                                            <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute left-0 top-100 p-2">{{ errors[0] }}</p>
                                        </div>
                                    </ValidationProvider>
                                </div>
                                <div class="relative">
                                    <ValidationProvider name="form.first_name" rules="required">
                                        <div slot-scope="{ errors }">
                                            <input type="text" v-model="form.first_name" class="form-input-1" name="first_name" placeholder="First Name *">
                                            <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute left-0 top-100 p-2">{{ errors[0] }}</p>
                                        </div>
                                    </ValidationProvider>
                                </div>
                                <div class="relative">
                                    <ValidationProvider name="form.last_name" rules="required">
                                        <div slot-scope="{ errors }">
                                            <input type="text" v-model="form.last_name" class="form-input-1" name="last_name" placeholder="Last Name *">
                                            <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute left-0 top-100 p-2">{{ errors[0] }}</p>
                                        </div>
                                    </ValidationProvider>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-3 items-end">
                                <div class="relative">
                                    <ValidationProvider name="form.mobile" rules="required|mobile">
                                        <div slot-scope="{ errors }">
                                            <input type="text" v-model="form.mobile" class="form-input-1" name="mobile" placeholder="Mobile Number *">
                                            <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute top-100 left-0 p-2">
                                                <span>{{ errors[0] }}</span>
                                            </p>
                                        </div>
                                    </ValidationProvider>
                                </div>
                                <div class="relative">
                                    <ValidationProvider name="form.email" rules="required|email">
                                        <div slot-scope="{ errors }">
                                            <input type="email" v-model="form.email" class="form-input-1" name="email" placeholder="Email">
                                            <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute top-100 left-0 p-2">{{ errors[0] }}</p>
                                        </div>
                                    </ValidationProvider>
                                </div>
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


                            <div>
                                <ValidationProvider name="form.message" rules="required">
                                    <div slot-scope="{ errors }">
                                        <textarea v-model="form.message" class="form-input-1" rows="6" name="message" placeholder="Message"> </textarea>
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
                                class="block mt-1 -ml-3 inline-block">Get Suzuki updates <a href="http://" class="theme-link text-gray-600">(what are these?)</a></span>
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
                                class="block mt-1 -ml-3 inline-block">Check this for letest offers, deals and updates. </span>
                            </label>
                        </div>

                        <div v-if="isLoading" class="loader"></div>
                        <div v-else class="form-element mb-0 mt-5 text-right">
                            <input
                                type="submit"
                                value="Submit"
                                :disabled="invalid"
                                :class="invalid ? 'bg-theme-gray-dark text-gray-800 cursor-not-allowed red-button border-theme-gray-dark hover:bg-theme-gray-dark hover:text-gray-800' : 'red-button'">
                        </div>
                    </form>
                </ValidationObserver>
            </div>
        </div>
    </div>
</template>

<script>

    import Multiselect from 'vue-multiselect'
    import PrettyCheckbox from 'pretty-checkbox-vue/check';

    import branchesQuery from "../../../../gql/frontend/branchesbyemail.gql";

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
            'p-check': PrettyCheckbox
        },
        data() {
            return {
                isValidMobileNumber: true,
                isLoading: false,
                titles: ['Mr', 'Mrs'],
                selectedModel: 1,
                isFormSubmit: false,
                isFormSubmitMessage: null,
                form: {
                    first_name: null,
                    last_name: null,
                    title: null,
                    email: null,
                    mobile: null,
                    phone: null,
                    showroom: null,
                    check: false,
                },
            }
        },
        methods: {
            submitForm () {
                this.isLoading = true
                axios.post(`/api/contact-us`, {
                    title: this.form.title,
                    first_name: this.form.first_name,
                    last_name: this.form.last_name,
                    email: this.form.email,
                    check_for_email: this.form.check_for_email,
                    emirate: this.form.showroom,
                    mobile: this.form.mobile,
                    message: this.form.message,
                })
                .then(response => {
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
                        this.gtag_report_conversion()
                        this.form = []
                        this.isFormSubmit = true
                        this.isFormSubmitMessage = response.data.message
                    }
                    this.isLoading = false
                })
            },

            gtag_report_conversion(url) {
                var callback = function () {
                    if (typeof(url) != 'undefined') {
                    window.location = url;
                    }
                };
                gtag('event', 'conversion', {
                    'send_to': 'AW-965823247/PDRcCPqlmboBEI-WxcwD',
                    'event_callback': callback
                });
                return false;
            }
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

<style lang="scss" scoped>

</style>
