<template>
    <section class="px-24 text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
            <div
                class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
                <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0"
                    marginwidth="0" scrolling="no"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.8363063391826!2d85.32849691435904!3d27.72233998278569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb193680d74fcd%3A0x6bd9ed8c5c881c75!2sTekkon%20Technologies!5e0!3m2!1sen!2snp!4v1663662402331!5m2!1sen!2snp"
                    style="filter: grayscale(1) contrast(1.2) opacity(0.4);"></iframe>
                <div v-html="contactUs.body"></div>
            </div>
            <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Contact Us</h2>

                <div class="relative mb-4">
                    <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                    <input type="text" v-model="form.name" id="name" name="name"
                    :class="$page.props.errors.name?'border-red-500':''"
                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        required>
                    <div v-if="$page.props.errors.name" v-text="$page.props.errors.name"
                        class="text-red-500 text-xs mt-1"></div>
                </div>
                <div class="relative mb-4">
                    <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                    <input type="email" v-model="form.email" id="email" name="email"
                    :class="$page.props.errors.email?'border-red-500':''"
                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        required>
                    <div v-if="$page.props.errors.email" v-text="$page.props.errors.email"
                        class="text-red-500 text-xs mt-1"></div>

                </div>
                <div class="relative mb-4">
                    <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                    <textarea id="message" v-model="form.message" name="message"
                        :class="$page.props.errors.message?'border-red-500':''"
                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                        required></textarea>
                    <div v-if="$page.props.errors.message" v-text="$page.props.errors.message"
                        class="text-red-500 text-xs mt-1"></div>

                </div>
                <button @click="submit"
                    class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Submit</button>
                <p class="text-xs text-gray-500 mt-3">{{contactUs.excerpt}}</p>
            </div>
        </div>
    </section>
</template>
<script >
import Layout from '../Components/Shared/Layout.vue';
import { useForm } from '@inertiajs/inertia-vue3'
import { useToast } from "vue-toastification";
export default {
    layout: Layout,
    props: {
        contactUs: Object,
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