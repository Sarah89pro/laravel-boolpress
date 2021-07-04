<template>
<section class="about container">
    <h1>Contact us</h1>

    <!-- Mex Success -->
    <div class="success-mex" v-show="success">Your message has been sent successfully!</div>

    <!-- FORM -->
    <form @submit.prevent="postForm">

        <!-- Name -->
        <div class="form-group">
            <label for="name">Name*</label>
            <input type="text" id="name" v-model="name">

            <div class="error-mex"
            v-for="(error, index) in errors.name"
            :key="`err-name-${index}`">
            {{ error }} </div>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email*</label>
            <input type="email" id="email" v-model="email">

            <div class="error-mex"
            v-for="(error, index) in errors.email"
            :key="`err-email-${index}`">
            {{ error }} </div>
        </div>

        <!-- TextArea -->
        <div class="form-group">
            <label for="message">Message*</label>
            <textarea id="message" cols="30" rows="10" v-model="message"></textarea>

            <div class="error-mex"
            v-for="(error, index) in errors.message"
            :key="`err-message-${index}`">
            {{ error }} </div>
        </div>

        <!-- Send -->
        <button type="submit" :disabled="sending"> {{ sending ? 'Sending' : 'Send' }}</button>
    </form>
</section>
  
</template>

<script>
import axios from 'axios';

export default {
    name: 'Contact',
    data() {
        return {
            name: '',
            email: '',
            message: '',
            errors: {},
            success: false,
            sending: false,
        }
    },
    methods: {
        postForm() {
            //console.log('post form data here');
            
            this.sending = true;

            axios
            .post('http://127.0.0.1:8000/api/contacts', {
                name: this.name,
                email: this.email,
                message: this.message
            })
            .then(res => {
                //console.log(res.data);
                this.sending = false;

                if(res.data.errors) {
                    this.errors = res.data.errors;
                    this.success = false;
                }
                else {
                    this.name = '';
                    this.email = '';
                    this.message = '';

                    this.errors =  {};
                    this.success = true;
                }
            })
            .catch(err=> {
                //console.log(err);
            })

        }
    }

}
</script>

<style lang="scss" scoped>

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
}


button {
	box-shadow:inset 0px 1px 0px 0px #a6827e;
	background:linear-gradient(to bottom, #7d5d3b 5%, #634b30 100%);
	background-color:#7d5d3b;
	border-radius:15px;
	border:1px solid #54381e;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:13px;
	padding:11px 14px;
	text-decoration:none;
	text-shadow:0px 1px 0px #4d3534;
}

button:active {
	position:relative;
	top:1px;
}

button:disabled {
    cursor: not-allowed;
}

.error-mex {
    color:red;
}

.success-mex {
    color: green;
}
</style>