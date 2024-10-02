<template>
    <div class="flex w-full">
        <Sidebar />
        <div class="flex flex-col w-full">
            <Navbar />
            <div class="flex flex-col h-full relative">
                <div
                    id="content"
                    class="flex items-center justify-between p-4 shadow-md"
                >
                    <div class="flex items-center space-x-2">
                        <form
                            @submit.prevent="submitForm"
                            class="flex justify-around space-x-4"
                        >
                            <a
                                title="Today"
                                @click.prevent="moveCalendar('today')"
                                class="cursor-pointer px-4 py-2 rounded-lg shadow-md text-teal-100 bg-teal-400 hover:bg-teal-600 transition-transform duration-300 ease-in-out transform hover:scale-110"
                            >
                                Today
                            </a>

                            <a
                                title="Slide to left"
                                @click.prevent="moveCalendar('previous')"
                            >
                                <i
                                    class="shadow-md text-white fa-solid fa-chevron-left hover:text-blue-300 cursor-pointer bg-blue-500 w-10 h-10 flex items-center justify-center rounded-full transition-transform duration-300 ease-in-out transform hover:scale-110"
                                ></i>
                            </a>

                            <a
                                title="Slide to right"
                                @click.prevent="moveCalendar('next')"
                            >
                                <i
                                    class="shadow-md text-white fa-solid fa-chevron-right hover:text-blue-300 cursor-pointer bg-blue-500 w-10 h-10 flex items-center justify-center rounded-full transition-transform duration-300 ease-in-out transform hover:scale-110"
                                ></i>
                            </a>

                            <div
                                title="Month"
                                class="shadow-inner flex space-x-2 items-center block bg-white p-2 rounded-xl border border-gray-500"
                            >
                                <i class="fas fa-calendar text-gray-500"></i>
                                <select
                                    v-model="selectedMonth"
                                    class="bg-transparent focus:outline-none"
                                    @change="getDaysInMonth"
                                >
                                    <option
                                        v-for="(month, index) in months"
                                        :key="index"
                                        :value="index + 1"
                                    >
                                        {{ month }}
                                    </option>
                                </select>
                            </div>

                            <div
                                title="Year"
                                class="shadow-inner flex space-x-2 items-center p-2 bg-white rounded-xl border border-gray-500"
                            >
                                <i
                                    class="fa-solid fa-calendar-days text-gray-500"
                                ></i>
                                <select
                                    v-model="selectedYear"
                                    class="bg-transparent focus:outline-none"
                                    @change="getDaysInMonth"
                                >
                                    <option
                                        v-for="year in years"
                                        :key="year"
                                        :value="year"
                                    >
                                        {{ year }}
                                    </option>
                                </select>
                            </div>

                            <div
                                title="Category"
                                class="shadow-inner flex items-center p-2 bg-white space-x-2 rounded-xl border border-gray-500"
                            >
                                <i class="fa-solid fa-list text-gray-500"></i>
                                <select
                                    v-model="selectedCategory"
                                    class="bg-transparent focus:outline-none"
                                >
                                    <option
                                        v-for="category in categories"
                                        :key="category.id"
                                        :value="category.id"
                                    >
                                        {{ category.title }}
                                    </option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="main-content" class="w-full flex flex-col h-full">
                    <div
                        id="calendar-grid"
                        class="grid grid-cols-7 gap-2 p-6 shadow-lg h-full"
                    >
                        <div
                            class="rounded-t-lg calendar-cell bg-gray-500 p-2 flex items-center justify-center font-semibold text-gray-100"
                        >
                            Mon
                        </div>
                        <div
                            class="rounded-t-lg calendar-cell bg-gray-500 p-2 flex items-center justify-center font-semibold text-gray-100"
                        >
                            Tue
                        </div>
                        <div
                            class="rounded-t-lg calendar-cell bg-gray-500 p-2 flex items-center justify-center font-semibold text-gray-100"
                        >
                            Wed
                        </div>
                        <div
                            class="rounded-t-lg calendar-cell bg-gray-500 p-2 flex items-center justify-center font-semibold text-gray-100"
                        >
                            Thu
                        </div>
                        <div
                            class="rounded-t-lg calendar-cell bg-gray-500 p-2 flex items-center justify-center font-semibold text-gray-100"
                        >
                            Fri
                        </div>
                        <div
                            class="rounded-t-lg calendar-cell bg-gray-500 p-2 flex items-center justify-center font-semibold text-gray-100"
                        >
                            Sat
                        </div>
                        <div
                            class="rounded-t-lg calendar-cell bg-red-500 p-2 flex items-center justify-center font-semibold text-gray-100"
                        >
                            Sun
                        </div>

                        <template v-for="day in daysWithRecords">
                            <button
                                class="relative cursor-pointer calendar-cell"
                                :class="{
                                    'bg-gray-300': !day.hasRecord,
                                    'text-red-500': day.date.getDay() === 0,
                                    'border border-yellow-400': isToday(day),
                                }"
                            >
                                <h1 class="drop-shadow font-bold text-4xl">
                                    {{ day.day }}
                                </h1>
                                <div
                                    v-if="!day.hasRecord"
                                    class="absolute inset-0 flex items-center justify-center text-2xl font-bold text-white opacity-0 bg-gray-500 group-hover:opacity-100 transition-opacity duration-300 ease-in-out"
                                >
                                    <h1
                                        class="flex justify-center items-center text-4xl"
                                    >
                                        +
                                    </h1>
                                </div>
                            </button>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Sidebar from "@/Components/Sidebar.vue";
import Navbar from "@/Components/Navbar.vue";

export default {
    name: "Welcome",
    components: {
        Sidebar,
        Navbar,
    },
    data() {
        return {
            selectedMonth: new Date().getMonth() + 1,
            selectedYear: new Date().getFullYear(),
            selectedCategory: null,
            months: [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December",
            ],
            years: this.generateYears(),
            categories: [],
            daysWithRecords: [],
            transactions: [],
        };
    },
    methods: {
        moveCalendar(action) {
            const currentDate = new Date(
                this.selectedYear,
                this.selectedMonth - 1
            );

            if (action === "next") {
                currentDate.setMonth(currentDate.getMonth() + 1);
            } else if (action === "previous") {
                currentDate.setMonth(currentDate.getMonth() - 1);
            } else if (action === "today") {
                currentDate.setMonth(new Date().getMonth());
                currentDate.setFullYear(new Date().getFullYear());
            }

            this.selectedMonth = currentDate.getMonth() + 1;
            this.selectedYear = currentDate.getFullYear();
            this.getDaysInMonth();
        },

        getDaysInMonth() {
            const days = [];
            const date = new Date(this.selectedYear, this.selectedMonth - 1, 1);
            const totalDays = new Date(
                this.selectedYear,
                this.selectedMonth,
                0
            ).getDate();
            const startDayOfWeek = date.getDay();
            const startDate = new Date(
                this.selectedYear,
                this.selectedMonth - 1,
                1 - (startDayOfWeek === 0 ? 6 : startDayOfWeek - 1)
            );

            // Add days from the calculated start date to fill the grid
            for (let i = 0; i < 42; i++) {
                const currentDate = new Date(startDate);
                currentDate.setDate(startDate.getDate() + i);
                days.push({
                    day: currentDate.getDate(),
                    date: currentDate,
                });
            }

            this.daysWithRecords = days;
        },
        hasRecord(day) {
            // Check if there are records for the given day
            return this.daysWithRecords.some((record) => record.day === day);
        },
        isToday(day) {
            const today = new Date();
            return (
                day.day === today.getDate() &&
                this.selectedMonth === today.getMonth() + 1 &&
                this.selectedYear === today.getFullYear()
            );
        },
        generateYears() {
            const currentYear = new Date().getFullYear();
            return Array.from(
                { length: 10 },
                (_, index) => currentYear + index
            );
        },
    },
    mounted() {
        this.getDaysInMonth();
    },
};
</script>
