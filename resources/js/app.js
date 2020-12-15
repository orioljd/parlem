require('./bootstrap');

import Vue from 'vue'

const app = new Vue({
    el: '#app',
    data: {
        status: 'INITIAL',
        customers: [],
        customerInfo: {},
        customerProducts: []
    },
    mounted: function() {
        let self = this;
        axios.get('/api/customers')
        .then(function (response) {
            self.loadCustomers(response.data);
        }).catch(function (error) {
            console.log(error);
        });
    },
    methods: {
        loadCustomers: function(customers) {
            this.customers = customers;
        },
        loadCustomerInfo: function(event) {
            let customerId = event.target.value;
            let self = this;

            if (customerId === '') {
                this.status = 'INITIAL';
                return;
            }

            this.status = 'LOADING';

            Promise.all([this.getCustomerInfo(customerId), this.getProducts(customerId)])
            .then(function () {
                self.status = 'LOADED';
            });
        },
        getCustomerInfo: function(customer) {
            let self = this;
            return axios.get('/api/customers/' + customer)
                .then(function (response) {
                    self.customerInfo = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
        },
        getProducts: function(customer) {
            let self = this;
            return axios.get('/api/products?customer=' + customer)
                .then(function (response) {
                    self.customerProducts = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
        }
    },

})
