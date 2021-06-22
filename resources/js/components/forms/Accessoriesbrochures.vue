<template>
    <div>
        <button @click="showModal" class="red-button">Download all accessories brouchers</button>
        <modal adaptive width="1100" height="auto" scrollable name="accessories-brochures-modal" class="bg-opacity-25 bg-black relative">
            <div class="p-5 md:p-10 relative">
                <div class="absolute right-0 top-0 px-4 py-3">
                    <span @click="$modal.hide('accessories-brochures-modal')">
                        <svg class="fill-current w-8 h-8 text-gray-600 hover:text-red-600 focus:outline-none cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                    </span>
                </div>
                <div class="text-xl md:text-2xl suzuki-bold text-gray-900 mb-5">Download All Accessories brochures</div>
                    <ValidationObserver v-slot="{ invalid,passes }">
                        <form @submit.prevent="passes(submitForm)">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 ">
                            <div class="relative">
                                <ValidationProvider name="form.title" rules="required">
                                    <div slot-scope="{ errors }">
                                        <multiselect v-model="form.title" placeholder="Title" :options="titles"></multiselect>
                                        <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute top-100 left-0">{{ errors[0] }}</p>
                                    </div>
                                </ValidationProvider>
                            </div>
                            <div class="relative">
                                <ValidationProvider name="form.first_name" rules="required">
                                    <div slot-scope="{ errors }">
                                        <input type="text" v-model="form.first_name" class="form-input-1" name="first_name" placeholder="First Name *">
                                        <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute top-100 left-0">{{ errors[0] }}</p>
                                    </div>
                                </ValidationProvider>
                            </div>
                            <div class="relative">
                                <ValidationProvider name="form.last_name" rules="required">
                                    <div slot-scope="{ errors }">
                                        <input type="text" v-model="form.last_name" class="form-input-1" name="last_name" placeholder="Last Name *">
                                        <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute top-100 left-0">{{ errors[0] }}</p>
                                    </div>
                                </ValidationProvider>
                            </div>
                            <div class="relative">
                                <ValidationProvider name="form.age" rules="required">
                                    <div slot-scope="{ errors }">
                                        <input type="text" v-model="form.age" class="form-input-1" name="age" placeholder="Age *">
                                        <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute top-100 left-0">{{ errors[0] }}</p>
                                    </div>
                                </ValidationProvider>
                            </div>
                            <div class="relative">
                                <ValidationProvider name="form.mobile" rules="required|mobile">
                                    <div slot-scope="{ errors }">
                                        <input type="text" v-model="form.mobile" class="form-input-1" name="mobile" placeholder="Mobile Number *">
                                        <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute top-100 left-0">
                                            <!-- <span v-if="isValidMobileNumber">Must be a valid UAE mobile number. </span> -->
                                            <span>{{ errors[0] }}</span>
                                        </p>
                                    </div>
                                </ValidationProvider>
                            </div>
                            <div class="relative">
                                <ValidationProvider name="form.mobile" rules="mobile">
                                    <div slot-scope="{ errors }">
                                        <input type="text" v-model="form.phone" class="form-input-1" name="phone" placeholder="Phone Number *">
                                        <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute top-100 left-0">
                                            <!-- <span v-if="isValidMobileNumber">Must be a valid UAE mobile number. </span> -->
                                            <span>{{ errors[0] }}</span>
                                        </p>
                                    </div>
                                </ValidationProvider>
                            </div>
                            <div class="relative">
                                <ValidationProvider name="form.email" rules="required|email">
                                    <div slot-scope="{ errors }">
                                        <input type="email" v-model="form.email" class="form-input-1" name="email" placeholder="Email">
                                        <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute top-100 left-0">{{ errors[0] }}</p>
                                    </div>
                                </ValidationProvider>
                            </div>
                            <div class="relative">
                                <ValidationProvider name="form.hear" rules="required">
                                    <div slot-scope="{ errors }">
                                        <multiselect placeholder="Select Emirate" v-model="form.emirate" :options="emirates"></multiselect>
                                        <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium absolute top-100 left-0">{{ errors[0] }}</p>
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
                        <div v-if="isLoading" class="loader"></div>
                        <div v-else class="form-element mb-0 mt-5 text-right">
                            <input
                                type="submit"
                                value="Submit"
                                :disabled="invalid"
                                :class="[
                                    invalid ? 'bg-theme-gray-dark text-gray-800 cursor-not-allowed red-button border-theme-gray-dark hover:bg-theme-gray-dark hover:text-gray-800' : 'red-button',
                                    !form.check ? 'bg-theme-gray-dark text-gray-800 cursor-not-allowed red-button border-theme-gray-dark hover:bg-theme-gray-dark hover:text-gray-800' :  'red-button'
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
        props: ['model'],
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
                selectedModel: 1,
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
                },
                emirates: ["Dubai", "Abu Dhabi", "Sharjah", "Ras al khaimah", "Ajman", "Fujairah", "Umm al Quwain"],
                isLoading: false
            }
        },
        methods: {
            submitForm () {
                 if(this.form.check){
                    this.isLoading = true
                    axios.post(`/api/get-accessories-brochure`, {
                        title: this.form.title,
                        first_name: this.form.first_name,
                        last_name: this.form.last_name,
                        phone: this.form.phone,
                        emirate: this.form.emirate,
                        mobile: this.form.mobile,
                        email: this.form.email,
                        model: this.model,
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
                        this.$modal.hide('accessories-brochures-modal');
                    })
                }
            },
            showModal () {
                this.$modal.show('accessories-brochures-modal');
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>

