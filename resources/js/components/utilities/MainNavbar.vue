<template>
    <div>
        <nav class="md:ml-48 sc1240:pl-8 capitalize relative z-20 suzuki-bold text-gray-800 text-lg tracking-normal navbar">
            <ul class="sc1240:flex sc1240:items-center cursor-pointer hover:bg-gray-200" :class="isMenu ? 'bg-gray-300' : '' " @click="isMenu = !isMenu">
                <li class="p-4 text-gray-800 block sc1240:hidden">
                    <svg v-if="!isMenu" class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                    <svg v-else class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                </li>
            </ul>
            <ul :class="!isMenu ? 'hidden sc1240:flex' : '' " class="absolute sc1240:static sc1240:left-0 sc1240:top-100 w-64 sc1240:w-auto sc1240:items-center bg-white shadow-xl sc1240:shadow-none">
                <li v-for="(item, a) in menu" :key="a" class="nav-link" :class="item.child.length != 0 ? 'relative' : ''">
                    <a v-if="item.class == 'external'" :href="`${item.link}`" target="_blank" class="px-5 pr-0 py-3 hover:text-theme-red-500" :class="item.child.length != 0 ? 'flex items-center' : 'block'">{{item.label}}
                        <span v-if="item.child.length != 0" class="text-gray-900">
                            <svg class="fill-current w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9 13l1 1 6-6-2-1-4 4-4-4-2 1z"/></svg>
                        </span>
                    </a>
                    <a v-else-if="item.link != '#'" :href="`${baseUrl}/${item.link}`" class="px-5 pr-0 py-3 hover:text-theme-red-500" :class="item.child.length != 0 ? 'flex items-center' : 'block'">{{item.label}}
                        <span v-if="item.child.length != 0" class="text-gray-900">
                            <svg class="fill-current w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9 13l1 1 6-6-2-1-4 4-4-4-2 1z"/></svg>
                        </span>
                    </a>
                    <span v-else class="px-5 pr-0 py-3 hover:text-theme-red-500" :class="item.child.length != 0 ? 'flex items-center' : 'block'">{{item.label}}
                        <span v-if="item.child.length != 0" class="text-gray-900">
                            <svg class="fill-current w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9 13l1 1 6-6-2-1-4 4-4-4-2 1z"/></svg>
                        </span>

                    </span>
                    <ul v-if="item.child.length != 0" class="text-sm nav-list sc1240:absolute left-0 top-100 flex flex-col sc1240:flex-row items-start sc1240:items-center bg-theme-red-500 text-white w-auto whitespace-nowrap">
                        <li class="nav-link" :class="child1.child.length != 0 ? 'relative' : ''" v-for="(child1, b) in item.child" :key="b">
                            <a v-if="child1.class == 'external'" target="_blank" :href="`${child1.link}`" class="block p-2"> {{child1.label}}</a>
                            <a v-else :href="`${baseUrl}/${child1.link}`" class="block p-2">{{child1.label}}</a>
                            <ul class="nav-list-child sc1240:absolute z-50 uppercase left-0 top-100 bg-gray-300 text-black w-auto whitespace-nowrap">
                                <li class="nav-link font-bold" v-for="(child2, c) in child1.child" :key="c">
                                    <a v-if="child2.class == 'external'" target="_blank" :href="`${child2.link}`" class="font-bold suzuki-bold block p-2">{{child2.label}}</a>
                                    <a v-else :href="`${baseUrl}/${child2.link}`" class="font-bold suzuki-bold block p-2">{{child2.label}}</a>
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

$red: #ed1e26;

@mixin min-1240 {
    @media only screen and (min-width: 1240px) {
        @content;
    }
}


.navbar {
    a {
        font-weight: bold!important;
    }
}

// .nav-list,
// .nav-list-child {
//     display: none;
// }
// .nav-link {
//     &:hover{
//          color: $red;
//         > ul.nav-list {
//             display: flex;
//             > .nav-link {
//                 &:hover{
//                     color: white;
//                     > ul.nav-list-child {
//                         display: block;
//                         .nav-link {
//                             &:hover{
//                                 color: $red;
//                             }
//                         }
//                     }
//                 }
//             }
//         }
//     }
// }


.nav-list{
    display: none;
    @include min-1240 {
        display: flex;
        opacity: 0;
        transition: 0.3s;
        z-index: -1;
        margin-top: -33px;
    }
}

.nav-list-child {
    display: none;
    @include min-1240 {
        opacity: 0;
        transition: 0.3s;
        z-index: -2;
        visibility: hidden;
    }
}

.nav-link {
    &:hover{
         color: $red;
         cursor: pointer;
        > ul.nav-list {
            display: flex;
            opacity: 1;
            // z-index: 1111;
            margin-top: 0px;
            > .nav-link {
                &:hover{
                    color: white;
                    > ul.nav-list-child {
                        display: block;
                        visibility: visible;
                        opacity: 1;
                        .nav-link {
                            &:hover{
                                cursor: pointer;
                                color: $red;
                            }
                        }
                    }
                }
            }
        }
    }
}


</style>
