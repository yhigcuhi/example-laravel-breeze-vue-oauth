<script setup lang="ts">
/* import inertia*/
import {Link} from '@inertiajs/vue3';
/* import 部品*/
import {HomeLink} from '@/components/elements';
import UserMenu from './UserMenu.vue';
/* import 定数*/
import MENUS from '@/constants/RouteMenu';

/**
 * サイドバーメニュー縮小表示 可変ボタン
 */
const minimizeSidebar = () => {
    // bodyに クラス設定
    document.body.classList.toggle('sidebar-mini');
}
</script>
<template>
    <!-- サイドバー メニュー -->
    <div class="sidebar" data-color="black">
        <!-- サイドバー 表示ロゴ -->
        <div class="logo">
            <a href="https://m-league.jp" class="simple-text logo-mini">
                <div class="logo-image">
                    <img src="https://shop.m-league.jp/wp/wp-content/uploads/2019/09/logo-all.png" alt="mリーグ"/>
                </div>
            </a>
            <HomeLink class="px-3 simple-text logo-normal" />
            <!-- サイドバーを縮小表示 可変ボタン -->
             <div class="navbar-minimize">
                 <button class="btn btn-simple btn-icon btn-neutral btn-round" @click="minimizeSidebar">
                     <i class="now-ui-icons text_align-center visible-on-sidebar-regular"></i>
                     <i class="now-ui-icons design_bullet-list-67 visible-on-sidebar-mini"></i>
                 </button>
             </div>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <!-- サイドバー ログインユーザー -->
                <UserMenu />
                <!-- サイドバー メニューの一覧 -->
                <li v-for="(menu, index) in MENUS" :key="index" :class="{active: $page.url.startsWith(menu.prefixURL)}">
                    <Link class="nav-link sidebar-menu-item" :href="route(menu.routeName)">
                        <i v-if="menu.iconClass" :class="menu.iconClass"></i>
                        <p>{{ menu.name }}</p>
                    </Link>
                </li>
            </ul>
        </div>
    </div>
</template>
