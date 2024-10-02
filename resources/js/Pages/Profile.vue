<template>
    <div class="flex flex-col">
        <Sidebar />

        <div>
            <h1>User Profile</h1>
            <Link href="/">Back to Home</Link>
        </div>
    </div>
</template>

<script>
import Sidebar from "@/Components/Sidebar.vue";
import Navbar from "@/Components/Navbar.vue";

export default {
    name: "Profile",
    components: {
        Sidebar,
        Navbar,
    },
};
</script>

<style scoped>
/* Add styles here if needed */
</style>
