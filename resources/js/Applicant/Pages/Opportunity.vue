<template lang="">
    <div>
        <div class="p-5 mx-auto w-4/5">
            <a @click="$router.go(-1)" class="btn">Back to Opportunities</a>
        </div>
        <div class="border border-accent bg-white p-5 rounded-lg shadow-lg mb-3 w-9/12 mx-auto">
            <h1 class="font-bold text-center">{{ userOpp.title }}</h1>
            <hr class="my-4 border-secondary">
            <div class="px-4 grid grid-cols-1 lg:grid-cols-2 gap-2">
                <div>
                    <span class="text-lg font-semibold">Position: </span>
                    <span class="text-lg">{{ userOpp.position }}</span> <br>
                </div>
                <div>
                    <span class="text-lg font-semibold">Type: </span>
                    <span class="text-lg">{{ userOpp.type ?? '----' }}</span> <br>
                </div>
                <div>
                    <span class="text-lg font-semibold">Description: </span>
                    <div class="px-5 bold-marker" v-html="userOpp.description"></div>
                </div>
                <div>
                    <span class="text-lg font-semibold">Qualifications: </span>
                    <div class="px-5 bold-marker" v-html="userOpp.qualifications"></div>
                </div>
                <div>
                    <div class="text-lg font-semibold">Required Documents:</div>
                    <div class="px-5">
                        <li v-for="req in required">{{ req }}</li>
                    </div>
                </div>
                <div>
                    <div class="text-lg font-semibold">Optional Documents:</div>
                    <div class="px-5">                        
                        <li v-for="opt in optional">{{ opt }}</li>
                    </div>
                </div>
                <div class='col-span-1 lg:col-span-2 mt-2'>
                    <span class="text-lg font-semibold">Deadline of Submissions: </span>
                    <span class="text-lg">{{ userOpp.submission_deadline }}</span> <br>
                    <!--
                        <span class="text-lg">{{ date("D, F d, Y h:i a", strtotime(userOpp.submission_deadline)) }}</span> <br>
                    -->
                    
                </div>
                <div class="w-full grid pt-4">
                    <div class="place-self-end">
                        <button @click="initiateDocReq" class="btn btn-primary">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [ 'opp', 'slug', 'applicant'],    

    data(){
        return{
            userOpp: [],
            required: [],
            optional: []
        }
    },

    mounted(){
        this.userOpp = JSON.parse(this.opp);
        this.filterDocs(this.opp)
        //console.log(this.opp[0]+this.opp[1]+this.opp[2])
    },

    methods:{

        initiateDocReq(){
            alert('Now Applying the job!');
        },

        convertTimestamp(ts){
            ts = ts.split(/[- :]/);
            var d = new Date(ts[0], ts[1]-1, ts[2], ts[3], ts[4]);
            var time = d.toLocaleTimeString();
            return d.toDateString() + ' ' + time.slice(0, 5) + ' ' + time.slice(-2);
        },

        filterDocs(opp){
            console.log("Opportunity.vue: Running")

            let reqs = {
                cert_employment: {
                    name: "Certificate of Employment",
                    value: this.userOpp.cert_employment
                },
                service_record: {
                    name: "Service Record",
                    value: this.userOpp.service_record
                },
                transcript_of_records: {
                    name: "Transcript of Record",
                    value: this.userOpp.transcript_of_records
                },
                diploma: {
                    name: "Diploma",
                    value: this.userOpp.diploma
                },
                certification_of_units: {
                    name: "Certification of Units",
                    value: this.userOpp.certification_of_units
                },
                cs_eligibility: {
                    name: "Civil Service Eligibility",
                    value: this.userOpp.cs_eligibility
                },
                prc_license: {
                    name: "PRC License",
                    value: this.userOpp.prc_license
                },
                board_rating: {
                    name: "Board Rating",
                    value: this.userOpp.board_rating
                },
                trainings_seminars_awards: {
                    name: "Trainings, Seminars, and Awards",
                    value: this.userOpp.trainings_seminars_awards
                },
                latest_performance_rating: {
                    name: "Latest Performance Rating",
                    value: this.userOpp.latest_performance_rating
                },
            };

            this.required = [];
            this.optional = [];

            Object.entries(reqs).forEach((item, index)=>{
                if (item[1].value == 2) {
                    this.required.push(item[1].name);
                } else if (item[1].value == 1) {
                    this.optional.push(item[1].name);
                }

            });
            
        }

    }
}
</script>

<style lang="">
    
</style>