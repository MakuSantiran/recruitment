<template lang="">
    <div class="fixed inset-0 bg-opacity-40 bg-gray-400 flex justify-center items-center">
        <div class="bg-gray-100 rounded-xl overflow-x-auto flex flex-col w-4/6 h-4/6">
            <!-- Modal Header -->
            <header class="px-4 py-5 flex justify-between items-center border-b-2 border-gray-900">
                <h2 class="font-bold px-4 my-0"> {{ user.title }} Applicant </h2>
                <button class="w-8 p-2 bg-gray-300 rounded-full" @click="closeModal">
                    <span class="font-bold text-2xl text-center"> × </span>
                </button>
            </header>

            <!-- Modal Body -->
            <section class="px-10 py-5">
                <div class="grid grid-cols-10 gap-x-1">

                    <!--
                    <div class="col-span-2 text-lg">
                        the pic here<br/>
                        the pic here<br/>
                        the pic here<br/>
                        the pic here<br/>

                    </div>
                    -->

                    <div class="col-span-8 text-lg">
                        <b>Name:</b> {{user.surname}}, {{user.firstname}} {{user.middlename}}
                        <br/>
                        <b>Contact number:</b> {{ user.contact_no}}
                        <br/>
                        <b>Applying for:</b> {{ user.type}}
                        <br/>                     
                        <br/>

                    </div>
                    
                    <div class="col-span-1">
                        <button 
                            class="btn btn-primary"
                            @click="showDetails(user.user_id)"
                        >
                            Check Portfolio
                        </button>

                    </div>
                </div>
            </section>

            <!-- Modal Body -->
            <section class="px-9 py-5">
                <!-- designer would improve thiss ~Maku-->

                <div class="grid grid-cols-10 gap-x-4"> 

                    <div class="col-span-4">
                        <div class="text-lg font-semibold">Uploaded Required Documents:</div>
                        <br/>
                        <div class="px-5">
                            <li v-for="(req, index) in required">
                                {{req['name']}}
                                
                                <div v-if="req['link'] == 'loading'">
                                    <b> [Loading] </b>
                                    <br><br>
                                </div>

                                <div class="text-red-500" v-else-if="req['link'] == 'Not Available'">
                                    <b> [Not Available] </b>
                                    <br><br>
                                </div>

                                <div v-else-if="req['link'] != '--'">
                                    <a @click="alertMessage('Now Downloading '+user.firstname+' '+req['name'])" :href="req['link']" :download="req['fileName']" target="_blank">
                                        <b class="text-green-700"> [ Download ]</b>
                                    </a>   
                                    <br><br>   
                                </div>
                            </li>

                        </div>
                    </div>  

                    <!--   ###################################  -->
                    <div class="col-span-4">
                        <div class="text-lg font-semibold">Uploaded Optional Documents:</div>
                        <br/>
                        <div class="px-5">
                            <li v-for="(opt, index) in optional">
                                {{opt['name']}}

                                <div v-if="opt['link'] == 'loading'">
                                    <b> [Loading] </b>
                                    <br><br>
                                    <!--
                                        {{checkForOptFile(opt['name'], index)}}
                                    -->
                                </div>

                                <div class="text-red-500" v-else-if="opt['link'] == 'Not Available'">
                                    <b> [Not Available] </b>
                                    <br><br>
                                </div>


                                <div v-else-if="opt['link'] != '--'">
                                    <a  @click="alertMessage('Now Downloading '+user.firstname+' '+opt['name'])" :href="opt['link']" :download="opt['fileName']" target="_blank">
                                        <b class="text-green-700"> [ Download ]</b>
                                    </a>
                                    <br><br>
                                </div>
                            </li>
                        </div>

                    </div>

                    
                    
                    <div v-if="user.pend_status==1" class="fixed place-self-end" style="bottom: 10vw">
                        <button @click="markPending(0)" class="btn btn-danger " type="button"> Decline </button>
                        &ensp;&ensp;
                        <!--

                        -->
                        <button @click="markPending(2)" class="btn btn-primary" type="button"> Accept </button>
                    </div>

                    <div v-else class="fixed place-self-end" style="bottom: 10vw">
                        <button @click="deleteRequest()" class="btn btn-danger " type="button"> Delete </button>
                    </div>
                    
                </div>
                <h1>Comments</h1>
                <textarea rows="4" cols="50" v-model="comments"></textarea>
            </section>            
        </div>

        <div v-if="loadingDetails">
            <div class="fixed inset-0 bg-opacity-40 bg-gray-400 flex justify-center items-center">
                <div class="bg-gray-100 rounded-xl flex flex-col w-1/6 h-1/6">
    
                    <header class="px-5 py-5 justify-between items-center">
                            <h2>
                                <b> Getting <br> Files </b>
                            </h2>
                            
                    </header>
                    
                </div>
            </div>    
        </div>

        <userPortfolio
        v-show="portfolioShowing"
        @close="hideDetails"
        :user="user.user_id"

        :basicDetails="basicDetails"
        :educationDetails="educationDetails"
        :workExperience="workExperience"
        :eligibility="eligibility"
        :training="training"
        :address="userAddress"
        >
        </userPortfolio>

    </div>
</template>

<script>
import userPortfolio from '../Components/userPortfolio.vue';

export default {
    props:['user', 'opp', 'whenOpp' ],

    components: {
        userPortfolio
    },

    data(){
        return{
            basicDetails: {},
            educationDetails: {},
            workExperience: {},
            eligibility: {},
            training: {},
            userAddress: {},

            required: {},
            optional: {},

            loadingDetails: false,

            portfolioShowing: false,

            comments: null,
        }
    },
    
    mounted(){
        //this.filterDocs()
        
    },

    watch: {
        // when "whenOpp" changes, filter the docs
        whenOpp: function(newVal, oldVal){
            console.log("Changed")
            this.filterDocs()
            this.comments = this.user.comments
        }
    },  

    methods: {
        alertMessage(msg){
            alert(msg);
        },

        closeModal(){
            this.required = null
            this.optional = null
            this.$emit('close');
        },

        showDetails(id){
            //this.userDetails = obj
            //console.log(this.userDetails)
            this.loadBasicDetails(id)
            this.portfolioShowing = true;
        },

        hideDetails(){
            this.portfolioShowing = false
        },

        loadBasicDetails(id){
            let userId = id;

            // This strategy slows down the response, there must be some way
            // to speed up the process without complicating things too much ~Maku
            axios.post('\getApplicantDetails', {userId}).then(({data})=>{
                this.basicDetails = data;
            });
            axios.post('\getUserAdress', {userId}).then(({data})=>{
                this.userAddress = data;
            });
            axios.post('\getEducationDetails', {userId}).then(({data})=>{
                this.educationDetails = data;
            });
            axios.post('\getWorkExperience', {userId}).then(({data})=>{
                this.workExperience = data;
            });
            axios.post('\getEligibility', {userId}).then(({data})=>{
                this.eligibility = data;
            });
            axios.post('\getTraining', {userId}).then(({data})=>{
                this.training = data;
            });


        },

        filterDocs(opp){

            let reqs = {
                cert_employment: {
                    name: "Certificate of Employment",
                    value: this.user.cert_employment
                },
                service_record: {
                    name: "Service Record",
                    value: this.user.service_record
                },
                transcript_of_records: {
                    name: "Transcript of Record",
                    value: this.user.transcript_of_records
                },
                diploma: {
                    name: "Diploma",
                    value: this.user.diploma
                },
                certification_of_units: {
                    name: "Certification of Units",
                    value: this.user.certification_of_units
                },
                cs_eligibility: {
                    name: "Civil Service Eligibility",
                    value: this.user.cs_eligibility
                },
                prc_license: {
                    name: "PRC License",
                    value: this.user.prc_license
                },
                board_rating: {
                    name: "Board Rating",
                    value: this.user.board_rating
                },
                trainings_seminars_awards: {
                    name: "Trainings, Seminars, and Awards",
                    value: this.user.trainings_seminars_awards
                },
                latest_performance_rating: {
                    name: "Latest Performance Rating",
                    value: this.user.latest_performance_rating
                },
            };

            this.required = [];
            this.optional = [];

            
            Object.entries(reqs).forEach((item, index)=>{
                // if req
                if (item[1].value == 2) {
                    this.required.push({name: item[1].name, link: "loading", fileName: "--"});
                    //this.checkForReqFile(this.required['name'], index)

                // if opt
                } else if (item[1].value == 1) {
                    this.optional.push({name: item[1].name, link: "loading", fileName: "--"});
                    //this.checkForOptFile(this.optional['name'], index)
                }

            });


            // then get files
            Object.entries(this.required).forEach((item, index)=>{
                this.checkForReqFile(item[1]['name'], index)
            });
            Object.entries(this.optional).forEach((item, index)=>{
                this.checkForOptFile(item[1]['name'], index)
            });
            
        },

        checkForReqFile(fileName, index){
            if (this.portfolioShowing != true){

                //console.log("RunningReqCheck")

                let compiledData = {
                    "fileName": fileName, 
                    "userId": this.user.user_id, 
                    "oppId": this.user.opp_id
                }

                axios.post('getFileAddress', {compiledData}).then(({data})=>{
                    
                    console.log("UHHH "+data)

                    if (this.required == null) return;

                    // if the user closed while loading
                    if (this.required != null){
                        if (data != "--"){
                            console.log("Returned:"+data)
                            this.required[index]['link'] = "/"+data
                            this.required[index]['fileName'] = this.user.firstname+this.user.surname+"_"+fileName
                        } else {
                            this.required[index]['link'] = "Not Available"
                        }
                    }

                });

            }
        },

        checkForOptFile(fileName, index){
            if (this.portfolioShowing != true){

                //console.log("RunningOptCheck", index)

                let compiledData = {
                    "fileName": fileName, 
                    "userId": this.user.user_id, 
                    "oppId": this.user.opp_id
                }

                axios.post('getFileAddress', {compiledData}).then(({data})=>{

                    if (this.optional == null) return;

                    // if the user closed while loading
                    if (this.optional != null){
                        if (data != "--"){
                            console.log("Returned:"+data)
                            this.optional[index]['link'] = "/"+data
                            this.optional[index]['fileName'] = this.user.firstname+this.user.surname+"_"+fileName
                        } else {
                            this.optional[index]['link'] = "Not Available"
                        }
                    }


                });

            }
        },

        markPending(value){

            // if value is 0, rejected..
            // if value is 2, then accepted

            let compiledData = {
                    "pendId": this.user.pend_id, 
                    "pendValue": value,
                    "comment": this.comments
            }

            console.log("HEYYY" + compiledData['pendValue']);

            axios.post('\markPending', {compiledData}).then(({data})=>{
                alert("Application succesfully marked!")
                this.$emit('refresh');

            }); 
        },
    
        deleteRequest(){
            if (confirm("Do you want to delete the  application?")){
                let compiledData = {
                    "userId": this.user.user_id, 
                    "oppId": this.user.opp_id,
                    "pendId": this.user.pend_id
                }
                
                axios.post('withdrawApplication', {compiledData}).then(({data})=>{
                    alert("Deleted Succesfully!")
                    this.$emit('refresh');
                });                

                //this.$emit('withdrawn');
            }
        }

    },
}
</script>

<style lang="">
    
</style>