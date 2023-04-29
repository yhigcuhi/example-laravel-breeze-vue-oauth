<script setup lang="ts">
/* import parts*/
import {NavbarToggleButton, LogoutLink} from '@/components/elements';
import HeaderSelectBox from './HeaderSelectBox.vue';
/* import store*/
import {useSideBar, useHeaderTitle} from '@/store';

// スライドバーの開閉管理
const sideBar = useSideBar();
const headerTitle = useHeaderTitle();
</script>
<template>
    <!-- ダッシュボードヘッダー: ナビゲーションバー  -->
    <nav class="navbar navbar-expand-lg navbar-absolute">
        <!-- ヘッダーとしての余白範囲で描画 -->
        <div class="container-fluid">
            <!-- ナビゲーションの描画 (タイトルなど) -->
            <div class="navbar-wrapper">
                <!-- サイドメニュー トグル -->
                <div class="navbar-toggle" :class="{ toggled: sideBar.isShow }">
                    <NavbarToggleButton @click.native="sideBar.onClickToggle" />
                </div>
                <!-- 画面名 -->
                <span class="mx-4 navbar-brand text-white">{{ headerTitle.title }}</span>
                <div class="mx-4 "><HeaderSelectBox class="bg-white"/></div>
            </div>
            <!-- ナビゲーション メニュー（右メニュー）の描画 -->
            <div class="d-flex justify-content-end">
                <LogoutLink class="me-4 text-white"/>
            </div>
        </div>
    </nav>
    <div class="panel-header panel-header-sm"></div>
</template>
