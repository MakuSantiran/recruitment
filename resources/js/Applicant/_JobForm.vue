<template>
    <div>
        <div class="container mx-auto">
            <div class="flex justify-center items-center">
                <div class="border border-gray-100 bg-white p-10 rounded-lg shadow-md mt-10 w-full">
                    <h1 class="text-center text-3xl font-extrabold">Opportunity Form</h1>
                    <form class="justify-center" @submit.prevent="publish">
                        <div class="grid grid-cols-2 gap-x-4">
                            <div class="col-span-2">
                                <h2 class="text-base font-bold">Title</h2>
                                <input type="text" class="form-input border border-gray-300 rounded w-full" v-model="opportunity.title" placeholder="Title" /> <br><br>
                            </div>
                            <div>
                                <h2 class="text-base font-bold">Position</h2>
                                <input list="positions" class="form-input border border-gray-300 rounded w-full py-2 px-3" v-model="opportunity.position" placeholder="Ex. Developer" />
                                <datalist id="positions">    
                                    <!-- Change!! -->
                                    <option value="Computer Programmer"></option>
                                    <option value="Teacher"></option>
                                    <option value="Plumber"></option>
                                    <option value="Plumber"></option>
                                </datalist> <br><br>


                            </div>
                            <div>
                                <h2 class="text-base font-bold">Type</h2>
                                <select v-model="opportunity.type" class="form-input border border-gray-300 rounded text-black py-2 px-3 w-full"> <br><br>
                                    <option v-for="emp in emp_status" :value="emp.id">{{ emp.status }}</option>
                                </select>
                            </div>
                            <div class="p-0 m-0">
                                <h2 class="text-base font-bold">Job Description</h2>
                                <!-- <textarea class="form-input w-full border border-gray-300 rounded h-40" v-model="opportunity.description" /> <br><br> -->
                                <ckeditor class="w-full" :editor="editor" v-model="opportunity.description" :config="editorConfig"></ckeditor>
                            </div>
                            <div>
                                <h2 class="text-base font-bold">Qualifications</h2>
                                <!-- <textarea class="form-input w-full border border-gray-300 rounded h-40" v-model="opportunity.qualifications" /> <br><br> -->
                                <ckeditor class="w-full" :editor="editor" v-model="opportunity.qualifications" :config="editorConfig"></ckeditor>
                            </div>
                            <div class="col-span-2">
                                <h2 class="text-base font-bold">Deadline of Submissions</h2>
                                <div class="flex gap-2 p-2 py-0">
                                    <input class="form-input w-full border border-gray-300 rounded" type="date" v-model="deadline.date" />
                                    <input class="form-input w-full border border-gray-300 rounded" type="time" v-model="deadline.time" /> <br><br>
                                </div>
                            </div>
                            
                            <div class="col-span-2">
                                <h2 class="text-base font-bold">Required Documents</h2>

                                <div class="w-full">
                                    <div class="table-fixed mx-auto">
                                        <div class="table-row" v-for="req in reqs">
                                            <div class="table-cell p-1 text-right px-4">{{ req.name }}</div>
                                            <div class="table-cell p-1">
                                                <select v-model="req.value" class="form-input border border-gray-300 rounded text-black mr-1 py-2 px-3 w-36">
                                                    <option value="0">Not Required</option>
                                                    <option value="1">Optional</option>
                                                    <option value="2">Required</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-span-2">
                                <h2 class="text-base font-bold">Posting Status</h2>

                                <div class="w-full">
                                    <div class="table-fixed mx-auto">
                                        <div class="table-cell p-1 text-right px-4">Status</div>
                                            <div class="table-cell p-1">
                                                <select v-model="opportunity.status" class="form-input border border-gray-300 rounded text-black mr-1 py-2 px-3 w-36">
                                                    <option value="0">Draft</option>
                                                    <option value="1">Publish</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        <div class="w-full grid pt-2">
                                <div class="place-self-end"><button class="btn btn-primary" type="submit">Publish</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default {
    data(){
        return{
            opportunity:{
                title: '',
                position: '',
                description: '',
                qualifications: '',
                type: 0,
                status: 0
            },

            editor: ClassicEditor,
            editorConfig: {
                toolbar: [ 'bold', 'italic', 'link', '|', 'numberedList', 'bulletedList', '|', 'undo', 'redo' ]
            },

            emp_status:{},

            reqs:{
                    cert_employment: {
                        name: "Certificate of Employment",
                        value: 0
                    },
                    service_record: {
                        name: "Service Record",
                        value: 0
                    },
                    transcript_of_records: {
                        name: "Transcript of Record",
                        value: 0
                    },
                    diploma: {
                        name: "Diploma",
                        value: 0
                    },
                    certification_of_units: {
                        name: "Certification of Units",
                        value: 0
                    },
                    cs_eligibility: {
                        name: "Civil Service Eligibility",
                        value: 0
                    },
                    prc_license: {
                        name: "PRC License",
                        value: 0
                    },
                    board_rating: {
                        name: "Board Rating",
                        value: 0
                    },
                    trainings_seminars_awards: {
                        name: "Trainings, Seminars, and Awards",
                        value: 0
                    },
                    latest_performance_rating: {
                        name: "Latest Performance Rating",
                        value: 0
                    },
            },

            deadline:{
                date: new Date().toJSON().slice(0,10),
                time: "23:59",
            },                  
        }
    },

    mounted(){
        this.getEmpStatus();
    },

    computed: {
        deadline_timestamp: function () {
            return this.deadline.date + ' ' + this.deadline.time + ':00'
        },
    },

    methods:{   
        publish(){
            axios.post('publish', {
                    opportunity: this.opportunity,
                    reqs: this.reqs,
                    deadline: this.deadline_timestamp
                })
            .then(({data})=>{
                if (data){
                    alert('Register Successful');
                    this.$router.push('/admin/opportunities');
                } else {
                    alert('Register Unsuccessful');
                }
            });
        },

        getEmpStatus(){
            axios.post('getEmpStatus').then(({data})=>{
                this.emp_status = data;
            })
        }
    }
}
</script>

<style>
.ck-editor__editable {
    @apply h-56
}
</style>
