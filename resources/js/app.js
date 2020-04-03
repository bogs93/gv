/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
//COMPONENTS
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('card-components', require('./components/CardComponents.vue').default);
Vue.component('add-pokemon-btn', require('./components/AddPokemonComponent.vue').default);
Vue.component('modal-component', require('./components/CreatePokemonComponent.vue').default);
Vue.component('buton-component', require('./components/AddPokemonComponent.vue').default);
Vue.component('tab-component', require('./components/TabComponent.vue').default);
//MODAL
Vue.component('add-role-modal', require('./components/modal/AddRoleModal.vue').default);
Vue.component('data-modal', require('./components/modal/DataModalComponent.vue').default);
//CALENDAR
Vue.component('calendar-component', require('./components/calendar/CalendarComponent.vue').default);
Vue.component('vehicle-validations-component', require('./components/calendar/VehicleValidationsComponent.vue').default);
Vue.component('algoritmo-component', require('./components/calendar/AlgoritmoComponent.vue').default);
//TABLES
Vue.component('table-component', require('./components/table.vue').default);
Vue.component('roles-table', require('./components/table/RolesTable.vue').default);
Vue.component('axes-table', require('./components/table/AxesTable.vue').default);
Vue.component('engines-table', require('./components/table/EnginesTable.vue').default);
Vue.component('services-table', require('./components/table/ServicesTable.vue').default);
Vue.component('tests-table', require('./components/table/TestsTable.vue').default);
Vue.component('rejections-table', require('./components/table/RejectionsTable.vue').default);
Vue.component('vehicle-table', require('./components/table/VehicleTable.vue').default);
Vue.component('users-table', require('./components/table/UsersTable.vue').default);
Vue.component('companies-table', require('./components/table/CompaniesTable.vue').default);

//FORMS
Vue.component('addvehicle-form', require('./components/forms/AddVehicle.vue').default);
Vue.component('editvehicle-form', require('./components/forms/EditVehicle.vue').default);
Vue.component('showvehicle-form', require('./components/forms/ShowVehicle.vue').default);
Vue.component('add-cliente', require('./components/forms/AddCompany.vue').default);
Vue.component('add-user', require('./components/forms/AddUser.vue').default);

Vue.component('fisico-report', require('./components/reports/FisicoReport.vue').default);
Vue.component('emission-report', require('./components/reports/EmissionReport.vue').default);

Vue.component('addverifica-form', require('./components/forms/AddVerification.vue').default);
/**
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
