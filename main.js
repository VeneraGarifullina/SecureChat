Vue.config.devtools = true;
var app = new Vue({
    el: '#app',
    data: {
        name: "Регистрация",
        access: false,
        enter: "Есть аккаунт?",
        message: '',
        login: "",
        password: ""
        
    },
    methods: {
        loginAction(){
            params = new URLSearchParams();
            params.append('login', this.login);
            params.append('password', this.password);
            axios.post("signUp.php", params)
                .then((response) => {
                    data = response.data;
                    if (data.success == true){
                        this.message = "Вы успешно зарегистрированы!";
                        this.actSignIn();
                    } 
                    else {
                        this.message = data.error;
                    }    
            })},
        
        enterAction(){
            params = new URLSearchParams();
            params.append('login', this.login);
            //params.append('password', this.password);
            axios.post("signIn.php", params)
                .then((response) => {
                    data = response.data;
                
                    if (data.success == true){
                        passtime = data.time;
                        allData = md5(passtime + md5(this.password));
                        this.axiosfunc(allData);
                    } 
                    else {
                        this.message = data.error;
                    }    
            })
        }, 
        
        axiosfunc(hesh){
            params = new URLSearchParams();
            params.append('hash', this.hash);
            axios.post("hashChecker.php", params)
                .then((response) => {
                    
                    if (data.success == true){
                        this.message = "ВЫ УСПЕШНО АВТОРИЗОВАНЫ!";
                       // window.location.href = "success.php";
                    } 
                    else {
                        this.message = data.error;
                    }    
            })
            
        },
        
        actSignIn() {
            this.access = true,
            this.name = "Вход",
            this.enter = "Нет аккаунта?"
        },
        actSignUp(){
            this.access = false,
            this.name = "Регистрация",
            this.enter = "Есть аккаунт?"
        },
        

    }
});
