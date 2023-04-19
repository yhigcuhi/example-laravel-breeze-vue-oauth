<script setup lang="ts">
/* import inertia*/
import {Link} from '@inertiajs/vue3';
/* import parts*/
import {NavbarToggleButton, LogoutLink} from '@/components/elements';
/* import store*/
import {useSideBar, useHeaderTitle} from '@/store';

// スライドバーの開閉管理
const {isShow, onClickToggle} = useSideBar();
const {title} = useHeaderTitle();
</script>
<template>
    <!-- ダッシュボードヘッダー: ナビゲーションバー  -->
    <nav class="navbar navbar-expand-lg navbar-absolute">
        <!-- ヘッダーとしての余白範囲で描画 -->
        <div class="container-fluid">
            <!-- ナビゲーションの描画 (タイトルなど) -->
            <div class="navbar-wrapper">
                <!-- サイドメニュー トグル -->
                <div class="navbar-toggle" :class="{ toggled: isShow }">
                    <NavbarToggleButton @click.native="onClickToggle">
                    </NavbarToggleButton>
                </div>
                <!-- 画面名 -->
                <span class="navbar-brand">{{ title }}</span>
                <div class="mx-2">TODO:セレクトボックス</div>
            </div>
            <!-- ナビゲーション メニュー（右メニュー）の描画 -->
            <div class="d-flex justify-content-end">
                <LogoutLink class="me-4"/>
            </div>
        </div>
    </nav>
</template>
