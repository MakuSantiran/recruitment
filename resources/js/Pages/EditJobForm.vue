<template>
    <div>
        <div class="container mx-auto">
            <div class="flex justify-center items-center">
                <div class="border border-gray-100 bg-white p-10 rounded-lg shadow-md mt-10 w-full">
                    <h1 class="text-center text-3xl font-extrabold">Opportunity Form</h1>
                    <form class="justify-center" @submit.prevent="update">
                        <div class="grid grid-cols-2 gap-x-4">
                            <div class="col-span-2">
                                <h2 class="text-base font-bold">Title</h2>
                                <input type="text" class="form-input border border-gray-300 rounded w-full" v-model="data.title" placeholder="Title" /> <br><br>
                            </div>
                            <div>
                                <h2 class="text-base font-bold">Position</h2>
                                <input list="positions" class="form-input border border-gray-300 rounded w-full py-2 px-3" v-model="data.position" placeholder="Ex. Developer" />
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
                                <select v-model="data.type" class="form-input border border-gray-300 rounded text-black py-2 px-3 w-full"> <br><br>
                                    <option v-for="emp in emp_status" :value="emp.status">{{ emp.status }}</option>
                                </select>
                            </div>
                            <div class="p-0 m-0">
                                <h2 class="text-base font-bold">Job Description</h2>
                                <!-- <textarea class="form-input w-full border border-gray-300 rounded h-40" v-model="data.description" /> <br><br> -->
                                <ckeditor class="w-full" :editor="editor" v-model="data.description" :config="editorConfig"></ckeditor>
                            </div>
                            <div>
                                <h2 class="text-base font-bold">Qualifications</h2>
                                <!-- <textarea class="form-input w-full border border-gray-300 rounded h-40" v-model="data.qualifications" /> <br><br> -->
                                <ckeditor class="w-full" :editor="editor" v-model="data.qualifications" :config="editorConfig"></ckeditor>
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
                            
                            <div class="col-span-2 w-full pt-2"><div class="content-end">
                                <a class="btn btn-danger" @click="closeForm" style="user-select:none; cursor: pointer;">Close</a>&nbsp;
                                <button class="btn btn-primary" type="submit">Update</button>        
                            </div></div>
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
    props:[ 'data' ],

    data(){
        return{
            opp: '',
            type: 0,

            editor: ClassicEditor,
            editorConfig: {
                toolbar: [ 'bold', 'italic', 'link', '|', 'numberedList', 'bulletedList', '|', 'undo', 'redo' ]
            },

            emp_status:{},

            reqs:{
                    cert_employment: {
                        name: "Certificate of Employment",
                        value: this.data.cert_employment
                    },
                    service_record: {
                        name: "Service Record",
                        value: this.data.service_record
                    },
                    transcript_of_records: {
                        name: "Transcript of Record",
                        value: this.data.transcript_of_records
                    },
                    diploma: {
                        name: "Diploma",
                        value: this.data.diploma
                    },
                    certification_of_units: {
                        name: "Certification of Units",
                        value: this.data.certification_of_units
                    },
                    cs_eligibility: {
                        name: "Civil Service Eligibility",
                        value: this.data.cs_eligibility
                    },
                    prc_license: {
                        name: "PRC License",
                        value: this.data.prc_license
                    },
                    board_rating: {
                        name: "Board Rating",
                        value: this.data.board_rating
                    },
                    trainings_seminars_awards: {
                        name: "Trainings, Seminars, and Awards",
                        value: this.data.trainings_seminars_awards
                    },
                    latest_performance_rating: {
                        name: "Latest Performance Rating",
                        value: this.data.latest_performance_rating
                    },
            },

            deadline:{
                date: this.data.submission_deadline.slice(0,10),
                time: this.data.submission_deadline.slice(11,16),
            },                  
        }
    },

    mounted(){
        this.getEmpStatus();
        this.opp = this.data;
        console.log(this.data)
    },

    computed: {
        deadline_timestamp: function () {
            return this.deadline.date + ' ' + this.deadline.time + ':00'
        },
    },

    watch: {
        data : function(data) {
            this.filterDocs(data);
            this.dl = this.$parent.convertTimestamp(data.submission_deadline);
            // console.log(data.created_at);
        },
    },

    methods:{   
        update(){
            this.data.submission_deadline = this.deadline_timestamp;
            this.data.cert_employment = this.reqs.cert_employment['value'];
            this.data.service_record = this.reqs.service_record['value'];
            this.data.transcript_of_records = this.reqs.transcript_of_records['value'];
            this.data.diploma = this.reqs.diploma['value'];
            this.data.certification_of_units = this.reqs.certification_of_units['value'];
            this.data.cs_eligibility = this.reqs.cs_eligibility['value'];
            this.data.prc_license = this.reqs.prc_license['value'];
            this.data.board_rating = this.reqs.board_rating;
            this.data.trainings_seminars_awards = this.reqs.trainings_seminars_awards['value'];
            this.data.latest_performance_rating = this.reqs.latest_performance_rating['value'];

            axios.post('update', {
                    opportunity: this.data,
                    reqs: this.reqs,
                    deadline: this.deadline_timestamp
                })
            .then(({data})=>{
                if (data){
                    alert('Update Successful');
                    this.$emit('closeForm');
                } else {
                    alert('Update Unsuccessful');
                }
            });
        },

        getEmpStatus(){
            axios.post('getEmpStatus').then(({data})=>{
                this.emp_status = data;
            })
        },

        closeForm(){
            this.$emit('closeForm');
        },

        filterDocs(data){
            this.reqs = {
                cert_employment: {
                    name: "Certificate of Employment",
                    value: data.cert_employment
                },
                service_record: {
                    name: "Service Record",
                    value: data.service_record
                },
                transcript_of_records: {
                    name: "Transcript of Record",
                    value: data.transcript_of_records
                },
                diploma: {
                    name: "Diploma",
                    value: data.diploma
                },
                certification_of_units: {
                    name: "Certification of Units",
                    value: data.certification_of_units
                },
                cs_eligibility: {
                    name: "Civil Service Eligibility",
                    value: data.cs_eligibility
                },
                prc_license: {
                    name: "PRC License",
                    value: data.prc_license
                },
                board_rating: {
                    name: "Board Rating",
                    value: data.board_rating
                },
                trainings_seminars_awards: {
                    name: "Trainings, Seminars, and Awards",
                    value: data.trainings_seminars_awards
                },
                latest_performance_rating: {
                    name: "Latest Performance Rating",
                    value: data.latest_performance_rating
                },
            };

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

<style>
.ck-editor__editable {
    @apply h-56
}
</style>
