<template>
    <Head>
        <title>{{ $page.props.title }} - My awesome app</title>
    </Head>

    <div class="p-6">
        <div class="flex space-x-4 mb-4">
            <Link
                :href="route('dashboard.home')"
                class="text-gray-700 bg-gray-200 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                >Home</Link
            >
        </div>

        <h1>This is: {{ $page.props.title }}</h1>
    </div>
</template>