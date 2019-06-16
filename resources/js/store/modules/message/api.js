import axois from 'axios'
export const getMessagesApi =(CurrentUserId)=>{
     return axois.get(`message/${CurrentUserId}`);
}