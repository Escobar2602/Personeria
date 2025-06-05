<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
  <Head title="Log in" />

  <div class="h-96 flex items-center justify-center bg-gradient-to-r  min-h-screen">
    <div class="relative">
      <div class="absolute -top-2 -left-2 -right-2 -bottom-2 rounded-lg bg-gradient-to-r from-blue-500 to-purple-500 rounded-3xl shadow-lg animate-pulse"></div>
      <div class="bg-white p-16 rounded-lg shadow-2xl w-80 relative z-10 transform transition duration-500 ease-in-out">


        <h2 class="text-center text-3xl font-bold mb-6 text-gray-800">Bienvenido</h2>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600 text-center">
          {{ status }}
        </div>

        <form @submit.prevent="submit" class="space-y-5">
          <div>
            <InputLabel for="email" value="Email" />
            <TextInput
              id="email"
              v-model="form.email"
              type="email"
              class="mt-1 block w-full"
              required
              autofocus
              autocomplete="username"
            />
            <InputError class="mt-2" :message="form.errors.email" />
          </div>

          <div>
            <InputLabel for="password" value="Password" />
            <TextInput
              id="password"
              v-model="form.password"
              type="password"
              class="mt-1 block w-full"
              required
              autocomplete="current-password"
            />
            <InputError class="mt-2" :message="form.errors.password" />
          </div>

          <div class="flex items-center">
            <Checkbox v-model:checked="form.remember" name="remember" />
            <span class="ms-2 text-sm text-gray-600">Remember me</span>
          </div>

          <div class="flex flex-col space-y-3">
            <PrimaryButton class="w-full justify-center" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Log in
            </PrimaryButton>

            <Link v-if="canResetPassword" :href="route('password.request')" class="text-center text-blue-500 hover:text-blue-800 text-sm">
              Forgot your password?
            </Link>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
