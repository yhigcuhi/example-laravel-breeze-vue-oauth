<script setup lang="ts">
/* import parts*/
import { Card } from '@/components/elements';

// 画面表示引数
type Props = {
    title?: string // タイトル部
    subtitle?: string // サブタイトル名
}
defineProps<Props>();
</script>
<template>
    <Card class="card-stats">
        <div class="row">
            <div class="statistics">
                <div class="info">
                    <div class="icon icon-primary" v-if="$slots.icon">
                        <slot name="icon" />
                    </div>
                    <h3 class="info-title" v-if="$slots.default || title">
                        <slot v-if="$slots.default" />
                        <span v-else-if="title">{{ title }}</span>
                    </h3>
                    <slot name="subtitle" v-if="$slots.subtitle" />
                    <h6 class="stats-title" v-else-if="subtitle">
                        {{ subtitle }}
                    </h6>
                </div>
            </div>
        </div>
    </Card>
</template>
