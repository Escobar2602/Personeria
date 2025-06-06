<template>
    <AppLayout>
        <div class="p-6 columns-3 gap-4 flex flex-wrap">
            <Card style="width: 25rem; overflow: hidden">
                <template #header>
                    <img alt="user header" src="https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/media/image/2021/06/demon-slayer-2366105.jpg?tf=3840x" />
                </template>
                <template #title>MARIANO</template>
                <template #subtitle>Grado 11-B -PROM 2025</template>
                <template #content>
                    <p class="m-0">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore sed consequuntur error
                        repudiandae numququas!
                    </p>
                </template>
                <template #footer>
                    <div class="flex gap-4 mt-1">
                        <Button label="Votar"  class="px-8 py-2 text-white font-bold text-lg rounded-full shadow-lg transition-transform transform bg-transparent border-2 border-white hover:scale-105 hover:border-green-600 hover:shadow-green-500/50 hover:shadow-2xl focus:outline-none"   id="startButton"/>
                    </div>
                </template>
            </Card>

            <Card style="width: 25rem; overflow: hidden">
                <template #header>
                    <img alt="user header" src="https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/media/image/2021/06/demon-slayer-2366105.jpg?tf=3840x" />
                </template>
                <template #title>MARIA</template>
                <template #subtitle>Grado 11-A -PROM 2025</template>
                <template #content>
                    <p class="m-0">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore sed consequuntur error
                        repudiandae numquam deserunt quisquam repellat

                    </p>
                </template>
                <template #footer>
                    <div class="flex gap-4 mt-1">
                        <Button label="Votar"  class="px-8 py-2 text-white font-bold text-lg rounded-full shadow-lg transition-transform transform bg-transparent border-2 border-white hover:scale-105 hover:border-green-600 hover:shadow-green-500/50 hover:shadow-2xl focus:outline-none"   id="startButton"/>
                    </div>
                </template>
            </Card>

            <Card style="width: 25rem; overflow: hidden">
                <template #header>
                    <img alt="user header" src="https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/media/image/2021/06/demon-slayer-2366105.jpg?tf=3840x" />
                </template>
                <template #title>BRYAN</template>
                <template #subtitle>Grado 11-C -PROM 2025</template>
                <template #content>
                    <p class="m-0">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore sed consequuntur error
                        repudiandae numquam deserunt quisquam repellat libero asperiores earum te neque
                        quas!
                    </p>
                </template>
                <template #footer>
                    <div class="flex gap-4 mt-1">
                        <Button label="Votar"  class="px-8 py-2 text-white font-bold text-lg rounded-full shadow-lg transition-transform transform bg-transparent border-2 border-white hover:scale-105 hover:border-green-600 hover:shadow-green-500/50 hover:shadow-2xl focus:outline-none"   id="startButton"/>
                    </div>
                </template>
            </Card>
        </div>

    </AppLayout>

</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Card from 'primevue/card';
import Button from 'primevue/button';
</script>
