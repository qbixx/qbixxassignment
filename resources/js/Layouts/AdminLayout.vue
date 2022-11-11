<template>
    <div class="w-full">
        <nav class="relative w-full flex flex-wrap items-center justify-between py-4 bg-gray-100 text-gray-500 hover:text-gray-700 focus:text-gray-700 shadow-lg navbar navbar-expand-lg navbar-light">
            <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
                <div class="collapse navbar-collapse flex-grow items-center" id="navbarSupportedContent">
                    <a class="flex items-center text-gray-900 hover:text-gray-900 focus:text-gray-900 mt-2 lg:mt-0 mr-1" href="#">

                    </a>
                    <ul class="navbar-nav flex flex-col pl-0 list-style-none mr-auto">
                        <li class="nav-item p-2">
                            <Link href="/admin/clients" class="nav-link text-gray-500 hover:text-gray-700 focus:text-gray-700 p-0">
                                <slot name="header"></slot>
                            </Link>
                        </li>
                    </ul>
                    <ul class="navbar-nav flex flex-col pl-0 list-style-none right-0">
                        <li class="nav-item p-2">
                            <a href="/" class="nav-link text-gray-500 hover:text-gray-700 focus:text-gray-700 p-0">To the front end</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <slot />
    </div>
</template>
