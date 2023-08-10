<template lang="">
    <div>
        <br/><br/>
        <!-- If not outdated -->
        <div v-if="compareDate(currOp.submission_deadline)" class="border border-accent bg-white p-5 rounded-lg shadow-lg mb-3 w-9/12 mx-auto">
            <h1 class="font-bold text-center">{{ currOp.title }}</h1>
            <hr class="my-4 border-secondary">
            <div class="px-4 grid grid-cols-1 lg:grid-cols-2 gap-2">
                <div>
                    <span class="text-lg font-semibold">Position: </span>
                    <span class="text-lg">{{ currOp.position }}</span> <br>
                </div>
                <div>
                    <span class="text-lg font-semibold">Type: </span>
                    <span class="text-lg">{{ currOp.type ?? '----' }}</span> <br>
                </div>
                <div>
                    <span class="text-lg font-semibold">Description: </span>
                    <div class="px-5 bold-marker" v-html="currOp.description"></div>
                </div>
                <div>
                    <span class="text-lg font-semibold">Qualifications: </span>
                    <div class="px-5 bold-marker" v-html="currOp.qualifications"></div>
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
                    <span class="text-lg">{{ currOp.submission_deadline }}</span> <br>
                    <!--
                        <span class="text-lg">{{ date("D, F d, Y h:i a", strtotime(currOp.submission_deadline)) }}</span> <br>
                    -->
                    
                </div>
            </div>
            <div class="w-full grid pt-4">
                <div class="place-self-end">
                    <router-link :to="{ name: 'Opportunities' }" class="btn btn-primary">Cancel</router-link>
                    &ensp;
                    <button @click="showUploadReq" class="btn btn-primary">Apply</button>
                    
                </div>
            </div>
        </div>

        <!-- If outdated -->
        <div v-else class="border border-brightred bg-white p-5 rounded-lg shadow-lg mb-3 w-9/12 mx-auto">
            <h1 class="font-bold text-center">{{ currOp.title }}</h1>
            <hr class="my-4 border-secondary">
            <div class="px-4 grid grid-cols-1 lg:grid-cols-2 gap-2">
                <div>
                    <span class="text-lg font-semibold">Position: </span>
                    <span class="text-lg">{{ currOp.position }}</span> <br>
                </div>
                <div>
                    <span class="text-lg font-semibold">Type: </span>
                    <span class="text-lg">{{ currOp.type ?? '----' }}</span> <br>
                </div>
                <div>
                    <span class="text-lg font-semibold">Description: </span>
                    <div class="px-5 bold-marker" v-html="currOp.description"></div>
                </div>
                <div>
                    <span class="text-lg font-semibold">Qualifications: </span>
                    <div class="px-5 bold-marker" v-html="currOp.qualifications"></div>
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
                    <span class="text-lg">{{ currOp.submission_deadline }}</span> <br>
                    <!--
                        <span class="text-lg">{{ date("D, F d, Y h:i a", strtotime(currOp.submission_deadline)) }}</span> <br>
                    -->
                    
                </div>
            </div>
            <br/><br/>
            <div class="font-bold self-center"> (You cannot apply to this opportunity anymore) </div>
            <div class="w-full grid pt-4">
                <div class="place-self-end">
                    <router-link :to="{ name: 'Opportunities' }" class="btn btn-primary">Cancel</router-link>
                </div>
            </div>
        </div> 
        
        <!-- 
            i could simply pass theses as an array instead, 
            but ill do it individually first.  
        MakuSantiran-->
        <userUpModal
        v-show="showing" 
        @close="hideUploadReq" 
            :user="applicant" 
            :opp="currOp" 
            :req="required" 
            :option="optional"
        ></userUpModal>
    </div>
</template>

<script>
import userUpModal from '../Components/userUpModal.vue';

export default {
    props: [ 'id', 'applicant'],    

    components: {
        userUpModal,
    },

    data(){
        return{
            showing: false,
            currOp: [],
            required: [],
            optional: []
        }
    },

    mounted(){
        this.getOpp(this.id)



        //this.currOp = JSON.parse(this.opp);
        
        //console.log(this.opp[0]+this.opp[1]+this.opp[2])
    },

    methods:{
        getOpp(idNo){
            axios.post('/getOpp/'+idNo).then(({data})=>{
                //console.log(data)
                this.currOp = data;
                this.filterDocs(this.currOp)
            });
        },

        showUploadReq(){
            this.showing = true;
        },

        hideUploadReq(){
            this.showing = false
        },

        convertTimestamp(ts){
            ts = ts.split(/[- :]/);
            var d = new Date(ts[0], ts[1]-1, ts[2], ts[3], ts[4]);
            var time = d.toLocaleTimeString();
            return d.toDateString() + ' ' + time.slice(0, 5) + ' ' + time.slice(-2);
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
        },

        filterDocs(opp){
            console.log("Opportunity.vue: Running")
            console.log(this.currOp)

            let reqs = {
                cert_employment: {
                    name: "Certificate of Employment",
                    value: this.currOp.cert_employment
                },
                service_record: {
                    name: "Service Record",
                    value: this.currOp.service_record
                },
                transcript_of_records: {
                    name: "Transcript of Record",
                    value: this.currOp.transcript_of_records
                },
                diploma: {
                    name: "Diploma",
                    value: this.currOp.diploma
                },
                certification_of_units: {
                    name: "Certification of Units",
                    value: this.currOp.certification_of_units
                },
                cs_eligibility: {
                    name: "Civil Service Eligibility",
                    value: this.currOp.cs_eligibility
                },
                prc_license: {
                    name: "PRC License",
                    value: this.currOp.prc_license
                },
                board_rating: {
                    name: "Board Rating",
                    value: this.currOp.board_rating
                },
                trainings_seminars_awards: {
                    name: "Trainings, Seminars, and Awards",
                    value: this.currOp.trainings_seminars_awards
                },
                latest_performance_rating: {
                    name: "Latest Performance Rating",
                    value: this.currOp.latest_performance_rating
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
            
        },



        closeModal(){
            console.log("Closing")
        }
    }
}
</script>

<style lang="">
    
</style>