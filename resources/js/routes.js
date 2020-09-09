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
//supplier
let addSupplier = require('./components/supplier/create').default;
let Supplier = require('./components/supplier/index').default;
let editSupplier = require('./components/supplier/edit').default;
let showSupplier = require('./components/supplier/show').default;
//category
let addCategory = require('./components/category/create').default;
let Category = require('./components/category/index').default;
let editCategory = require('./components/category/edit').default;
//product
let addProduct = require('./components/product/create').default;
let Product = require('./components/product/index').default;
let editProduct = require('./components/product/edit').default;
let showProduct = require('./components/product/show').default;

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
    { path: '/show-employee/:id', component:showEmployee, name: 'show-employee' },

    //supplier routes
    { path: '/store-supplier', component: addSupplier, name: 'store-supplier' },
    { path: '/supplier', component:Supplier, name: 'supplier' },
    { path: '/edit-supplier/:id', component:editSupplier, name: 'edit-supplier' },
    { path: '/show-supplier/:id', component:showSupplier, name: 'show-supplier' },
    //category routes
    { path: '/store-category', component: addCategory, name: 'store-category' },
    { path: '/category', component:Category, name: 'category' },
    { path: '/edit-category/:id', component:editCategory, name: 'edit-category' },
    //product routes
    { path: '/store-product', component: addProduct, name: 'store-product' },
    { path: '/product', component:Product, name: 'product' },
    { path: '/edit-product/:id', component:editProduct, name: 'edit-product' },
    { path: '/show-product/:id', component:showProduct, name: 'show-product' }

]