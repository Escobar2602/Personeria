<template>
    <Head title="Register" />
    <div class="flex justify-center items-center h-full w-full min-h-screen">
        <div class="grid gap-8">
            <section id="back-div" class="bg-gradient-to-r from-blue-500 to-purple-500 rounded-3xl">
                <div class="border-8 border-transparent rounded-xl bg-white dark:bg-gray-900 shadow-xl p-8 m-2">
                    <h1 class="text-5xl font-bold text-center cursor-default dark:text-gray-300 text-gray-900">
                        Register
                    </h1>

                    <form @submit.prevent="submit" class="space-y-6 mt-6">
                        <div>
                            <InputLabel for="name" value="Name" />
                            <TextInput
                                id="name"
                                v-model="form.name"
                                type="text"
                                class="mt-1 block w-full"
                                required
                                autofocus
                                autocomplete="name"
                            />
                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>

                        <div>
                            <InputLabel for="email" value="Email" />
                            <TextInput
                                id="email"
                                v-model="form.email"
                                type="email"
                                class="mt-1 block w-full"
                                required
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
                                autocomplete="new-password"
                            />
                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>

                        <div>
                            <InputLabel for="password_confirmation" value="Confirm Password" />
                            <TextInput
                                id="password_confirmation"
                                v-model="form.password_confirmation"
                                type="password"
                                class="mt-1 block w-full"
                                required
                                autocomplete="new-password"
                            />
                            <InputError class="mt-2" :message="form.errors.password_confirmation" />
                        </div>

                        <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                            <InputLabel for="terms">
                                <div class="flex items-center">
                                    <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />
                                    <div class="ms-2">
                                        I agree to the
                                        <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Terms of Service
                                        </a>
                                        and
                                        <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Privacy Policy
                                        </a>
                                    </div>
                                </div>
                                <InputError class="mt-2" :message="form.errors.terms" />
                            </InputLabel>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <Link :href="route('login')" class="text-sm text-blue-400 hover:underline">
                                Already registered?
                            </Link>
                            <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Register
                            </PrimaryButton>
                        </div>
                    </form>

                    <div id="third-party-auth" class="flex justify-center gap-4 mt-6">
                    </div>

                    <div class="mt-6 text-center text-sm text-gray-500">
                        <p>
                            By registering, you agree to our
                            <a href="#" class="text-blue-400 transition hover:underline">Terms</a>
                            and
                            <a href="#" class="text-blue-400 transition hover:underline">Privacy Policy</a>.
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>
