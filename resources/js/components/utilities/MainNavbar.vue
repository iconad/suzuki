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
                <li class="nav-link">
                    <a href="/vehicle" class="block px-2 py-3 hover:text-theme-red-500">Virtual Showroom</a>
                </li>
                <li class="nav-link mr-3 relative">
                    <a href="#" class="flex items-center px-2 pr-0 py-3 hover:text-theme-red-500">
                        <span>
                            After Sales
                        </span>
                        <span class="text-gray-900">
                            <svg class="fill-current w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9 13l1 1 6-6-2-1-4 4-4-4-2 1z"/></svg>
                        </span>
                    </a>
                    <ul class="text-sm nav-list sc1240:absolute left-0 top-100 flex flex-col sc1240:flex-row items-start sc1240:items-center bg-theme-red-500 text-white w-auto whitespace-no-wrap">
                        <li class="nav-link">
                            <a href="http://" class="block p-2">Our commitment</a>
                        </li>
                        <li class="nav-link">
                            <a href="http://" class="block p-2">Services</a>
                        </li>
                        <li class="nav-link">
                            <a href="http://" class="block p-2">Genuine parts</a>
                        </li>
                        <li class="nav-link relative">
                            <a href="http://" class="block p-2">accessories</a>
                            <ul class="nav-list sc1240:absolute uppercase italic font-bold left-0 top-100 flex flex-col sc1240:flex-row items-start sc1240:items-center bg-gray-300 text-gray-800 w-64 sc1240:w-auto whitespace-no-wrap">
                                <li class="nav-link">
                                    <a href="http://" class="block p-2">Vitara</a>
                                </li>
                                <li class="nav-link">
                                    <a href="http://" class="block p-2">Ertiga</a>
                                </li>
                                <li class="nav-link">
                                    <a href="http://" class="block p-2">Baleno</a>
                                </li>
                                <li class="nav-link">
                                    <a href="http://" class="block p-2">Swift</a>
                                </li>
                                <li class="nav-link">
                                    <a href="http://" class="block p-2">Dzire</a>
                                </li>
                                <li class="nav-link">
                                    <a href="http://" class="block p-2">Jimny</a>
                                </li>
                                <li class="nav-link">
                                    <a href="http://" class="block p-2">Ciaz</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-link">
                            <a href="http://" class="block p-2">recall announcment</a>
                        </li>
                        <li class="nav-link">
                            <a href="http://" class="block p-2">Services</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-link">
                    <a href="/logout" class="block px-2 py-3 hover:text-theme-red-500">Special Offers</a>
                </li>
                <li class="nav-link">
                    <a href="#" class="block px-2 py-3 hover:text-theme-red-500">Pre Owned Cars</a>
                </li>
                <li class="nav-link">
                    <a href="#" class="block px-2 py-3 hover:text-theme-red-500">Business Solutions</a>
                </li>
                <li class="nav-link mr-3 relative">
                    <a href="#" class="flex items-center px-2 pr-0 py-3 hover:text-theme-red-500">
                        <span>
                            Locations
                        </span>
                        <span class="text-gray-900">
                            <svg class="fill-current w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9 13l1 1 6-6-2-1-4 4-4-4-2 1z"/></svg>
                        </span>
                    </a>
                    <ul class="text-sm nav-list sc1240:absolute left-0 top-100 flex flex-col sc1240:flex-row items-start sc1240:items-center bg-theme-red-500 text-white w-auto whitespace-no-wrap">
                        <li class="nav-link">
                            <a href="/locations/abu-dhabi/showroom" class="block p-2">Showroom</a>
                        </li>
                        <li class="nav-link">
                            <a href="/locations/abu-dhabi/services" class="block p-2">Services</a>
                        </li>
                        <li class="nav-link">
                            <a href="/locations/abu-dhabi/parts" class="block p-2">Parts</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-link">
                    <a href="/contact-us" class="block px-2 py-3 hover:text-theme-red-500">Contact Us</a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                isMenu: false
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
