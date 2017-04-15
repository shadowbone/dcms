import userIndex from './user/index.vue';
import menuIndex from './menu/index.vue';
import roleIndex from './roles/index.vue';

export const masterRoutes = [
    {path : '/user', component : userIndex},
    {path : '/menu', component : menuIndex},
    {path : '/role', component : roleIndex}
]; 