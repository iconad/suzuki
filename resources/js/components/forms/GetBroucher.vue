<template>
    <div>
        <div class="hidden">
            selectedVehicle
        </div>
        <!-- {{selectedVehicle}}
        {{form.models}} -->
        <div class="text-xl md:text-3xl suzuki-bold text-gray-900 mb-5">Get A Broucher</div>
            <ValidationObserver v-slot="{ invalid,passes }">
                <form @submit.prevent="passes(submitForm)">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-10">
                    <div class="lg:col-span-2">
                        <div class="block text-lg font-medium text-gray-800 mb-2">Select up to 2 models</div>
                        <ValidationProvider name="form.models" rules="required">
                            <div slot-scope="{ errors }">
                                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-7 gap-5 items-center lg:justify-between">
                                    <template v-for="(model, n) in models">
                                    <label
                                    :key="n"
                                    v-if="isBrochure(model) != 0"
                                    :class=" selectedModels.includes(n) ? 'border-gray-300 bg-gray-50' : 'border-transparent bg-transparent'"
                                    class="rounded-md px-4 py-2 lg:text-center border w-full">
                                        <input
                                        class="hidden"
                                        type="checkbox"
                                        v-model="selectedModels"
                                        :value="n"
                                        :disabled="selectedModels.length > 1 && selectedModels.indexOf(n) === -1"
                                        number>
                                        <span
                                        :class="selectedModels.length > 1 && selectedModels.indexOf(n) === -1 ? 'text-gray-500' : 'text-gray-700'"
                                        class="suzuki-bold cursor-pointer text-2xl uppercase font-medium italic ">
                                        <vehicle-logo :slide="model" class="flex items-center justify-center h-12"></vehicle-logo>
                                        </span>
                                    </label>
                                    </template>
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
                     <div v-if="!$apollo.queries.branches.loading">
                        <label class="block text-lg font-medium text-gray-800 mb-2">Emirate *</label>
                        <ValidationProvider name="form.hear" rules="required">
                            <div slot-scope="{ errors }">
                                <multiselect placeholder="Emirate *" v-model="form.emirate" label="title" :options="branches">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.title }}</template>
                                </multiselect>
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
                        :disabled="!form.check"
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

    import gql from 'graphql-tag'
    import vehiclesQuery from "../../../../gql/frontend/vehicles.gql";
    import branchesQuery from "../../../../gql/frontend/branchesbyemail.gql";

    import vehicleLogo from './vehicleLogo'

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
        props: ['selectedmodel'],
        components: {
            Multiselect,
            vehicleLogo,
            ValidationProvider,
            ValidationObserver,
            'p-check': PrettyCheckbox,
        },
        data() {
            return {
                isLoading: false,
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
                hears: ["Google", "LinkedIn", "Dubai", "Email", "Other"],
            }
        },
        watch: {
            selectedModels (value) {
                this.form.models = []
                value.forEach(e => {
                    this.form.models.push(this.models[e])
                });
            }
        },
        computed: {
            selectedVehicle () {
                if(this.selectedmodel) {
                    if(!this.$apollo.queries.models.loading) {
                        // this.form.models = this.models.filter(e => e.title.toLowerCase() == this.selectedmodel.toLowerCase())
                        // this.selectedModels.push(0)
                    }
                }
            }
        },
        methods: {
            isBrochure (model) {
                return model.files.filter(f => f.type == 'brochure').length
            },
            submitForm () {
                 if(this.form.check){
                    this.isLoading = true
                    axios.post(`/api/get-brochure`, {
                        title: this.form.title,
                        first_name: this.form.first_name,
                        last_name: this.form.last_name,
                        hear: this.form.hear,
                        emirate: this.form.emirate,
                        email: this.form.email,
                        check_for_email: this.form.check_for_email,
                        models: this.form.models,
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
                    })
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
