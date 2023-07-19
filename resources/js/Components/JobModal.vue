<template lang="">
    <div class="fixed inset-0 bg-opacity-40 bg-gray-400 flex justify-center items-center">
        <div class="bg-gray-100 rounded-xl overflow-x-auto flex flex-col w-4/6 h-4/6">
            <!-- Modal Header -->
            <header class="px-4 py-5 flex justify-between items-center border-b-2 border-gray-900">
                <h2 class="font-bold px-4 my-0">{{ data.title }}</h2>
                <button class="w-8 p-2 bg-gray-300 rounded-full" @click="closeModal">
                    <span class="font-bold text-2xl text-center"> × </span>
                </button>
            </header>

            <!-- Modal Body -->
            <section class="px-8 py-5">
                <span class="text-lg font-semibold">Position: </span><span class="text-lg">{{ data.position }}</span> <br>
                <span class="text-lg font-semibold">Description: </span><span class="text-lg" v-html="data.description"></span> <br>
                <span class="text-lg font-semibold">Qualifications: </span><span class="text-lg" v-html="data.qualifications"></span> <br>

                <div class="text-lg font-semibold">Required Documents:</div>
                    <div class="px-5">
                        <li v-for="req in required">{{ req }}</li>
                    </div> <br>

                    <div class="text-lg font-semibold">Optional Documents:</div>
                    <div class="px-5">
                        <li v-for="opt in optional">{{ opt }}</li>
                    </div> <br>

                    <span class="text-lg font-semibold">Deadline of Submissions: </span>
                    <span class="text-lg">{{ this.dl }}</span> <br>
            </section>
        </div>
    </div>
</template>

<script>
export default {
    props:[ 'data' ],

    data(){
        return{
            dl: '',
            datePosted: '',
            required: [],
            optional: []
        }
    },
    
    watch: {
        data : function(data) {
            this.filterDocs(data);
            this.dl = this.$parent.convertTimestamp(data.submission_deadline);
        },
    },  

    methods: {
        closeModal(){
            this.$emit('close');
        },

        filterDocs(opp){
            let reqs = {
                cert_employment: {
                    name: "Certificate of Employment",
                    value: opp.cert_employment
                },
                service_record: {
                    name: "Service Record",
                    value: opp.service_record
                },
                transcript_of_records: {
                    name: "Transcript of Record",
                    value: opp.transcript_of_records
                },
                diploma: {
                    name: "Diploma",
                    value: opp.diploma
                },
                certification_of_units: {
                    name: "Certification of Units",
                    value: opp.certification_of_units
                },
                cs_eligibility: {
                    name: "Civil Service Eligibility",
                    value: opp.cs_eligibility
                },
                prc_license: {
                    name: "PRC License",
                    value: opp.prc_license
                },
                board_rating: {
                    name: "Board Rating",
                    value: opp.board_rating
                },
                trainings_seminars_awards: {
                    name: "Trainings, Seminars, and Awards",
                    value: opp.trainings_seminars_awards
                },
                latest_performance_rating: {
                    name: "Latest Performance Rating",
                    value: opp.latest_performance_rating
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
    },
}
</script>

<style lang="">
    
</style>