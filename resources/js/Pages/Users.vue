<template>
    <div>
        <Sidebar />
        <h1>User List</h1>
        <ul>
            <li v-for="user in users" :key="user.id">
                {{ user.name }} ({{ user.email }})
            </li>
        </ul>
    </div>
</template>

<script>
import Sidebar from "@/Components/Sidebar.vue"; // Ensure correct path

export default {
    props: {
        users: Array, // Define the 'users' prop that will be passed from Laravel
    },
    components: {
        Sidebar,
    },
};
</script>
