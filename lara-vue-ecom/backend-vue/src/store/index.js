import {createStore} from "vuex";
import * as actions from './actions';
import * as mutations from './mutations';

const store = createStore( {
    state: {
       // test: '123456789'
       user: {
            //token: null,
            //token: token:1234,
            token: sessionStorage.getItem('TOKEN'),

            data: { }

       }

    },
    getters:{},
    actions,
    mutations,

})

export default store
