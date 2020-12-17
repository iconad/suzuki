<template>
    <div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 relative">

           <div v-for="item in 20" :key="item" class="border rounded overflow-hidden hover:shadow-xl transition ease-in-out duration-300">
            <accessory-item @see-more="seeMoreModal" @update="updateCart" :item="item" vehicle="Vitara"></accessory-item>
           </div>


            <audio id="audio" src="https://www.soundjay.com/button/sounds/button-20.mp3" autoplay="false" ></audio>
            <div class="absolute bottom-100 right-0 w-full md:w-25rem bg-white">
                <div class="suzuki-bold text-2xl mb-3 flex items-center justify-end">
                <transition name="bounce">
                    <div v-if="cart && cart.length != 0" @click="isCart = !isCart" class="border rounded-lg text-right cursor-pointer flex items-center justify-end md:px-3 px-2 py-1 hover:bg-gray-100 hover:border-gray-400">
                     <div class="text-theme-blue mr-1">
                        <svg class="fill-current md:w-6 w-4 md:h-6 w-4 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 456 456"><path d="M346 339a53 53 0 100 106 53 53 0 000-106zM439 85l-4-1H113l-5-34c-4-22-23-39-46-39H20C9 11 0 20 0 31s9 21 20 21h42c3 0 5 2 5 4l32 216c4 27 27 48 55 48h213c27 0 50-19 55-45l34-167c2-10-5-21-17-23zM215 390c-1-29-25-51-53-51-29 1-52 26-51 55 1 28 24 51 52 51h1c30-2 53-26 51-55z"/></svg>
                    </div>
                    <span class="text-lg md:text-2xl -mb-1 md:-mb-0" :class="{'flashing':flashing}" >{{cart.length}}</span>
                    </div>
                </transition>

                </div>
                <accessories-cart v-if="!isCheckout"></accessories-cart>
            </div>


       </div>

        <div class="flex flex-wrap md:flex-no-wrap items-center justify-end w-full mt-5">
            <accessories-brochures class="order-2 md:order-1 w-full md:w-auto md:mr-2"></accessories-brochures>
            <accessories-quote-form class="order-1 md:order-2  w-full md:w-auto"></accessories-quote-form>
        </div>


        <modal  width="1100" height="auto" scrollable name="accessory-modal" class="bg-opacity-25 bg-black relative">
            <div class="p-10">

                    <div class="flex flex-wrap md:flex-no-wrap">
                        <div class="w-full">
                            <div class="md:mr-5">
                                <div class="text-2xl suzuki-bold mb-2" v-if="item">Front Skid Plate {{item.title}}</div>
                                <div class="overflow-hidden">
                                    <img src="http://127.0.0.1:8000/assets/images/acc/acc2.png" class="transform scale-125 w-full" alt="image">
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:ml-5 flex items-center">
                            <div class="border-l-2 pl-10 border-gray-800">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <div class="text-2xl text-gray-900 leading-none mt-0 mb-1" v-if="item">Front Skid Plate {{item.title}} </div>
                                        <div class="text-sm text-gray-700">Part No. <span>456454-5sdf23-00</span></div>
                                    </div>
                                    <div>
                                        <div v-if="!isItemAdded" @click="addToCart" class="text-xs font-medium mr-2 cursor-pointer hover:text-gray-900 hover:bg-gray-100 border rounded-full px-2">Add To List</div>
                                        <div v-else @click="deleteItem(isAdded)" class="text-xs font-medium text-red-500 border-red-300 mr-1 hover:text-red-900 hover:bg-red-100 border rounded-full px-2 cursor-pointer">Remove From List</div>
                                    </div>
                                </div>
                                <div class="my-5 text-sm">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore alias soluta nesciunt autem exercitationem aliquam deserunt dolor voluptatibus suscipit, laudantium minus incidunt eius est eum temporibus impedit provident molestiae praesentium.
                                </div>
                                <div class="mb-5 bg-gray-900 border-b-2 border-gray-800"></div>
                                <div class="text-xl mb-1">
                                    <span class="suzuki-bold">Minimum fitting time:</span>
                                    <span>15 minutes</span>
                                </div>
                                <div class="text-sm">
                                    <span class="suzuki-bold">Available on: </span>
                                    <span>GLX AUTO, GL MANUAL, GLX AUTO, GL MANUAL, GLX AUTO, GL MANUAL, GLX AUTO, GL MANUAL, GLX AUTO, GL MANUAL.</span>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </modal>


    </div>
</template>

<script>
    import AccessoriesCart from './AccessoriesCart'
    export default {
        components: {
            AccessoriesCart
        },
        data () {
            return {
                flashing: false,
                item: null,
                isItemAdded: null
            }
        },
        mounted () {
            let cart = JSON.parse(sessionStorage.getItem("cart"))
            cart.forEach(this.forEachCart);
        },
        computed: {
            cart() {
                return this.$store.state.cart
            },
            isCheckout() {
                return this.$store.state.isCheckout
            },
            isCart: {
                get: function () {
                    return this.$store.state.isCart
                },
                set: function (value) {
                    this.$store.commit('isCart', value)
                }
            },
        },
        methods: {
            forEachCart(cart, index) {
                cart != null ? this.$store.commit('cart', cart) : false
            },
            seeMoreModal (val) {
                this.item = val
                this.isAdded()
                this.$modal.show('accessory-modal');
            },
            addToCart () {
                let item = {
                    vehicle: this.item.vehicle,
                    accessory: this.item.title,
                    count: this.item.count,
                }
                this.$store.dispatch('addToCart', item)
                this.isAdded()
            },
            deleteItem (index) {
                this.$store.dispatch('deleteCartItem', index)
                this.isAdded()
            },
            updateCart (item) {
                this.flash()
            },
            isAdded () {
                if(this.item != null) {
                    let item = this.item.title;
                    let find = _.findKey(this.cart, function(o) {
                        return o.accessory == item
                    });
                    this.isItemAdded = find
                }
            },
            flash() {
                this.flashing = true;
                setTimeout(() => this.flashing = false, 100);
            }

        },

    }
</script>

<style lang="scss" scoped>

</style>
