<template>
    <div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body" data-kt-scroll-offset="5px">
        <div v-bind:class="[message.chat['user_'+message.sender].id == user.id ? 'justify-content-end' : 'justify-content-start']" class="d-flex mb-10" v-for="message in messages">
            <div class="d-flex flex-column" v-bind:class="[message.chat['user_'+message.sender].id == user.id ? 'align-items-end' : 'align-items-start']" >
                <div  class="d-flex align-items-center mb-2 " v-bind:class="[message.chat['user_'+message.sender].id == user.id ? ' flex-row-reverse' : 'flex-row']">
                    <div class="symbol symbol-35px symbol-circle">
                        <img alt="Pic" :src="message.chat['user_'+message.sender].asset_img" />
                    </div>
                    <div class="ms-3">
                        <a :href="message.chat['user_'+message.sender].profile" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">{{message.chat['user_'+message.sender].nombre}}</a>
                    </div>
                </div>
                <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">{{message.mensaje}}</div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    props: ['messages', 'user']
  };
</script>