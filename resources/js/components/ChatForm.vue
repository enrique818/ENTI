<template>
    <div class="card-footer pt-4" id="kt_chat_messenger_footer">
        <textarea id="btn-input" name="mensaje" v-model="newMessage" @keyup.enter="sendMessage" class="form-control form-control-flush mb-3" rows="1" data-kt-element="input" placeholder="Escribe el mensaje"></textarea>
        <div class="d-flex flex-stack">
            <div class="d-flex align-items-center me-2"></div>
            <button class="btn btn-primary" type="button" id="btn-chat" data-kt-element="send" @click="sendMessage">Enviar</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user', 'chat', 'sender'],

        data() {
            return {
                newMessage: ''
            }
        },

        methods: {
            sendMessage() {
                this.$emit('messagesent', {
                    mensaje: this.newMessage,
                    chat: this.chat,
                    sender: this.sender,
                });

                this.newMessage = ''
            }
        }    
    }
</script>