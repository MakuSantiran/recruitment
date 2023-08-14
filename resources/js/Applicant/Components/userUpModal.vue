<template lang="">
    <div class="fixed inset-0 bg-opacity-40 bg-gray-400 flex justify-center items-center">
        <div class="bg-gray-100 rounded-xl overflow-x-auto flex flex-col w-4/6 h-4/6">
            <!-- Modal Header -->
            <header class="px-4 py-5 flex justify-between items-center border-b-2 border-gray-900">
                <h2 class="font-bold px-4 my-0">{{opp.title}}</h2>
            </header>

            <!-- Modal Body -->
            <section class="px-9 py-5">

                <div class="grid grid-cols-10 gap-x-4"> 

                    <div class="col-span-4">
                        <div class="text-lg font-semibold">Required Documents:</div>
                        <br/>

                        <div class="px-5" :key="reqKey">
                            <div v-for="req in req">
                                {{ req }}<br/>
                                <input ref="inputFile" class="btn" type="file"
                                accept=".jpg,.jpeg,.pdf,.png"
                                @change="onReqFileChange"
                                @click="whichDoc(req)"
                                />
                                <br/><br/>
                            </div>
                        </div> <br>
                    </div>

                    <!--   ###################################  -->
                    <div class="col-span-4">
                        <div class="text-lg font-semibold">Optional Documents:</div>
                        <br/>

                        <div class="px-5" :key="optKey">
                            <div v-for="opt in option">
                                {{ opt }}<br/>
                                <input class="btn" type="file"
                                accept=".jpg,.jpeg,.pdf,.png"
                                @change="onOptFileChange"
                                @click="whichDoc(opt)"
                                />
                                <br/><br/>
                            </div>
                        </div> <br>
                    </div>

                    <div class="fixed place-self-end" style="bottom: 10vw">
                        <button @click="closeModal" class="btn btn-primary " type="button"> Cancel </button>
                        &ensp;&ensp;
                        <button @click="uploadToDatabase" class="btn btn-primary" type="button"> Submit </button>
                    </div>
                    
                </div>
            </section>
        </div>
    </div>
</template>

<script>
export default {
    props:['user', 'opp', 'req', 'option' ],

    data(){
        return{
            dl: '',
            datePosted: '',
            required: [],
            optional: [],

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
        /*
        option : function(data) {
            // make a dictionary so thats where the uploaded files will
            // be stored .. ~MakuSan
            //this.optFiles['id'] = this.user.id
            //this.optFiles['oppId'] = this.opp.id

            for (var i=0; i<data.length; i++){
                //this.optFiles[data[i]] = ""

            }
            
            this isnt probably needed
            ~MakuSan

        },
        */
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
            formData.append('option',this.option)    
            formData.append('req',this.req)        
            
            // err a simple for loop?
            // for the optional documents
            for (var i = 0; i<this.option.length; i++){
                // remove space cuz for some reason form doesn't like space
                formData.append(this.option[i].replace(/\s+/g, ''), compiledOptFiles[this.option[i]]); 
            }

            // for the required documents
            for (var i = 0; i<this.req.length; i++){
                // remove space cuz for some reason form doesn't like space
                formData.append(this.req[i].replace(/\s+/g, ''), compliedReqFiles[this.req[i]]); 
            }

            // if user didn't uplaoded the required files
            if (this.req.length != Object.keys(this.reqFiles).length){
                alert("Please upload all the Required Documents!")
                return
            }

            axios.post('/userUploadDoc', formData,
            {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
            }).then(function (response) {
                alert("You have successfully applied to this opportunity!")    
                window.location.href = "/my";            
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

        },

    },
}
</script>

<style lang="">
    
</style>