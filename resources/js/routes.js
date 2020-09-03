let Login = require('./components/auth/login').default;
let Register = require('./components/auth/register').default;
let Forget = require('./components/auth/forget').default;
export const routes = [
    { path: '/', component: Login, name:'/' },
    { path: '/register', component: Register, name: 'register' },
    { path: '/forget', component: Forget, name: 'forget' }
]