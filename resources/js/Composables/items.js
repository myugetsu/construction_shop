import { ref } from 'vue';

export default function useItems() {
    const items = ref({})

    const getItems = async () => {
        axios.get('/api/items')
            .then(response => items.value = response.data.data)
    }

    const getItem = async (id) => {
        axios.get('/api/items/' + id)
            .then(response => items.value = response.data.data)
    }

    return { items, getItems, getItem }
}
