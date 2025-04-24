// Optional: wenn du Axios oder andere Libraries brauchst
import axios from 'axios';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
