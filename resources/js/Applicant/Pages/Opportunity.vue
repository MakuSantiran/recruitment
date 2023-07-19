<template lang="">
    <div>
        <div class="p-5 mx-auto w-4/5">
            <a @click="$router.go(-1)" class="btn">Back to Opportunities</a>
        </div>
        <div class="border border-accent bg-white p-5 rounded-lg shadow-lg mb-3 w-9/12 mx-auto">
            <h1 class="font-bold text-center">{{ opp.title }}</h1>
            <hr class="my-4 border-secondary">
            <div class="px-4 grid grid-cols-1 lg:grid-cols-2 gap-2">
                <div>
                    <span class="text-lg font-semibold">Position: </span>
                    <!-- <span class="text-lg">{{ opp.position }}</span> <br> -->
                </div>
                <div>
                    <span class="text-lg font-semibold">Type: </span>
                    <!-- <span class="text-lg">{{ opp.type ?? '----' }}</span> <br> -->
                </div>
                <div>
                    <span class="text-lg font-semibold">Description: </span>
                    <!-- <div class="px-5 bold-marker" v-html="opp.description"></div> -->
                </div>
                <div>
                    <span class="text-lg font-semibold">Qualifications: </span>
                    <!-- <div class="px-5 bold-marker" v-html="opp.qualifications"></div> -->
                </div>
                <div>
                    <div class="text-lg font-semibold">Required Documents:</div>
                    <div class="px-5">
                                
                        <!-- <li >{{ $req }}</li> -->
                    </div>
                </div>
                <div>
                    <div class="text-lg font-semibold">Optional Documents:</div>
                    <div class="px-5">
                        
                        <!-- <li>{{ $opt }}</li> -->
                        
                    </div>
                </div>
                <div class='col-span-1 lg:col-span-2 mt-2'>
                    <span class="text-lg font-semibold">Deadline of Submissions: </span>
                    <!-- <span class="text-lg">{{ date("D, F d, Y h:i a", strtotime(opp.submission_deadline)) }}</span> <br> -->
                </div>
                <div class="w-full grid pt-4">
                    <div class="place-self-end">
                        <!-- <a href="" class="btn btn-primary">Apply</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [ 'opp', 'slug'],    

    data(){
        return{

        }
    },

    mounted(){

    },

    methods:{
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