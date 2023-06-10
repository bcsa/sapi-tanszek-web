export default [
    {
        path: '/',

        component: () => import(
            /* webpackChunkName: "IndexLayout" */
            '@js/Layouts/HomeLayout.vue'
            ),
    },
];
