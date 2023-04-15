<script setup lang="ts">
/* import parts*/
import {AuthLayout} from '@/components/layouts'; // 利用するレイアウト
import {Form} from '@/components/form'; // 利用するフォーム
import {Button, GoogleIcon} from '@/components/elements'; // 利用パーツ（共通）
import {LoginHeader} from './components/elements';
// イベントハンドリング
const onSubmit = () => {
    alert('ログイン通信次')
}
</script>
<template>
    <AuthLayout>
        <!-- wrapper -->
        <div>
            <!-- header -->
            <LoginHeader />
            <!-- ログイン フォーム -->
            <Form role="form" @submit.prevent="onSubmit">
                <!-- ログイン ボタン -->
                <div class="text-center">
                    <Button type="submit" color="light" simple round size="lg">
                        <div class="d-flex align-items-center justify-content-between">
                            <GoogleIcon width="24" height="24" />
                            <strong class="ps-2 text-white">Sign in with Google</strong>
                        </div>
                    </Button>
                </div>
            </Form>
        </div>
    </AuthLayout>
</template>
