<template lang="">
    <div class="flex gap-5 mx-auto ml-5 mr-5">
        <div class="">
            <div class="w-32 md:w-64 h-screen flex flex-col align-center">
                <div class="align-middle text-center">
                    <div class="h-40 w-40 mx-auto bg-cyan-300 mt-5 rounded-full">
                        [Photo]
                    </div>
                    <div class="mt-5">
                        [Name]
                    </div>
                    <hr class="mt-5">
                    <div class="mt-5 mx-auto">
                        <button class="w-full block p-2 text-left font-semibold hover:bg-accent2 hover:text-white">Opportunity Status</button>
                        <button class="w-full block p-2 text-left font-semibold hover:bg-accent2 hover:text-white">Basic Information</button>
                        <button class="w-full block p-2 text-left font-semibold hover:bg-accent2 hover:text-white">Education</button>
                        <button class="w-full block p-2 text-left font-semibold hover:bg-accent2 hover:text-white">Experience</button>
                        <button class="w-full block p-2 text-left font-semibold hover:bg-accent2 hover:text-white">Eligibilities</button>
                        <button class="w-full block p-2 text-left font-semibold hover:bg-accent2 hover:text-white">Trainings</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full">
            <div>
                <h2 class="font-semibold text-center">Hello, {{ applicant.firstname + ' ' + applicant.surname }} </h2>
            </div>

            <!--Transition buttons -->
            <!-- <div class="flex justify-end mr-5">
                <div
                :class="[
                    'fixed top-0 right-0',
                    { 'mt-28': !isScrolled },
                    'transition-all ease-in-out duration-500 p-2 border bg-white border-gray-100 shadow-md rounded'
            ]">
                    <button class=" btn-primary p-1 ml-1 rounded">Education</button>
                    <button class=" btn-primary p-1 ml-1 rounded">Experience</button>
                    <button class=" btn-primary p-1 ml-1 rounded">Eligibilities</button>
                    <button class=" btn-primary p-1 ml-1 rounded">Trainings</button>
                </div>
            </div> -->

            <div class="flex items-center justify-center">
                <div class="grid grid-cols-3 gap-x-4 border border-gray-100 bg-white p-10 rounded-lg shadow-md mt-10 w-full">
                    <h2 class="col-span-10 text-xl font-bold"> Opportunities Status </h2>

                    <div class="justify-center items-center w-full" v-for="opp in this.opps">
                        <div class="border bg-white p-5 rounded-lg shadow-lg my-3 border-accent">
                            <h2 class="font-semibold">{{ opp.title }}</h2>
                            <span class="text-lg font-semibold">Status: </span><span class="text-lg"> Pending </span>
    
                            <br/>
                            <br/>
    
                            <span class="text-lg font-semibold">Deadline of Submissions: </span>
                            <div class="text-lg">&emsp; {{ opp.submission_deadline }} </div>
                            <div class="w-full grid pt-4">
                                <div class="place-self-end">
                                    <button @click="showViewPendingfunc(opp)" class="btn btn-primary" type="button">
                                        View Details
                                    </button>
                                    <!--
                                        <router-link :to="{ name: 'Opportunity', params: { id: opp.id, opp: JSON.stringify(opp), applicant: this.applicant } }" class="btn btn-primary">Details</router-link>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <userViewPending
        v-show="showViewPending" 
        @close="hideViewPending"
        @withdrawn="goBackNUpdate"
            :user="applicant" 
            :opp="passedOpp"
            :onVisited="onVisited"
        >


        </userViewPending>

    </div>
</template>

<script>
import userViewPending from '../Components/userViewPending.vue';

export default {
    props: ['applicant'],   

    components: {
        userViewPending,
    },

    data(){
        return{
            applicantData: this.applicant,
            opps: {},
            passedOpp: {},
            onVisited: 0,

            showViewPending: false,
            // isScrolled: false,
        };
    },

    watch: {
        applicant(New, Old){
        }
    },

    // a function that runs on first start
    mounted(){
        //console.log("the object is "+this.applicantData)
        this.loadPending();
    },

    methods:{
        loadPending(){
            let applicantId = this.applicant.id

            // for some reason it doesn't work with just 'getPending'
            axios.post('my/getPending/'+applicantId, {applicantId}).then(({data})=>{
                this.opps = data;
            });
        },

        showViewPendingfunc(obj){
            this.passedOpp = obj;
            this.onVisited = Math.random()
            this.showViewPending = true;
        },

        hideViewPending(obj){
            this.showViewPending = false;
        },

        goBackNUpdate(){
            this.showViewPending = false;
            let applicantId = this.applicant.id
            
            // for some reason it doesn't work with just 'getPending'
            axios.post('my/getPending/'+applicantId, {applicantId}).then(({data})=>{
                this.opps = data;
            });
        }
    } 

}
</script>
<style>

</style>

