<!-- <template>
    <AppLayout>
  <form @submit.prevent="submit">
    <div>
      <label>Foto:</label>
      <input type="file" @change="onFileChange" />
    </div>
    <div>
      <label>Nombre completo:</label>
      <input v-model="form.nombre" type="text" required />
    </div>
    <div>
      <label>Descripción:</label>
      <textarea v-model="form.descripcion" required></textarea>
    </div>
    <button type="submit">Enviar</button>
  </form>
  </AppLayout>
</template>

<script setup>
import { rout useForm } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'

const form = useForm({
  nombre: '',
  descripcion: '',
  foto: null
})



function onFileChange(e) {
  form.foto = e.target.files[0]
}

function submit() {
  form.post ( route('votar.store'), {
    onSuccess: () => {
      form.reset()
    },
    onError: (errors) => {
      console.error(errors)
    }
  })
}
</script> -->

<template>
  <AppLayout>
    <div class="form-card1 mt-28 mx-auto max-w-md">
      <div class="form-card2">
        <form class="form" @submit.prevent="submit">
          <p class="form-heading">Postularse</p>

          <div class="form-field">
            <input
            v-if="!previewImage"
            type="file"
            @change="onFileChange"
            class="input-field"
            accept="image/*"
            required
            />

            <img
            v-if="previewImage"
            :src="previewImage"
            alt="Vista previa"
            class="preview"
            @click="removeImage"
            title="Click para eliminar imagen"
            />
        </div>

          <div class="form-field">
            <input
              v-model="form.nombre"
              type="text"
              required
              placeholder="Nombre completo"
              class="input-field"
            />
          </div>

          <div class="form-field">
            <textarea
              v-model="form.descripcion"
              required
              placeholder="Descripción"
              rows="3"
              class="input-field"
            ></textarea>
          </div>

          <button type="submit" class="sendMessage-btn">Enviar</button>
        </form>
      </div>
    </div>
  </AppLayout>
</template>


<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  nombre: '',
  descripcion: '',
  foto: null
})

function submit() {
  form.post ( route('votar.store'), {
    onSuccess: () => {
      form.reset()
    },
    onError: (errors) => {
      console.error(errors)
    }
  })
}

const previewImage = ref(null)

function onFileChange(event) {
  const file = event.target.files[0]
  if (file && file.type.startsWith('image/')) {
    form.foto = file
    previewImage.value = URL.createObjectURL(file)
  } else {
    form.foto = null
    previewImage.value = null
  }
}

function removeImage() {
  form.foto = null
  previewImage.value = null
}


</script>

<style scoped>

  .preview {
    max-width: 200px;
    margin-top: 10px;
    border: 1px solid #ccc;
  }

.form {
  display: flex;
  flex-direction: column;
  align-self: center;
  font-family: inherit;
  gap: 10px;
  padding-inline: 2em;
  padding-bottom: 0.4em;
  background-color: #171717;
  border-radius: 20px;
}

.form-heading {
  text-align: center;
  margin: 2em;
  color: #64ffda;
  font-size: 1.2em;
  background-color: transparent;
  align-self: center;
}

.form-field {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.5em;
  border-radius: 10px;
  padding: 0.6em;
  border: none;
  outline: none;
  color: white;
  background-color: #171717;
  box-shadow: inset 2px 5px 10px rgb(5, 5, 5);
}

.input-field {
  background: none;
  border: none;
  outline: none;
  width: 100%;
  color: #ccd6f6;
  padding-inline: 1em;
}

.sendMessage-btn {
  cursor: pointer;
  margin-bottom: 3em;
  padding: 1em;
  border-radius: 10px;
  border: none;
  outline: none;
  background-color: transparent;
  color: #64ffda;
  font-weight: bold;
  outline: 1px solid #64ffda;
  transition: all ease-in-out 0.3s;
}

.sendMessage-btn:hover {
  background-color: #64ffda;
  color: #000;
  cursor: pointer;
  box-shadow: inset 2px 5px 10px rgb(5, 5, 5);
}

.form-card1 {
  background-image: linear-gradient(163deg, #64ffda 0%, #64ffda 100%);
  border-radius: 22px;
  transition: all 0.3s;
}

.form-card1:hover {
  box-shadow: 0px 0px 30px 1px rgba(100, 255, 218, 0.3);
}

.form-card2 {
  border-radius: 0;
  transition: all 0.2s;
}

.form-card2:hover {
  transform: scale(0.98);
  border-radius: 20px;
}

</style>
