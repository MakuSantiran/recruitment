<template lang="">
    <div>
        <div class="border border-gray-100 bg-white p-5 rounded-lg shadow-lg mt-10 mb-6 w-6/12 mx-auto">
            <form action="" method="GET"> <!-- Not working yet -->
                <div class="flex justify-between">
                    <span>
                        <label>Filter by&nbsp;</label>
                        <select name="type" class="form-input">
                            <option value="title">Title</option>
                            <option value="position">Position</option>
                        </select>
                    </span>
                    <span>
                        <label>Sort by&nbsp;</label>
                        <select name="order" class="form-input">
                            <option value="latest">Latest</option>
                            <option value="oldest">Oldest</option>
                        </select>
                    </span>
                    <div class="">
                        <input name="q" type="search" class="border border-gray-300 rounded w-64 px-3 align-middle" placeholder="Search" value="" />
                    </div>
                    <button type="submit" class="btn">Search</button>
                </div>
            </form>
        </div>

        <div class="border border-gray-100 bg-white p-5 rounded-lg shadow-lg mt-10 mb-3 w-11/12 mx-auto">
            <h1 class="font-bold text-center">Latest Opportunities</h1>
            <hr class="my-4 border-secondary">
            <div class="grid gap-x-4 grid-cols-1 md:grid-cols-3">
                <div class="justify-center items-center w-full" v-for="opp in this.opps">
                    <div class="border bg-white p-5 rounded-lg shadow-lg my-3 border-accent">
                        <h2 class="font-semibold">{{ opp.title }}</h2>
                        <span class="text-lg font-semibold">Position: </span><span class="text-lg">{{ opp.position }}</span> <br>

                        <span class="text-lg font-semibold">Deadline of Submissions: </span>
                        <div class="text-lg">&emsp;{{ opp.submission_deadline }}</div>
                        <div class="w-full grid pt-4">
                            <div class="place-self-end">
                                <router-link :to="{ name: 'Opportunity', params: { slug: opp.slug, opp: JSON.stringify(opp), applicant: this.applicant } }" class="btn btn-primary">Details</router-link>
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
                q: '',
                type: '',
                order: 'newest',
            },

            opps: '',
        }
    },

    mounted(){
        this.getter();
    },

    methods:{
        getter(){
            axios.post('getAll').then(({data})=>{
                this.opps = data;
            });
        },

        convertTimestamp(ts){
            ts = ts.split(/[- :]/);
            var d = new Date(ts[0], ts[1]-1, ts[2], ts[3], ts[4]);
            var time = d.toLocaleTimeString();
            return d.toDateString() + ' ' + time.slice(0, 5) + ' ' + time.slice(-2);
        }
    }
}
</script>

<style lang="">
    
</style>