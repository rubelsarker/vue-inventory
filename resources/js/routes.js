//auth
let Login = require('./components/auth/login').default;
let Register = require('./components/auth/register').default;
let Forget = require('./components/auth/forget').default;
let Logout = require('./components/auth/logout').default;
//home
let Home = require('./components/home').default;
//employee
let addEmployee = require('./components/employee/create').default;
let Employee = require('./components/employee/index').default;
let editEmployee = require('./components/employee/edit').default;
let showEmployee = require('./components/employee/show').default;


export const routes = [
    //authentication
    { path: '/', component: Login, name:'/' },
    { path: '/register', component: Register, name: 'register' },
    { path: '/forget', component: Forget, name: 'forget' },
    { path: '/logout', component: Logout, name: 'logout' },
    //home
    { path: '/home', component: Home, name: 'home'},
    //employee routes
    { path: '/store-employee', component: addEmployee, name: 'store-employee' },
    { path: '/employee', component:Employee, name: 'employee' },
    { path: '/edit-employee/:id', component:editEmployee, name: 'edit-employee' },
    { path: '/show-employee/:id', component:showEmployee, name: 'show-employee' }
]