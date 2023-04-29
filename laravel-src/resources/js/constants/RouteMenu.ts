// 画面遷移 メニュー用(サイドメニューとかよう)の定数
type RouteMenu = {
    routeName: string // ルート名
    prefixURL: string // URL 接頭辞
    iconClass: string // アイコンクラス （例：<i class="now-ui-icons design_app">など
    name: string // 画面 表示名
}
// 表示順でメニューの一覧定義
const menus: RouteMenu[] = [
    // ホーム画面
    {
        routeName: 'dashboard',
        prefixURL: '/home',
        iconClass: 'now-ui-icons design_app',
        name: 'Home'
    },
    // 選手一覧
    {
        routeName: 'players.list',
        prefixURL: '/players',
        iconClass: 'now-ui-icons design_bullet-list-67',
        name: 'Mリーガー'
    },
];

// export
export default menus;

