/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('chat-messages', require('./components/ChatMessages.vue').default);
Vue.component('chat-form', require('./components/ChatForm.vue').default);
Vue.component('notifications', require('./components/Notifications.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

var kt = document.getElementById('kt_chat_messenger');
var ktc = document.getElementById('kt_drawer_chat_messenger_body');
var cantidadNotificaciones = document.getElementById('cantidadNotificaciones');
var totalNotificaciones = 0;

if (ktc != undefined) {
    var userId = document.getElementById('userId').value;
    const not = new Vue({
        el: '#kt_drawer_chat_messenger_body',

        data: {
            notifications: []
        },

        created() {
            this.fetchNotifications();

            Echo.private('chat')
                  .listen('ConnectionSent', (e) => {
                    // console.log(e);
                    this.notifications.push(e.conexion);
                    cantidadNotificaciones.innerHTML = this.notifications.length;
                    swalToastFire("Recibio una nueva solicitud de conexión", 2500, 'warning');
                  });
        },

        methods: {
            fetchNotifications() {
                axios.get(route('user.connections', [userId])).then(response => {
                    for(let x in response.data) {
                        this.notifications.unshift(response.data[x]);
                    }
                    cantidadNotificaciones.innerHTML = this.notifications.length;
                });
            },

            modifyNotificacion(data) {
                if (data.tipo == 'aceptar') {
                    axios.post(route('connection.accept', [data.notificacion.id])).then(response => {
                        swalToastFire("Solicitud aceptada con exito", 2500, 'success');
                        this.notifications.splice(this.notifications.indexOf(data.notificacion), 1);
                        cantidadNotificaciones.innerHTML = this.notifications.length;
                    });
                } else if (data.tipo == 'rechazar') {
                    axios.post(route('connection.decline', [data.notificacion.id])).then(response => {
                        swalToastFire("Solicitud rechazada con exito", 2500, 'warning');
                        this.notifications.splice(this.notifications.indexOf(data.notificacion), 1);
                        cantidadNotificaciones.innerHTML = this.notifications.length;
                    });
                }
            },
        }

    });
}

if (kt != undefined) {

    const app = new Vue({
        el: '#kt_chat_messenger',

        data: {
            messages: []
        },

        created() {
            this.fetchMessages();

            Echo.private('chat')
              .listen('MessageSent', (e) => {
                this.messages.push(e.message);
              })
        },

        methods: {
            fetchMessages() {
                axios.get(route('user.chat.messages', [document.getElementById('chatUserId').value])).then(response => {
                    for(let x in response.data) {
                        this.messages.unshift(response.data[x]);
                    }
                });
            },

            addMessage(data) {
                this.messages.push({
                    mensaje: data.mensaje,
                    sender: data.sender,
                    chat: data.chat
                });

                axios.post(route('user.chat.send', [document.getElementById('chatUserId').value]), {mensaje: data.mensaje}).then(response => {
                  // console.log(response.data);
                });
            }
        }
    });

}