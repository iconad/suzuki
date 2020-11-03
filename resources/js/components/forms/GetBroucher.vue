<template>
    <div>
        <div class="text-xl md:text-3xl suzuki-bold text-gray-900 mb-5">Get A Broucher</div>
            <ValidationObserver v-slot="{ invalid,passes }">
                <form @submit.prevent="passes(submitForm)">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-10">
                    <div class="lg:col-span-2">
                        <div class="block text-lg font-medium text-gray-800 mb-2">Select up to 2 models</div>
                        <ValidationProvider name="form.models" rules="required">
                            <div slot-scope="{ errors }">
                                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-7 gap-5 items-center lg:justify-between">
                                    <label
                                    v-for="(model, n) in models"
                                    :key="n"
                                    :class=" selectedModels.includes(n) ? 'border-gray-400 bg-gray-200' : 'border-transparent bg-transparent'"
                                    class="rounded p-2 lg:text-center border w-full">
                                        <input
                                        class="hidden"
                                        type="checkbox"
                                        v-model="selectedModels"
                                        :value="n"
                                        :disabled="selectedModels.length > 1 && selectedModels.indexOf(n) === -1"
                                        number>
                                        <span
                                        :class="selectedModels.length > 1 && selectedModels.indexOf(n) === -1 ? 'text-gray-500' : 'text-gray-700'"
                                        class="suzuki-bold cursor-pointer text-2xl uppercase font-medium italic "> {{model.name}} </span>
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
                        <label class="block text-lg font-medium text-gray-800 mb-2">Emirate *</label>
                        <ValidationProvider name="form.hear" rules="required">
                            <div slot-scope="{ errors }">
                                <multiselect placeholder="Select Emirate" v-model="form.emirate" :options="emirates"></multiselect>
                                <p class="text-theme-red-500 mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div>
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
                    <input
                        type="submit"
                        value="Submit"
                        :disabled="[invalid, !form.check]"
                        :class="[
                            invalid ? 'bg-theme-gray-dark text-gray-800 cursor-not-allowed red-button border-theme-gray-dark hover:bg-theme-gray-dark hover:text-gray-800' : 'red-button',
                            !form.check ? 'bg-theme-gray-dark text-gray-800 cursor-not-allowed red-button border-theme-gray-dark hover:bg-theme-gray-dark hover:text-gray-800' :  'red-button'
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
            'p-check': PrettyCheckbox,
        },
        data() {
            return {
                titles: ['Mr', 'Mrs'],
                selectedModels: [],
                form: {
                    first_name: null,
                    last_name: null,
                    title: null,
                    email: null,
                    hear: null,
                    emirate: null,
                    check: false,
                    phone: null,
                    models: []
                },
                emirates: ["Dubai", "Abu Dhabi", "Sharjah", "Ras al khaimah", "Ajman", "Fujairah", "Umm al Quwain"],
                hears: ["Google", "LinkedIn", "Dubai", "Friend", "Email", "Offer"],
                models: [
                    {
                        id: 1,
                        name: 'Vitara',
                    },
                    {
                        id: 2,
                        name: 'Ertiga',
                    },
                    {
                        id: 3,
                        name: 'Baleno',
                    },
                    {
                        id: 4,
                        name: 'Swift',
                    },
                    {
                        id: 5,
                        name: 'Dzire',
                    },
                    {
                        id: 6,
                        name: 'Jimny',
                    },
                    {
                        id: 7,
                        name: 'Ciaz',
                    }
                ]
            }
        },
        watch: {
            selectedModels (value) {
                this.form.models = []
                value.forEach(e => {
                    this.form.models.push(this.models[e].name)
                });
            }
        },
        methods: {
            submitForm () {
                console.log(this.form)
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
