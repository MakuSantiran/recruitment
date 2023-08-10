<template lang="">
    <div>
        <div class="flex min-h-screen">
            <div class="flex-1 bg-gray-50">
                <header class="sticky top-0 shadow-lg">
                    <NavBar></NavBar>
                </header>
                <main>
                    <router-view :applicant="this.applicant"></router-view>
                </main>
            </div>
        </div>
        
    </div>
</template>

<script>
import NavBar from './NavBar';

export default {
    components:{
        NavBar
    },

    data(){
        return{
            applicant: ''
        }
    },

    computed(){

    },

    mounted() {
        this.getApplicant()
    },

    methods:{
        getApplicant(){
            axios.post('/getApplicant').then(({data}) => {
                this.applicant = data;
            });
        }
    }
}
</script>

<style lang="">
    
</style>