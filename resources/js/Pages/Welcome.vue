<script setup lang="ts">
import { Head, Link } from "@inertiajs/vue3";
import AOS from "aos";
import "aos/dist/aos.css";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import NavLink from "@/Components/NavLink.vue";
AOS.init();

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
    laravelVersion: string;
    phpVersion: string;
}>();

function handleImageError() {
    document.getElementById("screenshot-container")?.classList.add("!hidden");
    document.getElementById("docs-card")?.classList.add("!row-span-1");
    document.getElementById("docs-card-content")?.classList.add("!flex-row");
    document.getElementById("background")?.classList.add("!hidden");
}
</script>

<template>
    <div class="wrapper">
        <Head title="Welcome" />
        <div class="title grid justify-items-center">
            <h1
                data-aos="fade-down"
                class=" py-16 my-16 text-9xl font-bold text-gray-900"
            >
                Todolist
            </h1>
            <div class="button">
                <NavLink href="login"><PrimaryButton>Продожить</PrimaryButton></NavLink>
            </div>
        </div>

        <footer class="py-16 text-center text-sm text-black dark:text-white/70">
            Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
        </footer>
    </div>
</template>
