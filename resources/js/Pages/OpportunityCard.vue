<template lang="">
    <div>
        <div class="grid grid-cols-2 p-5">
            <div class="flex justify-center items-center">
                <div class="border border-gray-100 bg-white p-5 rounded-lg shadow-lg mt-3 mb-6">
                    <h2 class="font-bold">{{ opp.title }}</h2>
                    <span class="text-lg font-semibold">Position: </span><span class="text-lg">{{ opp.position }}</span> <br>
                    <span class="text-lg font-semibold">Description: </span><span class="text-lg">{{ opp.description }}</span> <br>
                    <span class="text-lg font-semibold">Qualifications: </span><span class="text-lg">{{ opp.qualifications }}</span> <br>
                    
                    <div class="text-lg font-semibold">Required Documents:</div>
                    <div class="px-5">
                        <li v-for="req in required">{{ req }}</li>
                    </div>

                    <div class="text-lg font-semibold">Optional Documents:</div>
                    <div class="px-5">
                        <li v-for="opt in optional">{{ opt }}</li>
                    </div>

                    <span class="text-lg font-semibold">Deadline of Submissions: </span><span class="text-lg">{{ opp.submission_deadline }}</span> <br>
                    <div class="w-full grid pt-2">
                        <div class="place-self-end"><button class="btn btn-primary" type="submit">Edit</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                opp: '',
                required: [],
                optional: []
            }
        },

        mounted(){
            this.getter();
        },

        methods: {
            getter(){
                axios.get('getopp1').then(({data})=>{
                    this.opp = data;

                    this.reqs = {
                        cert_employment: data.cert_employment,
                        service_record: data.service_record,
                        transcript_of_records: data.transcript_of_records,
                        diploma: data.diploma,
                        certification_of_units: data.certification_of_units,
                        cs_eligibility: data.cs_eligibility,
                        prc_license: data.prc_license,
                        board_rating: data.board_rating,
                        trainings_seminars_awards: data.trainings_seminars_awards,
                        latest_performance_rating: data.latest_performance_rating,
                    };

                    Object.entries(this.reqs).forEach((item, index)=>{
                        if (item[1] == 2) {
                            this.required.push(item[0]);
                        } else if (item[1] == 1) {
                            this.optional.push(item[0]);
                        }
                    })
                });
            }
        }
    }
</script>

<style lang="">

</style>