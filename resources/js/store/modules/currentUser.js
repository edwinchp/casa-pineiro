const state = {
    user: {
        email: "chipineiro@gmail.com"
    }
};

const getters = {};
const actions = {
    loginUser({ }, user) {
        axios.post('api/login', {
            email: user.email,
            password: user.password
        }).then(response => {
            console.log(response.data)
        })
    }
};
const mutations = {};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}