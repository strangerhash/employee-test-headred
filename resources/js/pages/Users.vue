<template>
    <div class="container">
        <h1>User List</h1>
        <div class="search-box">
            <input 
                type="text" 
                v-model="search" 
                @input="searchUsers" 
                placeholder="Search by email or first name" 
            />
        </div>
        <ul class="user-list">
            <li v-for="user in users" :key="user.id">
                <div class="user-info">
                    <h2>{{ user.first_name }} {{ user.last_name }}</h2>
                    <p>{{ user.email }}</p>
                </div>
                <button @click="viewUser(user.id)">View</button>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            search: '',
            users: [], // Store the users fetched from the backend
        };
    },
    methods: {
        async fetchUsers() {
            try {
                const response = await fetch('/api/users'); // Fetch all users initially

                console.log(response)
                this.users = await response.json();
            } catch (error) {
                console.error('Error fetching users:', error);
            }
        },
        async searchUsers() {
            if (this.search.length === 0) {
                await this.fetchUsers(); 
                return;
            }
            try {
                const response = await fetch(`/api/users/search?query=${this.search}`);
                this.users = await response.json(); 
            } catch (error) {
                console.error('Error searching users:', error);
            }
        },
        viewUser(userId) {
            //No need to implement as it is not in scope
            console.log('View user:', userId);
        },
    },
    mounted() {
        this.fetchUsers(); // Fetch all users when the component is mounted
    },
};
</script>

<style>
/* Include your previously provided CSS styles here */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f7fa;
    color: #333;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

h1 {
    text-align: center;
    color: #4A4A4A;
    margin-bottom: 20px;
}

.search-box {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}

.search-box input {
    width: 100%;
    max-width: 400px;
    padding: 10px;
    border: 2px solid #4A90E2;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s;
}

.search-box input:focus {
    outline: none;
    border-color: #007BFF; /* Change border color on focus */
}

.user-list {
    list-style: none;
    padding: 0;
}

.user-list li {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 15px;
    margin-bottom: 10px;
    transition: box-shadow 0.3s;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.user-list li:hover {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Add shadow on hover */
}

.user-info {
    flex: 1;
}

.user-info h2 {
    font-size: 18px;
    margin: 0;
}

.user-info p {
    margin: 5px 0;
    color: #777;
}

button {
    background-color: #4A90E2;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 15px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #007BFF; /* Darker blue on hover */
}
</style>
