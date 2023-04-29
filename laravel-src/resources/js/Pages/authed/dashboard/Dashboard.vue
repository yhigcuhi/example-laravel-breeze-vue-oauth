
<script setup lang="ts">
/* import parts*/
import {DashboardLayout} from '@/components/layouts';
import {CardButton} from './components/elements';
/* import store*/
import {useHeaderTitle} from '@/store';
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome';

// グローバルストア
const {setTitle} = useHeaderTitle();

// 画面タイトル操作
setTitle('Dashboard');
</script>
<template>
    <DashboardLayout>
        <div class="row">
            <!-- ダッシュボードメニュー -->
            <div class="col-4">
                <CardButton title="Home">
                    <template #icon>
                        <i class="now-ui-icons design_app"></i>
                    </template>
                </CardButton>
            </div>
            <div class="col-4">
                <CardButton title="TODO:リンク">
                    <template #icon>
                        <i class="now-ui-icons design_app"></i>
                    </template>
                </CardButton>
            </div>
            <div class="col-4">
                <CardButton title="TODO:他メニュー">
                    <template #icon>
                        <i class="now-ui-icons design_app"></i>
                    </template>
                </CardButton>
            </div>
        </div>
        <!-- 画面表示内容 -->
        <div
            class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
        >
            ログイン完了！
        </div>
    </DashboardLayout>
</template>

