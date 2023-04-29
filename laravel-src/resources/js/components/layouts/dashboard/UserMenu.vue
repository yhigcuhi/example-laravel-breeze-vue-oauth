<script setup lang="ts">
/* import vue*/
import {ref} from 'vue';
import {LogoutLink} from '@/components/elements';

// ユーザー ドロップダウンメニュー true = 開いている
const isOpen = ref(false);
/**
 * ドロップダウン 開閉
 */
const onClickToggle = () => isOpen.value = !isOpen.value;
</script>
<template>
    <div class="user user__menu">
        <!-- タイトル部 -->
        <div class="info" @click="onClickToggle">
            <!-- 開閉中のアイコンのデザイン用  -->
            <a data-toggle="collapse" :aria-expanded="isOpen">
                <span>
                    ユーザー名とロゴ TODO
                    <!-- 開閉中のアイコン -->
                    <b class="caret"></b>
                </span>
            </a>
        </div>
        <!-- 区切り -->
        <div class="clearfix"></div>
        <!-- ドロップダウンメニュー -->
        <transition name="open">
            <div v-if="isOpen">
                <ul class="nav user-menu__nav">
                    <!-- ユーザーメニュー -->
                    <li>
                        <!-- ログアウト -->
                        <LogoutLink title="Logout" text-color="light" withTitle class="twhite"/>
                    </li>
                </ul>
            </div>
        </transition>
    </div>
</template>
<style scoped>
/* アコーディオン開閉アニメーション*/
@keyframes open {
    0% {
        opacity: 0;
        transform: translateY(-5px);
    }
    100% {
        opacity: 1;
        transform: translateY(0px);
    }
}
/* transition openようのデザイン*/
.open-enter-active {
    animation: open .2s;
}
.open-leave-active {
    animation: open .2s linear reverse;
}

/* ユーザーメニュー特有*/
.user__menu ul.user-menu__nav {
    margin-top: 0;
    padding-top: 20px;
}
</style>
