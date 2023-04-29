<script setup lang="ts">
/* import vue*/
import {computed} from 'vue';
/* import inertia*/
import {Link} from '@inertiajs/vue3';
/* import parts*/
import {BaseColor} from '@/@types';

// 画面表示引数
const props = withDefaults(defineProps<{ textColor?: BaseColor, withTitle?: boolean, title?: string}>(), {
    textColor: 'light', // デフォルトのカラー
    withTitle: false, // タイトルいる いらない(デフォルト: いらない)
    title: 'ログアウト', // リンクタイトル
});

// 補完
const textColor = computed(() => `text-${props.textColor}`); // テキスト色クラス
const title = computed(() => props.withTitle ? props.title : 'APP NAME'); // 表示タイトル(非表示 空)
</script>
<template>
    <!-- ホームへのリンク  -->
    <Link :class="textColor" :href="route('dashboard')">{{ title }}</Link>
</template>
