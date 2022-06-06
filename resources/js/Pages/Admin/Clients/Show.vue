<template>
    <div class="show-bg min-h-screen">
        <AdminLayout>
            <div class="">
                <div
                    class="container-fluid w-full bg-white px-6 py-4 text-montserrat"
                >
                    <div class="flex-grow items-center">
                        <div
                            class="flex flex-wrap items-center justify-between"
                        >
                            <span>
                                {{ client.name }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="w-3/4 pb-6">
                        <div
                            class="grid grid-cols-1 lg:grid-cols-3 gap-x-4 flex-wrap"
                        >
                            <div
                                v-for="(item, index) in client.items"
                                :key="index"
                                class="mt-4 lg:mt-0"
                            >
                                <div
                                    class="block rounded-lg shadow-lg bg-white w-full mt-8 py-4 h-full flex flex-col"
                                >
                                    <div
                                        class="w-full flex justify-center py-2 my-4"
                                        :class="[bgColor(index)]"
                                    >
                                        <p
                                            class="uppercase text-xs font-semibold text-montserrat"
                                            :class="textColor(index)"
                                        >
                                            {{ item.type.name }}
                                        </p>
                                    </div>
                                    <div
                                        class="px-6 h-full flex flex-col justify-between"
                                    >
                                        <div class="pb-4">
                                            <h2
                                                class="font-bold details-title text-montserrat whitespace-normal"
                                            >
                                                {{ item.title }}
                                            </h2>
                                            <p
                                                class="text-xs mt-4 .details-text text-montserrat"
                                            >
                                                {{ item.paragraph }}
                                            </p>
                                        </div>
                                        <div class="">
                                            <button
                                                class="inline-block px-3 btn-bg mt-8 py-2 border-2 rounded-3xl text-white leading-tight text-montserrat font-bold .fs-16 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                                            >
                                                {{ $t("button_text") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AdminLayout>
    </div>
</template>

<script>
import AdminLayout from "@/js/Layouts/AdminLayout.vue";

export default {
    components: {
        AdminLayout,
    },

    props: {
        client: Object,
    },

    computed: {
        locale() {
            return this.$page.props.locale;
        },
    },

    methods: {
        bgColor(index) {
            if (index === 0) {
                return "bg-cyan-300";
            } else if (index === 1) {
                return "bg-orange-200";
            } else {
                return "bg-purple-400";
            }
        },

        textColor(index) {
            if (index === 0) {
                return "text-cyan-800";
            } else if (index === 1) {
                return "text-orange-800";
            } else {
                return "text-purple-800";
            }
        },
    },
};
</script>
