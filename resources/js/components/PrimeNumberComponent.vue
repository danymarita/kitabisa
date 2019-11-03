<template>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card tab-card">
                <div class="card-header tab-card-header">Find first N prime number, and print the result</div>
                <div class="card-body">
                    <b-form @submit.prevent="onProcess">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <b-form-input
                                    id="number"
                                    v-model="number" 
                                    :state="numberState"
                                    aria-describedby="input-live-help input-live-feedback"
                                    placeholder="Please enter a number..." 
                                    number></b-form-input>
                                    <b-form-invalid-feedback id="input-live-feedback">
                                        Number is required and must be greater than 0.
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
                    show>Yeay! The first <b>{{ number }}</b> prime number sequence are: {{ result.result}}</b-alert>
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
                number: null,
                errors: [],
                attemptSubmit: false,
                result: null
            }
        },
        computed: {
            numberState() {
                if(this.attemptSubmit == true){
                    return (
                        this.isNumeric(this.number) === true && this.number > 0
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
                if (this.numberState){
                    let uri = 'http://localhost:8000/api/prime-number/process';
                    this.axios.post(uri, {number: this.number}).then((response) => {
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