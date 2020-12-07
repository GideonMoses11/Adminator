import Profile from './components/Profile.vue'
import Dashboard from './components/Dashboard.vue'
import Users from './components/Users.vue'
import Developer from './components/Developer.vue'

export const routes = [
    {path: '/dashboard', 
    component: Dashboard
    },
    {path: '/profile', 
    component: Profile
    },
    {path: '/users', 
    component: Users
    },
    {path: '/developer', 
    component: Developer
    },
]
