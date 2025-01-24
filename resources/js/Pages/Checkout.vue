<template>
    <div>
        <h1>Checkout Page</h1>
        <div v-if="cartItems.length">
            <ul>
                <li v-for="(item, index) in cartItems" :key="index">
                    {{ item.name }} - Quantity: {{ item.quantity }} - Price: ${{ item.price }}
                </li>
            </ul>
            <p>Total: ${{ subtotal }}</p>
        </div>
        <div v-else>
            <p>Your cart is empty!</p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        cartItems: {
            type: Array,
            required: true,
        },
        subtotal: {
            type: Number,
            required: true,
        },
    },
};
</script>
