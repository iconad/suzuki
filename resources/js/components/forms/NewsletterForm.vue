<template>
    <div>
        <button @click="showModal" class="red-button capitalize">Subscribe to newsletter</button>

        <modal adaptive width="1100" height="auto" scrollable name="newsletter-modal" class="bg-opacity-25 bg-black relative">
            <div class="bg-white relative p-12 rounded-lg">
                <div class="absolute right-0 top-0 px-4 py-3">
                    <span @click="$modal.hide('newsletter-modal')">
                        <svg class="fill-current w-8 h-8 text-gray-600 hover:text-red-600 focus:outline-none cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                    </span>
                </div>
                <div class="text-base md:text-lg font-semibold text-gray-800 mb-5">Subscribe to Our Newsletter</div>
                <ValidationObserver v-slot="{ invalid,passes }">
                 <form @submit.prevent="passes(submitForm)">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-10">
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
                            <ValidationProvider name="form.email" rules="required|email">
                                <div slot-scope="{ errors }">
                                    <input type="email" v-model="form.email" class="form-input-1" name="email" placeholder="Email">
                                    <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                </div>
                            </ValidationProvider>
                        </div>
                        <div>
                            <label class="block text-lg font-medium text-gray-800 mb-2">How did you hear about us?</label>
                            <ValidationProvider name="form.hearFrom" rules="required">
                                <div slot-scope="{ errors }">
                                    <multiselect v-model="form.hearFrom" :options="hears.data"></multiselect>
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
                    <div v-if="isLoading" class="loader"></div>
                    <div v-else class="form-element mb-0 mt-5 text-right">
                        <input
                            type="submit"
                            value="Subscribe"
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


    // Add the required rule
    extend('required', {
        ...required,
        message: 'This field is required'
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
            form: {
                first_name: null,
                last_name: null,
                title: null,
                email: null,
                hearFrom: null,
                check: false,
            },
            titles: ['Mr', 'Mrs'],
            hears: {
                data: [
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
            },
            isLoading: false
        }
    },
    methods: {
        submitForm () {
            if(this.form.check){
                this.isLoading = true
                axios.post(`/api/newsletter`, {
                    title: this.form.title,
                    first_name: this.form.first_name,
                    last_name: this.form.last_name,
                    hear: this.form.hear,
                    email: this.form.email,
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
                        this.$modal.hide('newsletter-modal');
                    }
                    this.isLoading = false
                })

            }
        },
        showModal () {
            this.$modal.show('newsletter-modal');
        }
    },
}
</script>
