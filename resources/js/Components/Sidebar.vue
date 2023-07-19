<template lang="">
    <div class="h-full">
        <div class="w-32 md:w-64 h-full">
            <div class="py-4 px-6">
                <img href="/" src="//mmsu.edu.ph//mmsu_logo/mmsu_logo.png" alt="MMSU Logo" class="h-12 md:h-24">
            </div>
            <h6 class="text-gray-50 text-lg px-5 pb-5 font-medium">MMSU Online Recruitment System</h6>
            <hr class="border-gray-500 pb-5">
            <div class="flex flex-col justify-between h-auto my-auto">
                <div>
                    <nav class="px-2"><ul>
                    <li id="sidebar_links" class="py-2"><router-link class="nav-links font-light text-sm" to="/admin/dashboard">Dashboard</router-link></li>
                    <li id="sidebar_links" class="py-2"><router-link class="nav-links font-light text-sm" to="/admin/opportunities">Opportunities</router-link></li>
                    <!-- <li id="sidebar_links" class="py-2"><router-link class="nav-links font-light text-sm" to="/admin/opportunity">Post Opportinity</router-link></li> -->
                    </ul></nav>
                </div>
                <div><ul>
                    <li id="sidebar_links"><button class="nav-links font-light text-sm p-2" @click="logout">Logout</button></li>
                </ul></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods:{
        logout(){
            axios.post('logout').then(({data})=> {
                window.location.href = '/admin/login'
            });
        }
    }
}
</script>

<style lang="">

</style>