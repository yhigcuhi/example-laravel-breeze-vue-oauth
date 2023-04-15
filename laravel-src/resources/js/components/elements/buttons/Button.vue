<script setup lang="ts">
/* import vue*/
import {computed} from 'vue';
/* import types*/
import {BaseColor, BaseSize} from '@/@types';

// 画面表示 引数
type Props = {
    color?: BaseColor // ボタンカラー
    round?: boolean // 丸みあり(true:あり)
    simple?: boolean // シンプルデザインあり(true:あり)
    block?: boolean // ブロックあり(true:あり)
    social?: boolean // SNSあり(true:あり)
    link?: boolean // リンクあり(true:あり)
    href?: string // リンク先指定 (aタグになる)
    icon?: boolean // アイコンあり(true:あり)
    wide?: boolean // 横長あり(true:あり)
    size?: BaseSize // 大きさ
}
const props = withDefaults(defineProps<Props>(), {
    round: false, // 丸みあり(true:あり)
    simple: false, // シンプルデザインあり(true:あり)
    block: false, // ブロックあり(true:あり)
    social: false, // SNSあり(true:あり)
    link: false, // リンクあり(true:あり)
    icon: false, // アイコンあり(true:あり)
    wide: false, // 横長あり(true:あり)
});
// ボタンのcss属性値
const buttonClasses = computed(() => ([
        { 'btn-simple': props.simple },
        { 'btn-icon': props.icon },
        { 'btn-round': props.round },
        { 'btn-block': props.block },
        { 'btn-social': props.social },
        { 'btn-link': props.link },
        { 'btn-wd': props.wide },
        (props.color ? `btn-${props.color}`: ''),
        (props.size ? `btn-${props.size}`: ''),
]));
</script>
<template>
    <button v-if="!props.href" class="btn" :class="buttonClasses">
        <span class="btn-label" v-if="$slots.label">
            <!-- ボタンラベル -->
            <slot name="label"></slot>
        </span>
        <slot><!-- ボタン内容 --></slot>
        <span class="btn-label btn-label-right" v-if="$slots.labelRight">
            <!-- 右ラベル( > アイコンとか) -->
            <slot name="labelRight"></slot>
        </span>
    </button>
    <a v-else :href="props.href" class="btn" :class="buttonClasses">
        <span class="btn-label" v-if="$slots.label">
            <!-- ボタンラベル -->
            <slot name="label"></slot>
        </span>
        <slot><!-- ボタン内容 --></slot>
        <span class="btn-label btn-label-right" v-if="$slots.labelRight">
            <!-- 右ラベル( > アイコンとか) -->
            <slot name="labelRight"></slot>
        </span>
    </a>
</template>
