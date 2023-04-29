
<script setup lang="ts">
/* import vue*/
import {computed} from 'vue';
/* import inertia*/
import {Link} from '@inertiajs/vue3';
/* import parts*/
import {DashboardLayout} from '@/components/layouts';
import {CardButton} from '@/components/elements';
/* import store*/
import {useHeaderTitle} from '@/store';
/* import 定数*/
import MENUS from '@/constants/RouteMenu';

// 内部参照変数
const colSize = computed(() => MENUS.length ? Math.floor(12/MENUS.length) : 12); // 12 割る メニュー

// グローバルストア
const {setTitle} = useHeaderTitle();
// 画面タイトル操作
setTitle('Dashboard');
</script>
<template>
    <DashboardLayout>
        <!-- ダッシュボード メニューの一覧 -->
        <div class="row">
            <div :class="`col-${colSize}`" v-for="(menu, index) in MENUS" :key="index">
                <Link :href="route(menu.routeName)">
                    <CardButton :title="menu.name">
                        <template v-if="menu.iconClass" #icon>
                            <i :class="menu.iconClass"></i>
                        </template>
                    </CardButton>
                </Link>
            </div>
        </div>
    </DashboardLayout>
</template>

