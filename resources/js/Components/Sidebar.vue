<template>
    <nav
        class="flex flex-col h-screen bg-gradient-to-t from-blue-800 to-blue-500 shadow transition-all duration-300 ease-in-out z-50 z-50"
        :class="{ 'w-30': !isOpen, 'w-64': isOpen }"
    >
        <div class="flex flex-col flex-1 items-center p-4 overflow-hidden">
            <!-- Logo at the top -->
            <div class="flex flex-col items-center text-center">
                <img
                    src="/logo/logo.png"
                    class="drop-shadow-lg w-[55px] h-[50px]"
                    alt="Logo"
                />
                <span
                    class="text-white font-semibold"
                    :class="{ hidden: !isOpen }"
                >
                    MDC Calendar System
                </span>
            </div>
            <!-- Menu items in the middle -->
            <ul
                class="flex flex-col flex-grow justify-center"
                :class="{
                    'space-y-12': !isOpen,
                    'space-y-6': isOpen,
                    'items-center': !isOpen,
                    'justify-start': isOpen,
                }"
            >
                <li>
                    <Link
                        href="/"
                        class="flex items-center space-x-2 text-white opacity-40 hover:opacity-100 transition-opacity"
                    >
                        <i class="fas fa-home fa-lg"></i>
                        <span :class="{ hidden: !isOpen }">Home</span>
                    </Link>
                </li>
                <li>
                    <Link
                        href="/"
                        class="flex items-center space-x-2 text-white opacity-40 hover:opacity-100 transition-opacity"
                    >
                        <i class="fas fa-box fa-lg"></i>
                        <span :class="{ hidden: !isOpen }">Items</span>
                    </Link>
                </li>
            </ul>

            <div class="mt-auto">
                <button @click="toggleMenu" class="text-white">
                    <i
                        :class="{
                            'fa-arrow-circle-right': !isOpen,
                            'fa-arrow-circle-left': isOpen,
                        }"
                        class="fas fa-xl"
                    ></i>
                </button>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    data() {
        return {
            isOpen: false,
        };
    },
    methods: {
        toggleMenu() {
            this.isOpen = !this.isOpen;
        },
    },
};
</script>

<style scoped>
/* Add any additional styles here */
</style>
