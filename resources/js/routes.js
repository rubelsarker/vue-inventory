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


export const routes = [
    { path: '/', component: Login, name:'/' },
    { path: '/register', component: Register, name: 'register' },
    { path: '/forget', component: Forget, name: 'forget' },
    { path: '/logout', component: Logout, name: 'logout' },
    { path: '/home', component: Home, name: 'home'},
    { path: '/store-employee', component: addEmployee, name: 'store-employee' },
    { path: '/employee', component:Employee, name: 'employee' }
]