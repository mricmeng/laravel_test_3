import { defineStore } from "pinia";

export const useAuthStore = defineStore('authStore', {
    state: () => {
        return {
            user: 'Jon',
        }
    },
    actions: {
        async authenticate(apiRoute, formData){
            const res = await fetch(`/api/${apiRoute}`, {
                method:'post',
                body: JSON.stringify(formData),
            });
            
            const data = await res.json();
            console.log(data); 
        },
    },
});