
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));
//
// const app = new Vue({
//     el: '#app'
// });

$(document).ready(function() {
    /**
     * 删除 按钮
     */
    $(".delete").click(function (event) {
        event.preventDefault();
        $("#delete-form").attr("action", $(this).attr('href'));
        $('#delete-model').modal();
    });

    /**
     * 模态框 确认删除 按钮
     */
    $(".confirm-delete").click(function(){
        $("#delete-form").submit();
    });

    /**
     * 模态框 取消删除 按钮
     */
    $(".cancel-delete").click(function(){
        $("#delete-form").attr("action",'');
        $('#delete-model').modal('hide');
    });
});
