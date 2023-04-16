<script setup lang="ts">
/* import vue*/
import {ref} from 'vue';
/* import 画像*/
import backgroundImg from '@assets/img/bg13.jpg';
/* import parts*/
import DashboardHeader from './DashboardHeader.vue';
import AuthLayoutFooter from './AuthLayoutFooter.vue';

// 内部参照可能変数
const isShowSideMenu = ref(true);

// イベントハンドラー
// サイドメニュー閉じる
const onClickToCloseSideMenu = () => isShowSideMenu.value = false;
</script>
<template>
    <!-- 全体 -->
    <div class="wrapper" :class="{ 'nav-open': isShowSideMenu }">
        <!-- サイドメニュー右のメインパネル -->
        <div class="main-panel">
            <!-- ダッシュボード ヘッダー -->
            <DashboardHeader/>
            <!-- メインコンテンツ -->
            <div class="content" @click.prevent="onClickToCloseSideMenu">
                <slot />
            </div>
        </div>
    </div>


    <!-- wrapper -->
    <div class="wrapper wrapper-full-page">
        <!-- 背景画像フルスクリーン用 -->
        <div class="full-page section-image">
            <!-- メインコンテンツ -->
            <div class="content">
                <div class="container">
                    <slot name="header"/>
                    <!-- 各画面 -->
                    <slot name="default"/>
                </div>
            </div>
            <!-- フッター -->
            <AuthLayoutFooter/>
            <!-- 背景画像フルスクリーン用 -->
            <div class="full-page-background" :style="{'background-image': `url(${backgroundImg})`}"/>
        </div>
    </div>
</template>
