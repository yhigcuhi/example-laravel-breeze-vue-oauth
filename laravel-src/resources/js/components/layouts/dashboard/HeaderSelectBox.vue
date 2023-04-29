<script setup lang="ts">
/* import parts*/
import {SelectBox} from '@/components/elements';

// type 定義 オプション
type Option = {text: string, value: string|null, disabled?: boolean};
// デフォルト選択
const DEFAULT_OPTION: Option = { text: '選択してください', value: null, disabled: false};
// 選択肢 一覧
const OPTIONS: Option[] = [{text: 'TODO:なんか 赤坂ドリブンズ', value: 'TODO:Enum'}];
</script>
<template>
    <SelectBox :default-option="DEFAULT_OPTION" :options="OPTIONS" />
</template>
