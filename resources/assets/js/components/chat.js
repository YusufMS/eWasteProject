module.exports = {

    data() {
        return {
            posts: [],
            newMsg: '',

        }
    },


    ready() {
        Echo.channel('public-test-channel')
            .listen('ChatMessageWasReceived', (data) => {

                // Push ata to posts list.
                this.posts.push({
                    message: data.chatMessage.message,
                    username: data.user.name
                });
            });
    },

    methods: {

        press() {

            // Send message to backend.
            this.$http.post('/message/', {message: this.newMsg})
                .then((response) => {

                    // Clear input field.
                    this.newMsg = '';
                });
        }
    }
};