<script setup lang="ts">
/* import 画像*/
import backgroundImg from '@assets/img/bg13.jpg';
/* import parts*/
import AuthLayoutFooter from './AuthLayoutFooter.vue';
</script>
<template>
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
            <AuthLayoutFooter />
            <!-- 背景画像フルスクリーン用 -->
            <div class="full-page-background" :style="{'background-image': `url(${backgroundImg})`}" />
        </div>
    </div>
</template>
