
<script setup lang="ts">
/* import parts*/
import {DashboardLayout} from '@/components/layouts';
/* import store*/
import {useHeaderTitle} from '@/store';

// グローバルストア
const {setTitle} = useHeaderTitle();

// 画面タイトル操作
setTitle('Dashboard');
</script>
<template>
    <DashboardLayout>
        <!-- 画面表示内容 -->
        <div
            class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
        >
            ログイン完了！
        </div>
    </DashboardLayout>
</template>

