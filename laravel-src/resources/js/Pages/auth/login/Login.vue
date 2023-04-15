<script setup lang="ts">
/* import parts*/
import {AuthLayout} from '@/components/layouts'; // 利用するレイアウト
import {Button, GoogleIcon} from '@/components/elements'; // 利用パーツ（共通）
import {LoginHeader} from './components/elements';
</script>
<template>
    <AuthLayout>
        <!-- wrapper -->
        <div>
            <!-- header -->
            <LoginHeader />
            <!-- ログイン ボタン -->
            <div class="text-center">
                <Button href="/google/auth" color="light" simple round size="lg">
                    <div class="d-flex align-items-center justify-content-between">
                        <GoogleIcon width="24" height="24" />
                        <strong class="ps-2 text-white">Sign in with Google</strong>
                    </div>
                </Button>
            </div>
        </div>
    </AuthLayout>
</template>
