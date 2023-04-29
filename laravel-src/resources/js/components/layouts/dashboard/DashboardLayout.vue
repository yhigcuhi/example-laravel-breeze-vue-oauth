<script setup lang="ts">
/* import vue*/
import {ref} from 'vue';
/* import parts*/
import DashboardHeader from './DashboardHeader.vue';
import DashboardFooter from './DashboardFooter.vue';
import DashboardSideMenus from './DashboardSideMenus.vue';
/* import store*/
import {useSideBar} from '@/store';

// スライドバーの開閉管理
const sideBar = useSideBar();
</script>
<template>
    <!-- 全体 -->
    <div class="wrapper" :class="{ 'nav-open': sideBar.isShow }">
        <div style="display: none">TODO:通知のところ notifications vue</div>
        <DashboardSideMenus />
        <!-- サイドメニュー右のメインパネル -->
        <div class="main-panel">
            <!-- ダッシュボード ヘッダー -->
            <DashboardHeader/>
            <!-- メインコンテンツ -->
            <div class="content" @click="sideBar.toggleClose">
                <slot />
            </div>
            <!-- フッター -->
            <DashboardFooter/>
        </div>
    </div>
</template>
