/* import vue*/
import {ref} from 'vue';
/* import pinia*/
import {defineStore} from 'pinia';

// SideBarの開閉管理 グローバルストア
export const useSideBar = defineStore('sidebar', () => {
    // state
    // サイドバーの開閉
    const isShow = ref(true);

    // actions
    /**
     * サイドバーの開閉トグル クリック
     */
    const onClickToggle = () => isShow.value = !isShow.value;
    /**
     * 強制的に開く
     */
    const toggleOpen = () => isShow.value = false;
    /**
     * 強制的に閉じる
     */
    const toggleClose = () => isShow.value = false;

    // export store
    return {
        isShow,
        onClickToggle,
        toggleOpen,
        toggleClose,
    }
});

