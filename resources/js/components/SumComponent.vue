<template>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card tab-card">
                <div class="card-header tab-card-header">Sum X & Y, and print the result</div>
                <div class="card-body">
                    <b-form @submit.prevent="onProcess">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <b-form-input
                                    id="sum-x"
                                    v-model="sum.x" 
                                    :state="xState"
                                    aria-describedby="input-live-help input-live-feedback"
                                    placeholder="Please enter a number (X)..." 
                                    number></b-form-input>
                                    <b-form-invalid-feedback id="input-live-feedback">
                                        Number X is required and must be greater than 0.
                                    </b-form-invalid-feedback>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <b-form-input
                                    id="sum-y"
                                    v-model="sum.y" 
                                    :state="yState"
                                    aria-describedby="input-live-help input-live-feedback"
                                    placeholder="Please enter a number (Y)..." 
                                    number></b-form-input>
                                    <b-form-invalid-feedback id="input-live-feedback">
                                        Number Y is required and must be greater than 0.
                                    </b-form-invalid-feedback>
                                </div>
                            </div>
                        </div><br />
                        <div class="form-group">
                            <button class="btn btn-primary">Process!</button>
                            <router-link to="/home" class="btn try-link">Back to Home</router-link>
                        </div>
                    </b-form>
                </div>
            </div>
        </div>
        <div class="col-md-6 offset-md-3 mt-3" v-if="result != null">
            <div class="card tab-card">
                <div class="card-body">
                    <b-alert 
                    variant="success"
                    v-if="result.rc == '00'"
                    show>Yeay! Sum <b>{{ sum.x }}</b> & <b>{{ sum.y }}</b> = {{ result.result}}</b-alert>
                    <b-alert 
                    variant="danger"
                    v-if="result.rc == '40'"
                    show>Whoops! Something error: {{ result.result}}</b-alert>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                sum: {},
                errors: [],
                attemptSubmit: false,
                result: null
            }
        },
        computed: {
            xState() {
                if(this.attemptSubmit == true){
                    return (
                        this.isNumeric(this.sum.x) === true && this.sum.x > 0
                    )
                }else return null;
            },
            yState() {
                if(this.attemptSubmit == true){
                    return (
                        this.isNumeric(this.sum.y) === true && this.sum.y > 0
                    )
                }else return null;
            }
        },
        methods: {
            isNumeric: function (n) {
                return !isNaN(parseFloat(n)) && isFinite(n);
            },
            onProcess(e){
                this.attemptSubmit = true;
                if (this.xState && this.yState){
                    let uri = 'http://localhost:8000/api/sum/process';
                    this.axios.post(uri, this.sum).then((response) => {
                        this.result = {
                            rc: response.data.rc,
                            result: response.data.result
                        }
                    });
                }
            }
        }
    }
</script>