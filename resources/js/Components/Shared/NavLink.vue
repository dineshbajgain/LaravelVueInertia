<template>
            <Link
            :class="{'bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium':active}"  
            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                <slot></slot>
            </Link>
</template>
<script>
    export default{
        props: {active:Boolean}
    }
</script>