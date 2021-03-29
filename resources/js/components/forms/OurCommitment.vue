<template>
    <div>
        <button id="ClickHerToLearMore" @click="showModal" class="red-button text-xl">Click To Learn More</button>
        <modal adaptive width="1100" height="auto" scrollable name="commitment-modal" class="bg-opacity-25 bg-black relative">
        <div class="p-10">
            <div class="text-xl md:text-2xl suzuki-bold text-gray-900"> Welcome to the Suzuki Family </div>
            <div class="content text-lg -mt-3">
                <p>
                    Please register with your vehicle and personal details to join us on an exciting journey of experiencing an exceptional Suzuki Service.
                </p>
            </div>
            <ValidationObserver v-slot="{ invalid,passes }">
                <form @submit.prevent="passes(submitForm)">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                    <div>
                        <ValidationProvider name="form.title" rules="required">
                            <div slot-scope="{ errors }">
                                <multiselect v-model="form.title" :options="titles"></multiselect>
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
                        <ValidationProvider name="form.vin" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="text" v-model="form.vin" class="form-input-1" name="vin" placeholder="Car Registration Number & VIN *">
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div class="lg:col-span-2 lg:pr-5 lg:w-1/2">
                        <label class="block text-lg font-medium text-gray-800 mb-2">Location</label>
                        <ValidationProvider name="form.location" rules="required">
                            <div slot-scope="{ errors }">
                                <multiselect v-model="form.location" :options="emirates"></multiselect>
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
                <div class="form-element mb-0 mt-5 text-right">
                    <div v-if="isLoading" class="loader"></div>
                    <input
                        v-else
                        type="submit"
                        value="Register With Us"
                        :disabled="invalid"
                        :class="invalid ? 'bg-theme-gray-dark text-gray-800 cursor-not-allowed red-button border-theme-gray-dark hover:bg-theme-gray-dark hover:text-gray-800' : 'red-button'">
                        <p v-if="checkError == 0 && !form.check" class="text-center text-theme-red-500 mt-1 px-1 text-base font-medium">You must agree to our terms & conditions.</p>
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
        props:['register'],
        components: {
            Multiselect,
            ValidationProvider,
            ValidationObserver,
            'p-check': PrettyCheckbox
        },
        data() {
            return {
                isValidMobileNumber: true,
                titles: ['Mr', 'Mrs'],
                checkError: 2,
                isLoading: false,
                isFormSend: false,
                hash: null,
                form: {
                    first_name: null,
                    last_name: null,
                    title: null,
                    email: null,
                    hear: null,
                    mobile: null,
                    phone: null,
                    check: false,
                    showroom: false,
                },
                emirates: ["Abu Dhabi", "Dubai", "Sharjah", "Ajman", "Ras al khaimah", "Fujairah", "Umm al-Qaiwain"],
                hears: ["Google", "LinkedIn", "Dubai", "Friend", "Email", "Offer"],
            }
        },
        mounted() {
            if(this.register == 'yes') {
                 this.$modal.show('commitment-modal');
            }else{
                 this.$modal.hide('commitment-modal');
            }
        },
        methods: {
            showModal () {
                this.$modal.show('commitment-modal');
            },
            submitForm () {
                 if(this.form.check){
                    this.isLoading = true
                    this.checkError = 1
                    axios.post(`/api/our-commitment`, {
                        title: this.form.title,
                        first_name: this.form.first_name,
                        last_name: this.form.last_name,
                        showroom: this.form.showroom,
                        email: this.form.email,
                        tel: this.form.phone,
                        mobile: this.form.mobile,
                        vin: this.form.vin,
                        location: this.form.location,
                        hear: this.form.hear
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
                            this.$modal.hide('commitment-modal');
                        }
                        this.isLoading = false
                        this.isFormSend = true
                    })
                }else{
                    this.checkError = 0
                }
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
