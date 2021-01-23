<template>
    <div class="w-full">
        <div class="bg-white shadow rounded-lg w-full overflow-hidden">
            <div class="text-center py-2 bg-theme-red-500 text-white suzuki-bold">Financial Calculator</div>
            <div class="h-screen-70 overflow-y-auto custom-scrollbar">
                <div class="px-10 my-16">
                    <div>
                        <div class="flex items-center justify-between text-xl">
                            <div>Deposit</div>
                            <div>AED {{deposit}}</div>
                        </div>
                        <vue-slider
                        :min="0"
                        v-model="deposit"></vue-slider>
                    </div>
                    <div>
                        <div class="mt-8 flex items-center justify-between text-xl">
                            <div>Term Length</div>
                            <div>{{months}} Months</div>
                        </div>
                        <vue-slider
                        :min="1"
                        :max="4"
                        v-model="duration"></vue-slider>
                    </div>
                </div>
                <div class="px-4 my-5">
                <button class="red-button w-full">Apply Now</button>
                </div>
                <div class="mt-10 px-4 flex flex-col justify-center space-y-2 text-lg pb-10">
                    <div class="flex items-center justify-between">
                        <div class="suzuki-bold">Finance Product</div>
                        <div class="">Finance</div>
                    </div>
                    <!-- row -->
                    <div class="flex items-center justify-between">
                        <div class="suzuki-bold">Months</div>
                        <div class="">{{months}} Months</div>
                    </div>
                    <!-- row -->
                    <div class="flex items-center justify-between">
                        <div class="suzuki-bold">Vehicle Price</div>
                        <div class="">AED {{price}}</div>
                    </div>
                    <!-- row -->
                    <div class="flex items-center justify-between">
                        <div class="suzuki-bold">Total Interest</div>
                        <div class="">AED {{Math.round((totalIntrest + Number.EPSILON) * 100) / 100}}</div>
                    </div>
                    <!-- row -->
                    <div class="flex items-center justify-between">
                        <div class="suzuki-bold">Total Repayable</div>
                        <div class="">AED {{Math.round((totalRepayable + Number.EPSILON) * 100) / 100}}</div>
                    </div>
                    <!-- row -->
                    <div class="flex items-center justify-between">
                        <div class="suzuki-bold">{{months}} Monthly Payments</div>
                        <div class="">AED {{result}}</div>
                    </div>
                    <!-- row -->
                    <div class="flex items-center justify-between">
                        <div class="suzuki-bold">Interest Rate</div>
                        <div class="">{{interest}} %</div>
                    </div>
                    <!-- row -->
                </div>
                <!-- table -->

                <div class="mb-10 px-4">
                    <div class="bg-gray-300 rounded-xl content text-sm px-4 py-px">
                        <p>*EMIs calculated above are indicative and could vary subject to prevailing market rates **</p>
                        <p>Hire Purchase- A simple finance plan where you pay an initial deposit and rest of the vehicle value in monthly installments in addition of an interest. The agreement ends as soon as you finish paying all the installments and the vehicle is yours entirely.</p>
                        <p>AED 44,500 Inc VAT</p>
                    </div>
                </div>
            </div>
            {{yearsToMonths}}
        </div>
    </div>
</template>

<script>

    import VueSlider from 'vue-slider-component'
    import 'vue-slider-component/theme/default.css'

    export default {
        components: {
            VueSlider
        },
        data() {
            return {
                deposit: 10000,
                duration: 3,
                price: 0,
                interest: 2.99,
                totalIntrest: 0,
                months: 0,
            }
        },
        mounted() {
            let vehicle = this.$store.state.vehicle
            this.price = parseInt(vehicle.price)
        },
        computed: {
            yearsToMonths () {
                for (let index = 1; index <= this.duration; index++) {
                    let element = index * 12
                    this.months = element
                }
            },
            totalRepayable () {
                let price = (this.price - this.deposit) + this.totalIntrest
                return price;
            },
            result: function() {
                let interestRate = this.interest / 100;
                let loanAmount = this.price - this.deposit;
                let oneYearInterest = loanAmount * interestRate;
                // console.log(oneYearInterest)
                this.totalIntrest = oneYearInterest * this.duration;
                let loanAmountAgain = loanAmount + this.totalIntrest;
                let final = (loanAmountAgain / this.duration) / 12;
                return  Math.round((final + Number.EPSILON) * 100) / 100
            }
        },
    }
</script>

<style lang="scss" >
.vue-slider-process {
    background-color: #ed1e26;
}
.vue-slider-dot-handle {
    background-color: #ed1e26;
}
.vue-slider-dot-tooltip-inner {
    border-color: #ed1e26;
    background-color: #ed1e26;
}
.vue-slider-dot-handle-focus {
    box-shadow: 0px 0px 1px 2px #ed1e26;
}
.vue-slider-rail {
    background-color: #feb2b2;
}
</style>

