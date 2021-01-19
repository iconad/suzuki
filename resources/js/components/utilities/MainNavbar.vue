<template>
    <div>
        <nav class="md:ml-48 sc1240:pl-5 capitalize relative z-20 suzuki-bold text-gray-800 text-base tracking-normal">
            <ul class="sc1240:flex sc1240:items-center cursor-pointer hover:bg-gray-200" :class="isMenu ? 'bg-gray-300' : '' " @click="isMenu = !isMenu">
                <li class="p-4 text-gray-800 block sc1240:hidden">
                    <svg v-if="!isMenu" class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                    <svg v-else class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                </li>
            </ul>
            <ul :class="!isMenu ? 'hidden sc1240:flex' : '' " class="absolute sc1240:static sc1240:left-0 sc1240:top-100 w-64 sc1240:w-auto sc1240:items-center bg-white shadow-xl sc1240:shadow-none">
                <li v-for="(item, a) in menu" :key="a" class="nav-link" :class="item.child.length != 0 ? 'relative' : ''">
                    <a :href="`${baseUrl}${item.link}`" class="px-2 pr-0 py-3 hover:text-theme-red-500" :class="item.child.length != 0 ? 'flex items-center' : 'block'">{{item.label}}
                        <span v-if="item.child.length != 0" class="text-gray-900">
                            <svg class="fill-current w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9 13l1 1 6-6-2-1-4 4-4-4-2 1z"/></svg>
                        </span>
                    </a>
                    <ul v-if="item.child.length != 0" class="text-sm nav-list sc1240:absolute left-0 top-100 flex flex-col sc1240:flex-row items-start sc1240:items-center bg-theme-red-500 text-white w-auto whitespace-nowrap">
                        <li class="nav-link" :class="child1.child.length != 0 ? 'relative' : ''" v-for="(child1, b) in item.child" :key="b">
                            <a :href="`${baseUrl}${child1.link}`" class="block p-2">{{child1.label}}</a>
                            <ul class="nav-list sc1240:absolute uppercase italic font-bold left-0 top-100 flex flex-col sc1240:flex-row items-start sc1240:items-center bg-gray-300 text-gray-800 w-64 sc1240:w-auto whitespace-nowrap">
                                <li class="nav-link" :class="child2.child.length != 0 ? 'relative' : ''" v-for="(child2, c) in child1.child" :key="c">
                                    <a :href="`${baseUrl}${child2.link}`" class="block p-2">{{child2.label}}</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</template>

<script>
    export default {
        props: ['menu'],
        data() {
            return {
                isMenu: false
            }
        },
        computed: {
            baseUrl () {
                return this.$store.state.baseUrl
            }
        },
        methods: {
            openMenu () {

            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
