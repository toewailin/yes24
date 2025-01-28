<x-admin-layout>
    <h3 class="text-gray-700 text-3xl font-medium">Dashboard</h3>
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
        <x-dashboard-card title="Artists" count="{{ $data['artists'] }}" icon="users" color="indigo" />
        <x-dashboard-card title="Banners" count="{{ $data['banners'] }}" icon="image" color="orange" />
        <x-dashboard-card title="Categories" count="{{ $data['categories'] }}" icon="folder" color="pink" />
        <x-dashboard-card title="Subcategories" count="{{ $data['subcategories'] }}" icon="folder-open" color="green" />
        <x-dashboard-card title="Products" count="{{ $data['products'] }}" icon="shopping-cart" color="blue" />
        <x-dashboard-card title="Product Details" count="{{ $data['productDetails'] }}" icon="tag" color="red" />
        <x-dashboard-card title="Carts" count="{{ $data['carts'] }}" icon="shopping-bag" color="yellow" />
        <x-dashboard-card title="Orders" count="{{ $data['orders'] }}" icon="clipboard-check" color="teal" />
        <x-dashboard-card title="Order Items" count="{{ $data['orderItems'] }}" icon="list" color="purple" />
        <x-dashboard-card title="FAQs" count="{{ $data['faqs'] }}" icon="question-mark-circle" color="gray" />
        <x-dashboard-card title="Events" count="{{ $data['events'] }}" icon="calendar" color="cyan" />
        <x-dashboard-card title="Suppliers" count="{{ $data['suppliers'] }}" icon="truck" color="lime" />
    </div>
</x-admin-layout>
