
<template>
    <div class="select-none">
        <div class="img overflow-hidden">
            <thumb-image v-if="firstMedia.length != 0" parentclasses="h-64 bg-gray-100" classess="w-full h-full object-cover scale-110 transform transition ease-in-out duration-500 hover:scale-125" :image="firstMedia[0].file_name" :id="firstMedia[0].id"></thumb-image>

        </div>
        <div class="info px-3 py-2">
            <div class="suzuki-bold text-xl">{{item.title}} </div>
            <div class="text-xl mt-1 leading-snug">
                <span class="suzuki-normal">AED</span>
                <span class="suzuki-bold">{{item.price}}</span>
            </div>
            <div class="flex items-center justify-between mt-3">
                <div>
                    <span @click="seeMore" class="cursor-pointer text-sm theme-link flex items-center">
                        <span>See More</span>
                        <span class="inline-block ml-2">
                            <svg class="fill-current w-4 h-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M16 9l-6-6 2-1 8 8-1 1-7 7-2-1 6-6H0V9z"/></svg>
                        </span>
                    </span>
                </div>
                <div class="flex items-center">
                    <div v-if="!isAdded" @click="addToCart" class="text-xs font-medium mr-2 cursor-pointer hover:text-gray-900 hover:bg-gray-100 border rounded-full px-2">Add To List</div>
                    <div v-else @click="deleteItem(isAdded)" class="text-xs font-medium text-red-500 border-red-300 mr-1 hover:text-red-900 hover:bg-red-100 border rounded-full px-2 cursor-pointer">Remove</div>
                    <div class="mx-1 text-green-500 cursor-pointer" @click="counting('add')">
                        <svg class="fill-current w-4 h-4" viewBox="0 0 448 448" xmlns="http://www.w3.org/2000/svg"><path d="M408 184H272c-4 0-8-4-8-8V40a40 40 0 00-80 0v136c0 4-4 8-8 8H40a40 40 0 000 80h136c4 0 8 4 8 8v136a40 40 0 0080 0V272c0-4 4-8 8-8h136a40 40 0 000-80zm0 0"/></svg>
                    </div>
                    <div class="mx-1"><input v-model="count" min="1" type="text" class="w-5 border focus:outline-none p-1 text-sm rounded"></div>
                    <div class="mx-1 text-red-600 cursor-pointer" @click="counting('minus')">
                        <svg class="fill-current w-4 h-4" viewBox="0 -192 469.3 469" xmlns="http://www.w3.org/2000/svg"><path d="M437 0H32C14 0 0 15 0 32v22c0 17 14 32 32 32h405c18 0 32-15 32-32V32c0-17-14-32-32-32zm0 0"/></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import thumbImage from '../../ThumbImage';
    export default {
        props: ['item', 'vehicle'],
        components: {
            thumbImage
        },
        data() {
            return {
                count: 1,
            }
        },
        computed: {
            firstMedia (){
                return this.item.media.filter(e => {
                    if(e.collection_name === 'thumbnail') {
                        return e
                    }
                })
            },
            cart: {
                get: function () {
                    return this.$store.state.cart
                },
                set: function (value) {
                    this.$store.commit('cart', value)
                }
            },
            isAdded () {
                let item = this.item.title;
                let find = _.findKey(this.cart, function(o) {
                    return o.accessory == item
                });
                return find
            }
        },
        methods: {
            seeMore () {
                let data = {
                    title: this.item.title,
                    vehicle: this.vehicle,
                    accessory: this.item.title,
                    count: this.count,
                }
                this.$emit('see-more', data)
            },
            deleteItem (index) {
                this.$store.dispatch('deleteCartItem', index)
            },
            counting(val) {
              val === 'add' ? this.count += 1 : (this.count === 1 ? this.count = 1 : this.count -= 1)
            },
            addToCart () {
                let item = {
                    vehicle: this.vehicle,
                    sku: this.item.sku,
                    accessory: this.item.title,
                    price: this.item.price,
                    count: this.count,
                    total: this.count * this.item.price,
                }
                this.$store.dispatch('addToCart', item)
                this.$emit('update')
            },
        },

    }
</script>

<style lang="scss" scoped>

</style>
