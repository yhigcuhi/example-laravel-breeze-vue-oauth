/***********************************
 * エントリーポイント
***********************************/
/* 共通設定 */
import './bootstrap';
/* 静的資材の読み込みなど */
import '../css/app.css'; // laravel viteのデフォ デザイン
import 'bootstrap/scss/bootstrap.scss'; // bootstrap利用
import '@assets/css/demo.css'; // メインデザイン
import '@assets/sass/now-ui-dashboard.scss'; // scss
/* import vue*/
import { createApp, h, DefineComponent } from 'vue';
/* import inertia*/
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
/* import store*/
import store from './store';

// アプリ名
const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';
// Inertiaを利用した vue作成
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob<DefineComponent>('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(store) // store利用
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
