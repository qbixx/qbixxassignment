<script setup>
import { Link as TheLink } from '@inertiajs/inertia-vue3'
</script>

<template>
  <div class="w-full">
    <nav class="z-10 navbar navbar-light navbar-expand-lg relative flex w-full flex-wrap items-center justify-between bg-gray-100 py-4 text-gray-500 shadow-lg hover:text-gray-700 focus:text-gray-700">
      <div class="container-fluid flex w-full flex-wrap items-center justify-between px-6">
        <div id="navbarSupportedContent" class="collapse navbar-collapse flex-grow items-center">
          <ul class="list-style-none navbar-nav mr-auto flex flex-col pl-0">
            <li class="nav-item p-2">
              <TheLink 
                href="/admin/clients" 
                class="nav-link p-0 text-gray-500 hover:text-gray-700 focus:text-gray-700"
              >
                Clients
              </TheLink>
            </li>
          </ul>

          <ul class="list-style-none navbar-nav right-0 flex flex-col pl-0">
            <li class="nav-item p-2">
              <a
                href="/" 
                class="nav-link p-0 text-gray-500 hover:text-gray-700 focus:text-gray-700"
              >
                To the front end
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <slot />
  </div>
</template>
