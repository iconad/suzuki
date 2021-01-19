<template>
    <div>

        <table class="ui celled table">
            <thead>
                <tr>
                <th>Model</th>
                <th>SKU</th>
                <th>Accessory</th>
                <th>Quantity</th>
            </tr></thead>
            <tbody>
                <tr class="d" v-for="(item, i) in cart" :key="i">
                    <td data-label="vehicle">{{item.vehicle}}</td>
                    <td data-label="sku">{{item.sku}}</td>
                    <td data-label="accessory">{{item.accessory}}</td>
                    <td data-label="quantity">{{item.quanity}}</td>
                </tr>
            </tbody>
            </table>
    </div>
</template>
<script>
export default {
    props: ['cart']
}
</script>
