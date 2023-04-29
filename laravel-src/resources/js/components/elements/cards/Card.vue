<script setup lang="ts">
// creative-tim NOW UI kitでのCard
type Props = {
    title?: string // タイトル
    subTitle?: string // サブタイトル
    category?: string // カテゴリ
    description?: string // 説明文
    noFooterLine?: boolean // フッターとの境界線 不要 (true:不要)
    plain?: boolean // plainデザイン適用 (true:適用)
    cardBodyClasses?: string | string[] | Record<string, string> | Record<string, boolean> // デザイン
    headerClasses?: string | string[] | Record<string, string> | Record<string, boolean> // デザイン
}
// 画面表示引数
defineProps<Props>();
</script>
<template>
    <div class="card" :class="{'card-plain': plain}">
        <h6 class="card-category" v-if="$slots.category || category">{{category}}</h6>
        <div class="card-image" v-if="$slots.image">
            <!-- カード画像 -->
            <slot name="image"></slot>
        </div>
        <div class="card-header" :class="headerClasses" v-if="$slots.header || title">
            <!-- カードヘッダー -->
            <slot name="header">
                <!-- 指定なしのデフォルト -->
                <h4 class="card-title">{{ title }}</h4>
                <h5 class="card-category" v-if="subTitle">{{ subTitle }}</h5>
                <p v-if="description" class="card-description">{{description}}</p>
            </slot>
        </div>
        <div v-if="$slots.default" class="card-body" :class="cardBodyClasses">
            <!-- カード本文 -->
            <slot></slot>
        </div>
        <hr v-if="$slots.footer && !noFooterLine">
        <div class="card-footer" v-if="$slots.footer">
            <!-- カードフッター -->
            <slot name="footer"></slot>
        </div>
    </div>
</template>
