<template lang="">
    <div class="flex justify-between bg-primary shadow-lg border-t-2 border-b-2 border-secondary">
        <div class="py-1 pl-40 flex items-center" style="font-family:'Adobe Garamond Pro';">
            <a href="https://www.mmsu.edu.ph/"><img src="//mmsu.edu.ph//mmsu_logo/mmsu_logo.png" alt="MMSU Logo" class="h-20"></a>
            <h6 class="text-gray-100 text-2xl px-3 py-5 align-middle">Mariano Marcos State University</h6>
        </div>
        <div class="py-1 pr-40 flex items-center">
            <!-- <input type="search" class="border border-gray-300 rounded w-64 lg:w-96 py-2 px-3" placeholder="Type to search..." /> -->
            <router-link class="nav-links p-1" to="/my">Dashboard</router-link>
            <router-link class="nav-links p-1" to="/my/opportunities">Opportunities</router-link>
            <router-link class="nav-links p-1" to="/my/portfolio">Portfolio</router-link>
            <button class="nav-links p-1" @click="logout">Logout</button>
        </div>
    </div>
</template>
<script>
export default {
    methods:{
        logout(){
            axios.post('/logout').then(({data})=> {
                window.location.href = '/'
            });
        }
    }
}
</script>

<style lang="">
    
</style>