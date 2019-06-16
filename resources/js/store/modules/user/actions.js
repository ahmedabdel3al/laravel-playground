import { getUsers } from "./api";

export const setUsers =({commit})=>{
    getUsers().then(response=>{
        commit('setUsers',response.data)
    })
}