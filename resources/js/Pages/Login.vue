<template>
    <section class="h-screen">
  <div class="container px-6 pt-24 h-full">
    
    <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
        
        <div class="w-2/3 md:mb-0">
        <img
          src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
          class="w-full"
        
          alt="Phone image"
        />
      </div>
      <div class="w-1/3 h-100">
        <div class="flex justify-center items-center pb-8">
            <div class="text-xl">PLEASE LOGIN TO YOUR ACCOUNT</div>
        </div>
        <div class="flex justify-center items-center">
            <img class="block h-8 w-auto" src="@/assets/logo.png" alt="Your Company">   
        </div>
        <form>
          <!-- Email input -->
          <div class="mb-6">
            <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                    <input type="email" v-model="form.email" id="email" name="email"
                    :class="$page.props.errors.email?'border-red-500':''"
                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        required>
          </div>

          <!-- Password input -->
          <div class="mb-6">
            <label for="password" class="leading-7 text-sm text-gray-600">Password</label>
                    <input type="password" v-model="form.password" id="password" name="password"
                    :class="$page.props.errors.password?'border-red-500':''"
                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        required>
          </div>

          <!-- Submit button -->
          <button
            type="submit"
            class="inline-block px-7 py-3 bg-indigo-500 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full"
            data-mdb-ripple="true"
            data-mdb-ripple-color="light"
          >
            Sign in
          </button>

     
        </form>
      </div>
    </div>
  </div>
</section>
</template>
<script >
    import { useForm } from '@inertiajs/inertia-vue3';
import { useToast } from 'vue-toastification';
import Layout from '../Components/Shared/Layout.vue';
    export default{
        layout: Layout,
        props:{
        },
        setup() {
        const form = useForm({
            name: '',
            email: '',
            message: ''
        })
        const toast = useToast();


        const submit = () => {
            form.post('/contactPost', {
                preserveScroll: true,
                onSuccess: () => {
                    form.reset()
                    toast.success("Form Submitted Successfully", {
                        timeout: 2000
                    });

                },
            })
        }
        return { form, submit, toast }
    }
    }
    </script>