// store の エントリーポイント
/* import pinia*/
import {createPinia} from 'pinia';
import { createPersistedState } from 'pinia-plugin-persistedstate'; // 追加
/* import 共通ストア モジュール*/
import {useSideBar} from './modules/sidebar';
import {useHeaderTitle} from './modules/header-title';

// 利用する pinia
const store = createPinia();
// 永続化適用の設定
store.use(createPersistedState({
    storage: sessionStorage, // 永続データの 保存先
    key: (storeKey: string) => `my-pinia-app@${storeKey}`, // 保存しておく際のキー名 接頭辞ふよ
}));

// export
export default store;
// export 共通ストア
export {
    useSideBar, // サイドバー開閉管理
    useHeaderTitle, // 画面表示ヘッダータイトル管理
}

