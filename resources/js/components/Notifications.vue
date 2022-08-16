<template>
    <div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer" data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px">
        <div v-for="notification in notifications" class="card shadow">
            <div class="card-header">
                <div class="card-title m-0">
                    <div class="fs-3 fw-bolder text-dark">{{notification.sender_user.nombre}}</div>
                    <span class="badge badge-sm badge-light-success">{{notification.sender_user.rol}}</span>
                </div>
                <div class="card-toolbar">
                    <div class="symbol symbol-50px w-50px bg-light">
                        <img :src="notification.sender_user.asset_img" alt="Logo">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex flex-wrap mt-2 justify-content-end">
                    <button type="button" class="btn btn-sm btn-danger"
                        @click="eliminarSolicitud(notification)"
                    >Rechazar</button>
                    <button type="button" class="btn ms-2 btn-sm btn-success"
                        @click="aceptarSolicitud(notification)"
                    >Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    props: ['notifications'],

    methods: {
            aceptarSolicitud(notificacion) {
                this.$emit('solicitudcambio', {
                    tipo: 'aceptar',
                    notificacion: notificacion,
                });
            },
            eliminarSolicitud(notificacion) {
                this.$emit('solicitudcambio', {
                    tipo: 'rechazar',
                    notificacion: notificacion,
                });
            }
        } 
  };
</script>