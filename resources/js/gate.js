export default class Gate{
    constructor(user) {
        this.user = user
    }

    isAdmin(){
        return (this.user.level == 'admin') ? true : false
    }

    isDeveloper(){
        return (this.user.level == 'developer') ? true : false
    }
}