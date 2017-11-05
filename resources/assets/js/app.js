require('./bootstrap');

$('.posts').on('click', '.post .interaction .edit', function(event) {

    var postBody = $(this).closest('.post').find('p:eq(0)').text();
    $('#post-body').val(postBody);

   $('#edit-modal').modal();
});

/*
window.Vue = require('vue');

/!**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 *!/

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});*/
