import {getMessagesApi} from './api'
export const getMessage = ({commit, dispatch},user) => {
    getMessagesApi(user.id).then(response=>{
        commit('setMessage',response.data)
    })
}