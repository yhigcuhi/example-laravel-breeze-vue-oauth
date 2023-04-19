<script setup lang="ts">
/* import vue*/
import {computed} from 'vue';
/* import inertia*/
import {Link} from '@inertiajs/vue3';
/* import parts*/
import {LogoutIcon} from '@/components/elements';
import {BaseColor} from '@/@types';

// 画面表示引数
const props = withDefaults(defineProps<{ textColor?: BaseColor, withTitle?: boolean, title?: string}>(), {
    textColor: 'dark', // デフォルトのカラー
    withTitle: false, // タイトルいる いらない(デフォルト: いらない)
    title: 'ログアウト', // リンクタイトル
});

// 補完
const textColor = computed(() => `text-${props.textColor}`); // テキスト色クラス
const title = computed(() => props.withTitle ? props.title : ''); // 表示タイトル(非表示 空)
</script>
<template>
    <!-- ログアウトへのリンク  -->
    <Link :class="textColor" :href="route('logout')">
        <LogoutIcon/>
        <span v-if="title" class="ms-2">{{ title }}</span>
    </Link>
</template>
