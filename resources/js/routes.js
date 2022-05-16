
import TaskList from "./components/task/List";
import TaskCreate from "./components/task/Add";
import TaskEdit from "./components/task/Edit";

const routes = [
    {
        name: 'taskList',
        path: '/admin/task',
        component: TaskList
    },
    {
        name: 'taskEdit',
        path: '/admin/task/:id/edit',
        component: TaskEdit
    },
    {
        name: 'taskAdd',
        path: '/admin/task/add',
        component: TaskCreate
    }
];
export default routes;
