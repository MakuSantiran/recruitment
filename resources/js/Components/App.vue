<template lang="">
    <div>
        <div class="flex min-h-screen">
            <aside class="h-screen sticky top-0 bg-primary shadow-lg">
                <Sidebar></Sidebar>
            </aside>
                
            <div class="flex-1 bg-gray-50">
                <!-- <aside>
                    <NavBar></NavBar>
                </aside> -->
                <main>
                    <router-view class=""></router-view>
                </main>
            </div>
        </div>
        
    </div>
</template>

<script>
import Sidebar from './Sidebar.vue'
export default {
    // props: ['test', 'hobby'], 
    components:{
        Sidebar
    },
}
</script>

<style lang="">

</style>