const state = {
    user: {}
};

const getters = {};
const actions = {
    getUser({ commit }) {
        axios.get('api/current').then(response => {
            commit('setUser', response.data)
        });
    },
    loginUser({ }, user) {
        axios.post('api/login', {
            email: user.email,
            password: user.password
        }).then(response => {
            if (response.data.access_token) {
                localStorage.setItem('user_token', response.data.access_token)
            }
            window.location.replace('/products')
        })
    }
};
const mutations = {
    setUser(state, data) {
        state.user = data;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}