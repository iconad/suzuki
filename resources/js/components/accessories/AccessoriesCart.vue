<template>
    <div>
        <transition name="bounce">
            <div v-if="isCart" :class="!isCheckout ? 'absolute w-full md:w-auto right-0 top-0 shadow-xl': ''" class="border rounded-lg p-5 bg-white">
                <div class="text-gray-800 absolute right-0 p-3  bottom-100 cursor-pointer" @click="isCart = !isCart">
                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                </div>

                <div class="overflow-x-auto md:overflow-x-visible">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 suzuki-bold text-gray-900 uppercase tracking-wider">
                                    Vehicle
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 suzuki-bold text-gray-900 uppercase tracking-wider">
                                    Accessory
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 suzuki-bold text-gray-900 uppercase tracking-wider">
                                    Quantity
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="(item,i) in cart" :key="i">
                                <td class="px-2 md:px-6 py-2 md:py-4 whitespace-no-wrap leading-5 text-gray-800 text-center">
                                    {{item.vehicle}}
                                </td>
                                <td class="px-2 md:px-6 py-2 md:py-4 whitespace-no-wrap leading-5 text-gray-800 text-center">
                                    {{item.accessory}}
                                </td>
                                <td class="px-2 md:px-6 py-2 md:py-4 whitespace-no-wrap leading-5 text-gray-800 text-center">
                                    {{item.count}}
                                </td>
                                <td class="px-2 md:px-6 py-2 md:py-4 whitespace-no-wrap leading-5 text-center">
                                    <span @click="deleteItem(i)" class="rounded-full text-sm cursor-pointer border border-red-500 bg-red-100 text-red-800 px-2 hover:bg-transparent transition ease-in-out duration-300">Delete</span>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div class="mt-3 justify-end" :class="!isCheckout ? 'flex': 'hidden'">
                    <button class="red-button py-1" @click="showModal">Enquire Now </button>
                </div>

            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        computed: {
            isCart: {
                get: function () {
                    return this.$store.state.isCart
                },
                set: function (value) {
                    this.$store.commit('isCart', value)
                }
            },
            isCheckout() {
                return this.$store.state.isCheckout
            },
            cart() {
                return this.$store.state.cart
            },
        },

        methods: {
            deleteItem (index) {
                this.$store.dispatch('deleteCartItem', index)
            },
            flash() {
                this.flashing = true;
                setTimeout(() => this.flashing = false, 100);
            },
            showModal () {
                this.$store.commit("accessoriesQuoteModal", true)
            },

        },
    }
</script>

<style lang="scss" scoped>

</style>
