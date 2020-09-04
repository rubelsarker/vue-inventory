import Token from "./Token";
import AppStorage from "./AppStorage";
class User {
    responseAfterLogin(res){
        const access_token = res.data.access_token;
        const userName = res.data.name;
        if(Token.isValid(access_token)){
            AppStorage.store(access_token,userName);
        }
    }
    hasToken(){
        const storeToken = localStorage.getItem('token');
        if(storeToken){
            return Token.isValid(storeToken) ? true : false;
        }
        return false;
    }
    loggedIn(){
        return this.hasToken()

    }
    // logout(){
    //
    // }
    name(){
        if(this.loggedIn()){
            return localStorage.getItem('user')
        }
    }
    id(){
        if(this.loggedIn()){
            const payload = Token.payload(localStorage.getItem('token'));
            return payload.sub;
        }
        return false;
    }
}
export default User = new User();