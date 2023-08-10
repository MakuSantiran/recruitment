<template lang="">
    <div>
        <div class="border border-gray-100 bg-white p-5 rounded-lg shadow-lg mt-10 mb-6 w-6/12 mx-auto">
            <form action="" method="GET"> <!-- Not working yet -->
                <div class="flex justify-between">
                    <span>
                        <label>Filter by&nbsp;</label>
                        <select v-model="search.filter" name="type" class="form-input">
                            <option value="title">Title</option>
                            <option value="position">Position</option>
                            <option value="type">Type</option>
                        </select>
                    </span>
                    <span>
                        <label>Sort by&nbsp;</label>
                        <select v-model="search.sort" name="order" class="form-input">
                            <option value="Latest">Latest</option>
                            <option value="Oldest">Oldest</option>
                        </select>
                    </span>
                    <div class="">
                        <input  v-model="search.keyword" name="q" type="search" class="border border-gray-300 rounded w-64 px-3 align-middle" />
                    </div>
                    <button type="button" class="btn" @click="searchForOpp()" >Search</button>
                </div>
            </form>
        </div>

        <div class="border border-gray-100 bg-white p-5 rounded-lg shadow-lg mt-10 mb-3 w-11/12 mx-auto">
            

            <div v-if="userSearched">
                <h1 class="font-bold text-center">Search Result Of "{{this.oldSearch.keyword}}" </h1>
                <br/>
                <div class="text-center">Filtered by {{this.oldSearch.filter}}</div>
                
            </div>
            <div v-else>
                <h1 class="font-bold text-center">Latest Opportunities</h1>
            </div>

            <hr class="my-4 border-secondary">
            <div class="grid gap-x-4 grid-cols-1 md:grid-cols-3">
                <div class="justify-center items-center w-full" v-for="opp in this.opps">

                    <!-- there is probably a better way to do this ~MakuSan-->
                    <div v-if="compareDate(opp.submission_deadline)" class="border bg-white p-5 rounded-lg shadow-lg my-3 border-accent">
                        <h2 class="font-semibold">{{ opp.title }}</h2>
                        <span class="text-lg font-semibold">Position: </span><span class="text-lg">{{ opp.position }}</span> <br>
                        <span class="text-lg font-semibold">Type: </span><span class="text-lg">{{ opp.type }}</span> <br><br/>

                        <span class="text-lg font-semibold">Deadline of Submissions: </span>
                        <div class="text-lg">&emsp;{{ opp.submission_deadline }}</div>
                        <div class="w-full grid pt-4">
                            <div class="place-self-end">
                                <router-link :to="{ name: 'Opportunity', params: { id: opp.id, opp: JSON.stringify(opp), applicant: this.applicant } }" class="btn btn-primary">Details</router-link>
                            </div>
                        </div>
                    </div>

                    <!--There could be a better way to do this-->
                    <div v-else class="border bg-white p-5 rounded-lg shadow-lg my-3 border-brightred">
                        <h2 class="font-semibold">{{ opp.title }}</h2>
                        <span class="text-lg font-semibold">Position: </span><span class="text-lg">{{ opp.position }}</span> <br>
                        <span class="text-lg font-semibold">Type: </span><span class="text-lg">{{ opp.type }}</span> <br><br/>

                        <span class="text-lg font-semibold">Deadline of Submissions: </span>
                        <div class="text-lg">&emsp;{{ opp.submission_deadline }}</div>
                        <div class="w-full grid pt-4">
                            <div class="place-self-end">
                                <router-link :to="{ name: 'Opportunity', params: { id: opp.id, opp: JSON.stringify(opp), applicant: this.applicant } }" class="btn btn-primary">Details</router-link>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['applicant'],

    data(){
        return{
            search:{
                filter: 'title',
                sort: 'Latest',
                keyword: '',
            },

            oldSearch:{
                filter: 'title',
                sort: 'Latest',
                keyword: '',               
            },

            opps: '',
            userSearched: false,
        }
    },

    mounted(){
        this.getter();
        this.userSearched = false;
    },

    methods:{
        getter(){
            axios.post('getAll').then(({data})=>{
                console.log(data)
                this.opps = data;
            });
        },

        convertTimestamp(ts){
            ts = ts.split(/[- :]/);
            var d = new Date(ts[0], ts[1]-1, ts[2], ts[3], ts[4]);
            var time = d.toLocaleTimeString();
            return d.toDateString() + ' ' + time.slice(0, 5) + ' ' + time.slice(-2);
        },

        searchForOpp(){
            this.opps = [];
            let search = this.search

            // assign old values 
            this.oldSearch.filter = this.search.filter
            this.oldSearch.sort = this.search.sort
            this.oldSearch.keyword = this.search.keyword

            

            axios.post('userSearchOpps',{search}).then(({data})=>{
                this.opps = data;
                this.userSearched = true;
            });
        },

        // I have to improvise based on my current knowledge ~MakuSan
        compareDate(date){
            var subdate = date

            var today = new Date();
            var deadline = new Date(subdate) 
            
            //console.log(date)
            console.log(subdate)

            // uhhhh HAAHHA
            return today < deadline
        }
    }
}
</script>

<style lang="">
    
</style>