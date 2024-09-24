import axios from 'axios';
import { InertiaProgress } from '@inertiajs/progress';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Optionally, you can customize the progress bar settings
InertiaProgress.init({
    color: '#4B5563', // Customize the color of the progress bar
    showSpinner: true, // Optionally show a spinner while loading
});