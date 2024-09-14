<template>
    <div>
        <h1>To-do List</h1>
        <ul>
            <li v-for="todo in todos" :key="todo.id">
                {{ todo.title }} - {{ todo.completed ? 'Completed' : 'Pending' }}
                <button @click="toggleComplete(todo)">Toggle Complete</button>
            </li>
        </ul>
        <form @submit.prevent="addTodo">
            <input v-model="newTodo" placeholder="New Todo">
            <button type="submit">Add</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            todos: [],
            newTodo: ''
        };
    },
    mounted() {
        this.fetchTodos();
    },
    methods: {
        fetchTodos() {
            axios.get('/todos').then(response => {
                this.todos = response.data;
            });
        },
        addTodo() {
            axios.post('/todos', { title: this.newTodo }).then(response => {
                this.todos.push(response.data);
                this.newTodo = '';
            });
        },
        toggleComplete(todo) {
            axios.put(`/todos/${todo.id}`, { completed: !todo.completed })
                .then(response => {
                    todo.completed = response.data.completed;
                });
        }
    }
};
</script>
