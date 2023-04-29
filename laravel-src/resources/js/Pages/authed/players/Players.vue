
<script setup lang="ts">
/* import parts*/
import {DashboardLayout} from '@/components/layouts';
import {CardButton} from '@/components/elements';
/* import store*/
import {useHeaderTitle} from '@/store';
import {Link} from '@inertiajs/vue3';

// グローバルストア
const {setTitle} = useHeaderTitle();

// 画面タイトル操作
setTitle('Mリーガー');
</script>
<template>
    <DashboardLayout>
        <div class="row">
            TODO:選手検索フォーム
        </div>
        <div class="row">
            TODO:選手 一覧部分
        </div>
    </DashboardLayout>
</template>

