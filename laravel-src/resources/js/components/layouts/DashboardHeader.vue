<script setup lang="ts">
/* import inertia*/
import {Link} from '@inertiajs/vue3';
/* import parts*/
import {NavbarToggleButton} from '@/components/elements';
/* import store*/
import {useSideBar, useHeaderTitle} from '@/store';

// スライドバーの開閉管理
const slideBar = useSideBar();
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
                <div class="navbar-toggle" :class="{ toggled: slideBar.isShow }">
                    <navbar-toggle-button @click.native="slideBar.onClickToggle">
                    </navbar-toggle-button>
                </div>
                <!-- 画面名 -->
                <span class="navbar-brand">{{ title }}</span>
                <div class="mx-2">TODO:セレクトボックス</div>
            </div>
            <!-- ナビゲーション メニュー（右メニュー）の描画 -->
            <div class="d-flex justify-content-end">
                <Link class="text-dark" :href="route('logout')">ログアウト TODO:色</Link>
            </div>
        </div>
    </nav>
</template>
