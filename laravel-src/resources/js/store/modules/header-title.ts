/* import vue*/
import {ref} from 'vue';
/* import pinia*/
import {defineStore} from 'pinia';

// 画面表示ヘッダータイトル グローバルストア
export const useHeaderTitle = defineStore('header-title', () => {
    // state
    // タイトル
    const title = ref('Dashboard');

    // actions
    /**
     * タイトル設定
     * @param _title
     */
    const setTitle = (_title: string = 'Dashboard') => title.value = _title;
    // export store
    return {
        title,
        setTitle,
    }
});

