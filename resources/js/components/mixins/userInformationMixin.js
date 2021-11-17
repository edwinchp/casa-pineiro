export const userInformationMixin = {

    data() {
        return {
            userInformation: {
                user: {
                    stores: [""]
                }
            },
        }
    },

    methods: {
        async getUserInformation() {
            const response = await axios.get("/api/user-information/");
            this.userInformation = response.data;
        },
    },

    computed: {
        isAdmin() {
            return this.userInformation.user.role_id === 1;
            //return false;
        }
    },

    mounted() {
        this.getUserInformation();
    }
}