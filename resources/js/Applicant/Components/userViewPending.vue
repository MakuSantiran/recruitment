<template lang="">
    <div class="fixed inset-0 bg-opacity-40 bg-gray-400 flex justify-center items-center">
        <div class="bg-gray-100 rounded-xl overflow-x-auto flex flex-col w-4/6 h-4/6">
            <!-- Modal Header -->
            <header class="px-4 py-5 flex justify-between items-center border-b-2 border-gray-900">
                <h2 class="font-bold px-4 my-0">{{opp.title}}</h2>
                <button class="w-8 p-2 bg-gray-300 rounded-full" @click="closeModal">
                    <span class="font-bold text-2xl text-center"> × </span>
                </button>
            </header>

            <section class="px-9 py-5">
                <h3> <b>Appplication Status:</b> 
                    <div v-if="opp.pend_status == 0">
                       Rejected
                    </div>
                    <div v-if="opp.pend_status == 1">
                        Pending
                    </div>     
                    <div v-if="opp.pend_status == 2">
                        Accepted
                     </div>              
                </h3>
            </section>

            <hr>

            <!-- Modal Body -->
            <section class="px-9 py-5">

                <div class="grid grid-cols-10 gap-x-4"> 
                    <div class="col-span-4">
                        <div class="text-lg font-semibold">Uploaded Required Documents:</div>
                        <br/>
                        <div class="px-5" :key="reqKey">
                            <li v-for="(req, index) in required">
                                {{req['name']}}

                                <b v-if="req['link'] == 'Not Available'" class="text-red-500"> [Not Available] </b>

                                <a v-if="req['link'] != 'Not Available'" @click="alertMessage('Now Downloading '+user.firstname+' '+req['name'])" :href="req['link']" :download="req['fileName']" target="_blank">
                                    <b class="text-green-700"> [ Download ] </b>
                                </a>  

                                <b v-if="req['link'] == 'loading'"> [Loading] </b>
                    
                                <br>
                                <input ref="inputFile" class="btn" type="file"
                                accept=".jpg,.jpeg,.pdf,.png"
                                @change="onReqFileChange"
                                @click="whichDoc(req['name'])"

                                v-if="opp.pend_status == 1"
                                />
                                <br><br>
                    
                            </li>

                        </div>
                    </div>

                    <!--   ###################################  -->
                    <div class="col-span-4">
                        <div class="text-lg font-semibold">Uploaded Optional Documents:</div>
                        <br/>
                        <div class="px-5" :key="optKey">
                            <li v-for="(opt, index) in optional">
                                {{opt['name']}} 

                                <!-- I kinda want the not available text to be inline
                                    but for some reason the div makes a new line.. ~Maku
                                -->
                                <b v-if="opt['link'] == 'Not Available'" class="text-red-500"> [Not Available] </b>

                                <b v-if="opt['link'] == 'loading'"> [Loading] </b>

                                <a v-else-if="opt['link'] != 'Not Available'" @click="alertMessage('Now Downloading '+user.firstname+' '+opt['name'])" :href="opt['link']" :download="opt['fileName']" target="_blank">
                                    <b class="text-green-700"> [ Download ] </b>
                                </a>
    
                                <br>
                                <input ref="inputFile" class="btn" type="file"
                                accept=".jpg,.jpeg,.pdf,.png"
                                @change="onOptFileChange"
                                @click="whichDoc(opt['name'])"

                                v-if="opp.pend_status == 1"
                                />
                                <br><br>                               
    
                            </li>
                        </div>

                    </div>

                    <div class="fixed place-self-end" style="bottom: 10vw">
                        &ensp;&ensp;
                        <button v-if="opp.pend_status != 1" @click="withdrawRequest" class="btn btn-danger" type="button"> Delete </button>

                        <button v-if="opp.pend_status == 1" @click="withdrawRequest" class="btn btn-danger" type="button"> Withdraw request </button>
                        &ensp;&ensp;
                        <button v-if="opp.pend_status == 1" @click="uploadToDatabase" class="btn btn-primary" type="button"> Update </button>
                    </div>
                    
                </div>
            </section>

            <!-- Spacing for the buttons -->
            <div v-if="opp.pend_status == 1">
                <br><br>
            </div>           

            <hr>

            <section class="px-9 py-10" v-if="opp.comments">
                <h3> Comments: </h3>

                {{opp.comments}}
                    
            
                <br/>
                <br/>
                <br/>
            </section>
        </div>
    </div>
</template>

<script>
export default {
    props:['user', 'opp', 'onVisited' ],

    data(){
        return{
            dl: '',
            datePosted: '',
            required: {},
            optional: {},

            optional_Name: [],
            required_Name: [],

            optFiles: {},
            reqFiles: {},
            selectedFileType: "",

            reqKey: 0,
            optKey: 0,
        }
    },
    
    mounted(){

    },

    watch: {
        onVisited: function(newVal, oldVal){
            console.log("Changed",)
            this.filterDocs()
        }
    },  

    methods: {

        whichDoc(doc){
            this.selectedFileType = doc;
            console.log("selected "+doc)
        },

        onReqFileChange(e){
            // first get the file
            var files = e.target.files || e.dataTransfer.files;

            // if non, just end the function here
            if (!files.length){
                delete this.reqFiles[this.selectedFileType];
                return;
            } 
            
            this.reqFiles[this.selectedFileType] = files[0]
            console.log("UserOpened"+this.reqFiles[this.selectedFileType])
        },

        onOptFileChange(e) {

            // first get the file
            var files = e.target.files || e.dataTransfer.files;

            // if non, just end the function here
            if (!files.length){
                delete this.reqFiles[this.selectedFileType];
                return;
            } 

            this.optFiles[this.selectedFileType] = files[0]
            console.log(this.optFiles[this.selectedFileType])
        },

        closeModal(){
            this.$emit('close');
        },

        uploadToDatabase(){
            var compiledOptFiles = this.optFiles
            var compliedReqFiles = this.reqFiles
            
            let formData = new FormData();
            formData.append('id', this.user.id)
            formData.append('oppId', this.opp.id)
            formData.append('option',this.optional_Name)    
            formData.append('req',this.required_Name)    
            
            console.log(this.opp.id)
            
            /**/
            // err a simple for loop?
            // for the optional documents
            for (var i = 0; i<this.optional_Name.length; i++){
                // remove space cuz for some reason form doesn't like space
                formData.append(this.optional_Name[i].replace(/\s+/g, ''), compiledOptFiles[this.optional_Name[i]]); 
            }

            // for the required documents
            for (var i = 0; i<this.required_Name.length; i++){
                // remove space cuz for some reason form doesn't like space
                formData.append(this.required_Name[i].replace(/\s+/g, ''), compliedReqFiles[this.required_Name[i]]); 
            }

            // if user didn't uplaoded the required files
            if (this.required_Name.length != Object.keys(this.reqFiles).length){
                //alert("Please upload all the Required Documents!")
                //return
            }

            axios.post('/userUploadDoc', formData,
            {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
            }).then(function (response) {
                alert(response.data)                
            })
            .catch(function (error) {
                console.log(error);
                return
            })

            // thankfully, I simply rerendered the component to clear
            // the file input ~MakuSan           
            this.reqKey += 1;
            this.optKey += 1;  
            this.reqFiles = {}
            this.optFiles = {}
            this.required = {}
            this.optional = {}
            setTimeout(() => this.filterDocs(), 500);
            /**/
        },

        filterDocs(opp){

            let reqs = {
                cert_employment: {
                    name: "Certificate of Employment",
                    value: this.opp.cert_employment
                },
                service_record: {
                    name: "Service Record",
                    value: this.opp.service_record
                },
                transcript_of_records: {
                    name: "Transcript of Record",
                    value: this.opp.transcript_of_records
                },
                diploma: {
                    name: "Diploma",
                    value: this.opp.diploma
                },
                certification_of_units: {
                    name: "Certification of Units",
                    value: this.opp.certification_of_units
                },
                cs_eligibility: {
                    name: "Civil Service Eligibility",
                    value: this.opp.cs_eligibility
                },
                prc_license: {
                    name: "PRC License",
                    value: this.opp.prc_license
                },
                board_rating: {
                    name: "Board Rating",
                    value: this.opp.board_rating
                },
                trainings_seminars_awards: {
                    name: "Trainings, Seminars, and Awards",
                    value: this.opp.trainings_seminars_awards
                },
                latest_performance_rating: {
                    name: "Latest Performance Rating",
                    value: this.opp.latest_performance_rating
                },
            };

            this.required = [];
            this.optional = [];            

            Object.entries(reqs).forEach((item, index)=>{
                // if req
                if (item[1].value == 2) {
                    this.required.push({name: item[1].name, link: "loading", fileName: "--"});
                    this.required_Name.push(item[1].name);

                // if opt
                } else if (item[1].value == 1) {
                    this.optional.push({name: item[1].name, link: "loading", fileName: "--"});
                    this.optional_Name.push(item[1].name);
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
                    "userId": this.opp.user_id, 
                    "oppId": this.opp.opp_id
                }

                axios.post('my/getFileAddress', {compiledData}).then(({data})=>{
                    
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
                    "userId": this.opp.user_id, 
                    "oppId": this.opp.opp_id
                }

                axios.post('my/getFileAddress', {compiledData}).then(({data})=>{

                    if (this.optional == null) return;

                    // if the user closed while loading
                    if (this.optional != null){
                        if (data != "--"){
                            this.optional[index]['link'] = "/"+data
                            this.optional[index]['fileName'] = this.user.firstname+this.user.surname+"_"+fileName
                        } else {
                            this.optional[index]['link'] = "Not Available"
                        }
                    }


                });

            }
        },

        withdrawRequest(){
            if (confirm("Do you want to withdraw the opportunity?")){
                let compiledData = {
                    "userId": this.opp.user_id, 
                    "oppId": this.opp.opp_id,
                    "pendId": this.opp.pend_id
                }

                axios.post('my/withdrawApplication', {compiledData}).then(({data})=>{
                    alert("Withdrawn succesfully!")
                });                
                this.$emit('withdrawn');
            }
        }
        
    },
}
</script>

<style lang="">
    
</style>