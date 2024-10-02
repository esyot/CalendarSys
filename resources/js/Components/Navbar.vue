<template>
    <div class="w-full">
        <nav class="flex w-full bg-gray-200 shadow-md">
            <ul class="flex p-4 justify-end items-center space-x-12 w-full">
                <li
                    class="relative cursor-pointer"
                    @click.stop="toggleDropdown"
                >
                    <i class="fas fa-bell fa-lg"></i> <span>Notifications</span>
                    <ul
                        v-if="isDropdownVisible"
                        class="absolute mt-2 right-2 w-[500px] bg-white border border-gray-200 rounded-md shadow-lg z-50 shadow-lg last:rounded-b-lg"
                        ref="dropdown"
                        @click.stop
                    >
                        <div class="flex items-center justify-between p-2">
                            <h1 class="text-xl font-medium">Notifications</h1>
                            <div class="relative">
                                <button @click.stop="toggleOptions">
                                    <i class="fas fa-ellipsis-h fa-lg"></i>
                                </button>
                                <ul
                                    v-if="isOptionsVisible"
                                    class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg"
                                >
                                    <li
                                        class="flex items-center px-4 py-2 hover:bg-gray-100 cursor-pointer"
                                        @click="markAllAsRead"
                                    >
                                        <i
                                            class="text-blue-500 fas fa-check-circle mr-2"
                                        ></i>
                                        <span>Mark as All Read</span>
                                    </li>
                                    <li
                                        class="flex items-center px-4 py-2 hover:bg-gray-100 cursor-pointer shadow-lg"
                                        @click="deleteAll"
                                    >
                                        <i
                                            class="text-blue-500 fas fa-trash-alt mr-2"
                                        ></i>
                                        <span>Delete All</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <li
                            class="flex items-center px-4 py-2 hover:bg-gray-100 space-x-2"
                        >
                            <img
                                src="/photos/user.png"
                                class="w-10 h-10"
                                alt=""
                            />
                            <div class="flex flex-col">
                                <span>New Transaction</span>
                                <span
                                    >Reinhard Esteban added a new transaction,
                                    check it now!</span
                                >
                            </div>
                        </li>
                        <li
                            class="flex items-center px-4 py-2 hover:bg-gray-100 space-x-2"
                        >
                            <img
                                src="/photos/user.png"
                                class="w-10 h-10"
                                alt=""
                            />
                            <div class="flex flex-col">
                                <span>New Transaction</span>
                                <span
                                    >Reinhard Esteban added a new transaction,
                                    check it now!</span
                                >
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <i class="fas fa-inbox fa-lg"></i> <span>Messages</span>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isDropdownVisible: false,
            isOptionsVisible: false,
        };
    },
    methods: {
        toggleDropdown() {
            this.isDropdownVisible = !this.isDropdownVisible;
        },
        toggleOptions() {
            this.isOptionsVisible = !this.isOptionsVisible;
        },
        handleClickOutside(event) {
            const notificationDropdown = this.$refs.dropdown;
            if (
                notificationDropdown &&
                !notificationDropdown.contains(event.target)
            ) {
                this.isDropdownVisible = false;
                this.isOptionsVisible = false;
            }
        },
        markAllAsRead() {
            // Add your logic to mark all notifications as read
            console.log("Mark all as read");
        },
        deleteAll() {
            // Add your logic to delete all notifications
            console.log("Delete all notifications");
        },
    },
    mounted() {
        document.addEventListener("click", this.handleClickOutside);
    },
    beforeDestroy() {
        document.removeEventListener("click", this.handleClickOutside);
    },
};
</script>
