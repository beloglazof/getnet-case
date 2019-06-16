import { auth } from './api';

export default {
  async login(email, pass) {
    const { token } = localStorage;
    if (token && token !== 'undefined') {
      return [true, ''];
    }
    const { error, uid, message } = await auth(email, pass);
    if (error) {
      return [false, message];
    }
    localStorage.token = uid;
    return [true, message];
  },

  getToken() {
    return localStorage.token;
  },

  logout() {
    delete localStorage.token;
  },

  loggedIn() {
    const { token } = localStorage;
    if (!token) return false;
    if (token === 'undefined') {
      return false;
    }
    return true;
  },

};
