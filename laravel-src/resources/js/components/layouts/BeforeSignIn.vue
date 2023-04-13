<script setup lang="ts">
/* import parts*/
/* import 画像*/
</script>
<template>
    <!-- wrapper -->
    <div class="wrapper wrapper-full-page">
        <!-- 背景画像フルスクリーン用 -->
        <div class="full-page section-image">
            <!-- メインコンテンツ -->
            <div class="content">
                <div class="container">
                    <!-- 各画面 -->
                    <slot/>
                </div>
            </div>
            <!-- フッター -->
<!--            <Footer />-->
            <!-- 背景画像フルスクリーン用 -->
            <div class="full-page-background" :style="{'background': 'linear-gradient(0deg,rgba(44,44,44,.2),rgba(224,23,3,.6))'}" />
        </div>
    </div>
</template>
